<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->login_checker->check_login_admin();
	}

	public function index()
	{
		$data = [
			'title' => 'MAX Education | Admin - Profile',
			'content' => $this->load->view('admin/pages/profile/content_profile_view', [
				'user' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
				'user_role' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),
				'jenis_kelamin' => $this->Jenis_kelamin_model->get_jenis_kelamin(),
			], TRUE),

			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),

		];

		$this->load->view('admin/index', $data);
	}

	public function update_informasi($id_admin)
	{
		$this->_validate_informasi();

		$data = [
			'nama_lengkap_admin' => $this->input->post('nama_lengkap_admin'),
			'jenis_kelamin_id' => $this->input->post('jenis_kelamin_id'),
		];

		if(!empty($_FILES['avatar']['name'])){
			$upload = $this->_do_upload();

			$avatar = $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id'));

			if (file_exists('./uploads/images/avatars/'.$avatar->avatar)) {
				@unlink('./uploads/images/avatars/'.$avatar->avatar);
			}

			$data['avatar'] =  $upload;

		}

		if ($this->Admin_model->update_admin_informasi($id_admin, $data)) {
			$response = ['status' => TRUE, 'message' => 'Data Admin Berhasil Diubah'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function update_password($id_user)
	{
		$this->_validate_password();

		$data = [
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		];

		if ($this->User_model->update_admin_password($id_user, $data)) {
			$response = ['status' => TRUE, 'message' => 'Data Password Admin Berhasil Diubah'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	private function _do_upload()
	{
		$config['upload_path']          = './uploads/images/avatars/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 10000;
		$config['file_name']            = round(microtime(true) * 1000);

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload("avatar")){
			$data['inputerror'][] = 'avatar';
			$data['error_string'][] = 'Upload error : '.$this->upload->display_errors('','');
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	private function _validate_informasi()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('nama_lengkap_admin') == '')
		{
			$data['inputerror'][] = 'nama_lengkap_admin';
			$data['error_string'][] = 'Nama Lengkap Harus Diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('jenis_kelamin_id') == '')
		{
			$data['inputerror'][] = 'jenis_kelamin_id';
			$data['error_string'][] = 'Jenis Kelamin Harus Diisi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	private function _validate_password()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('password') == '')
		{
			$data['inputerror'][] = 'password';
			$data['error_string'][] = 'Password Harus Diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('konfirmasi_password') == '')
		{
			$data['inputerror'][] = 'konfirmasi_password';
			$data['error_string'][] = 'Konfirmasi Password Harus Diisi';
			$data['status'] = FALSE;
		}

		if ($this->input->post('konfirmasi_password') !== $this->input->post('password')) {
			$data['inputerror'][] = 'password_tidak_sama';
			$data['error_string'][] = 'Password Baru dan Konfirmasi Password Baru Tidak Sama';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/admin/panel/Profile.php */