/*
 * JavaScript untuk halaman daftar mata kuliah kurikulum
 */

/*
 * Inisialisasi dokumen
 */
$(document).ready(function()
{

	$("select[name='btnJadwal']").select2();

	/*
	 * Proses submit form pemilihan kurikulum
	 */
	$("select[name='btnJadwal']").change(function(){
		$("#formJadwal").submit();
	});

	/*
	 * Menampilkan box loading state pada saat proses submit form berlangsung
	 */
	$("#formJadwal").submit(function()
	{
		$("#divOverlayformJadwal").removeClass("hide");
	});

});