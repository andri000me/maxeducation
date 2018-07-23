<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Domisili_model extends CI_Model {
	private $table = 'domisili';

	public function get_all_domisili()
	{
		return $this->db->select('*')
				->from($this->table)
				->get()->result();
	}



	

}

/* End of file Domisili_model.php */
/* Location: ./application/models/Domisili_model.php */