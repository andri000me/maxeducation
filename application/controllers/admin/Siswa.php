<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->login_checker->check_login_admin();
	}

	public function index()
	{
		
	}

	public function detail_siswa($id_siswa)
	{
		$data = [
			'siswa' => $this->Siswa_model->get_siswa_where($id_siswa),
			'mata_pelajaran' => $this->Siswa_model->get_mata_pelajaran_siswa_detail_where($id_siswa),
			'hari' => $this->Siswa_model->get_hari_siswa_detail_where($id_siswa),
			'jam' => $this->Siswa_model->get_jam_siswa_detail_where($id_siswa),

		];
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}


	

}

/* End of file Siswa.php */
/* Location: ./application/controllers/admin/panel/Siswa.php */