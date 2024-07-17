 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <h1>Data Hari</h1>
             <p>Daftar Hari yang digunakan</p>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">
         <?php echo $this->session->flashdata('pesan') ?>

         <!-- Default box -->
         <div class="box box-success">
             <?php if ($hari == null) { ?>
                 <div class="box-header with-border">
                     <h3 class="box-title">Data Hari</h3>

                     <div class="box-tools pull-right">
                         <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                         <i class="fa fa-minus"></i>
                     </button> -->
                         <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-addRuang">
                             <i class="fa fa-plus"></i> Generate Hari
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
                     <h3 class="box-title">Data Hari</h3>

                     <div class="box-tools pull-right">
                         <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-setHari">
                             <i class="fa fa-plus"></i> Set Hari Per Kelas
                         </button>
                     </div>
                 </div>
                 <div class="box-body">
                     <table class="table table-bordered table-striped table-hover">
                         <tr>
                             <th style="width: 5px;" class="bg-info text-center">#</th>
                             <th class="bg-info text-center">Hari</th>
                             <th class="bg-info text-center">Jenis Kelas</th>

                             <th style="width: 90px" class="bg-info">Action</th>
                         </tr>
                         <?php $no = 1;
                            foreach ($hari as $r) { ?>
                             <tr>
                                 <td class="text-center"><?= $no++ ?></td>
                                 <td class="text-center"><?= $r->nama_hari ?></td>
                                 <td class="text-center"><?= $r->kelas ?></td>
                                 <td>
                                     <button type="button" data-toggle="modal" data-target="#modal-edit<?= $r->id_hari ?>" class="btn btn-sm btn-flat btn-warning"> <i class="fa fa-edit"></i></button>
                                     <button type="button" data-toggle="modal" data-target="#modal-hapus<?= $r->id_hari ?>" class="btn btn-sm btn-flat btn-danger"> <i class="fa fa-trash"></i></button>
                                 </td>
                             </tr>
                         <?php } ?>

                     </table>
                 </div>
             <?php } ?>
         </div>
         <!-- /.box -->

     </section>
     <!-- /.content -->

     <div class="modal fade" id="modal-setHari">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Set Hari</h4>
                 </div>

                 <form action="<?= base_url('hari/act-add') ?>" method="post" class="form-horizontal">
                     <div class="box-body">

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Hari</label>
                             <div class="col-sm-8">
                                 <select name="nama_hari" id="" class="form-control">
                                     <option value="">Pilih Hari</option>
                                     <option value="Senin">Senin</option>
                                     <option value="Selasa">Selasa</option>
                                     <option value="Rabu">Rabu</option>
                                     <option value="Kamis">Kamis</option>
                                     <option value="Jumat">Jumat</option>
                                     <option value="Sabtu">Senin</option>
                                 </select>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Kelas</label>
                             <div class="col-sm-8">
                                 <?php
                                    $kls = ['I', 'II', 'III', 'IV', 'V', 'VI'];
                                    foreach ($kls as $valueKls) { ?>
                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" name="chkKelas[]" type="checkbox" id="<?= $valueKls ?>" value="<?= $valueKls ?>">
                                         <label class="form-check-label" for="<?= $valueKls ?>"><?= $valueKls ?></label>
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