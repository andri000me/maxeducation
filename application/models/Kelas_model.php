<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model {

	private $table = 'kelas';

	public function get_kelas()
	{
		return $this->db->from($this->table)
						->join('program',
								'program.id_program = kelas.program_id')
						->join('mata_pelajaran',
								'mata_pelajaran.id_mata_pelajaran = kelas.mata_pelajaran_id')
				 		->get()->result();
	}

	public function get_kelas_guru($id_guru)
	{
		return $this->db->from($this->table)
						->join('guru_mengajar',
								'guru_mengajar.mata_pelajaran_id = kelas.mata_pelajaran_id')
						->where('guru_id', $id_guru)
				 		->get()->result();
	}

	public function get_kelas_siswa($id_siswa)
	{
		return $this->db->from($this->table)
						// ->join('siswa_detail_mata_pelajaran',
						// 		'siswa_detail_mata_pelajaran.id_mata_pelajaran = kelas.mata_pelajaran_id')
						->join('siswa_jadwal',
								'siswa_jadwal.mata_pelajaran_id = kelas.mata_pelajaran_id')
						->where('siswa_jadwal.siswa_id', $id_siswa)
				 		->get()->result();
	}

	public function get_kelas_by_id($id_kelas)
	{
		return $this->db->from($this->table)
						->where('id_kelas', $id_kelas)
						->get()->row();
	}

	public function get_kelas_by_mata_pelajaran_id($mata_pelajaran_id)
	{
		return $this->db->from($this->table)
						->where('mata_pelajaran_id', $mata_pelajaran_id)
						->get()->row();
	}

	public function get_kelas_by_slug($slug)
	{
		return $this->db->from($this->table)
						->where('slug', $slug)
						->get()->row();
	}

	public function insert_kelas($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function delete_kelas($id_kelas)
    {
        return $this->db->where('id_kelas', $id_kelas)->delete($this->table);
    }

    public function update_kelas($id_kelas, $data)
	{
		return $this->db->where('id_kelas', $id_kelas)
						->update($this->table, $data);
	}



}

/* End of file Kelas_model.php */
/* Location: ./application/models/Kelas_model.php */