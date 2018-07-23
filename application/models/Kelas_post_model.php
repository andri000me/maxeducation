<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_post_model extends CI_Model {

	private $table = 'kelas_posts';

	public function insert_kelas_post($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function get_kelas_posts($id_guru)
	{
		return $this->db->select('kelas_posts.id_kelas_posts, kelas_posts.catatan, kelas_posts.kelas_id,
								kelas_posts.document, kelas_posts.user_id,
								kelas_posts.created_at, kelas.slug, kelas.nama_kelas,
								users.username, users.role_id'

						)
						->from($this->table)
						->join('kelas',
								'kelas.id_kelas = kelas_posts.kelas_id')
						->join('guru_mengajar',
								'guru_mengajar.mata_pelajaran_id = kelas.mata_pelajaran_id')
						->join('users',
								'users.id_user = kelas_posts.user_id')
						->order_by('kelas_posts.created_at', 'desc')
						->where('guru_mengajar.guru_id', $id_guru)
						->get()->result();
	}

	public function get_kelas_posts_siswa($id_siswa)
	{
		return $this->db
						// ->select('kelas_posts.id_kelas_posts, kelas_posts.catatan, kelas_posts.kelas_id,
						// 		kelas_posts.document,
						// 		kelas_posts.created_at, kelas.id_kelas, kelas.slug, kelas.nama_kelas, users.id_user,
						// 		users.username, users.id_role'

						// )
						->select('kelas_posts.id_kelas_posts, kelas_posts.catatan, kelas_posts.kelas_id,
								kelas_posts.user_id, kelas_posts.document, kelas_posts.created_at,
								kelas.id_kelas, kelas.nama_kelas, kelas.slug,
							
								users.username, users.role_id')
						->from($this->table)
						->join('kelas',
								'kelas.id_kelas = kelas_posts.kelas_id')
						->join('siswa_detail_mata_pelajaran',
								'siswa_detail_mata_pelajaran.mata_pelajaran_id = kelas.mata_pelajaran_id')

						->join('users',
								'users.id_user = kelas_posts.user_id')
						->order_by('kelas_posts.created_at', 'desc')

						->where('siswa_detail_mata_pelajaran.siswa_id', $id_siswa)

						->get()->result();
	}

	public function get_post_by_id($id_kelas_posts)
	{
		return $this->db->select('kelas_posts.*, kelas.id_kelas, kelas.nama_kelas, kelas.slug,
		 						  users.role_id, users.id_user, users.username')
						->from($this->table)
						->join('kelas',
								'kelas.id_kelas = kelas_posts.kelas_id')
						->join('users',
								'users.id_user = kelas_posts.user_id')

						->where('kelas_posts.id_kelas_posts', $id_kelas_posts)
						->get()->row();
	}

	public function get_kelas_posts_where($slug)
	{
		return $this->db->select('kelas_posts.id_kelas_posts, kelas_posts.catatan, kelas_posts.kelas_id,
								kelas_posts.user_id, kelas_posts.document,
								kelas_posts.created_at, kelas.id_kelas, kelas.slug, kelas.nama_kelas, users.id_user,
								users.username, users.role_id'
								// ,guru.id_guru,
								// guru.nama_lengkap, guru.avatar, siswa.id_siswa, siswa.nama_lengkap, siswa.avatar'

						)
						->from($this->table)
						->join('kelas',
								'kelas.id_kelas = kelas_posts.kelas_id')
						->join('users', 
								'users.id_user = kelas_posts.user_id')
						->where('slug', $slug)
						->order_by('kelas_posts.created_at', 'desc')

						->get()->result();

		// return $this->db->select()
		// 				->from($this->table)
		// 				->join('kelas',
		// 						'kelas.id_kelas = kelas_posts.kelas_id')
		// 				->join('users', 
		// 						'users.id_user = kelas_posts.user_id')
		// 				->where('slug', $slug)
		// 				->order_by('kelas_posts.created_at', 'desc')

		// 				->get()->result();

	}

	public function get_comment($post_id)
	{
		return $this->db->select('kelas_comments.*, 
								  users.id_user, users.username, users.role_id, users.guru_id, users.siswa_id')

						->from('kelas_comments')
						// ->join('kelas',
						// 		'kelas.id_kelas = kelas_posts.kelas_id')
						->join('users',
								'users.id_user = kelas_comments.user_id')
						->where('kelas_comments.kelas_posts_id', $post_id)
						->get()->result();
	}

	public function get_comment_posts()
	{
		return $this->db->from('kelas_comments')
						->get()->result();
	}

	public function get_comment_by_id($id_kelas_comments)
	{
		return $this->db->from('kelas_comments')
						->where('id_kelas_comments', $id_kelas_comments)
						->get()->row();
	}

	public function insert_comment_by_post($data)
	{
		return $this->db->insert('kelas_comments', $data);
	}

	public function delete_post($id_post)
	{
		return $this->db->where('id_kelas_posts', $id_post)->delete($this->table);
	}

	public function delete_comment_post($id_kelas_comments)
	{
		return $this->db->where('id_kelas_comments', $id_kelas_comments)->delete('kelas_comments');
	}

	public function delete_comment_by_post($kelas_posts_id)
	{
		return $this->db->where('kelas_posts_id', $kelas_posts_id)->delete('kelas_comments');
	}

	public function update_post($id_kelas_posts, $data)
	{
		return $this->db->where('id_kelas_posts', $id_kelas_posts)
						->update($this->table, $data);
	}

}

/* End of file Kelas_post_model.php */
/* Location: ./application/models/Kelas_post_model.php */