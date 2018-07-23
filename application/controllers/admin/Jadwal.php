<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->login_checker->check_login_admin();
	}

	public function index()
	{
		$data = [
			'title' => 'MAX Education | Admin - Data Jadwal Guru Mengajar',
			'content' => $this->load->view('admin/pages/jadwal/content_jadwal_view', [
				'jadwal_senins' => $this->Siswa_jadwal_model->get_jadwal_siswa_hari_senin(),
				'jadwal_selasas' => $this->Siswa_jadwal_model->get_jadwal_siswa_hari_selasa(),
				'jadwal_rabus' => $this->Siswa_jadwal_model->get_jadwal_siswa_hari_rabu(),
				'jadwal_kamiss' => $this->Siswa_jadwal_model->get_jadwal_siswa_hari_kamis(),
				'jadwal_jumats' => $this->Siswa_jadwal_model->get_jadwal_siswa_hari_jumat(),
				'jadwal_sabtus' => $this->Siswa_jadwal_model->get_jadwal_siswa_hari_sabtu(),
				'jadwal_minggus' => $this->Siswa_jadwal_model->get_jadwal_siswa_hari_minggu(),

			], TRUE),


			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function tambah_jadwal()
	{
		$data = [
			'title' => 'MAX Education | Admin - Data Siswa',
			'content' => $this->load->view('admin/pages/jadwal/siswa_view', [
				'siswas' => $this->Siswa_model->get_siswas(),

			], TRUE),


			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function tambah_jadwal_siswa($id_siswa)
	{
		$siswa = $this->Siswa_model->get_siswa_where($id_siswa);

		if ($siswa) {
			$data = [
				'title' => 'MAX Education | Admin - Tambah Data Jadwal Siswa',
				'content' => $this->load->view('admin/pages/jadwal/tambah_jadwal_view', [
					'siswa' => $this->Siswa_model->get_siswa_where($id_siswa),

					'siswa_mata_pelajaarans' => $this->Siswa_model->get_mata_pelajaran_siswa_detail_where($id_siswa),
					'siswa_haris' => $this->Siswa_model->get_hari_siswa_detail_where($id_siswa),
					'siswa_jams' => $this->Siswa_model->get_jam_siswa_detail_where($id_siswa),

					'jadwal_siswas' => $this->Siswa_jadwal_model->get_siswa_jadwal_where($id_siswa),

					'jams' => $this->Jam_model->get_jam(),
					'haris' => $this->Hari_model->get_hari(),
					'gurus' => $this->Guru_model->get_gurus(),
					'mata_pelajarans' => $this->Mata_pelajaran_model->get_mata_pelajaran_by_program($siswa->id_program),

				], TRUE),

				'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
				'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),
			];
		}

		$this->load->view('admin/index', $data);
	}

	public function get_jadwal_by_id($id_siswa_jadwal)
	{
		$jadwal = $this->Siswa_jadwal_model->get_siswa_jadwal_by_id($id_siswa_jadwal);

		if ($jadwal) {
			$this->output->set_content_type('application/json')->set_output(json_encode($jadwal));
		}
	}

	public function store_jadwal()
	{
		// $this->_validate();

		$data = [
			'guru_id' => $this->input->post('guru_id'),
			'mata_pelajaran_id' => $this->input->post('mata_pelajaran_id'),
			'hari_id' => $this->input->post('hari_id'),
			'jam_id' => $this->input->post('jam_id'),
			'siswa_id' => $this->input->post('siswa_id'),
			'program_id' => $this->input->post('program_id'),
		];

		if($this->Siswa_jadwal_model->insert_jadwal($data)){
			$response = ['status' => TRUE, 'message' => 'Data Jadwal Siswa Berhasil Dibuat'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function edit_jadwal($id_siswa_jadwal)
	{
		$this->_validate();

		$data = [
			'guru_id' => $this->input->post('guru_id'),
			'mata_pelajaran_id' => $this->input->post('mata_pelajaran_id'),
			'hari_id' => $this->input->post('hari_id'),
			'jam_id' => $this->input->post('jam_id'),
		];

		if ($this->Siswa_jadwal_model->update_jadwal($id_siswa_jadwal, $data)) {
			$response = ['status' => TRUE, 'message' => 'Data Jadwal Berhasil Diubah'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function delete_jadwal($id_siswa_jadwal)
	{
		if ($this->Siswa_jadwal_model->delete_jadwal($id_siswa_jadwal)) {
			$response = ['success' => TRUE, 'message' => 'Data Jadwal Berhasil Dihapus'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('guru_id') == '')
		{
			$data['inputerror'][] = 'guru_id';
			$data['error_string'][] = 'Guru Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('mata_pelajaran_id') == '')
		{
			$data['inputerror'][] = 'mata_pelajaran_id';
			$data['error_string'][] = 'Nama Mata Pelajaran Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('hari_id') == '')
		{
			$data['inputerror'][] = 'hari_id';
			$data['error_string'][] = 'Hari Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('jam_id') == '')
		{
			$data['inputerror'][] = 'jam_id';
			$data['error_string'][] = 'Jam Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}



}

/* End of file Jadwal.php */
/* Location: ./application/controllers/admin/panel/Jadwal.php */