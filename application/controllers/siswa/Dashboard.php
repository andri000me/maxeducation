<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->login_checker->check_login_siswa();
	}
	
	public function index()
	{
		$data = [
			'title' => 'MAX Education | Halaman Siswa',
			'content' => $this->load->view('siswa/content_siswa_view', [
				'kelas' => $this->Kelas_model->get_kelas_siswa($this->session->userdata('siswa_id')),
				'kelas_posts' => $this->Kelas_post_model->get_kelas_posts_siswa($this->session->userdata('siswa_id')),
				
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
	
	public function kelas($slug)
	{
		$kelas = $this->Kelas_model->get_kelas_by_slug($slug);
		
		$data = [
			'title' => $kelas->nama_kelas. ' | MAX Education',
			'content' => $this->load->view('siswa/content_kelas_view', [
				'kelas' => $this->Kelas_model->get_kelas_by_slug($slug),
				'kelas_posts' => $this->Kelas_post_model->get_kelas_posts_where($slug),
				// 'kelas_comments' => $post_comments,
				// 'lihat' => $lihat,
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

	public function view_post($id_kelas_posts)
	{

		$post = $this->Kelas_post_model->get_post_by_id($id_kelas_posts);

		$data = [
			'title' => 'MAX Education | Halaman Kiriman',
			'content' => $this->load->view('siswa/content_post_view', [
				'kiriman' => $post,
				'kiriman_comment' => $this->Kelas_post_model->get_comment($id_kelas_posts),
				'jumlah_comment' => count($this->Kelas_post_model->get_comment($id_kelas_posts)),

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

	public function edit_post($id_kelas_posts)
	{
		$data = [
			'title' => 'MAX Education | Halaman Edit Kiriman',
			'content' => $this->load->view('siswa/content_edit_post_view', [
				'kelass' => $this->Kelas_model->get_kelas_siswa($this->session->userdata('siswa_id')),
				'post' => $this->Kelas_post_model->get_post_by_id($id_kelas_posts),

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

	public function store_edit_post($id_kelas_posts)
	{
		$this->_validate_edit_post();

		$data = [
			'catatan' => $this->input->post('catatan'),
			'kelas_id' => $this->input->post('kelas_id'),
		];

		if(!empty($_FILES['document']['name'])){

			$document = $this->Kelas_post_model->get_post_by_id($id_kelas_posts);

			if (file_exists('./uploads/materis/'.$document->document)) {
				@unlink('./uploads/materis/'.$document->document);
			}

			$upload = $this->_do_upload_document();

			$data['document'] =  $upload;

		}

		if($this->Kelas_post_model->update_post($id_kelas_posts, $data)){
			$response = ['status' => TRUE, 'message' => 'Kiriman Berhasil Diubah'];
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
		}
	}

	public function download($id_kelas_posts)
	{
		if (!empty($id_kelas_posts)) {

			$post = $this->Kelas_post_model->get_post_by_id($id_kelas_posts);

			$file = 'uploads/materis/'.$post->document;

			force_download($file, NULL);
		}
		
	}

	private function _do_upload_document()
	{
		$config['upload_path']          = './uploads/materis/';
		$config['allowed_types']        = 'doc|docx|pdf|xls|xlsx|ppt|pptx|zip|rar';
		$config['max_size']             = 10000;
		$config['file_name']            = $_FILES['document']['name'];

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload("document")){
			$data['inputerror'][] = 'document';
			$data['error_string'][] = 'Upload error : '.$this->upload->display_errors('','');
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}

		return $this->upload->data('file_name');
	}

	public function _validate_edit_post()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

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

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/siswa/Dashboard.php */