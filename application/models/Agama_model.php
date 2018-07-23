<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agama_model extends CI_Model {
	private $table = 'agama';

	public function get_all_agama()
	{
		return $this->db->select('*')
				->from($this->table)
				->get()->result();
	}

}

/* End of file Agama_model.php */
/* Location: ./application/models/Agama_model.php */