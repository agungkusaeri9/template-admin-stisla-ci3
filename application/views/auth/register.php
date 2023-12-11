<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Register | Pemesanan Lapangan Badminton</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- CSS Libraries -->
	<!-- <link rel="stylesheet" href="<?= base_url() ?>/node_modules/bootstrap-social/bootstrap-social.css"> -->

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/components.css">
</head>

<body>
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="row justify-content-center">
					<div class="col-md-6">

						<div class="card card-primary">
							<div class="card-header">
								<h4>Register</h4>
							</div>
							<div class="card-body">
								<form method="POST" action="<?= base_url('Auth/register') ?>">
									<div class="form-group">
										<label for="nama">Nama</label>
										<input id="nama" type="nama" class="form-control <?php if (form_error('nama')) : ?> is-invalid <?php endif; ?>" name="nama" tabindex="1" autofocus>
										<?php if (form_error('nama')) : ?>
											<div class="invalid-feedback">
												<?= form_error('nama') ?>
											</div>
										<?php endif; ?>
									</div>
									<div class="form-group">
										<label for="nomor_telepon">Nomor Telepon</label>
										<input id="nomor_telepon" type="nomor_telepon" class="form-control <?php if (form_error('nomor_telepon')) : ?> is-invalid <?php endif; ?>" name="nomor_telepon" tabindex="1" autofocus>
										<?php if (form_error('nomor_telepon')) : ?>
											<div class="invalid-feedback">
												<?= form_error('nomor_telepon') ?>
											</div>
										<?php endif; ?>
									</div>

									<div class="form-group">
										<label for="email">Email</label>
										<input id="email" type="email" class="form-control <?php if (form_error('email')) : ?> is-invalid <?php endif; ?>" name="email" tabindex="1" autofocus>
										<?php if (form_error('email')) : ?>
											<div class="invalid-feedback">
												<?= form_error('email') ?>
											</div>
										<?php endif; ?>
									</div>

									<div class="form-group">
										<div class="d-block">
											<label for="password" class="control-label">Password</label>
										</div>
										<input id="password" type="password" class="form-control  <?php if (form_error('password')) : ?> is-invalid <?php endif; ?>" name="password" tabindex="2">
										<?php if (form_error('password')) : ?>
											<div class="invalid-feedback">
												<?= form_error('password') ?>
											</div>
										<?php endif; ?>
									</div>

									<div class="form-group">
										<div class="d-block">
											<label for="konfirmasi_password" class="control-label">konfirmasi_password</label>
										</div>
										<input id="konfirmasi_password" type="password" class="form-control  <?php if (form_error('konfirmasi_password')) : ?> is-invalid <?php endif; ?>" name="konfirmasi_password" tabindex="2">
										<?php if (form_error('konfirmasi_password')) : ?>
											<div class="invalid-feedback">
												<?= form_error('konfirmasi_password') ?>
											</div>
										<?php endif; ?>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
											Register
										</button>
									</div>
								</form>
								<p class="text-center">
								<p>
									Sudah punya akun? <a href="<?= base_url('Auth/login') ?>">Login</a>
								</p>
								<a href="<?= base_url('Home') ?>">Kembali Ke Home</a>
								</p>

							</div>
						</div>
						<div class="simple-footer">
							Copyright &copy; 2023 By Muhammad Dipa</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- General JS Scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/stisla.js"></script>

	<!-- JS Libraies -->

	<!-- Template JS File -->
	<script src="<?= base_url() ?>/assets/js/scripts.js"></script>
	<script src="<?= base_url() ?>/assets/js/custom.js"></script>
	<?php $this->load->view('layouts/partials/alert') ?>
	<!-- Page Specific JS File -->
</body>

</html>