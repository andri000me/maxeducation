<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hari_model extends CI_Model {
	private $table = 'hari';

	public function get_hari()
	{
		return $this->db->select('*')
		->from($this->table)
		->get()->result();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

}

/* End of file Hari_model.php */
/* Location: ./application/models/Hari_model.php */