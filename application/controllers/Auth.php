<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth', 'auth');
	}

	public function index()
	{
		$this->load->view('auth/login');
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {

			$this->load->view('auth/login');
		} else {
			$this->_login();
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required');
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required');
		if ($this->form_validation->run() == FALSE) {

			$this->load->view('auth/register');
		} else {
			$this->_register();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// cek email
		$checkLogin = $this->auth->checkLogin($email, $password);
		if ($checkLogin == FALSE) {
			$this->session->set_flashdata('error', 'Email atau password salah!');
			return redirect('auth');
		}

		return redirect('dashboard');
	}

	private function _register()
	{
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$nomor_telepon = $this->input->post('nomor_telepon');
		$konfirmasi_password = $this->input->post('konfirmasi_password');


		// cek email apakah sudah ada
		$cekEmail = $this->auth->findEmail($email);
		if ($cekEmail == true) {
			$this->session->set_flashdata('error', 'Email sudah ada di database!');
			return redirect('Auth/register');
		}

		// cek password dan konfirmasi password 
		if ($password !== $konfirmasi_password) {
			$this->session->set_flashdata('error', 'Password dan konfirmasi password tidak sesuai!');
			return redirect('Auth/register');
		}

		$data = [
			'nama' => $nama,
			'email' => $email,
			'nomor_telepon' => $nomor_telepon,
			'password' => password_hash($password, PASSWORD_BCRYPT),
			'level' => 'customer'
		];
		$this->auth->create($data);
		$this->session->set_flashdata('success', 'Anda berhasil register. Silahkan login!');
		return redirect('Auth/login');
	}

	public function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('success', 'Anda berhasil logout!');
		return redirect('/');
	}
}
