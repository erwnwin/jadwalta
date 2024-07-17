$(document).ready(function()
{

	/*
	 * Focus pertama
	 */
	// $("input[name='textPassword']").focus();

	/*
	 * Menampilkan box form login dengan loading state pada saat proses submit berlangsung
	 */
	$("#frmGantiKataSandi").submit(function()
	{
		$("#divOverlayfrmGantiKataSandi").removeClass("hide");
	}); 



});