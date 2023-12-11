<?php


function gambar_profile()
{
	$ci = get_instance();
	$gambar = $ci->session->userdata('gambar');

	if ($gambar) {
		return base_url('uploads/user/') . $gambar;
	} else {
		return base_url('assets/img/avatar/avatar-1.png');
	}
}

function format_rupiah($nilai)
{
	if ($nilai > 0) {
		return "Rp " . number_format($nilai, 0, ',', '.');
	} else {
		return "Rp. 0";
	}
}

function format_tanggal($date)
{
	// Ubah tanggal ke format 'd-m-y'
	return date('d-m-Y', strtotime($date));
}

function isAdmin()
{
	$ci = get_instance();
	if ($ci->session->userdata('level') === 'kepala sekolah') {
		redirect('Dashboard');
	}
}
