<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	private $table = 'admin';

	public function get_admin_by_id($id_admin)
    {
        return $this->db->from($this->table)
        				->join('jenis_kelamin', 
								'jenis_kelamin.id_jenis_kelamin = admin.jenis_kelamin_id')
                        ->where('id_admin', $id_admin)
                        ->get()->row();

    }

    public function update_admin_informasi($id_admin, $data)
    {
        return $this->db->where('id_admin', $id_admin)
                        ->update($this->table,$data);
    }

    public function update_admin_password($id_user, $data)
    {
        return $this->db->where('id_user', $id_user)
                        ->update($this->table,$data);
    }

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */