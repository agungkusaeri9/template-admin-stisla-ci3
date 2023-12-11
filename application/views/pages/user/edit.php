<section class="section">
	<div class="section-header">
		<h1>Edit User</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item "><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item active"><a href="<?= base_url('user') ?>">User</a></div>
			<div class="breadcrumb-item active">Edit</div>
		</div>
	</div>
	<div class="section-body">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="<?= base_url('user/update/' . $item->id_user) ?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="nama">Nama</label>
								<input id="nama" type="text" class="form-control <?php if (form_error('nama')) : ?> is-invalid <?php endif; ?>" name="nama" tabindex="1" autofocus value="<?= $item->nama ?>">
								<?php if (form_error('nama')) : ?>
									<div class="invalid-feedback">
										<?= form_error('nama') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input id="email" type="text" class="form-control <?php if (form_error('email')) : ?> is-invalid <?php endif; ?>" name="email" tabindex="1" value="<?= $item->email ?>">
								<?php if (form_error('email')) : ?>
									<div class="invalid-feedback">
										<?= form_error('email') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="password">Password (optional)</label>
								<input id="password" type="password" class="form-control <?php if (form_error('password')) : ?> is-invalid <?php endif; ?>" name="password" tabindex="1" autofocus>
								<?php if (form_error('password')) : ?>
									<div class="invalid-feedback">
										<?= form_error('password') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="konfirmasi_password">Konfirmasi Password (optional)</label>
								<input id="konfirmasi_password" type="password" class="form-control <?php if (form_error('konfirmasi_password')) : ?> is-invalid <?php endif; ?>" name="konfirmasi_password" tabindex="1" autofocus>
								<?php if (form_error('konfirmasi_password')) : ?>
									<div class="invalid-feedback">
										<?= form_error('konfirmasi_password') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="level">Level</label>
								<select name="level" id="level" class="form-control">
									<option value="" disabled>Pilih Level</option>
									<option <?php if ($item->level === 'admin') : ?> selected <?php endif; ?> value="admin">Admin</option>
								</select>
								<?php if (form_error('level')) : ?>
									<div class="invalid-feedback">
										<?= form_error('level') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group">
								<label for="gambar">Gambar (optional)</label>
								<input id="gambar" type="file" class="form-control <?php if (form_error('gambar')) : ?> is-invalid <?php endif; ?>" name="gambar" tabindex="1" autofocus>
								<?php if (form_error('gambar')) : ?>
									<div class="invalid-feedback">
										<?= form_error('gambar') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group d-flex justify-content-between">
								<a href="<?= base_url('user') ?>" class="btn btn-warning">Kembali</a>
								<button class="btn btn-primary">Simpan</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
	</div>
</section>