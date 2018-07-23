<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->login_checker->check_login_admin();
	}

	public function index()
	{
		$data = [
			'title' => 'MAX Education | Admin - Data Kelas',
			'content' => $this->load->view('admin/pages/kelas/content_kelas_view', [
				'kelas' => $this->Kelas_model->get_kelas(),
				'program' => $this->Program_model->get_program(),
			], TRUE),
			
			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function store_kelas()
	{
		$this->_validate();

		$mata_pelajaran_id_input = $this->input->post('mata_pelajaran_id');
		
		$kelas = $this->Kelas_model->get_kelas_by_mata_pelajaran_id($mata_pelajaran_id_input);

		if ($kelas) {
			if ($kelas->mata_pelajaran_id == $mata_pelajaran_id_input) {
				$data['inputerror'][] = 'mata_pelajaran_id_sudah_ada';
				$data['error_string'][] = 'Data Sudah Ada!!';
				$data['status'] = FALSE;
				echo json_encode($data);
				exit();
			}
		}

		else {
			$data = [
				'nama_kelas' => $this->input->post('nama_kelas'),
				'slug' => slug($this->input->post('nama_kelas')),
				'program_id' => $this->input->post('program_id'),
				'mata_pelajaran_id' => $this->input->post('mata_pelajaran_id'),
			];

			if($this->Kelas_model->insert_kelas($data)){
				$response = ['status' => TRUE, 'message' => 'Data Kelas Berhasil Dibuat'];
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			}
		}
		
	}

	public function edit_kelas($id_kelas)
	{
		$this->_validate_edit();

		$data = [
			'nama_kelas' => $this->input->post('nama_kelas'),
			'slug' => slug($this->input->post('nama_kelas')),
		];

		if ($this->Kelas_model->update_kelas($id_kelas, $data)) {
			$response = ['status' => TRUE, 'message' => 'Data Kelas Berhasil Diubah'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function delete_kelas($id_kelas)
	{
		if ($this->Kelas_model->delete_kelas($id_kelas)) {
			$response = ['success' => TRUE, 'message' => 'Data Kelas Berhasil Dihapus'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function get_kelas_by_id($id_kelas)
	{
		$kelas = $this->Kelas_model->get_kelas_by_id($id_kelas);

		if ($kelas) {
			$this->output->set_content_type('application/json')->set_output(json_encode($kelas));
		}
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('nama_kelas') == '')
		{
			$data['inputerror'][] = 'nama_kelas';
			$data['error_string'][] = 'Nama Kelas Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('mata_pelajaran_id') == '')
		{
			$data['inputerror'][] = 'mata_pelajaran_id';
			$data['error_string'][] = 'Nama Mata Pelajaran Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	private function _validate_edit()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('nama_kelas') == '')
		{
			$data['inputerror'][] = 'nama_kelas';
			$data['error_string'][] = 'Nama Kelas Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	



}

/* End of file Materi_guru.php */
/* Location: ./application/controllers/admin/panel/Materi_guru.php */