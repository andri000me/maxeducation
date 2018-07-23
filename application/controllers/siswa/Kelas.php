<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->login_checker->check_login_siswa();
	}

	public function index($slug)
	{
		$kelas = $this->Kelas_model->get_kelas_by_slug($slug);
		
		$data = [
			'title' => $kelas->nama_kelas. ' | MAX Education',
			'content' => $this->load->view('siswa/content_kelas_view', [
				'kelas' => $this->Kelas_model->get_kelas_by_slug($slug),
				'kelas_posts' => $this->Kelas_post_model->get_kelas_posts_where($slug),
			], TRUE),
			'sitebar' => $this->load->view('siswa/sidebar', [
				'kelas' => $this->Kelas_model->get_kelas_siswa($this->session->userdata('siswa_id')),
				'user_siswa' => $this->Siswa_model->get_siswa_where($this->session->userdata('siswa_id')),
				'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),

			], TRUE),

			'user_siswa' => $this->Siswa_model->get_siswa_where($this->session->userdata('siswa_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),


		];

		$this->load->view('siswa/index', $data);
	}

}

/* End of file Kelas.php */
/* Location: ./application/controllers/guru/Kelas.php */