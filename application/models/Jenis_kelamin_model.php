<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_kelamin_model extends CI_Model {
	private $table = 'jenis_kelamin';

	public function get_jenis_kelamin()
	{
		return $this->db->select('*')
				->from($this->table)
				->get()->result();
	}

}

/* End of file Jenis_kelamin_model.php */
/* Location: ./application/models/Jenis_kelamin_model.php */