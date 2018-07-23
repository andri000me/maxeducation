<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->login_checker->check_login_guru();
	}

	public function index($slug)
	{
		$kelas = $this->Kelas_model->get_kelas_by_slug($slug);
		
		$data = [
			'title' => $kelas->nama_kelas. ' | MAX Education',
			'content' => $this->load->view('guru/content_kelas_view', [
				'kelas' => $this->Kelas_model->get_kelas_by_slug($slug),
				'kelas_posts' => $this->Kelas_post_model->get_kelas_posts_where($slug),
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

}

/* End of file Kelas.php */
/* Location: ./application/controllers/guru/Kelas.php */