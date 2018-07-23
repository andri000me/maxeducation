<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hak_akses extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->login_checker->check_login_admin();
	}

	public function index()
	{
		
	}

	public function store_hak_akses_siswa()
	{
		$this->_validate();

		$username_input = $this->input->post('username');

		$data_user = $this->User_model->is_valid_user($username_input);

		if ($data_user) {
			if ($data_user->username == $username_input) {
				$data['inputerror'][] = 'username_sudah_ada';
				$data['error_string'][] = 'Username sudah ada.. Gunakan Username yang lain!!';
				$data['status'] = FALSE;
				echo json_encode($data);
				exit();
			} 

		} else {
			$data = [
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id' => $this->input->post('role_id'),
				'siswa_id' => $this->input->post('siswa_id'),
			];

			if ($this->User_model->insert_user_siswa($data)) {
				$response = ['status' => TRUE, 'message' => 'Data User Berhasil Ditambahkan'];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			}
		}		
	}

	public function store_hak_akses_guru()
	{
		$this->_validate();

		$username_input = $this->input->post('username');

		$data_user = $this->User_model->is_valid_user($username_input);

		if ($data_user) {
			if ($data_user->username == $username_input) {
				$data['inputerror'][] = 'username_sudah_ada';
				$data['error_string'][] = 'Username sudah ada.. Gunakan Username yang lain!!';
				$data['status'] = FALSE;
				echo json_encode($data);
				exit();
			}

		} else {
			$data = [
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id' => $this->input->post('id_role'),
				'guru_id' => $this->input->post('id_guru'),
			];

			if ($this->User_model->insert_user_guru($data)) {
				$response = ['status' => TRUE, 'message' => 'Data User Berhasil Ditambahkan'];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			}
		}
		
	}

	public function tambah_hak_akses_guru()
	{
		$data = [
			'title' => 'MAX Education | Admin - Data Hak Akses Guru',
			'content' => $this->load->view('admin/pages/hak_akses/hak_akses_guru_view', [
				'user_guru' => $this->Guru_model->get_users_guru(),
			], TRUE),

			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),

		];

		$this->load->view('admin/index', $data);
	}

	public function hak_akses_siswa()
	{
		$data = [
			'title' => 'MAX Education | Admin - Data Hak Akses Siswa',
			'content' => $this->load->view('admin/pages/hak_akses/hak_akses_siswa_view', [
				'user_siswa' => $this->Siswa_model->get_users_siswa(),
			], TRUE),

			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),

		];

		$this->load->view('admin/index', $data);
	}

	public function tambah_hak_akses_siswa($id_siswa)
	{
		$data = [
			'title' => 'MAX Education | Admin - Tambah Data Hak Akses Siswa',
			'content' => $this->load->view('admin/pages/hak_akses/tambah_hak_akses_siswa_view', [
				'siswa' => $this->Siswa_model->get_siswa_where($id_siswa),
			], TRUE),

			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),

		];

		$this->load->view('admin/index', $data);
	}

	public function delete_hak_akses_siswa($id_user)
	{
		if($this->User_model->delete_user($id_user)){
			$response = ['success' => TRUE, 'message' => 'Data User Berhasil Dihapus'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function delete_hak_akses_guru($id_user)
	{
		if($this->User_model->delete_user($id_user)){
			$response = ['success' => TRUE, 'message' => 'Data User Berhasil Dihapus'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function edit_hak_akses($id_user)
	{
		$this->_validate_edit_user();

		$data_edit = [
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		];

		if ($this->User_model->update_user_password($id_user, $data_edit)) {
			$response = ['status' => TRUE, 'message' => 'Data User Berhasil Diubah'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}


	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('username') == '')
		{
			$data['inputerror'][] = 'username';
			$data['error_string'][] = 'Username Harus Diisi';
			$data['status'] = FALSE;
		}

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
			$data['error_string'][] = 'Password dan Konfirmasi Password Tidak Sama';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	private function _validate_edit_user()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('password') == '')
		{
			$data['inputerror'][] = 'password';
			$data['error_string'][] = 'Password Baru Harus Diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('konfirmasi_password_baru') == '')
		{
			$data['inputerror'][] = 'konfirmasi_password_baru';
			$data['error_string'][] = 'Konfirmasi Password Baru Harus Diisi';
			$data['status'] = FALSE;
		}

		if ($this->input->post('password') !== $this->input->post('konfirmasi_password_baru')) {
			$data['inputerror'][] = 'password_lama_tidak_sama';
			$data['error_string'][] = 'Password Baru dengan Konfirmasi Password Baru Tidak Sama';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE){
			echo json_encode($data);
			exit();
		}
	}

}

/* End of file Hak_akses.php */
/* Location: ./application/controllers/admin/panel/Hak_akses.php */