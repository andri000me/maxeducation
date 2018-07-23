<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->login_checker->check_login();

		$this->load->view('login_view');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data_user = $this->User_model->is_valid_user($username);

		if($data_user){
			if (password_verify($password, $data_user->password)) {

				$data_admin = $this->User_model->data_user_admin($data_user->id_user);
				$data_guru = $this->User_model->data_user_guru($data_user->id_user);
				$data_siswa = $this->User_model->data_user_siswa($data_user->id_user);

					/**
					 * [$data_user->id_role Checking the User's Role ]
					 * @var [type]
					 */
					if ($data_user->role_id == 1) {
						$this->session->set_userdata([
							'login' => TRUE,
							'admin_login' => TRUE,
							'admin_id' => $data_admin->id_admin,
							'user_id' => $data_user->id_user,
							'admin_role' => $data_user->id_role,
							'panel_role' => TRUE,
						]);

						redirect('admin');
					}

					/**
					 * [$data_user->id_role Checking Guru Role ]
					 * @var [type]
					 */
					else if ($data_user->role_id == 2) {
						$this->session->set_userdata([
							'login' => TRUE,
							'guru_login' => TRUE,
							'guru_id' => $data_guru->id_guru,
							'user_id' => $data_user->id_user,
							'guru_role' => $data_user->id_role,
						]);

						redirect('guru');
					}

					else if ($data_user->role_id == 3) {
						$this->session->set_userdata([
							'login' => TRUE,
							'siswa_login' => TRUE,
							'siswa_id' => $data_siswa->id_siswa,
							'user_id' => $data_user->id_user,
							'siswa_role' => $data_user->id_role,
						]);

						redirect('siswa');
					}
				} else {
					$this->session->set_flashdata('message_login', 'Password Anda Tidak Cocok, Silahkan Cek Kembali');
					redirect('login');
				}
			}else{
				$this->session->set_flashdata('message_login', 'Username Anda Tidak Cocok, Silahkan Cek Kembali');
				redirect('login');
			}
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('login');
		}

	}

	/* End of file User.php */
/* Location: ./application/controllers/User.php */