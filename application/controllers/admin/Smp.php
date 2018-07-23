<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smp extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->login_checker->check_login_admin();
	}

	public function index()
	{
		$data = [
			'title' => 'MAX Education | Admin - Data Siswa SMP',
			'content' => $this->load->view('admin/pages/smp/content', NULL, TRUE),

			'user_admin' => $this->Admin_model->get_admin_by_id($this->session->userdata('admin_id')),
			'user' => $this->User_model->get_user_by_id($this->session->userdata('user_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function get_siswa_smp(){
		$list = $this->Siswa_model->get_datatables_smp();
		$data = array();
		$no = $_POST['start'];

		// $list_mata_pelajaran_siswa[] = $this->Siswa_model->get_mata_pelajaran_siswa_detail();
		// $mata_pelajaran = implode(", ", (object)$list_mata_pelajaran_siswa);

		foreach ($list as $siswa) {
			// $mata_pelajaran = implode(", ", $siswa->mata_pelajaran);
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
			// $row[] = $mata_pelajaran;
			$row[] = $siswa->registered;

			// add html for action
			$row[] = '<a class="btn btn-flat btn-sm btn-primary" href="javascript:void(0)" title="Detail" onclick="detail('."'".$siswa->id_siswa."'".')"><i class="glyphicon glyphicon-eye-open"></i>   Detail</a>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Siswa_model->count_all(),
			"recordsFiltered" => $this->Siswa_model->count_filtered_smp(),
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