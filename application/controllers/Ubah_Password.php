<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ubah_Password extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth');
		$this->load->model('M_user', 'user');
		auth();
	}

	public function index()
	{
		$data['content'] = 'pages/ubah-password';
		$data['title'] = 'Ubah Password';
		$this->load->view('layouts/master', $data);
	}

	public function update()
	{
		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
		$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|min_length[5]');
		$this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'required|matches[password_baru]');

		if ($this->form_validation->run() == FALSE) {
			$data['content'] = 'pages/ubah-password';
			$this->load->view('layouts/master', $data);
		} else {
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			$konfirmasi_password_baru = $this->input->post('konfirmasi_password_baru');

			// get user
			$user = $this->user->find($this->session->userdata('id_user'));
			// cek password lama
			if (password_verify($password_lama, $user->password)) {
				$data = [
					'password' => password_hash($password_baru, PASSWORD_BCRYPT)
				];
				$this->user->update($this->session->userdata('id_user'), $data);
				$this->session->set_flashdata('success', 'Password berhasil diupdate!');
			} else {
				$this->session->set_flashdata('error', 'Passsword Lama salah!');
			}

			redirect('Ubah_Password');
		}
	}
}
