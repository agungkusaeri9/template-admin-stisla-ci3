<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth');
		$this->load->model('M_user', 'user');
		auth();
		isAdmin();
	}

	public function index()
	{
		$data['content'] = 'pages/user/index';
		$data['items'] = $this->user->get();
		$data['title'] = 'Data User';
		$this->load->view('layouts/master', $data);
	}

	public function tambah()
	{
		$data['title'] = 'Tambah User';
		$data['content'] = 'pages/user/tambah';
		$data['items'] = $this->user->get();
		$this->load->view('layouts/master', $data);
	}

	public function store()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password]');
		if ($this->form_validation->run() == FALSE) {
			$data['content'] = 'pages/user/tambah';
			$data['items'] = $this->user->get();
			$this->load->view('layouts/master', $data);
		} else {
			$data = $this->input->post();
			if ($_FILES['gambar']['name']) {
				$config['upload_path']   = './uploads/user/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 2024;
				$this->load->library('upload', $config);
				//upload file to directory
				if ($this->upload->do_upload('gambar')) {
					$uploadData = $this->upload->data();
					$uploadedFile = $uploadData['file_name'];
					$data['gambar'] = $uploadData['file_name'];
				} else {
					$data['error'] = $this->upload->display_errors();
					$data['content'] = 'pages/profile';
					$this->load->view('layouts/master', $data);
				}
			} else {
				$data['gambar'] = NULL;
			}


			$this->user->create($data);
			$this->session->set_flashdata('success', 'Data User berhasil ditambahkan!');
			redirect('user');
		}
	}

	public function edit($id_user = NULL)
	{
		if (!$id_user) {
			redirect('user');
		}
		$user = $this->user->find($id_user);
		if (!$user) {
			redirect('user');
		}
		$data['title'] = 'Edit User';
		$data['content'] = 'pages/user/edit';
		$data['item'] = $user;
		$this->load->view('layouts/master', $data);
	}

	public function update($id_user = NULL)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		if ($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|matches[password]');
		}
		if ($this->form_validation->run() == FALSE) {
			if (!$id_user) {
				redirect('user');
			}
			$user = $this->user->find($id_user);
			if (!$user) {
				redirect('user');
			}
			$data['content'] = 'pages/user/edit';
			$data['item'] = $user;
			$this->load->view('layouts/master', $data);
		} else {
			// validasi email unique
			$cekUser = $this->user->checkUser($id_user, array('email' => $this->input->post('email')));
			if ($cekUser) {
				$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
			}
			$post = [
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'level' => $this->input->post('level')
			];
			if ($_FILES['gambar']) {
				$config['upload_path']   = './uploads/user/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 2024;
				$this->load->library('upload', $config);
				//upload file to directory
				if ($this->upload->do_upload('gambar')) {
					$uploadData = $this->upload->data();
					$uploadedFile = $uploadData['file_name'];
					$post['gambar'] = $uploadData['file_name'];
				} else {
					$data['error'] = $this->upload->display_errors();
					$data['content'] = 'pages/user/index';
					$this->load->view('layouts/master', $data);
				}
			}

			if ($this->input->post('password')) {
				$post['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			}
			$this->user->update($id_user, $post);
			$this->session->set_flashdata('success', 'Data User berhasil disimpan!');
			redirect('user');
		}
	}

	public function delete($id_user = NULL)
	{
		$this->user->delete($id_user);
		$this->session->set_flashdata('success', 'Data User berhasil dihapus!');
		redirect('user');
	}
}
