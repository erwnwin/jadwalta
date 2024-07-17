 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <h1>Request Jadwal</h1>
             <p>Data guru yang merequest jadwal</p>
         </h1>

     </section>


     <!-- Main content -->
     <section class="content">

         <?php echo $this->session->flashdata('pesan') ?>
         <!-- Default box -->
         <div class="box box-warning">
             <?php if ($req == null) { ?>
                 <div class="box-header with-border">
                     <h3 class="box-title">Data Request Jadwal</h3>

                     <div class="box-tools pull-right">
                         <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-addReq">
                             <i class="fa fa-plus"></i> Tambah Request Jadwal
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
                     <h3 class="box-title">Data Request Jadwal</h3>

                     <div class="box-tools pull-right">

                         <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-addReq">
                             <i class="fa fa-plus"></i> Tambah Request Jadwal
                         </button>
                     </div>
                 </div>
                 <div class="box-body">
                     <table class="table table-bordered table-striped table-hover">
                         <tr>
                             <th style="width: 10px" class="bg-success">#</th>
                             <th style="width: 200px" class="bg-success">Nama Guru</th>
                             <th style="width: 500px" class="bg-success">Hari</th>

                             <th style="width: 100px" class="bg-success">Action</th>
                         </tr>
                         <?php $no = 1;
                            foreach ($req as $r) { ?>
                             <tr>
                                 <td><?= $no++ ?></td>
                                 <td><?= $r->nama ?></td>
                                 <td><?= $r->hari ?></td>
                                 <td>
                                     <!-- <button type="button" data-toggle="modal" data-target="#modal-edit<?= $r->id_mapel ?>" class="btn btn-sm btn-flat btn-warning"> <i class="fa fa-edit"></i></button> -->
                                     <button type="button" data-toggle="modal" data-target="#modal-hapus<?= $r->id_request ?>" class="btn btn-sm btn-flat btn-danger"> <i class="fa fa-trash"></i></button>
                                 </td>
                             </tr>
                         <?php } ?>

                     </table>

                 </div>

             <?php } ?>
         </div>

     </section>
     <!-- /.content -->

     <div class="modal fade" id="modal-addReq">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Input Data Requet Jadwal</h4>
                 </div>

                 <form action="<?= base_url('request-jadwal/act-add') ?>" method="post" class="form-horizontal">
                     <div class="box-body">

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Nama Guru</label>
                             <div class="col-sm-8">
                                 <select name="id_guru" class="form-control select2" style="width: 100%;" required>
                                     <option value="" selected="selected">Pilih Guru</option>

                                     <?php
                                        foreach ($guru as $gur) {
                                            if (!in_array($gur->id_guru, array_column($requestjadwal, 'id_guru'))) {
                                        ?>
                                             <option value="<?= $gur->id_guru ?>"><?= $gur->nama ?></option>
                                     <?php
                                            }
                                        }
                                        ?>

                                 </select>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Hari</label>
                             <div class="col-sm-8">
                                 <?php
                                    $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
                                    foreach ($hari as $value) { ?>
                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" name="chkHari[]" type="checkbox" id="<?= $value ?>" value="<?= $value ?>">
                                         <label class="form-check-label" for="<?= $value ?>"><?= $value ?></label>
                                     </div>
                                 <?php } ?>
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


 </div>
 <!-- /.content-wrapper -->