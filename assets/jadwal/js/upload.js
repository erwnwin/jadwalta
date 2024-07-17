//foto profil
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

// foto akun
$("#imgFotoProfilAkunPengguna").hover(function()
    {
        $(this).css({"cursor": "pointer"});
    });
    
$("#imgFotoProfilAkunPengguna").click(function()
        {
            $("#fileFotoAkunPengguna").trigger("click");
        });

$("#cmdFotoAkunPengguna").click(function()
	{
		$("#fileFotoAkunPengguna").trigger("click");
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
              url: "profil/post",
              type: "POST",
              data: {"image": response},
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




// akun
$image_crop_akunku = $("#divCropUploadFotoPengguna").croppie(
    {
        enableExif: true,
        viewport:
        {
			width: 200,
			height: 300,
			type: "square"
		},
		boundary:
		{
			width: 250,
			height: 350
		}
    });

$("#fileFotoAkunPengguna").on("change", function()
{
  var reader = new FileReader();
  reader.onload = function (event)
  {
      $image_crop_akunku.croppie("bind", {
          url: event.target.result
        });
  }
  reader.readAsDataURL(this.files[0]);
  $("#modalCropUploadFotoPengguna").modal("show");
});

$("#cmdCropUploadFotoPengguna").click(function(event)
{
  $image_crop_akunku.croppie("result",
  {
    type: "canvas",
    size: "viewport"
  }).then(function(response)
  {
      $.ajax(
      { 
          url: "profil/post_akun",
          type: "POST",
          data: {"akunku": response},
          success:function(data)
          {
              $("#modalCropUploadFotoPengguna").modal("hide");
              $(".img-foto-akun-pengguna").fadeOut("slow", function()
              {  
                  $(".img-foto-akun-pengguna").attr("src", data);
                  $(".img-foto-akun-pengguna").fadeIn("fast");
              });
              $("#fileFotoAkunPengguna").val("");
          }
        });
  })
});


