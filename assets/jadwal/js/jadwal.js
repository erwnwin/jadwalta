/*
 * JavaScript untuk halaman daftar mata kuliah kurikulum
 */

/*
 * Inisialisasi dokumen
 */
$(document).ready(function()
{

	/*
	 * Insialisasi combo box data dengan library select2
	 */
	$("select[name='btnTahunAkademik']").select2();

	/*
	 * Proses submit form pemilihan kurikulum
	 */
	$("select[name='btnTahunAkademik']").change(function(){
		$("#formPenjadwalan").submit();
	});

	/*
	 * Menampilkan box loading state pada saat proses submit form berlangsung
	 */
	$("#formPenjadwalan").submit(function()
	{
		$("#divOverlayFormPenjadwalan").removeClass("hide");
	});



	// coba aja



});