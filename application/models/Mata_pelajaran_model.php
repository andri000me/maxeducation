<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mata_pelajaran_model extends CI_Model {
	private $table = 'mata_pelajaran';

	public function get_all_mata_pelajaran()
	{
		return $this->db->select('*')
				->from($this->table)
				->get()->result();
	}

	public function mata_pelajaran_sd()
	{
		return $this->db->select('*')
				->from($this->table)
				->where('program_id', '1')
				->get()->result();
	}

	public function mata_pelajaran_smp()
	{
		return $this->db->select('*')
				->from($this->table)
				->where('program_id', '2')
				->get()->result();
	}

	public function mata_pelajaran_sma()
	{
		return $this->db->select('*')
				->from($this->table)
				->where('program_id', '3')
				->get()->result();
	}

	public function mata_pelajaran_sbmptn()
	{
		return $this->db->select('*')
				->from($this->table)
				->where('program_id', '4')
				->get()->result();
	}

	public function mata_pelajaran_english()
	{
		return $this->db->select('*')
				->from($this->table)
				->where('program_id', '5')
				->get()->result();
	}

	public function mata_pelajaran_music()
	{
		return $this->db->select('*')
				->from($this->table)
				->where('program_id', '6')
				->get()->result();
	}

	public function get_mata_pelajaran_by_program($id_program)
	{
		return $this->db->from($this->table)
				 ->join('program', 
				 		'program.id_program = mata_pelajaran.program_id')
				 ->where('mata_pelajaran.program_id', $id_program)
				 ->get()->result();
	}

	public function insert_mata_pelajaran($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update_mata_pelajaran($id_mata_pelajaran, $data)
    {
        return $this->db->where('id_mata_pelajaran', $id_mata_pelajaran)
            ->update($this->table, $data);
    }

    public function get_mata_pelajaran_where($id_mata_pelajaran)
    {
    	return $this->db->from($this->table)
    				->join('program', 'program.id_program = mata_pelajaran.program_id', 'left')
                    ->where('id_mata_pelajaran', $id_mata_pelajaran)
                    ->get()->row();
    }

    public function delete_mata_pelajaran($id_mata_pelajaran)
    {
        return $this->db->where('id_mata_pelajaran', $id_mata_pelajaran)->delete($this->table);
    }

    public function delete_mata_pelajaran_by_program($id_program)
    {
        return $this->db->where('program_id', $id_program)->delete($this->table);
    }

    public function get_mata_pelajaran_guru()
    {
    	return $this->db->from('mata_pelajaran_guru')
						->get()->result();
    }


}

/* End of file Mata_pelajaran_model.php */
/* Location: ./application/models/Mata_pelajaran_model.php */