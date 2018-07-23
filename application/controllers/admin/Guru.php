<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->login_checker->check_login_admin();
	}

	public function index()
	{
		$data = [
			'title' => 'MAX Education | Admin - Data Guru',
			'content' => $this->load->view('admin/pages/guru/content_guru_view', [
				'gurus' => $this->Guru_model->get_gurus(),
			], TRUE),
			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function tambah_guru()
	{
		$data = [
			'title' => 'MAX Education | Admin - Tambah Data Guru',
			'content' => $this->load->view('admin/pages/guru/tambah_guru_view', [
				'jenis_kelamin' => $this->Jenis_kelamin_model->get_jenis_kelamin(),
				'agama' => $this->Agama_model->get_all_agama(),
			], TRUE),

			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),

		];

		$this->load->view('admin/index', $data);
	}

	public function edit_guru($id_guru)
	{
		$data = [
			'title' => 'MAX Education | Admin - Edit Data Guru',
			'content' => $this->load->view('admin/pages/guru/edit_guru_view', [
				'jenis_kelamin' => $this->Jenis_kelamin_model->get_jenis_kelamin(),
				'agama' => $this->Agama_model->get_all_agama(),
				'guru' => $this->Guru_model->get_guru_where($id_guru),

			], TRUE),
			
			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),

		];

		$this->load->view('admin/index', $data);
	}

	public function mata_pelajaran($id_guru)
	{
		$data = [
			'title' => 'MAX Education | Admin - Tambah Data Mata Pelajaran Guru',
			'content' => $this->load->view('admin/pages/guru/tambah_mata_pelajaran_guru_view', [
				'guru' => $this->Guru_model->get_guru_where($id_guru),
				'guru_mengajar' => $this->Guru_mengajar_model->get_mengajar_guru_where($id_guru),
				'program' => $this->Program_model->get_program(),

			], TRUE),
			
			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),

		];

		$this->load->view('admin/index', $data);
	}

	public function store_guru()
	{
		$this->_validate();

		$data = [
			'nama_lengkap_guru' => $this->input->post('nama_lengkap_guru'),
			'jenis_kelamin_id' => $this->input->post('id_jenis_kelamin'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama_id' => $this->input->post('id_agama'),
		];

		if(!empty($_FILES['avatar']['name'])){
			$upload = $this->_do_upload();
			$data['avatar'] = $upload;
		}

		if ($this->Guru_model->insert_guru($data)) {
			$response = ['status' => TRUE, 'message' => 'Data Guru Berhasil Ditambah'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
		
	}

	public function guru_update($id_guru)
	{
		$this->_validate_update();

		$data = [
			'nama_lengkap_guru' => $this->input->post('nama_lengkap_guru'),
			'jenis_kelamin_id' => $this->input->post('id_jenis_kelamin'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama_id' => $this->input->post('id_agama'),
		];

		if(!empty($_FILES['avatar']['name'])){
			$upload = $this->_do_upload();

			$avatar = $this->Guru_model->get_guru_where($id_guru);

			if (file_exists('./uploads/images/avatars/'.$avatar->avatar)) {
				@unlink('./uploads/images/avatars/'.$avatar->avatar);
			}

			$data['avatar'] =  $upload;

		}

		if ($this->Guru_model->update_guru($id_guru, $data)) {
			$response = ['status' => TRUE, 'message' => 'Data Guru Berhasil Diubah'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function guru_delete($id_guru)
	{
		$image_file_name = $this->Guru_model->get_guru_where($id_guru);

		if(file_exists('uploads/images/avatars/'.$image_file_name->avatar) && $image_file_name->avatar){
			@unlink('uploads/images/avatars/'.$image_file_name->avatar);
		}

		$this->Guru_model->delete_guru($id_guru);
		$this->Guru_mengajar_model->delete_mata_pelajaran_where_guru($id_guru);

		$response = ['success' => TRUE, 'message' => 'Data Guru Berhasil Dihapus'];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
		
	}

	public function store_mata_pelajaran_guru()
	{
		$data = [
			'guru_id' => $this->input->post('id_guru'),
			'program_id' => $this->input->post('id_program'),
			'mata_pelajaran_id' => $this->input->post('id_mata_pelajaran'),

		];

		if($this->Guru_mengajar_model->insert_mengajar_guru($data)){
			$response = ['success' => TRUE, 'message' => 'Data Mata Pelajaran Guru Berhasil Ditambah'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function delete_mata_pelajaran_guru($id_guru)
	{
		// if($this->Guru_mengajar_model->delete_mengajar_guru($id_guru) && $this->Guru_mengajar_model->delete_mata_pelajaran_where_guru($id_guru)){
		// 	$response = ['success' => TRUE, 'message' => 'Data Mengajar Guru Berhasil Dihapus'];
		// 	$this->output->set_content_type('application/json')->set_output(json_encode($response));
		// }

		$this->Guru_mengajar_model->delete_mengajar_guru($id_guru);
		$this->Guru_mengajar_model->delete_mata_pelajaran_where_guru($id_guru);
		
		$response = ['success' => TRUE, 'message' => 'Data Mengajar Guru Berhasil Dihapus'];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
		
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

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if(empty($_FILES['avatar']['name']))
		{
			$data['inputerror'][] = 'avatar';
			$data['error_string'][] = 'Foto Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('nama_lengkap_guru') == '')
		{
			$data['inputerror'][] = 'nama_lengkap_guru';
			$data['error_string'][] = 'Nama Lengkap Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('id_jenis_kelamin') == '')
		{
			$data['inputerror'][] = 'id_jenis_kelamin';
			$data['error_string'][] = 'Jenis Kelamin Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('tempat_lahir') == '')
		{
			$data['inputerror'][] = 'tempat_lahir';
			$data['error_string'][] = 'Tempat Lahir Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('tanggal_lahir') == '')
		{
			$data['inputerror'][] = 'tanggal_lahir';
			$data['error_string'][] = 'Tanggal Lahir Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('id_agama') == '')
		{
			$data['inputerror'][] = 'id_agama';
			$data['error_string'][] = 'Agama Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	private function _validate_update()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('nama_lengkap_guru') == '')
		{
			$data['inputerror'][] = 'nama_lengkap_guru';
			$data['error_string'][] = 'Nama Lengkap Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('id_jenis_kelamin') == '')
		{
			$data['inputerror'][] = 'id_jenis_kelamin';
			$data['error_string'][] = 'Jenis Kelamin Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('tempat_lahir') == '')
		{
			$data['inputerror'][] = 'tempat_lahir';
			$data['error_string'][] = 'Tempat Lahir Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('tanggal_lahir') == '')
		{
			$data['inputerror'][] = 'tanggal_lahir';
			$data['error_string'][] = 'Tanggal Lahir Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('id_agama') == '')
		{
			$data['inputerror'][] = 'id_agama';
			$data['error_string'][] = 'Agama Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}


}

/* End of file Guru.php */
/* Location: ./application/controllers/admin/panel/Guru.php */