<section class="section">
	<div class="section-header">
		<h1>Data User</h1>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
			<div class="breadcrumb-item">Data User</div>
		</div>
	</div>
	<div class="section-body">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<a href="<?= base_url('user/tambah') ?>" class="btn  btn-primary mb-3">Tambah Data</a>
						<div class="table-responsive">
							<table class="table table-hover" id="dTable">
								<thead>
									<tr>
										<th>No</th>
										<th>Gambar</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Level</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($items as $item) : ?>
										<tr>
											<td><?= $i++; ?></td>
											<td>
												<?php if ($item->gambar) : ?>
													<img src="<?= base_url('uploads/user/') . $item->gambar ?>" alt="" class="img-fluid rounded-circle" style="max-height:60px;max-width:60px;">
												<?php else : ?>
													<img src="<?= base_url('assets/img/avatar/avatar-1.png') ?>" alt="" class="img-fluid rounded-circle" style="max-height:60px;max-width:60px;">
												<?php endif; ?>
											</td>
											<td><?= $item->nama ?></td>
											<td><?= $item->email ?></td>
											<td><?= $item->level ?></td>
											<td>
												<?php if ($this->session->userdata('id_user') != $item->id_user) : ?>
													<a href="<?= base_url('user/edit/')  . $item->id_user ?>" class="btn  btn-info">Edit</a>
													<form action="javascript:void(0)" method="post" class="d-inline" id="formDelete">
														<button class="btn btnDelete btn-danger" data-url="<?= base_url('user/delete/' . $item->id_user) ?>">Hapus</button>
													</form>
												<?php else : ?>
													<i>Tidak Ada Akses!</i>
												<?php endif; ?>

											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>