<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Waktu_helper
{	
	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
	}

	public function format_hari()
	{

		$hari = $this->ci->Hari_model->get_hari();

		var_dump($hari);
		die();

		$hari_array = [
			'Mi'
		];
	}
}
