$('#deleteModal').on('show.bs.modal', function (event) {
	var button = $(event.relatedTarget); // Button that triggered the modal
	var hari = button.data('hari');
	var keterangan = button.data('keterangan');
	var sesi = button.data('sesi');

	var modal = $(this);
	modal.find('#confirmDeleteButton').data('hari', hari);
	modal.find('#confirmDeleteButton').data('keterangan', keterangan);
	modal.find('#confirmDeleteButton').data('sesi', sesi);
});

$('#confirmDeleteButton').on('click', function () {
	var hari = $(this).data('hari');
	var keterangan = $(this).data('keterangan');
	var sesi = $(this).data('sesi');

	$.ajax({
		url: 'jadwal-khusus/delete',
		type: 'POST',
		data: {
			hari: hari,
			keterangan: keterangan,
			sesi: sesi
		},
		success: function (response) {
			var alertHtml;

			if (response.success) {
				alertHtml = `
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Sukses</h4>
                            Data jadwal khusus berhasil dihapus!
                        </div>
                    `;
			} else {
				alertHtml = `
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-ban"></i> Gagal</h4>
                            Terjadi kesalahan saat menghapus data.
                        </div>
                    `;
			}

			$('#alertContainer').html(alertHtml);
			$('#deleteModal').modal('hide');
			setTimeout(function () {
				window.location.reload();
			}, 2000);
		},
		error: function () {
			var alertHtml = `
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Gagal</h4>
                        Terjadi kesalahan saat menghubungi server.
                    </div>
                `;
			$('#alertContainer').html(alertHtml);
			$('#deleteModal').modal('hide');
		}
	});
});
