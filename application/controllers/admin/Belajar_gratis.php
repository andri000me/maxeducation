<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belajar_gratis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->login_checker->check_login_admin();
	}

	public function index()
	{
		$data = [
			'title' => 'MAX Education | Admin - Data Siswa Belajar Gratis',
			'content' => $this->load->view('admin/pages/belajar_gratis/content', NULL, TRUE),
			
			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function get_siswa_belajar_gratis(){
		$list = $this->Siswa_model->get_datatables_belajar_gratis();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $siswa) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $siswa->nama_lengkap_siswa;
			$row[] = $siswa->gelombang;
			$row[] = $siswa->nama_ig;
			$row[] = $siswa->registered;

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Siswa_model->count_belajar_gratis(),
			"recordsFiltered" => $this->Siswa_model->count_filtered_belajar_gratis(),
			"data" => $data,
		);
		
		echo json_encode($output);
	}

}

/* End of file Belajar_gratis.php */
/* Location: ./application/controllers/admin/pages/Belajar_gratis.php */