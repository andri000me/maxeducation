<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jam_model extends CI_Model {
	private $table = 'jam';

	public function get_jam()
	{
		return $this->db->select('*')
		->from($this->table)
		->get()->result();
	}

}

/* End of file Hari_model.php */
/* Location: ./application/models/Hari_model.php */