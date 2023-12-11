<section class="section">
	<div class="section-header">
		<h1>Ubah Password</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item">Ubah Password</div>
		</div>
	</div>
	<div class="section-body">
		<div class="row mt-sm-4">
			<div class="col-12 col-md-12">
				<div class="card">
					<?php if (isset($error)) : ?>
						<div class="alert alert-danger">
							<?= $error ?>
						</div>
					<?php endif; ?>
					<form method="post" class="needs-validation" action="<?= base_url('Ubah_Password/update') ?>" enctype="multipart/form-data">
						<div class="card-body">
							<div class="form-group ">
								<label>Password Lama</label>
								<input id="password_lama" type="password" class="form-control <?php if (form_error('password_lama')) : ?> is-invalid <?php endif; ?>" name="password_lama" tabindex="1">
								<?php if (form_error('password_lama')) : ?>
									<div class="invalid-feedback">
										<?= form_error('password_lama') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group ">
								<label>Password Baru</label>
								<input id="password_baru" type="password" class="form-control <?php if (form_error('password_baru')) : ?> is-invalid <?php endif; ?>" name="password_baru" tabindex="1">
								<?php if (form_error('password_baru')) : ?>
									<div class="invalid-feedback">
										<?= form_error('password_baru') ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="form-group ">
								<label>Konfirmasi Password Baru</label>
								<input id="konfirmasi_password_baru" type="password" class="form-control <?php if (form_error('konfirmasi_password_baru')) : ?> is-invalid <?php endif; ?>" name="konfirmasi_password_baru" tabindex="1">
								<?php if (form_error('konfirmasi_password_baru')) : ?>
									<div class="invalid-feedback">
										<?= form_error('konfirmasi_password_baru') ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<div class="card-footer text-right">
							<button class="btn btn-primary">Ubah Password</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>