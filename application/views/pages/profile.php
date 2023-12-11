<section class="section">
	<div class="section-header">
		<h1>Profile</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
			<div class="breadcrumb-item">Profile</div>
		</div>
	</div>
	<div class="section-body">
		<h2 class="section-title"><?= $this->session->userdata('nama') ?></h2>
		<p class="section-lead">
			Change information about yourself on this page.
		</p>



		<div class="row mt-sm-4">
			<div class="col-12 col-md-12">
				<div class="card">
					<?php if (isset($error)) : ?>
						<div class="alert alert-danger">
							<?= $error ?>
						</div>
					<?php endif; ?>
					<form method="post" class="needs-validation" action="<?= base_url('profile/update') ?>" enctype="multipart/form-data">
						<div class="card-header">
							<h4>Edit Profile</h4>
						</div>
						<div class="card-body">
							<div class="form-group ">
								<label>Nama</label>
								<input id="nama" type="text" class="form-control <?php if (form_error('nama')) : ?> is-invalid <?php endif; ?>" name="nama" tabindex="1" value="<?= $item->nama ?>">
								<?php if (form_error('nama')) : ?>
									<div class="invalid-feedback">
										<?= form_error('nama') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class='form-group mb-3'>
								<label for='nomor_telepon' class='mb-2'>Nomor Telepon</label>
								<input type='text' name='nomor_telepon' class='form-control <?php if (form_error('nomor_telepon')) : ?> is-invalid <?php endif; ?>' value="<?= $item->nomor_telepon ?>">
								<?php if (form_error('nomor_telepon')) : ?>
									<div class='invalid-feedback'>
										<?= form_error('nomor_telepon') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group ">
								<label>Email</label>
								<input id="email" type="text" class="form-control <?php if (form_error('email')) : ?> is-invalid <?php endif; ?>" name="email" tabindex="1" value="<?= $item->email ?>" readonly>
								<?php if (form_error('email')) : ?>
									<div class="invalid-feedback">
										<?= form_error('email') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group ">
								<label>Gambar</label>
								<input id="gambar" type="file" class="form-control <?php if (form_error('gambar')) : ?> is-invalid <?php endif; ?>" name="gambar" tabindex="1">
								<?php if (form_error('gambar')) : ?>
									<div class="invalid-feedback">
										<?= form_error('gambar') ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<div class="card-footer text-right">
							<button class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>