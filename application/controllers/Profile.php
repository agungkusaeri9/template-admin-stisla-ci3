<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user', 'user');
	}

	public function index()
	{
		$user = $this->user->find($this->session->userdata('id_user'));
		$data['content'] = 'pages/profile';
		$data['item'] = $user;
		$data['title'] = 'Profile';
		$this->load->view('layouts/master', $data);
	}

	public function update()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['content'] = 'pages/profile';
			$this->load->view('layouts/master', $data);
		} else {
			$data = [];
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
			}

			$data['nama'] = $this->input->post('nama');
			$data['nomor_telepon'] = $this->input->post('nomor_telepon');
			$this->user->update($this->session->userdata('id_user'), $data);

			$user = $this->user->find($this->session->userdata('id_user'));
			$this->session->set_userdata('gambar', $user->gambar);
			$this->session->set_flashdata('success', 'Profile berhasil disimpan!');
			redirect('profile');
		}
	}
}
