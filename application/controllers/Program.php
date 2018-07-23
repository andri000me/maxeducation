<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Program extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function sd_nasional()
	{
		$data = [
			'title' => 'MAX Education | SD Nasional',
			'content' => $this->load->view('program/sd/sd_nasional', [
				'hari' => $this->Hari_model->get_hari(),
				'jenis_kelamin' => $this->Jenis_kelamin_model->get_jenis_kelamin(),
				'agama' => $this->Agama_model->get_all_agama(),
				'domisili' => $this->Domisili_model->get_all_domisili(),
				'tingkat_sekolah' => $this->Tingkat_sekolah_model->get_all_tingkat_sekolah(),
				'mata_pelajaran' => $this->Mata_pelajaran_model->mata_pelajaran_sd(),
				'hari' => $this->Hari_model->get_hari(),
				'jam' => $this->Jam_model->get_jam(),
			], TRUE),
		];

		$this->load->view('template/index', $data);
	}

	public function sd_internasional()
	{
		$data = [
			'title' => 'MAX Education | SD Internasional',
			'content' => $this->load->view('program/sd/sd_internasional', [
				'hari' => $this->Hari_model->get_hari(),
				'jenis_kelamin' => $this->Jenis_kelamin_model->get_jenis_kelamin(),
				'agama' => $this->Agama_model->get_all_agama(),
				'domisili' => $this->Domisili_model->get_all_domisili(),
				'tingkat_sekolah' => $this->Tingkat_sekolah_model->get_all_tingkat_sekolah(),
				'mata_pelajaran' => $this->Mata_pelajaran_model->mata_pelajaran_sd(),
				'hari' => $this->Hari_model->get_hari(),
				'jam' => $this->Jam_model->get_jam(),
			], TRUE),
		];

		$this->load->view('template/index', $data);
	}

	public function smp()
	{
		$data = [
			'title' => 'MAX Education | SMP',
			'content' => $this->load->view('program/smp/smp', [
				'hari' => $this->Hari_model->get_hari(),
				'jenis_kelamin' => $this->Jenis_kelamin_model->get_jenis_kelamin(),
				'agama' => $this->Agama_model->get_all_agama(),
				'domisili' => $this->Domisili_model->get_all_domisili(),
				'tingkat_sekolah' => $this->Tingkat_sekolah_model->get_all_tingkat_sekolah(),
				'mata_pelajaran' => $this->Mata_pelajaran_model->mata_pelajaran_smp(),
				'hari' => $this->Hari_model->get_hari(),
				'jam' => $this->Jam_model->get_jam(),
			], TRUE),
		];

		$this->load->view('template/index', $data);
	}

	public function sma()
	{
		$data = [
			'title' => 'MAX Education | SMA',
			'content' => $this->load->view('program/sma/sma', [
				'hari' => $this->Hari_model->get_hari(),
				'jenis_kelamin' => $this->Jenis_kelamin_model->get_jenis_kelamin(),
				'agama' => $this->Agama_model->get_all_agama(),
				'domisili' => $this->Domisili_model->get_all_domisili(),
				'tingkat_sekolah' => $this->Tingkat_sekolah_model->get_all_tingkat_sekolah(),
				'mata_pelajaran' => $this->Mata_pelajaran_model->mata_pelajaran_sma(),
				'hari' => $this->Hari_model->get_hari(),
				'jam' => $this->Jam_model->get_jam(),
			], TRUE),
		];

		$this->load->view('template/index', $data);
	}

	public function sbmptn()
	{
		$data = [
			'title' => 'MAX Education | SBMPTN',
			'content' => $this->load->view('program/sbmptn/sbmptn', [
				'hari' => $this->Hari_model->get_hari(),
				'jenis_kelamin' => $this->Jenis_kelamin_model->get_jenis_kelamin(),
				'agama' => $this->Agama_model->get_all_agama(),
				'domisili' => $this->Domisili_model->get_all_domisili(),
				'tingkat_sekolah' => $this->Tingkat_sekolah_model->get_all_tingkat_sekolah(),
				'mata_pelajaran' => $this->Mata_pelajaran_model->mata_pelajaran_sbmptn(),
				'hari' => $this->Hari_model->get_hari(),
				'jam' => $this->Jam_model->get_jam(),
			], TRUE),
		];

		$this->load->view('template/index', $data);
	}

	public function english()
	{
		$data = [
			'title' => 'MAX Education | ENGLISH CONVERSATION',
			'content' => $this->load->view('program/english/english', [
				'hari' => $this->Hari_model->get_hari(),
				'jenis_kelamin' => $this->Jenis_kelamin_model->get_jenis_kelamin(),
				'agama' => $this->Agama_model->get_all_agama(),
				'domisili' => $this->Domisili_model->get_all_domisili(),
				'tingkat_sekolah' => $this->Tingkat_sekolah_model->get_all_tingkat_sekolah(),
				'mata_pelajaran' => $this->Mata_pelajaran_model->mata_pelajaran_english(),
				'hari' => $this->Hari_model->get_hari(),
				'jam' => $this->Jam_model->get_jam(),
			], TRUE),

		];

		$this->load->view('template/index', $data);
	}

	public function music()
	{
		$data = [
			'title' => 'MAX Education | MUSIC CLASS',
			'content' => $this->load->view('program/music/music', [
				'hari' => $this->Hari_model->get_hari(),
				'jenis_kelamin' => $this->Jenis_kelamin_model->get_jenis_kelamin(),
				'agama' => $this->Agama_model->get_all_agama(),
				'domisili' => $this->Domisili_model->get_all_domisili(),
				'tingkat_sekolah' => $this->Tingkat_sekolah_model->get_all_tingkat_sekolah(),
				'mata_pelajaran' => $this->Mata_pelajaran_model->mata_pelajaran_music(),
				'hari' => $this->Hari_model->get_hari(),
				'jam' => $this->Jam_model->get_jam(),
			], TRUE),

		];

		$this->load->view('template/index', $data);
	}

	public function about()
	{
		$data = [
			'title' => 'MAX Education | ABOUT ME',
			'content' => $this->load->view('about', NULL, TRUE),
		];

		$this->load->view('template/index', $data);
	}

	public function has_login()
	{
		$this->load->view('welcome_message');
	}

	public function belajar_gratis()
	{
		$data = [
			'title' => 'MAX Education | Daftar Gratis',
			'content' => $this->load->view('program/belajar_gratis_view', NULL, TRUE),
		];

		$this->load->view('template/index', $data);
	}

	
}

/* End of file Program.php */
/* Location: ./application/controllers/Program.php */