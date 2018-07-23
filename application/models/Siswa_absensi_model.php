<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_absensi_model extends CI_Model {
	private $table = 'siswa_absensi';

	public function insert_siswa_absensi($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function get_absensi_siswa_by($id_siswa)
	{
		return $this->db->from($this->table)
						->join('guru', 'guru.id_guru = siswa_absensi.guru_id')
						// ->join('siswa', 'siswa.id_siswa = siswa_absensi.siswa_id')
						->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran = siswa_absensi.mata_pelajaran_id')
						->join('hari', 'hari.id_hari = siswa_absensi.hari_id')
						->join('jam', 'jam.id_jam = siswa_absensi.jam_id')
						->join('agama', 'agama.id_agama = guru.agama_id')
						->where('siswa_absensi.siswa_id', $id_siswa)
						->get()->result();
	}

}

/* End of file Siswa_absensi_model.php */
/* Location: ./application/models/Siswa_absensi_model.php */