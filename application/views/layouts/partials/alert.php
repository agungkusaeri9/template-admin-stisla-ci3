<script src="<?= base_url('assets/sweetalert2/sweetalert2.all.min.js') ?>"></script>
<?php if ($this->session->flashdata('success')) : ?>
	<script>
		Swal.fire({
			position: 'center',
			icon: 'success',
			title: 'Berhasil',
			text: '<?= $this->session->flashdata('success') ?>',
			showConfirmButton: true,
			timer: 1500
		})
	</script>
<?php endif; ?>
<?php if ($this->session->flashdata('error')) : ?>
	<script>
		Swal.fire({
			position: 'center',
			icon: 'error',
			title: 'Gagal',
			text: '<?= $this->session->flashdata('error') ?>',
			showConfirmButton: true,
			timer: 1500
		})
	</script>
<?php endif; ?>
<script>
	$('body').on('click', '.btnDelete', function() {
		let url = $(this).data('url');
		Swal.fire({
			title: 'Apakah kamu yakin?',
			text: "Data yang sudah dihapus tidak bisa dikembalikan lagi!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yakin',
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
				$('#formDelete').attr('action', url);
				$('#formDelete').submit();
			}
		})
	})
</script>