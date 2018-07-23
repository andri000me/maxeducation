<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_model extends CI_Model {

	private $table = 'program';

	public function get_program()
	{
		return $this->db->from($this->table)
			         	->get()->result();
	}

	public function insert_program($data)
    {
        return $this->db->insert($this->table, $data);
    } 

	public function update_program($id, $data)
    {
        return $this->db->where('id_program', $id)
                        ->update($this->table,$data);
    }

    public function get_program_where($id_program)
    {
    	return $this->db->from($this->table)
                        ->where('id_program', $id_program)
                        ->get()->row();
    }

    public function delete_program($id_program)
    {
        return $this->db->where('id_program', $id_program)->delete($this->table);
    }
}

/* End of file Program_model.php */
/* Location: ./application/models/Program_model.php */