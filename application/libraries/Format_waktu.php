<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Format_waktu {

	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
	}

	public function format_hari($waktu)
	{

		// $hari = $this->ci->Hari_model->get_hari();

		$hari_array = [
			'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'
		];

		$hr = date('w', strtotime($waktu));

		$hari = $hari_array[$hr];

		return $hari;
	}

}

/* End of file Format_waktu.php */
/* Location: ./application/libraries/Format_waktu.php */