<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		$data['content'] = 'pages/dashboard';
		$data['count'] = [
			'user' => $this->user->countUser()
		];
		$data['title'] = 'Dashboard';
		$this->load->view('layouts/master', $data);
	}
}
