<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slideshow_model extends CI_Model {
	private $table = 'slideshow';

	public function insert_slideshow($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function get_slideshow()
	{
		return $this->db->select()
		->from($this->table)
		->get()->result();
	}

	public function get_slideshow_where($id_slideshow)
	{
		return $this->db->from($this->table)->where('id_slideshow', $id_slideshow)->get()->row();
	}

	public function delete_slideshow($id_slideshow)
	{
		$this->db->where('id_slideshow', $id_slideshow)->delete($this->table);
	}


}

/* End of file Slideshow_model.php */
/* Location: ./application/models/Slideshow_model.php */