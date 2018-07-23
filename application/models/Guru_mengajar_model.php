<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_mengajar_model extends CI_Model {
	private $table = 'guru_mengajar';

	public function get_mengajar_guru_where($id_guru)
	{
		return $this->db->from($this->table)
						->join('guru', 'guru.id_guru = guru_mengajar.guru_id')
						->join('program', 'program.id_program = guru_mengajar.program_id')
						->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran = guru_mengajar.mata_pelajaran_id')
						->where('guru_mengajar.guru_id', $id_guru)
						->get()->result();
	}

	public function get_mengajar_guru_by_program($id_program)
	{
		return $this->db->from($this->table)
						->join('guru', 'guru.id_guru = guru_mengajar.guru_id')
						->join('program', 'program.id_program = guru_mengajar.program_id')
						->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran = guru_mengajar.mata_pelajaran_id')
						->where('guru_mengajar.program_id', $id_program)
						->get()->result();
	}

	public function insert_mengajar_guru($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function delete_mengajar_guru($id_guru_mengajar)
	{
		return $this->db->where('id_guru_mengajar', $id_guru_mengajar)
						->delete($this->table);
	}

	public function delete_mata_pelajaran_where_guru($id_guru)
    {
    	return $this->db->where('guru_id', $id_guru)
    					->delete($this->table);

    }

}

/* End of file Guru_mengajar_model.php */
/* Location: ./application/models/Guru_mengajar_model.php */