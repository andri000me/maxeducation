<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {
	private $table = 'siswa';

	var $column_order = array(null, 'nama_lengkap_siswa','jenis_kelamin', 'agama', 'nomor_hp_siswa', 'nama_orang_tua', 'alamat_lengkap', 'domisili', 'nama_sekolah', 'registered', null);

	var $column_search = array('nama_lengkap_siswa','jenis_kelamin', 'agama', 'nomor_hp_siswa', 'nomor_hp_ayah', 'nomor_hp_ibu', 'nama_orang_tua', 'nomor_hp_saudara_serumah', 'nomor_telepon_rumah', 'alamat_lengkap', 'domisili', 'tingkat_sekolah', 'program', 'kelas', 'nama_sekolah', 'tahu_dari', 'registered');

	var $column_search_belajar_gratis = array('id_siswa_belajar_gratis', 'nama', 'gelombang', 'nama_ig', 'registered');
	var $column_order_belajar_gratis = array(null, 'nama', 'gelombang', 'nama_ig', 'registered');

	var $order = array('registered' => 'desc');

	public function __construct(){
		parent::__construct();
		
	}

	public function get_siswas()
	{
		return $this->db->from($this->table)
					->join('jenis_kelamin',
							'jenis_kelamin.id_jenis_kelamin = siswa.jenis_kelamin_id')
					->join('agama',
							'agama.id_agama = siswa.agama_id')
					->join('domisili',
							'domisili.id_domisili = siswa.domisili_id')
					->join('tingkat_sekolah',
							'tingkat_sekolah.id_tingkat_sekolah = siswa.tingkat_sekolah_id')
					->join('program',
							'program.id_program = siswa.program_id')
					->get()->result();
	}

	public function get_siswa_where($id_siswa)
	{
		return $this->db->from($this->table)
						->join('jenis_kelamin', 
								'jenis_kelamin.id_jenis_kelamin = siswa.jenis_kelamin_id')
						->join('agama', 
								'agama.id_agama = siswa.agama_id')
						->join('domisili', 
								'domisili.id_domisili = siswa.domisili_id')
						->join('tingkat_sekolah', 
								'tingkat_sekolah.id_tingkat_sekolah = siswa.tingkat_sekolah_id')
						->join('program', 
								'program.id_program = siswa.program_id')
						->where('siswa.id_siswa', $id_siswa)
						->get()->row();
	}

	/**
	 * REGISTER SISWA
	 */
	public function register_siswa($data)
	{   
		// return $this->db->insert($this->table, $data);
		$this->db->insert($this->table, $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}

	public function register_siswa_belajar_gratis($data)
	{   
		return $this->db->insert('siswa_belajar_gratis', $data);
	}

	public function count_all(){
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	


    /**
     * GET SISWA BY SD
     */
    private function _get_datatables_query_sd(){

    	$this->db->select('*');
    	$this->db->from($this->table);
    	$this->db->join('jenis_kelamin',
    					'jenis_kelamin.id_jenis_kelamin = siswa.jenis_kelamin_id');
    	$this->db->join('agama',
    					'agama.id_agama = siswa.agama_id');
    	$this->db->join('domisili',
    					'domisili.id_domisili = siswa.domisili_id');
    	$this->db->join('tingkat_sekolah',
    					'tingkat_sekolah.id_tingkat_sekolah = siswa.tingkat_sekolah_id');
    	$this->db->join('program',
    					'program.id_program = siswa.program_id');
    	$this->db->where('siswa.program_id', 1);

    	$i = 0;

		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
				}
				$i++;
			}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables_sd(){
		$this->_get_datatables_query_sd();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered_sd(){
		$this->_get_datatables_query_sd();
		$query = $this->db->get();
		return $query->num_rows();
	}


	/**
     * GET SISWA BY SMP
     */
	private function _get_datatables_query_smp(){
		
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('jenis_kelamin',
						'jenis_kelamin.id_jenis_kelamin = siswa.jenis_kelamin_id');
		$this->db->join('agama',
						'agama.id_agama = siswa.agama_id');
		$this->db->join('domisili',
						'domisili.id_domisili = siswa.domisili_id');
		$this->db->join('tingkat_sekolah',
						'tingkat_sekolah.id_tingkat_sekolah = siswa.tingkat_sekolah_id');
		$this->db->join('program',
						'program.id_program = siswa.program_id');
		$this->db->where('siswa.program_id', 2);

		$i = 0;

		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
				}
				$i++;
			}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables_smp(){
		$this->_get_datatables_query_smp();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered_smp(){
		$this->_get_datatables_query_smp();
		$query = $this->db->get();
		return $query->num_rows();
	}

	/**
     * GET SISWA BY SMA
     */
	private function _get_datatables_query_sma(){

		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('jenis_kelamin',
						'jenis_kelamin.id_jenis_kelamin = siswa.jenis_kelamin_id');
		$this->db->join('agama',
						'agama.id_agama = siswa.agama_id');
		$this->db->join('domisili',
						'domisili.id_domisili = siswa.domisili_id');
		$this->db->join('tingkat_sekolah',
						'tingkat_sekolah.id_tingkat_sekolah = siswa.tingkat_sekolah_id');
		$this->db->join('program',
						'program.id_program = siswa.program_id');		
		$this->db->where('siswa.program_id', 3);

		$i = 0;

		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
				}
				$i++;
			}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables_sma(){
		$this->_get_datatables_query_sma();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered_sma(){
		$this->_get_datatables_query_sma();
		$query = $this->db->get();
		return $query->num_rows();
	}

	/**
     * GET SISWA By SBMPTN
     */
	private function _get_datatables_query_sbmptn(){

		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('jenis_kelamin',
						'jenis_kelamin.id_jenis_kelamin = siswa.jenis_kelamin_id');
		$this->db->join('agama',
						'agama.id_agama = siswa.agama_id');
		$this->db->join('domisili',
						'domisili.id_domisili = siswa.domisili_id');
		$this->db->join('tingkat_sekolah',
						'tingkat_sekolah.id_tingkat_sekolah = siswa.tingkat_sekolah_id');
		$this->db->join('program',
						'program.id_program = siswa.program_id');		
		$this->db->where('siswa.program_id', 4);

		$i = 0;

		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
				}
				$i++;
			}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables_sbmptn(){
		$this->_get_datatables_query_sbmptn();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered_sbmptn(){
		$this->_get_datatables_query_sbmptn();
		$query = $this->db->get();
		return $query->num_rows();
	}

	/**
     * GET SISWA BY INGGRIS
     */
	private function _get_datatables_query_inggris(){

		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('jenis_kelamin',
						'jenis_kelamin.id_jenis_kelamin = siswa.jenis_kelamin_id');
		$this->db->join('agama',
						'agama.id_agama = siswa.agama_id');
		$this->db->join('domisili',
						'domisili.id_domisili = siswa.domisili_id');
		$this->db->join('tingkat_sekolah',
						'tingkat_sekolah.id_tingkat_sekolah = siswa.tingkat_sekolah_id');
		$this->db->join('program',
						'program.id_program = siswa.program_id');
		$this->db->where('siswa.program_id', 5);

		$i = 0;

		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
				}
				$i++;
			}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables_inggris(){
		$this->_get_datatables_query_inggris();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered_inggris(){
		$this->_get_datatables_query_inggris();
		$query = $this->db->get();
		return $query->num_rows();
	}

	/**
     * GET SISWA BY MUSIC
     */
	private function _get_datatables_query_music(){

		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('jenis_kelamin',
						'jenis_kelamin.id_jenis_kelamin = siswa.jenis_kelamin_id');
		$this->db->join('agama',
						'agama.id_agama = siswa.agama_id');
		$this->db->join('domisili',
						'domisili.id_domisili = siswa.domisili_id');
		$this->db->join('tingkat_sekolah',
			'tingkat_sekolah.id_tingkat_sekolah = siswa.tingkat_sekolah_id');
		$this->db->join('program',
						'program.id_program = siswa.program_id');
		$this->db->where('siswa.program_id', 6);

		$i = 0;

		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
				}
				$i++;
			}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables_music(){
		$this->_get_datatables_query_music();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered_music(){
		$this->_get_datatables_query_music();
		$query = $this->db->get();
		return $query->num_rows();
	}

	/**
	 * Get Siswa by Belajar Gratis
	 */
	private function _get_datatables_query_belajar_gratis(){

		$this->db->select('*');
		$this->db->from('siswa_belajar_gratis');

		$i = 0;

		foreach ($this->column_search_belajar_gratis as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search_belajar_gratis) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
				}
				$i++;
			}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order_belajar_gratis[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatables_belajar_gratis(){
		$this->_get_datatables_query_belajar_gratis();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered_belajar_gratis(){
		$this->_get_datatables_query_belajar_gratis();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_belajar_gratis(){
		$this->db->from('siswa_belajar_gratis');
		return $this->db->count_all_results();
	}



	/**
	 * [get_mata_pelajaran_siswa_detail_where description]
	 * @param  [type] $id_siswa [description]
	 * @return [type]           [description]
	 */
	public function get_mata_pelajaran_siswa_detail_where($id_siswa)
	{
		return $this->db->from('siswa_detail_mata_pelajaran')
						->join('siswa',
								'siswa.id_siswa = siswa_detail_mata_pelajaran.siswa_id')
						->join('mata_pelajaran',
								'mata_pelajaran.id_mata_pelajaran = siswa_detail_mata_pelajaran.mata_pelajaran_id')
						->where('siswa_detail_mata_pelajaran.siswa_id', $id_siswa)
						->get()->result();
	}

	public function get_hari_siswa_detail_where($id_siswa)
	{
		return $this->db->from('siswa_detail_hari')
						->join('siswa',
								'siswa.id_siswa = siswa_detail_hari.siswa_id')
						->join('hari',
								'hari.id_hari = siswa_detail_hari.hari_id')
						->where('siswa_detail_hari.siswa_id', $id_siswa)
						->get()->result();
	}

	public function get_jam_siswa_detail_where($id_siswa)
	{
		return $this->db->from('siswa_detail_jam')
						->join('siswa',
								'siswa.id_siswa = siswa_detail_jam.siswa_id')
						->join('jam',
								'jam.id_jam = siswa_detail_jam.jam_id')
						->where('siswa_detail_jam.siswa_id', $id_siswa)
						->get()->result();
	}

	public function get_users_siswa()
	{
		return $this->db->select('siswa.id_siswa, 
								  siswa.nama_lengkap_siswa, 
								  jenis_kelamin.jenis_kelamin,
								  users.username,
								  program.program,
								  role.id_role,
								  role.role,
								  users.password,
								  users.id_user

								  ')
						->from($this->table)
						->join('jenis_kelamin', 
								'jenis_kelamin.id_jenis_kelamin = siswa.jenis_kelamin_id')
						->join('agama', 
								'agama.id_agama = siswa.agama_id')
						->join('program', 
								'program.id_program = siswa.program_id')
						->join('users', 
								'users.siswa_id = siswa.id_siswa', 'left')
						->join('role',
								'role.id_role = users.role_id', 'left')
                    	->get()->result();
	}


	public function update_siswa_informasi($id_siswa, $data)
    {
        return $this->db->where('id_siswa', $id_siswa)
                        ->update($this->table, $data);
    }



}

/* End of file Siswa_model.php */
/* Location: ./application/models/Siswa_model.php */