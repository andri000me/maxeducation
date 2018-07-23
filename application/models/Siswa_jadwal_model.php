<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_jadwal_model extends CI_Model {
	private $table = 'siswa_jadwal';

	public function get_siswa_jadwals()
	{
		return $this->db->from($this->table)
						->get()->result();
	}

	public function get_siswa_jadwal_where($id_siswa)
	{
		return $this->db->from($this->table)
						// ->join('siswa', 
						// 		'siswa.id_siswa = siswa_jadwal.siswa_id')
						->join('guru', 
								'guru.id_guru = siswa_jadwal.guru_id')
						->join('hari', 
								'hari.id_hari = siswa_jadwal.hari_id')
						->join('jam', 
								'jam.id_jam = siswa_jadwal.jam_id')
						->join('program', 
								'program.id_program = siswa_jadwal.program_id')
						->join('mata_pelajaran', 
								'mata_pelajaran.id_mata_pelajaran = siswa_jadwal.mata_pelajaran_id')
						->where('siswa_jadwal.siswa_id', $id_siswa)
						->get()->result();
	}

	public function get_siswa_jadwal_by_guru($id_guru)
	{
		return $this->db->from($this->table)
						->join('siswa', 
								'siswa.id_siswa = siswa_jadwal.siswa_id')
						->join('guru', 
								'guru.id_guru = siswa_jadwal.guru_id')
						->join('hari', 
								'hari.id_hari = siswa_jadwal.hari_id')
						->join('jam', 
								'jam.id_jam = siswa_jadwal.jam_id')
						->join('program', 
								'program.id_program = siswa_jadwal.program_id')
						->join('mata_pelajaran', 
								'mata_pelajaran.id_mata_pelajaran = siswa_jadwal.mata_pelajaran_id')
						->where('siswa_jadwal.guru_id', $id_guru)
						->get()->result();
	}

	public function get_siswa_jadwal_by_id($id_siswa_jadwal)
	{
		return $this->db->from($this->table)
						->join('guru', 
								'guru.id_guru = siswa_jadwal.guru_id')
						->join('hari', 
								'hari.id_hari = siswa_jadwal.hari_id')
						->join('jam', 
								'jam.id_jam = siswa_jadwal.jam_id')
						->join('program', 
								'program.id_program = siswa_jadwal.program_id')
						->join('mata_pelajaran', 
								'mata_pelajaran.id_mata_pelajaran = siswa_jadwal.mata_pelajaran_id')
						->where('id_siswa_jadwal', $id_siswa_jadwal)
						->get()->row();
	}

	public function get_jadwal_siswa_hari_senin()
	{
		return $this->db->from($this->table)
						->join('siswa', 
								'siswa.id_siswa = siswa_jadwal.siswa_id')
						->join('guru', 
								'guru.id_guru = siswa_jadwal.guru_id')
						->join('hari', 
								'hari.id_hari = siswa_jadwal.hari_id')
						->join('jam', 
								'jam.id_jam = siswa_jadwal.jam_id')
						->join('program', 
								'program.id_program = siswa_jadwal.program_id')
						->join('mata_pelajaran', 
								'mata_pelajaran.id_mata_pelajaran = siswa_jadwal.mata_pelajaran_id')

						->where('hari.id_hari', 1)
						->get()->result();
	}

	public function get_jadwal_siswa_hari_selasa()
	{
		return $this->db->from($this->table)
						->join('siswa', 
								'siswa.id_siswa = siswa_jadwal.siswa_id')
						->join('guru', 
								'guru.id_guru = siswa_jadwal.guru_id')
						->join('hari', 
								'hari.id_hari = siswa_jadwal.hari_id')
						->join('jam', 
								'jam.id_jam = siswa_jadwal.jam_id')
						->join('program', 
								'program.id_program = siswa_jadwal.program_id')
						->join('mata_pelajaran', 
								'mata_pelajaran.id_mata_pelajaran = siswa_jadwal.mata_pelajaran_id')

						->where('hari.id_hari', 2)
						->get()->result();
	}

	public function get_jadwal_siswa_hari_rabu()
	{
		return $this->db->from($this->table)
						->join('siswa', 
								'siswa.id_siswa = siswa_jadwal.siswa_id')
						->join('guru', 
								'guru.id_guru = siswa_jadwal.guru_id')
						->join('hari', 
								'hari.id_hari = siswa_jadwal.hari_id')
						->join('jam', 
								'jam.id_jam = siswa_jadwal.jam_id')
						->join('program', 
								'program.id_program = siswa_jadwal.program_id')
						->join('mata_pelajaran', 
								'mata_pelajaran.id_mata_pelajaran = siswa_jadwal.mata_pelajaran_id')

						->where('hari.id_hari', 3)
						->get()->result();
	}

	public function get_jadwal_siswa_hari_kamis()
	{
		return $this->db->from($this->table)
						->join('siswa', 
								'siswa.id_siswa = siswa_jadwal.siswa_id')
						->join('guru', 
								'guru.id_guru = siswa_jadwal.guru_id')
						->join('hari', 
								'hari.id_hari = siswa_jadwal.hari_id')
						->join('jam', 
								'jam.id_jam = siswa_jadwal.jam_id')
						->join('program', 
								'program.id_program = siswa_jadwal.program_id')
						->join('mata_pelajaran', 
								'mata_pelajaran.id_mata_pelajaran = siswa_jadwal.mata_pelajaran_id')

						->where('hari.id_hari', 4)
						->get()->result();
	}

	public function get_jadwal_siswa_hari_jumat()
	{
		return $this->db->from($this->table)
						->join('siswa', 
								'siswa.id_siswa = siswa_jadwal.siswa_id')
						->join('guru', 
								'guru.id_guru = siswa_jadwal.guru_id')
						->join('hari', 
								'hari.id_hari = siswa_jadwal.hari_id')
						->join('jam', 
								'jam.id_jam = siswa_jadwal.jam_id')
						->join('program', 
								'program.id_program = siswa_jadwal.program_id')
						->join('mata_pelajaran', 
								'mata_pelajaran.id_mata_pelajaran = siswa_jadwal.mata_pelajaran_id')

						->where('hari.id_hari', 5)
						->get()->result();
	}

	public function get_jadwal_siswa_hari_sabtu()
	{
		return $this->db->from($this->table)
						->join('siswa', 
								'siswa.id_siswa = siswa_jadwal.siswa_id')
						->join('guru', 
								'guru.id_guru = siswa_jadwal.guru_id')
						->join('hari', 
								'hari.id_hari = siswa_jadwal.hari_id')
						->join('jam', 
								'jam.id_jam = siswa_jadwal.jam_id')
						->join('program', 
								'program.id_program = siswa_jadwal.program_id')
						->join('mata_pelajaran', 
								'mata_pelajaran.id_mata_pelajaran = siswa_jadwal.mata_pelajaran_id')

						->where('hari.id_hari', 6)
						->get()->result();
	}

	public function get_jadwal_siswa_hari_minggu()
	{
		return $this->db->from($this->table)
						->join('siswa', 
								'siswa.id_siswa = siswa_jadwal.siswa_id')
						->join('guru', 
								'guru.id_guru = siswa_jadwal.guru_id')
						->join('hari', 
								'hari.id_hari = siswa_jadwal.hari_id')
						->join('jam', 
								'jam.id_jam = siswa_jadwal.jam_id')
						->join('program', 
								'program.id_program = siswa_jadwal.program_id')
						->join('mata_pelajaran', 
								'mata_pelajaran.id_mata_pelajaran = siswa_jadwal.mata_pelajaran_id')

						->where('hari.id_hari', 7)
						->get()->result();
	}

	public function insert_jadwal($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function delete_jadwal($id_siswa_jadwal)
    {
        return $this->db->where('id_siswa_jadwal', $id_siswa_jadwal)->delete($this->table);
    }

    public function update_jadwal($id_siswa_jadwal, $data)
	{
		return $this->db->where('id_siswa_jadwal', $id_siswa_jadwal)
						->update($this->table, $data);
	}

}

/* End of file Siswa_jadwal_model.php */
/* Location: ./application/models/Siswa_jadwal_model.php */