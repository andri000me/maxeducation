<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->login_checker->check_login_admin();
	}

	public function index()
	{
		$data = [
			'title' => 'MAX Education | Halaman Admin',
			'content' => $this->load->view('admin/pages/content', NULL, TRUE),
			
			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/','refresh');
	}


}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */