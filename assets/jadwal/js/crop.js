$("#imgFotoProfilPengguna").hover(function()
{
    $(this).css({"cursor": "pointer"});
});

$("#imgFotoProfilPengguna").click(function()
	{
		$("#fileFotoProfilPengguna").trigger("click");
	});

$("#cmdFotoProfilPengguna").click(function()
	{
		$("#fileFotoProfilPengguna").trigger("click");
	});


$image_crop_foto_profil_pengguna = $("#divCropUploadFotoProfilPengguna").croppie(
        {
            enableExif: true,
            viewport:
            {
                  width: 200,
                  height: 200,
                  type: "square"
            },
            boundary:
            {
                width: 250,
                  height: 250
            }
        });

  $("#fileFotoProfilPengguna").on("change", function()
  {
      var reader = new FileReader();
      reader.onload = function (event)
      {
          $image_crop_foto_profil_pengguna.croppie("bind", {
              url: event.target.result
            });
      }
      reader.readAsDataURL(this.files[0]);
      $("#modalCropUploadFotoProfilPengguna").modal("show");
  });

  $("#cmdCropUploadFotoProfilPengguna").click(function(event)
  {
      $image_crop_foto_profil_pengguna.croppie("result",
      {
        type: "canvas",
        size: "viewport"
      }).then(function(response)
      {
          $.ajax(
          { 
              url: base_url("profil/post"),
              type: "POST",
              data: {"dataFotoProfilPengguna": response},
              success:function(data)
              {
                  $("#modalCropUploadFotoProfilPengguna").modal("hide");
                  $(".img-foto-profil-pengguna").fadeOut("slow", function()
                  {  
                      $(".img-foto-profil-pengguna").attr("src", data);
                      $(".img-foto-profil-pengguna").fadeIn("fast");
                  });
                  $("#fileFotoProfilPengguna").val("");
              }
            });
      })
  });


