<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{

	public function checkLogin($email, $password)
	{
		$user = $this->db->where('email', $email)->get('user')->row();
		if ($user) {
			// cek password
			if (password_verify($password, $user->password)) {
				$this->session->set_userdata(['id_user' => $user->id_user]);
				$this->session->set_userdata(['nama' => $user->nama]);
				$this->session->set_userdata(['email' => $user->email]);
				$this->session->set_userdata(['level' => $user->level]);
				$this->session->set_userdata(['nomor_telepon' => $user->nomor_telepon]);
				$this->session->set_userdata(['gambar' => $user->gambar]);
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function findEmail($email)
	{
		$this->db->where('email', $email);
		$this->db->from('user');
		$user = $this->db->get()->row();

		if ($user)
			return true;
		else
			return false;
	}

	public function create($input)
	{
		$this->db->insert('user', $input);
	}

	public function update($input)
	{
		$this->db->where('id_user', $this->session->userdata('id_user'));
		$this->db->update('user', $input);

		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('nomor_telepon');

		$this->session->set_userdata(['nama' => $input['nama']]);
		$this->session->set_userdata(['nomor_telepon' => $input['nomor_telepon']]);
	}
}
