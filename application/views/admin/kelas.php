 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <h1>Kelas</h1>
             <p>Data Kelas yang tersedia</p>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">
         <?php echo $this->session->flashdata('pesan') ?>
         <!-- Default box -->
         <div class="box box-success">
             <?php if ($kelas == null) { ?>
                 <div class="box-header with-border">
                     <h3 class="box-title">Data Kelas</h3>

                     <div class="box-tools pull-right">
                         <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                         <i class="fa fa-minus"></i>
                     </button> -->
                         <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-addKelas">
                             <i class="fa fa-plus"></i> Tambah Kelas
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
                     <h3 class="box-title">Data Kelas</h3>

                     <div class="box-tools pull-right">
                         <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                         <i class="fa fa-minus"></i>
                     </button> -->
                         <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-addKelas">
                             <i class="fa fa-plus"></i> Tambah Kelas
                         </button>
                     </div>
                 </div>
                 <div class="box-body">
                     <table class="table table-bordered table-striped table-hover">
                         <tr>
                             <th style="width: 10px" class="bg-danger text-center">#</th>
                             <th class="bg-danger text-center">Nama Kelas</th>
                             <th class="bg-danger text-center">Angkatan</th>

                             <th style="width: 90px" class="bg-danger">Action</th>
                         </tr>
                         <?php $no = 1;
                            foreach ($kelas as $r) { ?>
                             <tr>
                                 <td class="text-center"><?= $no++ ?></td>
                                 <td class="text-center">Kelas <?= $r->kelas ?> <?= $r->urutan_kelas ?></td>
                                 <td class="text-center"><?= $r->nama_ruangan ?></td>

                                 <td class="text-center">
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

     <div class="modal fade" id="modal-addKelas">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Input Data Kelas</h4>
                 </div>

                 <form action="<?= base_url('kelas/act-add') ?>" method="post" class="form-horizontal">
                     <div class="box-body">
                         <!-- <div class="form-group">
                             <label class="col-sm-4 control-label">Nama Kelas</label>
                             <div class="col-sm-8">
                                 <input type="text" name="nama" class="form-control" required="required" value="" placeholder="Nama Kelas" autocomplete="off" />
                                 <input type="hidden" name="jenis" class="form-control" required="required" value="REGULER" placeholder="Nama/Kode Ruangan" />
                             </div>
                         </div> -->

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Ruangan</label>
                             <div class="col-sm-8">
                                 <select name="id_ruang" class="form-control select2" style="width: 100%;" required>
                                     <option value="">Pilih Ruangan</option>
                                     <?php foreach ($ruang as $r) { ?>
                                         <option value="<?= $r->id ?>"><?= $r->nama_ruangan ?></option>
                                     <?php } ?>
                                 </select>
                             </div>
                         </div>


                         <div class="form-group">
                             <label class="col-sm-4 control-label">Kelas</label>
                             <div class="col-sm-8">
                                 <select name="kelas" class="form-control select2" style="width: 100%;" required>
                                     <option value="">Pilih Kelas</option>
                                     <option value="I">I</option>
                                     <option value="II">II</option>
                                     <option value="III">III</option>
                                     <option value="IV">IV</option>
                                     <option value="V">V</option>
                                     <option value="VI">VI</option>
                                 </select>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Urutan Kelas</label>
                             <div class="col-sm-8">
                                 <select name="urutan_kelas" class="form-control select2" style="width: 100%;" required>
                                     <option value="">Pilih Urutan</option>
                                     <option value="A">A</option>
                                     <option value="B">B</option>
                                     <option value="C">C</option>
                                     <option value="D">D</option>
                                     <option value="E">E</option>
                                 </select>
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