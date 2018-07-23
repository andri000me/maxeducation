<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_checker {
	protected $ci;
	public function __construct()
	{
		$this->ci = &get_instance();
	}

	public function check_login_admin(){
		if (!$this->ci->session->userdata('login')) {
			$this->ci->session->set_flashdata('message_login', 'Silahkan Login Terlebih Dahulu');

			redirect('login');
		}

		if (!$this->ci->session->userdata('admin_login')) {
			$this->ci->session->set_flashdata('message_login', 'Anda Bukan Admin MAX Education!!');

			redirect('login');
		}
	}

	public function check_login_siswa()
	{
		if (!$this->ci->session->userdata('login')) {
			$this->ci->session->set_flashdata('message_login', 'Silahkan Login Terlebih Dahulu');

			redirect('login');
		}

		if (!$this->ci->session->userdata('siswa_login')) {
			$this->ci->session->set_flashdata('message_login', 'Anda Bukan Siswa MAX Education!!');

			redirect('login');
		}
	}

	public function check_login_guru()
	{
		if (!$this->ci->session->userdata('login')) {
			$this->ci->session->set_flashdata('message_login', 'Silahkan Login Terlebih Dahulu');

			redirect('login');
		}

		if (!$this->ci->session->userdata('guru_login')) {
			$this->ci->session->set_flashdata('message_login', 'Anda Bukan Guru MAX Education!!');

			redirect('login');
		}
	}

	public function check_login()
	{
		if ($this->ci->session->has_userdata('admin_login')) {
			redirect('admin/dashboard');
		}

		if ($this->ci->session->has_userdata('guru_login')) {
			redirect('guru');
		}

		if ($this->ci->session->has_userdata('siswa_login')) {
			redirect('siswa');
		}
	}
}

/* End of file Login_checker.php */
/* Location: ./application/libraries/Login_checker.php */
