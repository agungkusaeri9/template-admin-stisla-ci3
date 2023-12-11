<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

	public function get()
	{
		return $this->db->get('user')->result();
	}

	public function create($input)
	{
		$this->db->insert('user', [
			'nama' => $input['nama'],
			'email' => $input['email'],
			'level' => $input['level'],
			'password' => password_hash($input['password'], PASSWORD_BCRYPT),
			'gambar' => $input['gambar']
		]);
	}

	public function find($id_user)
	{
		$this->db->where('id_user', $id_user);
		return $this->db->get('user')->row();
	}

	public function update($id_user, $data)
	{
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $data);
	}

	public function checkUser($id_user, $arr)
	{
		$this->db->where('id_user', $id_user);
		$this->db->where($arr);
		$user = $this->db->get('user');
		return $user->row();
	}

	public function delete($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('user');
	}

	public function countUser()
	{
		return $this->db->get('user')->num_rows();
	}
}
