<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {

	private $table = 'guru';

	public function count_all_guru()
	{
		return $this->db->from($this->table)
                    ->get()->num_rows();
	}

	public function insert_guru($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function get_gurus()
	{
		return $this->db->from($this->table)
						->join('jenis_kelamin', 
								'jenis_kelamin.id_jenis_kelamin = guru.jenis_kelamin_id')
						->join('agama', 
								'agama.id_agama = guru.agama_id')
                    	->get()->result();
	}

	public function get_guru_by_program($id_program)
	{
		return $this->db->from('guru_mengajar')
						->where('program_id', $id_program)
						->get()->result();
	}

	public function delete_guru($id_guru)
	{
		$this->db->where('id_guru', $id_guru)->delete($this->table);
	}

	public function update_guru($id_guru, $data)
	{
		return $this->db->where('id_guru', $id_guru)
						->update($this->table, $data);
	}

	public function get_guru_where($id_guru)
	{
		return $this->db->from($this->table)
						->join('jenis_kelamin', 'jenis_kelamin.id_jenis_kelamin = guru.jenis_kelamin_id')
						->join('agama', 'agama.id_agama = guru.agama_id')
						->where('guru.id_guru', $id_guru)
						->get()->row();
	}

	public function get_users_guru()
	{
		return $this->db->select('guru.id_guru, guru.nama_lengkap_guru, jenis_kelamin.jenis_kelamin, 
								  users.username, users.id_user, users.password,
								  role.role, role.id_role')
						->from($this->table)
						->join('jenis_kelamin', 
								'jenis_kelamin.id_jenis_kelamin = guru.jenis_kelamin_id')
						->join('agama', 
								'agama.id_agama = guru.agama_id')
						->join('users', 
								'users.guru_id = guru.id_guru', 'left')
						->join('role',
								'role.id_role = users.role_id', 'left')
                    	->get()->result();
	}

	public function update_guru_informasi($id_guru, $data)
    {
        return $this->db->where('id_guru', $id_guru)
                        ->update($this->table, $data);
    }



}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */