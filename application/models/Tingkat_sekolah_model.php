<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tingkat_sekolah_model extends CI_Model {

	private $table = 'tingkat_sekolah';

	public function get_all_tingkat_sekolah()
	{
		return $this->db->select('*')
				->from($this->table)
				->get()->result();
	}

}

/* End of file Tingkat_sekolah_model.php */
/* Location: ./application/models/Tingkat_sekolah_model.php */