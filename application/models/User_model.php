<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	private $table = 'users';
	
	public function register_user($data)
    {   
        return $this->db->insert($this->table, $data);
    }

    public function get_user()
    {
        return $this->db->from($this->table)
                        ->get()->row();
    }

    public function get_users_guru()
    {
        return $this->db->from($this->table)
                        ->where('id_role', 2)
                        ->get()->result();
    }

    public function get_user_by_id($id_user)
    {
        return $this->db->from($this->table)
                        ->join('role', 'role.id_role = users.role_id')
                        ->where('users.id_user', $id_user)
                        ->get()->row();

    }

    public function update_user_password($id_user, $data_edit)
    {
        return $this->db->where('id_user', $id_user)
                        ->update($this->table,$data_edit);
    }

    public function is_valid_user($username){
        return $this->db->from($this->table)
                        ->where('username', $username)
                        ->get()->row();
    }

    public function check_username($username)
    {
        return $this->db->from($this->table)
                        ->where('username', $username)
                        ->get()->row();
    }

    public function check_email($email)
    {
        return $this->db->from($this->table)
                        ->where('email', $email)
                        ->get()->row();
    }

    public function check_password($password)
    {
        return $this->db->from($this->table)
                        ->where('password', $password)
                        ->get()->row();

    }

    public function data_user_admin($id_user)
    {
        return $this->db->from($this->table)
                        ->join('admin', 'admin.id_admin = users.admin_id')
                        ->where('id_user', $id_user)
                        ->get()->row();
    }

    public function data_user_guru($id_user)
    {
        return $this->db->from($this->table)
                        ->join('guru', 'guru.id_guru = users.guru_id')
                        ->where('id_user', $id_user)
                        ->get()->row();
    }

    public function data_user_siswa($id_user)
    {
        return $this->db->from($this->table)
                        ->join('siswa', 'siswa.id_siswa = users.siswa_id')
                        ->where('id_user', $id_user)
                        ->get()->row();
    }

    public function insert_user_siswa($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function insert_user_guru($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function delete_user($id_user)
    {
        return $this->db->where('id_user', $id_user)
                        ->delete($this->table);
    }

    public function update_admin_password($id_user, $data)
    {
        return $this->db->where('id_user', $id_user)
                        ->update($this->table ,$data);
    }

    

}

/* End of file User_siswa_model.php */
/* Location: ./application/models/User_siswa_model.php */