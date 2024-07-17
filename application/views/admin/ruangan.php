 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <h1>Ruangan</h1>
             <p>Data ruangan yang tersedia</p>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">
         <?php echo $this->session->flashdata('pesan') ?>
         <!-- Default box -->
         <div class="box box-success">
             <?php if ($ruang == null) { ?>
                 <div class="box-header with-border">
                     <h3 class="box-title">Data Ruangan</h3>

                     <div class="box-tools pull-right">
                         <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                         <i class="fa fa-minus"></i>
                     </button> -->
                         <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-addRuang">
                             <i class="fa fa-plus"></i> Tambah Ruangan
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
                     <h3 class="box-title">Data Ruangan</h3>

                     <div class="box-tools pull-right">
                         <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                         <i class="fa fa-minus"></i>
                     </button> -->
                         <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-addRuangan">
                             <i class="fa fa-plus"></i> Tambah Ruangan
                         </button>
                     </div>
                 </div>
                 <div class="box-body">
                     <table class="table table-bordered table-striped table-hover">
                         <tr>
                             <th style="width: 10px" class="bg-danger">#</th>
                             <th class="bg-danger">Nama Ruangan</th>

                             <th style="width: 90px" class="bg-danger">Action</th>
                         </tr>
                         <?php $no = 1;
                            foreach ($ruang as $r) { ?>
                             <tr>
                                 <td><?= $no++ ?></td>
                                 <td><?= $r->nama_ruangan ?></td>

                                 <td>
                                     <button type="button" data-toggle="modal" data-target="#modal-edit<?= $r->id ?>" class="btn btn-sm btn-flat btn-warning"> <i class="fa fa-edit"></i></button>
                                     <button type="button" data-toggle="modal" data-target="#modal-hapus<?= $r->id ?>" class="btn btn-sm btn-flat btn-danger"> <i class="fa fa-trash"></i></button>
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

     <div class="modal fade" id="modal-addRuangan">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Input Data Ruangan</h4>
                 </div>

                 <form action="<?= base_url('ruangan/act-add') ?>" method="post" class="form-horizontal">
                     <div class="box-body">
                         <div class="form-group">
                             <label class="col-sm-4 control-label">Nama/Kode Ruangan</label>
                             <div class="col-sm-8">
                                 <input type="text" name="nama_ruangan" class="form-control" required="required" value="" placeholder="Nama/Kode Ruangan" autocomplete="off" />
                                 <input type="hidden" name="jenis" class="form-control" required="required" value="Teori" placeholder="Nama/Kode Ruangan" />
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


     <?php foreach ($ruang as $r) { ?>
         <div class="modal fade" id="modal-edit<?= $r->id ?>">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title">Edit Data Ruangan</h4>
                     </div>

                     <form action="<?= base_url('ruangan/act-edit') ?>" method="post" class="form-horizontal">
                         <div class="box-body">
                             <div class="form-group">
                                 <label class="col-sm-4 control-label">Nama/Kode Ruangan</label>
                                 <div class="col-sm-8">
                                     <input type="hidden" name="id" class="form-control" required="required" value="<?= $r->id ?>" placeholder="Nama/Kode Ruangan" autocomplete="off" />
                                     <input type="text" name="nama_ruangan" class="form-control" required="required" value="<?= $r->nama_ruangan ?>" placeholder="Nama/Kode Ruangan" autocomplete="off" />
                                     <input type="hidden" name="jenis" class="form-control" required="required" value="Teori" placeholder="Nama/Kode Ruangan" />
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
     <?php } ?>

 </div>
 <!-- /.content-wrapper -->