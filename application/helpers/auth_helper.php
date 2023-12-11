<?php


function auth()
{
	$ci = get_instance();
	$id_user = $ci->session->userdata('id_user');
	$nama = $ci->session->userdata('nama');
	$username = $ci->session->userdata('username');
	$gambar = $ci->session->userdata('gambar');

	if (!$id_user && !$username && !$nama) {
		$ci->session->set_flashdata('error', 'Anda harus login terlebih dahulu!');
		redirect('auth');
	}
}
