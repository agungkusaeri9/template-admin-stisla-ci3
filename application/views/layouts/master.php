<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title><?= $title ?? 'Dashboard' ?></title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/fontawesome-free/css/all.min.css">
	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>/assets/css/components.css">

	<link rel="stylesheet" href="<?= base_url() ?>/assets/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<script src="<?= base_url() ?>/assets/bs/js/jquery-3.6.1.min.js"></script>
</head>

<body>
	<div id="app">
		<div class="main-wrapper">
			<?php $this->load->view('layouts/navbar') ?>
			<div class="main-sidebar">
				<?php $this->load->view('layouts/sidebar') ?>
			</div>

			<!-- Main Content -->
			<div class="main-content">
				<?php $this->load->view($content ?? '-') ?>
			</div>
			<?php $this->load->view('layouts/footer') ?>
		</div>
	</div>

	<!-- General JS Scripts -->


	<script src="<?= base_url() ?>/assets/bs/js/popper.min.js"></script>
	<script src="<?= base_url() ?>/assets/bs/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>/assets/bs/js/jquery.nicescroll.min.js"></script>
	<script src="<?= base_url() ?>/assets/bs/js/moment.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/stisla.js"></script>
	<script src="<?= base_url() ?>/assets/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>/assets/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/scripts.js"></script>
	<script src="<?= base_url() ?>/assets/js/custom.js"></script>
	<script src="<?= base_url() ?>/assets/js/page/index.js"></script>
	<?php $this->load->view('layouts/partials/alert') ?>

	<script>
		$(document).ready(function() {
			$('#dTable').DataTable();
		});
	</script>

</body>

</html>