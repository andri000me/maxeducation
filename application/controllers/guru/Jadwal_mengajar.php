<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_mengajar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->login_checker->check_login_guru();

		// $hari = $this->format_waktu->format_hari(date('l'));
	}

	public function index()
	{
		$hari = $this->format_waktu->format_hari(date('l'));
		var_dump ($hari);
		die();
	}

}

/* End of file Jadwal_mengajar.php */
/* Location: ./application/controllers/guru/Jadwal_mengajar.php */