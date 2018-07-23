<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slideshow extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->login_checker->check_login_admin();
	}

	public function index()
	{
		$data = [
			'title' => 'MAX Education | Admin - Data Slideshow',
			'content' => $this->load->view('admin/pages/slideshow/content', [
				'slideshows' => $this->Slideshow_model->get_slideshow(),
			], TRUE),

			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function add_slideshow()
	{
		$data = [
			'title' => 'MAX Education | Admin - Data Slideshow | Add',
			'content' => $this->load->view('admin/pages/slideshow/add_slideshow_view', NULL, TRUE),

			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),
		];

		$this->load->view('admin/index', $data);

	}

	public function edit($id_slideshow)
	{
		$data = [
			'title' => 'MAX Education | Admin - Data Slideshow | Edit',
			'content' => $this->load->view('admin/pages/slideshow/add_slideshow_view', [
				'slideshow' => $this->Slideshow_model->get_slideshow_where($id_slideshow),
			], TRUE),

			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function store_slideshow()
	{
		$this->_validate();

		$data = [
			'keterangan' => $this->input->post('keterangan'),
		];

		if(!empty($_FILES['image_slideshow']['name'])){
			$upload = $this->_do_upload();
			$data['image_slideshow'] = $upload;
		}

		if ($this->Slideshow_model->insert_slideshow($data)) { 
			$response = ['status' => TRUE, 'message' => 'Data Slideshow Berhasil Ditambah'];

			echo json_encode($response);
			// $this->output->set_content_type('application/json')->set_output(json_encode($response));
		} 


	}

	public function slideshow_delete($id_slideshow)
	{
		$image_file_name = $this->Slideshow_model->get_slideshow_where($id_slideshow);

		if(file_exists('uploads/images/slideshows/'.$image_file_name->image_slideshow) && $image_file_name->image_slideshow){
            @unlink('uploads/images/slideshows/'.$image_file_name->image_slideshow);
		}

		if($this->Slideshow_model->delete_slideshow($id_slideshow)){
			$response = ['status' => TRUE, 'message' => 'Data Slideshow Berhasil Dihapus'];
			echo json_encode($response);
		}
	}

	private function _do_upload()
	{
		$config['upload_path']          = './uploads/images/slideshows/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 10000;
		$config['file_name']            = round(microtime(true) * 1000);

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload("image_slideshow")){
			$data['inputerror'][] = 'image_slideshow';
			$data['error_string'][] = 'Upload error : '.$this->upload->display_errors('','');
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if(empty($_FILES['image_slideshow']['name']))
		{
			$data['inputerror'][] = 'image_slideshow';
			$data['error_string'][] = 'Image Slideshow Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}


}

/* End of file Slideshow.php */
/* Location: ./application/controllers/admin/pages/Slideshow.php */