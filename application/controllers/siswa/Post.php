<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->login_checker->check_login_siswa();
	}

	public function delete_post($id_kelas_posts)
	{

		$document = $this->Kelas_post_model->get_post_by_id($id_kelas_posts);

		$document_comment = $this->Kelas_post_model->get_comment($id_kelas_posts);

		if (file_exists('./uploads/materis/'.$document->document) && $document->document) {
			@unlink('./uploads/materis/'.$document->document);
		}

		foreach ($document_comment as $document) {
			if (file_exists('./uploads/materis/'.$document->document) && $document->document) {
				@unlink('./uploads/materis/'.$document->document);
			}
		}

		if($this->Kelas_post_model->delete_post($id_kelas_posts) && $this->Kelas_post_model->delete_comment_by_post($id_kelas_posts)){
			$response = ['success' => TRUE, 'message' => 'Kiriman Berhasil Dihapus'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function delete_comment_post($id_kelas_comments)
	{

		$document = $this->Kelas_post_model->get_comment_by_id($id_kelas_comments);

		if (file_exists('./uploads/materis/'.$document->document) && $document->document) {
			@unlink('./uploads/materis/'.$document->document);
		}

		if($this->Kelas_post_model->delete_comment_post($id_kelas_comments)){
			$response = ['success' => TRUE, 'message' => 'Balasan Berhasil Dihapus'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function store_post_kelas()
	{
		$this->_validate_post();

		$data = [
			'catatan' => $this->input->post('catatan'),
			'kelas_id' => $this->input->post('kelas_id'),
			'user_id' => $this->session->userdata('user_id'),
		];

		if(!empty($_FILES['document']['name'])){
			$upload_document = $this->_do_upload_document();
			$data['document'] = $upload_document;
		}

		if($this->Kelas_post_model->insert_kelas_post($data)){
			$response = ['success' => TRUE, 'message' => 'Kiriman Berhasil Dikirim'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function store_comment_post($id_kelas_posts)
	{
		$this->_validate_comment_post();

		$data = [
			'user_id' => $this->session->userdata('user_id'),
			'comment' => $this->input->post('comment'),
			'kelas_posts_id' => $id_kelas_posts,
		];

		if(!empty($_FILES['document']['name'])){
			$upload_document = $this->_do_upload_document();
			$data['document'] = $upload_document;
		}

		if($this->Kelas_post_model->insert_comment_by_post($data)){
			$response = ['success' => TRUE, 'message' => 'Balasan Berhasil Dikirim'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	// private function _do_upload_gambar()
	// {
	// 	$config['upload_path']          = './uploads/materis/';
	// 	$config['allowed_types']        = 'gif|jpg|png|jpeg';
	// 	$config['max_size']             = 1000;
	// 	$config['file_name']            = round(microtime(true) * 1000);

	// 	$this->load->library('upload', $config);

	// 	if(!$this->upload->do_upload("gambar")){
	// 		$data['inputerror'][] = 'gambar';
	// 		$data['error_string'][] = 'Upload error : '.$this->upload->display_errors('','');
	// 		$data['status'] = FALSE;
	// 		echo json_encode($data);
	// 		exit();
	// 	}

	// 	return $this->upload->data('file_name');
	// }

	private function _do_upload_document()
	{
		$config['upload_path']          = './uploads/materis/';
		$config['allowed_types']        = 'doc|docx|pdf|xls|xlsx|ppt|pptx|zip|rar';
		$config['max_size']             = 10000;
		$config['file_name']            = $_FILES['document']['name'];

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('document')){
			$data['inputerror'][] = 'document';
			$data['error_string'][] = 'Upload error : '.$this->upload->display_errors('','');
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}

		return $this->upload->data('file_name');
	}


	public function _validate_post()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		// if (empty($_FILES['gambar']['name'])) {
		// 	$data['inputerror'][] = 'gambar';
		// 	$data['error_string'][] = 'Gambar Wajib Diisi';
		// 	$data['status'] = FALSE;
		// }

		if($this->input->post('catatan') == '')
		{
			$data['inputerror'][] = 'catatan';
			$data['error_string'][] = 'Catatan Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($this->input->post('kelas_id') == '')
		{
			$data['inputerror'][] = 'kelas_id';
			$data['error_string'][] = 'Kelas Wajib Diisi';
			$data['status'] = FALSE;
		}


		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

	public function _validate_comment_post()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('comment') == '')
		{
			$data['inputerror'][] = 'comment';
			$data['error_string'][] = 'Balasan Wajib Diisi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}

/* End of file Post.php */
/* Location: ./application/controllers/siswa/Post.php */