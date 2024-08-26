 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <h1>Mata Pelajaran</h1>
             <p>Daftar mata pelajaran</p>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">

         <?php echo $this->session->flashdata('pesan') ?>
         <!-- Default box -->
         <div class="box box-primary">
             <?php if ($mapel == null) { ?>
                 <div class="box-header with-border">
                     <h3 class="box-title">Data Mata Pelajaran</h3>

                     <div class="box-tools pull-right">
                         <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                         <i class="fa fa-minus"></i>
                     </button> -->
                         <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-addMapel">
                             <i class="fa fa-plus"></i> Tambah Mata Pelajaran
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
                     <h3 class="box-title">Data Mata Pelajaran</h3>

                     <div class="box-tools pull-right">
                         <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                         <i class="fa fa-minus"></i>
                     </button> -->
                         <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-addMapel">
                             <i class="fa fa-plus"></i> Tambah Mata Pelajaran
                         </button>
                     </div>
                 </div>
                 <div class="box-body">
                     <table class="table table-bordered table-sm table-striped table-hover">
                         <tr>
                             <th style="width: 10px" class="bg-success text-center">#</th>
                             <th style="width: 100px" class="bg-success text-center">Kode Mapel</th>
                             <th style="width: 300px" class="bg-success text-center">Nama Mata Pelajaran</th>
                             <th style="width: 200px" class="bg-success text-center">Kelas</th>
                             <th style="width: 100px" class="bg-success text-center">Bobot Jam Per Minggu</th>

                             <th style="width: 100px" class="bg-success text-center">Action</th>
                         </tr>
                         <?php $no = 1;
                            foreach ($mapel as $r) { ?>
                             <tr>
                                 <td><?= $no++ ?></td>
                                 <td class="text-center"><?= $r->kode_mapel ?></td>
                                 <td><?= $r->nama_mapel ?></td>
                                 <td><?= $r->kelas ?></td> <!-- Kelas digabungkan menjadi satu string -->
                                 <td class="text-center"><?= $r->beban_jam ?></td>
                                 <td class="text-center">
                                     <button type="button" data-toggle="modal" data-target="#modal-edit<?= $r->kode_mapel ?>" class="btn btn-sm btn-flat btn-warning">
                                         <i class="fa fa-edit"></i>
                                     </button>
                                     <button type="button" data-toggle="modal" data-target="#modal-hapus<?= $r->kode_mapel ?>" class="btn btn-sm btn-flat btn-danger">
                                         <i class="fa fa-trash"></i>
                                     </button>
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

     <!-- Modal Hapus -->
     <?php foreach ($mapel as $r) { ?>
         <div class="modal fade" id="modal-hapus<?= $r->kode_mapel ?>">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 class="modal-title">Hapus Mapel</h4>
                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     </div>
                     <div class="modal-body">
                         <p>Apakah Anda yakin ingin menghapus mapel <strong><?= $r->nama_mapel ?></strong> (Kode: <?= $r->kode_mapel ?>)?</p>
                     </div>
                     <div class="modal-footer">
                         <form method="post" action="<?= base_url('mata-pelajaran/delete/' . $r->kode_mapel) ?>"> <!-- Ganti 'controller' dengan nama controller Anda -->
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                             <button type="submit" class="btn btn-danger">Hapus</button>
                         </form>
                     </div>
                 </div>
             </div>
         </div>

     <?php } ?>


     <div class="modal fade" id="modal-addMapel">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Input Data Mata Pelajaran</h4>
                 </div>

                 <form action="<?= base_url('mata-pelajaran/act-add2') ?>" method="post" class="form-horizontal">
                     <div class="box-body">
                         <div class="form-group">
                             <label class="col-sm-4 control-label">Kode Mata Pelajaran</label>
                             <div class="col-sm-8">
                                 <input type="text" name="kode_mapel" class="form-control" required="required" value="" placeholder="Kode Mata Pelajaran" autocomplete="off" />
                                 <input type="hidden" name="jenis" class="form-control" required="required" value="TEORI" placeholder="Nama/Kode Ruangan" />
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Nama Mata Pelajaran</label>
                             <div class="col-sm-8">
                                 <input type="text" name="nama_mapel" class="form-control" required="required" value="" placeholder="Mata Pelajaran" autocomplete="off" />
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Kelas</label>
                             <div class="col-sm-8">
                                 <?php
                                    $kls = $this->db->query("SELECT * FROM kelasku")->result();
                                    foreach ($kls as $k) { ?>
                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" name="chkKelas[]" type="checkbox" id="<?= $k->id_kelas ?>" value="<?= $k->id_kelas ?>">
                                         <label class="form-check-label" for="<?= $k->id_kelas ?>"> Kelas <?= $k->kelas ?> <?= $k->urutan_kelas ?></label>
                                     </div>
                                 <?php } ?>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Semester</label>
                             <div class="col-sm-8">
                                 <select name="kelompok_mapel" class="form-control" required>
                                     <option value="">Pilih Semester</option>
                                     <option value="A">Ganjil</option>
                                     <option value="B">Genap</option>
                                 </select>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Beban Jam</label>
                             <div class="col-sm-8">
                                 <input type="text" name="beban_jam" class="form-control" maxlength="2" required="required" value="" placeholder="Beban Jam" autocomplete="off" />
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