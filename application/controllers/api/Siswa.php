<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// header("Access-Control-Allow-Origin: *");

require_once APPPATH . 'controllers/api/Restdata.php';

class Siswa extends Restdata {

	public function form_pendaftaran_siswa_post()
	{
		$data = [
			'nama_lengkap_siswa' => $this->post('nama_lengkap_siswa', TRUE),
			'jenis_kelamin_id' => $this->post('id_jenis_kelamin', TRUE),
			'agama_id' => $this->post('id_agama', TRUE),
			'nomor_hp_siswa' => $this->post('nomor_hp_siswa', TRUE),
			'nomor_hp_ayah' => $this->post('nomor_hp_ayah', TRUE),
			'nomor_hp_ibu' => $this->post('nomor_hp_ibu', TRUE),
			'nama_orang_tua' => $this->post('nama_orang_tua', TRUE),
			'nomor_hp_saudara_serumah' => $this->post('nomor_hp_saudara_serumah', TRUE),
			'nomor_telepon_rumah' => $this->post('nomor_telepon_rumah', TRUE),
			'alamat_lengkap' => $this->post('alamat_lengkap', TRUE),
			'domisili_id' => $this->post('id_domisili', TRUE),
			'tingkat_sekolah_id' => $this->post('id_tingkat_sekolah', TRUE),
			'program_id' => $this->post('id_program', TRUE),
			'kelas' => $this->post('kelas', TRUE),
			'nama_sekolah' => $this->post('nama_sekolah', TRUE),
			'tahu_dari' => $this->post('tahu_dari', TRUE),
		];

		$this->form_validation->set_rules('nama_lengkap_siswa','Nama Lengkap','trim|max_length[255]|required', ['required' => 'Nama Lengkap Wajib Diisi']);
		$this->form_validation->set_rules('id_jenis_kelamin', 'Jenis Kelamin', 'required', ['required' => 'Jenis Kelamin Wajib Diisi']);
		$this->form_validation->set_rules('id_agama', 'Agama', 'required', ['required' => 'Agama Wajib Diisi']);

		$this->form_validation->set_rules('nomor_hp_siswa','Nomor HP Siswa','trim|required|max_length[15]', ['required' => 'Nomor HP Siswa Wajib Diisi']);
		$this->form_validation->set_rules('nama_orang_tua','Nama Orang Tua','trim|required|max_length[255]', ['required' => 'Nama Orang Tua Wajib Diisi']);
		$this->form_validation->set_rules('alamat_lengkap','Alamat Lengkap','trim|required|max_length[255]', ['required' => 'Alamat Lengkap Wajib Diisi']);
		$this->form_validation->set_rules('id_domisili', 'Domisili', 'required', ['required' => 'Domisili Wajib Diisi']);
		$this->form_validation->set_rules('id_tingkat_sekolah', 'Tingkat Sekolah', 'required', ['required' => 'Tingkat Sekolah Wajib Diisi']);

		$this->form_validation->set_rules('kelas','Kelas','trim|required|max_length[255]', ['required' => 'Kelas Wajib Diisi']);
		$this->form_validation->set_rules('nama_sekolah','Nama Sekolah','trim|required|max_length[255]', ['required' => 'Nama Sekolah Wajib Diisi']);
		$this->form_validation->set_rules('mata_pelajaran[]','Mata Pelajaran','required', ['required' => 'Mata Pelajaran Wajib Diisi']);
		$this->form_validation->set_rules('hari[]','Hari Les','required', ['required' => 'Hari Les Wajib Diisi']);
		$this->form_validation->set_rules('jam[]','Jam Les','required', ['required' => 'Jam Les Wajib Diisi']);

		// $config = array(
		// 	'protocol' => 'smtp',
		// 	'smtp_host' => 'mail.maxeducation.id',
		// 	'smtp_port' => 465,
		// 	'smtp_user' => 'recruitment@maxeducation.id',
		// 	'smtp_pass' => 'maxedu2018',
		// 	'mailtype'  => 'html', 
		// 	'charset' => 'utf-8',
		// 	'wordwrap' => TRUE,
		// 	'smtp_crypto' => 'ssl',
		// 	'newline' => '\r\n',
		// );
		
		// $this->load->library('email',$config);
		// $this->email->from('recruitment@maxeducation.id', 'Recruitment MAX Education');
		// $this->email->to('maxeducationindonesia@gmail.com');
		
		// $this->email->subject('New Siswa have signed up');

		if ($this->form_validation->run() == FALSE) {
			$this->badreq($this->validation_errors());
		}else {
			$mata_pelajaran = $this->post('mata_pelajaran');

			$id_siswa = $this->Siswa_model->register_siswa($data);

			/**
			 * [$result_mata_pelajaran description]
			 * @var array
			 */
			$result_mata_pelajaran = array();
			foreach((array) $mata_pelajaran as $key => $val){
				$result_mata_pelajaran[] = array(
					"siswa_id"  => $id_siswa,
					"mata_pelajaran_id"  => $_POST['mata_pelajaran'][$key],
				);
			}

			/**
		 	* [hari Detail Siswa Hari]
		 	*/
		 	$hari = $this->post('hari');
		 	$result_hari = array();
		 	foreach((array) $hari AS $key => $val){
		 		$result_hari[] = array(
		 			"siswa_id"  => $id_siswa,
		 			"hari_id"  => $_POST['hari'][$key],
		 		);
		 	}

			/**
			 * [jam Detail Siswa Jam]
			 */
			$jam = $this->post('jam');
			$result_jam = array();
			foreach((array) $jam AS $key => $val){
				$result_jam[] = array(
					"siswa_id"  => $id_siswa,
					"jam_id"  => $_POST['jam'][$key],
				);
			}

			$this->db->insert_batch('siswa_detail_mata_pelajaran', $result_mata_pelajaran);
			$this->db->insert_batch('siswa_detail_hari', $result_hari);
			$this->db->insert_batch('siswa_detail_jam', $result_jam);

			// $message  = 'Nama Siswa : '. $data['nama_lengkap']."<br>";
			// $message .= 'Nomor HP Siswa : '. $data['nomor_hp_siswa']."<br>";
			// $message .= 'Nama Orang Tua Siswa : '. $data['nama_orang_tua']."<br>";
			// $message .= 'Nomor HP Ayah : '. $data['nomor_hp_ayah']."<br>";
			// $message .= 'Nomor HP Ibu : '. $data['nomor_hp_ibu']."<br>";
			// $message .= 'Alamat Siswa : '. $data['alamat_lengkap']."<br>";
			// $message .= 'Nama Sekolah : '. $data['nama_sekolah']."<br>";
			
			// $this->email->message($message);
			// $this->email->send();

			$this->response($data, Restdata::HTTP_CREATED);
		}
	}

	public function belajar_gratis_post()
	{
		$data = [
			'nama_lengkap_siswa' => $this->post('nama_lengkap_siswa', TRUE),
			'gelombang' => $this->post('gelombang', TRUE),
			'nama_ig' => $this->post('nama_ig', TRUE),
		];

		$this->form_validation->set_rules('nama_lengkap_siswa','Nama Lengkap','trim|max_length[255]|required', ['required' => 'Nama Wajib Diisi']);
		$this->form_validation->set_rules('nama_ig','Nama IG','trim|max_length[255]|required', ['required' => 'Nama IG Wajib Diisi']);

		if ($this->form_validation->run() == FALSE) {
			$this->badreq($this->validation_errors());
		}else {
			if ($this->Siswa_model->register_siswa_belajar_gratis($data)) {
				$this->response($data, Restdata::HTTP_CREATED);
			}
		}
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/api/Siswa.php */