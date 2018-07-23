<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->login_checker->check_login_admin();
	}

	public function index()
	{
		$data = [
			'title' => 'MAX Education | Admin - Data Program',
			'content' => $this->load->view('admin/pages/program/content', [
				'programs' => $this->Program_model->get_program(),
			], TRUE),

			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function get_mata_pelajaran_by_program($id_program)
	{
		$data = [
			'title' => 'MAX Education | Admin - Data Mata Pelajaran ',
			'content' => $this->load->view('admin/pages/program/get_mata_pelajaran_view', [
				'mata_pelajaran' => $this->Mata_pelajaran_model->get_mata_pelajaran_by_program($id_program),
			], TRUE),

			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function create_program()
	{

		$this->_validate();

		$data = $this->input->post();

		if($this->Program_model->insert_program($data)){
			$response = ['success'=> TRUE, 'message' => 'Data Program Berhasil Dibuat'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function create_mata_pelajaran()
	{
		$this->_validate_mata_pelajaran();

		$data = $this->input->post();
		if($this->Mata_pelajaran_model->insert_mata_pelajaran($data)){
			$response = ['success'=> TRUE, 'message' => 'Data Mata Pelajaran Berhasil Dibuat'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function update_program($id)
	{
		$this->_validate();

		$data = $this->input->post();
		if($this->Program_model->update_program($id, $data)){
			$response = ['success'=> TRUE, 'message' => 'Data Program Berhasil Diubah'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function program_edit($id_program)
	{	
		$program = $this->Program_model->get_program_where($id_program);

		if($program){
			$response = ['success' => TRUE, 'data' => $program ];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}else{
			$this->output->set_content_type('application/json')
				->set_output(json_encode(['success' => FALSE, 'error' => 'Data Program Gagal Dimuat']));
		}
		
	}

	public function program_delete($id_program)
	{
		if($this->Program_model->delete_program($id_program) && $this->Mata_pelajaran_model->delete_mata_pelajaran_by_program($id_program) ){
			$response = ['success' => TRUE, 'message' => 'Data Program Berhasil Dihapus'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function get_program_by_id($id_program)
	{	
		$mata_pelajaran = $this->Mata_pelajaran_model->get_mata_pelajaran_where_program($id_program);

		if($mata_pelajaran){
			$response = ['success' => TRUE, 'data' => $mata_pelajaran ];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
		
	}

	public function mata_pelajaran_edit($id_mata_pelajaran)
	{
		$mata_pelajaran = $this->Mata_pelajaran_model->get_mata_pelajaran_where($id_mata_pelajaran);

		if($mata_pelajaran){
			$response = ['success' => TRUE, 'data' => $mata_pelajaran ];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function update_mata_pelajaran($id_mata_pelajaran)
	{
		$this->_validate_mata_pelajaran();

		$data = $this->input->post();
		if($this->Mata_pelajaran_model->update_mata_pelajaran($id_mata_pelajaran, $data)){
			$response = ['success'=> TRUE, 'message' => 'Data Mata Pelajaran Berhasil Diubah'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function mata_pelajaran_delete($id_mata_pelajaran)
	{
		if($this->Mata_pelajaran_model->delete_mata_pelajaran($id_mata_pelajaran)){
			$response = ['success' => TRUE, 'message' => 'Data Program Berhasil Dihapus'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('program') == '')
		{
			$data['inputerror'][] = 'program';
			$data['error_string'][] = 'Nama Program Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	private function _validate_mata_pelajaran()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('mata_pelajaran') == '')
		{
			$data['inputerror'][] = 'mata_pelajaran';
			$data['error_string'][] = 'Mata Pelajaran Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}


}

/* End of file Program.php */
/* Location: ./application/controllers/admin/pages/Program.php */