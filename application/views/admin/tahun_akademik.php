 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <h1>Tahun Akademik</h1>
             <p>Data tahun akademik berjalan dan lampau</p>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">

         <?php echo $this->session->flashdata('pesan') ?>
         <!-- Default box -->
         <div class="box box-primary">
             <?php if ($ta == null) { ?>
                 <div class="box-header with-border">
                     <h3 class="box-title">Data Tahun Akademik</h3>

                     <div class="box-tools pull-right">
                         <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                         <i class="fa fa-minus"></i>
                     </button> -->
                         <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-addTa">
                             <i class="fa fa-plus"></i> Tambah Tahun Akademik
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
                     <h3 class="box-title">Data Tahun Akademik</h3>

                     <div class="box-tools pull-right">
                         <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                         <i class="fa fa-minus"></i>
                     </button> -->
                         <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-addTa">
                             <i class="fa fa-plus"></i> Tambah Tahun Akademik
                         </button>
                     </div>
                 </div>
                 <div class="box-body">
                     <table class="table table-bordered table-striped table-hover">
                         <tr>
                             <th style="width: 10px" class="bg-warning text-center">#</th>
                             <th style="width: 200px" class="bg-warning text-center">Tahun Akademik</th>
                             <th style="width: 300px" class="bg-warning text-center">Tanggal Mulai</th>
                             <th style="width: 300px" class="bg-warning text-center">Tanggal Akhir</th>
                             <th style="width: 50px" class="bg-warning text-center">Status</th>

                             <th style="width: 300px" class="bg-warning text-center">Action</th>
                         </tr>
                         <?php $no = 1;
                            foreach ($ta as $r) { ?>
                             <tr>
                                 <td class="text-center"><?= $no++ ?></td>
                                 <td><?= $r->tahun_akademik ?></td>
                                 <td><?php echo tanggal_indonesia($r->tgl_mulai) ?></td>
                                 <td><?php echo tanggal_indonesia($r->tgl_akhir) ?></td>
                                 <td class="text-center"><?php if ($r->status == 'Non Aktif') { ?>
                                         <span class="badge bg-red">Tidak Aktif</span>
                                     <?php } else { ?>
                                         <span class="badge bg-blue">Aktif</span>
                                     <?php } ?>
                                 </td>

                                 <td class="text-center"><?php if ($r->status == 'Non Aktif') { ?>
                                         <button type="button" data-toggle="modal" title="Aktifkan" data-target="#modal-Aktif<?= $r->id_ta ?>" class="btn btn-sm btn-flat btn-success"> <i class="fa fa-check"></i></button>
                                         <button type="button" data-toggle="modal" data-target="#modal-edit<?= $r->id_ta ?>" class="btn btn-sm btn-flat btn-warning"> <i class="fa fa-edit"></i></button>
                                         <button type="button" data-toggle="modal" data-target="#modal-hapus<?= $r->id_ta ?>" class="btn btn-sm btn-flat btn-danger"> <i class="fa fa-trash"></i></button>
                                     <?php } else { ?>
                                         <button type="button" data-toggle="modal" title="Non Aktifkan" data-target="#modal-NonAktif<?= $r->id_ta ?>" class="btn btn-sm btn-flat btn-primary"> <i class="fa fa-times"></i></button>
                                         <button type="button" data-toggle="modal" data-target="#modal-edit<?= $r->id_ta ?>" class="btn btn-sm btn-flat btn-warning"> <i class="fa fa-edit"></i></button>
                                         <button type="button" data-toggle="modal" data-target="#modal-hapus<?= $r->id_ta ?>" class="btn btn-sm btn-flat btn-danger"> <i class="fa fa-trash"></i></button>
                                     <?php } ?>

                                 </td>
                             </tr>
                         <?php } ?>

                     </table>

                 </div>
                 <!-- /.box-body -->


                 <!-- <center>
                     <div class="box-footer clearfix">
                         <ul class="pagination pagination-sm no-margin ">
                             <li><a href="#">&laquo;</a></li>
                             <li><a href="#">1</a></li>
                             <li><a href="#">2</a></li>
                             <li><a href="#">3</a></li>
                             <li><a href="#">&raquo;</a></li>
                         </ul>
                     </div>
                 </center> -->
             <?php } ?>
         </div>
         <!-- /.box -->

     </section>
     <!-- /.content -->


     <div class="modal fade" id="modal-addTa">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Input Data Tahun Akademik</h4>
                 </div>

                 <form action="<?= base_url('tahun-akademik/act-add') ?>" method="post" class="form-horizontal">
                     <div class="box-body">
                         <div class="form-group">
                             <label class="col-sm-4 control-label">Tahun Akademik</label>
                             <div class="col-sm-8">
                                 <input type="text" name="tahun_akademik" maxlength="9" class="form-control" required="required" value="" placeholder="2019-2020" autocomplete="off" />

                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Tanggal Mulai</label>
                             <div class="col-sm-8">
                                 <input type="date" name="tgl_mulai" class="form-control" required="required" value="" placeholder="Tanggal dimulai" autocomplete="off" />
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Tanggal Berakhir</label>
                             <div class="col-sm-8">
                                 <input type="date" name="tgl_akhir" class="form-control" required="required" value="" placeholder="Tanggal berakhir" autocomplete="off" />
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Semester</label>
                             <div class="col-sm-8">
                                 <select name="tipe_semester" class="form-control" required>
                                     <option value="">Pilih Semester</option>
                                     <option value="Ganjil">Ganjil</option>
                                     <option value="Genap">Genap</option>
                                 </select>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Status</label>
                             <div class="col-sm-8">
                                 <div class="col-xs-6">
                                     <div class="radio">
                                         <label>
                                             <input type="radio" name="status" class="flat-red" id="optionsRadios1" value="Aktif" disabled>
                                             Aktif
                                         </label>
                                     </div>
                                 </div>
                                 <div class="col-xs-6">
                                     <div class="radio">
                                         <label>
                                             <input type="radio" name="status" class="flat-red" id="optionsRadios1" value="Non Aktif" checked>
                                             Tidak Aktif
                                         </label>
                                     </div>
                                 </div>

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

     <?php foreach ($ta as $g) { ?>
         <div class="modal fade" id="modal-Aktif<?= $g->id_ta ?>">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title">Aktifkan Tahun Akademik?</h4>
                     </div>
                     <form action="<?= base_url('tahun-akademik/act-aktif/' . $g->id_ta) ?>" method="post" class="form-horizontal">
                         <input type="hidden" name="id_ta" value="<?= $g->id_ta ?>" class="form-control">
                         <div class="box-body">
                             <center>
                                 <p class="mr-5">Tahun akademik ini akan diaktfikan!</p>
                             </center>
                         </div>
                         <div class="box-footer">
                             <button name="cmdSimpanPerguruanTinggiAsalMahasiswa" id="cmdSimpanPerguruanTinggiAsalMahasiswa" class="btn btn-flat btn-danger pull-left" value="SimpanPerguruanTinggiAsalMahasiswa"><i class="fa fa-check"></i> Aktifkan</button>
                             <button type="button" class="btn btn-flat btn-default pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                         </div>
                     </form>


                 </div>
                 <!-- /.modal-content -->
             </div>
             <!-- /.modal-dialog -->
         </div>
     <?php  } ?>


     <?php foreach ($ta as $g) { ?>
         <div class="modal fade" id="modal-NonAktif<?= $g->id_ta ?>">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title">Non Aktifkan Tahun Akademik?</h4>
                     </div>
                     <form action="<?= base_url('tahun-akademik/act-nonaktif/' . $g->id_ta) ?>" method="post" class="form-horizontal">
                         <input type="hidden" name="id_ta" value="<?= $g->id_ta ?>" class="form-control">
                         <div class="box-body">
                             <center>
                                 <p class="mr-5">Tahun akademik ini akan diNonAktfikan!</p>
                             </center>
                         </div>
                         <div class="box-footer">
                             <button name="cmdSimpanPerguruanTinggiAsalMahasiswa" id="cmdSimpanPerguruanTinggiAsalMahasiswa" class="btn btn-flat btn-danger pull-left" value="SimpanPerguruanTinggiAsalMahasiswa"><i class="fa fa-times"></i> Non Aktifkan</button>
                             <button type="button" class="btn btn-flat btn-default pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                         </div>
                     </form>


                 </div>
                 <!-- /.modal-content -->
             </div>
             <!-- /.modal-dialog -->
         </div>
     <?php  } ?>


 </div>
 <!-- /.content-wrapper -->