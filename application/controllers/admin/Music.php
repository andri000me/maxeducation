<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Music extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->login_checker->check_login_admin();
	}

	public function index()
	{
		$data = [
			'title' => 'MAX Education | Admin - Data Siswa Music',
			'content' => $this->load->view('admin/pages/music/content', NULL, TRUE),

			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function get_siswa_music(){
		$list = $this->Siswa_model->get_datatables_music();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $siswa) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $siswa->nama_lengkap_siswa;
			$row[] = $siswa->jenis_kelamin;
			$row[] = $siswa->agama;
			$row[] = $siswa->nomor_hp_siswa;
			$row[] = $siswa->nama_orang_tua;
			$row[] = $siswa->alamat_lengkap;
			$row[] = $siswa->domisili;
			$row[] = $siswa->nama_sekolah;
			// $row[] = $siswa->mata_pelajaran;
			$row[] = $siswa->registered;

			// add html for action
			$row[] = '<a class="btn btn-flat btn-sm btn-primary" href="javascript:void(0)" title="Detail" onclick="detail('."'".$siswa->id_siswa."'".')"><i class="glyphicon glyphicon-eye-open"></i>   Detail</a>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Siswa_model->count_all(),
			"recordsFiltered" => $this->Siswa_model->count_filtered_music(),
			"data" => $data,
		);

		echo json_encode($output);
	}

	public function detail_siswa($id_siswa)
	{
		$siswa = $this->Siswa_model->get_siswa_where($id_siswa);
		$this->output->set_content_type('application/json')->set_output(json_encode($siswa));
	}

}

/* End of file Sd.php */
/* Location: ./application/controllers/admin/pages/Sd.php */