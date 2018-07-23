<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// header("Access-Control-Allow-Origin: *");

require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Restdata extends REST_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	//method untuk not found 404
	public function notfound($pesan){

		$this->response([
			'status'=>FALSE,
			'message'=>$pesan
		], REST_Controller::HTTP_NOT_FOUND);

	}

  //method untuk bad request 400
	public function badreq($pesan){
		$this->response([
			'status'=>FALSE,
			'message'=>$pesan
		], REST_Controller::HTTP_BAD_REQUEST);
	}

}

/* End of file Restdata.php */
/* Location: ./application/controllers/api/Restdata.php */