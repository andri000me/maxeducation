<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->login_checker->check_login_admin();
	}

	public function index()
	{
		$data = [
			'title' => 'MAX Education | Admin - Data Absensi Siswa',
			'content' => $this->load->view('admin/pages/absensi_siswa/content_absensi_siswa_view', [
				'siswas' => $this->Siswa_model->get_siswas(),
			], TRUE),
			
			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function view($id_siswa)
	{
		$data = [
			'title' => 'MAX Education | Admin - Data Absensi Siswa',
			'content' => $this->load->view('admin/pages/absensi_siswa/content_lihat_absensi_siswa_view', [
				'siswa' => $this->Siswa_model->get_siswa_where($id_siswa),
				'absensis' => $this->Siswa_absensi_model->get_absensi_siswa_by($id_siswa),
			], TRUE),
			
			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),
		];

		$this->load->view('admin/index', $data);
	}

}

/* End of file Absensi.php */
/* Location: ./application/controllers/admin/Absensi.php */