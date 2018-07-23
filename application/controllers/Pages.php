<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = [
			'title' => 'MAX Education | Les Private',
			'content' => $this->load->view('template/content', [
				'slideshows' => $this->Slideshow_model->get_slideshow(),
			], TRUE),
		];

		$this->load->view('template/index', $data);
	}

	public function has_login()
	{
		$this->load->view('welcome_message');
	}

	public function logout()
	{
		// $this->session->sess_destroy();
		$this->session->unset_userdata([
			'siswa_login', 'siswa_nama_lengkap', 'siswa_username']);
		redirect(base_url());

	}

	public function edit($id)
	{
		$data = [
			'title' => 'MAX Education | Home',
			'content' => $this->load->view('siap', [
				'hari' => $this->Hari_model->get_hari(),
				'siswa' => $this->Siswa_model->get_siswa_where($id),
				'title' => 'Edit Siswa'
			], TRUE),
		];

		$this->load->view('template/index', $data);
	}

	public function register_siswa()
	{
		$data = [
			'title' => 'MAX Education | Daftar Gratis',
			'content' => $this->load->view('program/register_view', [
				'hari' => $this->Hari_model->get_hari(),
				'jenis_kelamin' => $this->Jenis_kelamin_model->get_jenis_kelamin(),
				'agama' => $this->Agama_model->get_all_agama(),
				'domisili' => $this->Domisili_model->get_all_domisili(),
				'tingkat_sekolah' => $this->Tingkat_sekolah_model->get_all_tingkat_sekolah(),
				'mata_pelajaran' => $this->Mata_pelajaran_model->mata_pelajaran_sd(),
				'hari' => $this->Hari_model->get_hari(),
				'jam' => $this->Jam_model->get_jam(),
				'program' => $this->Program_model->get_program()
			], TRUE),
		];

		$this->load->view('template/index', $data);		
	}

	public function get_mata_pelajaran_by_program($id_program)
	{
		$mata_pelajaran = $this->Mata_pelajaran_model->get_mata_pelajaran_by_program($id_program);
		echo json_encode($mata_pelajaran);
	}

}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */