 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <h1>Guru</h1>
             <p>Daftar guru yang masih aktif</p>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">

         <?php echo $this->session->flashdata('pesan') ?>

         <!-- Default box -->
         <div class="box box-danger">
             <?php if ($guru == null) { ?>
                 <div class="box-header with-border">
                     <h3 class="box-title">Data Guru/Akun</h3>

                     <div class="box-tools pull-right">
                         <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                         <i class="fa fa-minus"></i>
                     </button> -->
                         <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-addGuru">
                             <i class="fa fa-plus"></i> Tambah Guru
                         </button>
                     </div>
                 </div>
                 <center>
                     <div class="box-body mt-2">
                         <img src="<?= base_url() ?>assets/img/nodata.svg" alt="" width="30%">
                         <p class="mt-3">Tidak ada data</p>
                     </div>
                 </center>
             <?php } else { ?>
                 <div class="box-header with-border">
                     <h3 class="box-title">Data Guru/Akun</h3>

                     <div class="box-tools pull-right">
                         <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                         <i class="fa fa-minus"></i>
                     </button> -->
                         <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-addGuru">
                             <i class="fa fa-plus"></i> Tambah Guru
                         </button>
                     </div>
                 </div>
                 <div class="box-body">
                     <table class="table table-sm table-bordered table-striped table-hover">
                         <tr>
                             <th style="width: 10px" class="bg-success">#</th>
                             <th class="bg-success">NIP/NIK</th>
                             <th class="bg-success">Nama Lengkap Guru (Beserta Gelar)</th>
                             <th class="bg-success">Alamat</th>
                             <th class="bg-success">WA Aktif</th>
                             <th style="width: 90px" class="bg-success">Action</th>
                         </tr>
                         <?php $no = 1;
                            foreach ($guru as $g) { ?>
                             <!-- <tr style="background-color: <?= $g->warna_guru ?>;"> -->
                             <tr>
                                 <td><?= $no++ ?></td>
                                 <td><?= $g->nip_nik ?></td>
                                 <td><?= $g->nama ?></td>
                                 <td><?= $g->alamat ?></td>
                                 <td>+<?= $g->telp_wa ?> <span class="badge bg-red">aktif</span></td>

                                 <td>
                                     <button type="button" data-toggle="modal" data-target="#modal-edit<?= $g->id_guru ?>" class="btn btn-sm btn-flat btn-warning"> <i class="fa fa-edit"></i></button>
                                     <button type="button" data-toggle="modal" data-target="#modal-hapus<?= $g->id_guru ?>" class="btn btn-sm btn-flat btn-danger"> <i class="fa fa-trash"></i></button>
                                 </td>
                             </tr>
                         <?php } ?>

                     </table>

                 </div>
                 <!-- /.box-body -->


                 <center>
                     <div class="box-footer clearfix">
                         <ul class="pagination pagination-sm no-margin ">
                             <li><a href="#">&laquo;</a></li>
                             <li><a href="#">1</a></li>
                             <li><a href="#">2</a></li>
                             <li><a href="#">3</a></li>
                             <li><a href="#">&raquo;</a></li>
                         </ul>
                     </div>
                 </center>
             <?php } ?>
         </div>
         <!-- /.box -->

     </section>
     <!-- /.content -->

     <!-- modal tamba -->




     <div class="modal fade" id="modal-addGuru">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Input Data Guru - Akun</h4>
                 </div>

                 <form action="<?= base_url('guru/act-add') ?>" method="post" class="form-horizontal">
                     <div class="box-body">
                         <div class="form-group">
                             <label class="col-sm-4 control-label">NIP/NIK/Nomor</label>
                             <div class="col-sm-8">
                                 <input type="number" name="nip_nik" class="form-control" required="required" placeholder="NIP/NIK/Nomor" />
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Nama Lengkap Guru <span class="text-danger">*(beserta gelar)</span></label>
                             <div class="col-sm-8">
                                 <input type="text" name="nama" class="form-control" required="required" value="" placeholder="Nama Lengkap beserta gelar" autocomplete="off" />
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Jenis Kelamin</label>
                             <div class="col-sm-8">
                                 <div class="col-xs-6">
                                     <div class="radio">
                                         <label>
                                             <input type="radio" name="jenis_kelamin" id="optionsRadios1" value="Laki-laki" checked>
                                             Laki-laki
                                         </label>
                                     </div>
                                 </div>
                                 <div class="col-xs-6">
                                     <div class="radio">
                                         <label>
                                             <input type="radio" name="jenis_kelamin" id="optionsRadios1" value="Perempuan">
                                             Perempuan
                                         </label>
                                     </div>
                                 </div>

                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Alamat</label>
                             <div class="col-sm-8">
                                 <input type="text" name="alamat" class="form-control" required="required" value="" placeholder="Alamat" autocomplete="off" />
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">No WhatsApp <span class="text-danger">*(aktif)</span></label>
                             <div class="col-sm-8">
                                 <div class="input-group">
                                     <span class="input-group-addon"><b>+62</b></span>
                                     <input type="text" name="telp_wa" class="form-control" required="required" value="" maxlength="13" placeholder="821xxxxxxx" autocomplete="off" />
                                 </div>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Warna </label>
                             <div class="col-sm-8">
                                 <input type="color" name="warna_guru" class="form-control" required="required" autocomplete="off" />
                             </div>
                         </div>

                         <div class="modal-header">
                             <center>
                                 <h5 class="modal-title" style="background-color: aquamarine;"><i class="fa fa-user"></i> Data Akun </h5>
                             </center>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Alamat Email</label>
                             <div class="col-sm-8">
                                 <input type="email" name="alamat_email" class="form-control" required="required" value="" placeholder="Alamat email" autocomplete="off" />
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-4 control-label">Password</label>
                             <div class="col-sm-8">
                                 <input type="text" name="password" class="form-control" required="required" value="" placeholder="Password" autocomplete="off" />
                             </div>
                         </div>


                     </div>
                     <div class="box-footer">
                         <button name="cmdSimpanPerguruanTinggiAsalMahasiswa" id="cmdSimpanPerguruanTinggiAsalMahasiswa" class="btn btn-flat btn-success pull-left" value="SimpanPerguruanTinggiAsalMahasiswa"><i class="fa fa-save"></i> Simpan</button>
                         <button type="button" class="btn btn-flat btn-default pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                     </div>
                 </form>


             </div>
             <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
     </div>


     <?php foreach ($guru as $g) { ?>
         <div class="modal fade" id="modal-edit<?= $g->id_guru ?>">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title">Edit Data Guru - Akun</h4>
                     </div>

                     <form action="<?= base_url('guru/act-edit') ?>" method="post" class="form-horizontal">
                         <div class="box-body">
                             <div class="form-group">
                                 <label class="col-sm-4 control-label">NIP/NIK/Nomor</label>
                                 <div class="col-sm-8">
                                     <input type="hidden" name="id_guru" class="form-control" value="<?= $g->id_guru ?>" required="required" placeholder="NIP/NIK/Nomor" />
                                     <input type="number" name="nip_nik" class="form-control" required="required" value="<?= $g->nip_nik ?>" placeholder="NIP/NIK/Nomor" />
                                 </div>
                             </div>

                             <div class="form-group">
                                 <label class="col-sm-4 control-label">Nama Lengkap Guru <span class="text-danger">*(beserta gelar)</span></label>
                                 <div class="col-sm-8">
                                     <input type="text" name="nama" class="form-control" required="required" value="<?= $g->nama ?>" placeholder="Nama Lengkap beserta gelar" autocomplete="off" />
                                 </div>
                             </div>

                             <div class="form-group">
                                 <label class="col-sm-4 control-label">Jenis Kelamin</label>
                                 <div class="col-sm-8">
                                     <div class="col-xs-6">
                                         <div class="radio">
                                             <label>
                                                 <input type="radio" name="jenis_kelamin" id="optionsRadios1" value="Laki-laki" <?php if ($g->jenis_kelamin == 'Laki-laki') echo 'checked' ?>>
                                                 Laki-laki
                                             </label>
                                         </div>
                                     </div>
                                     <div class="col-xs-6">
                                         <div class="radio">
                                             <label>
                                                 <input type="radio" name="jenis_kelamin" id="optionsRadios2" value="Perempuan" <?php if ($g->jenis_kelamin == 'Perempuan') echo 'checked' ?>>
                                                 Perempuan
                                             </label>
                                         </div>
                                     </div>

                                 </div>
                             </div>

                             <div class="form-group">
                                 <label class="col-sm-4 control-label">Alamat</label>
                                 <div class="col-sm-8">
                                     <input type="text" name="alamat" class="form-control" required="required" value="<?= $g->alamat ?>" placeholder="Alamat" autocomplete="off" />
                                 </div>
                             </div>

                             <div class="form-group">
                                 <label class="col-sm-4 control-label">No WhatsApp <span class="text-danger">*(aktif)</span></label>
                                 <div class="col-sm-8">
                                     <div class="input-group">
                                         <span class="input-group-addon"><b>+62</b></span>
                                         <input type="text" name="telp_wa" class="form-control" required="required" value="<?= $g->telp_wa ?>" maxlength="13" placeholder="821xxxxxxx" autocomplete="off" />
                                     </div>
                                 </div>
                             </div>

                             <div class="form-group">
                                 <label class="col-sm-4 control-label">Warna </label>
                                 <div class="col-sm-8">
                                     <input type="color" name="warna_guru" class="form-control" value="<?= $g->warna_guru ?>" required="required" autocomplete="off" />
                                 </div>
                             </div>

                             <div class="modal-header">
                                 <center>
                                     <h5 class="modal-title" style="background-color: aquamarine;"><i class="fa fa-user"></i> Data Akun </h5>
                                 </center>
                             </div>

                             <div class="form-group">
                                 <label class="col-sm-4 control-label">Alamat Email</label>
                                 <div class="col-sm-8">
                                     <input type="email" name="alamat_email" class="form-control" required="required" value="<?= $g->alamat_email ?>" placeholder="Alamat email" autocomplete="off" />
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-sm-4 control-label">Password</label>
                                 <div class="col-sm-8">
                                     <input type="password" name="password" class="form-control" required="required" value="<?= $g->password ?>" placeholder="Password" autocomplete="off" />
                                 </div>
                             </div>



                         </div>
                         <div class="box-footer">
                             <button name="cmdSimpanPerguruanTinggiAsalMahasiswa" id="cmdSimpanPerguruanTinggiAsalMahasiswa" class="btn btn-flat btn-info pull-left" value="SimpanPerguruanTinggiAsalMahasiswa"><i class="fa fa-save"></i> Update</button>
                             <button type="button" class="btn btn-flat btn-default pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                         </div>
                     </form>


                 </div>
                 <!-- /.modal-content -->
             </div>
             <!-- /.modal-dialog -->
         </div>
     <?php  } ?>



     <?php foreach ($guru as $g) { ?>
         <div class="modal fade" id="modal-hapus<?= $g->id_guru ?>">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title">Yakin Hapus Data?</h4>
                     </div>
                     <form action="<?= base_url('guru/act-hapus/' . $g->id_guru) ?>" method="post" class="form-horizontal">

                         <div class="box-body">
                             <center>
                                 <p class="mr-5">Data ini akan dihapus!</p>
                             </center>
                         </div>
                         <div class="box-footer">
                             <button name="cmdSimpanPerguruanTinggiAsalMahasiswa" id="cmdSimpanPerguruanTinggiAsalMahasiswa" class="btn btn-flat btn-danger pull-left" value="SimpanPerguruanTinggiAsalMahasiswa"><i class="fa fa-trash"></i> Hapus</button>
                             <button type="button" class="btn btn-flat btn-default pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                         </div>
                     </form>


                 </div>
                 <!-- /.modal-content -->
             </div>
             <!-- /.modal-dialog -->
         </div>
     <?php  } ?>
     <!-- /.modal -->


 </div>
 <!-- /.content-wrapper -->