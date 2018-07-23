<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->login_checker->check_login_guru();
	}

	public function index()
	{
		$data = [
			'title' => 'MAX Education | Halaman Guru - Absensi',
			'content' => $this->load->view('guru/content_absensi_view', [
				'siswa' => $this->Siswa_model->get_siswas(),
				'hari' => $this->Hari_model->get_hari(),
				'jam' => $this->Jam_model->get_jam(),
			], TRUE),
			'sitebar' => $this->load->view('guru/sidebar', [
				'kelas' => $this->Kelas_model->get_kelas_guru($this->session->userdata('guru_id')),
				'user_guru' => $this->Guru_model->get_guru_where($this->session->userdata('guru_id')),
				'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),
			], TRUE),

			'user_guru' => $this->Guru_model->get_guru_where($this->session->userdata('guru_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),
		];

		$this->load->view('guru/index', $data);
	}

	public function store_absensi()
	{
		$data = [
			'guru_id' => $this->session->userdata('guru_id'),
			'siswa_id' => $this->input->post('siswa_id'),
			'mata_pelajaran_id' => $this->input->post('mata_pelajaran_id'),
			'hari_id' => $this->input->post('hari_id'),
			'jam_id' => $this->input->post('jam_id'),
			'laporan' => $this->input->post('laporan'),
		];

		if($this->Siswa_absensi_model->insert_siswa_absensi($data)){
			$response = ['status' => TRUE, 'message' => 'Absensi Siswa Berhasil Disimpan'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

}

/* End of file Absensi.php */
/* Location: ./application/controllers/guru/Absensi.php */