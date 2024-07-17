 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <h1>Data Jam</h1>
             <p>Daftar jam yang digunakan</p>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">
         <?php echo $this->session->flashdata('pesan') ?>

         <div class="box box-info collapsed-box">
             <div class="box-header with-border">
                 <h3 class="box-title">Data Jam</h3>

                 <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Buka">
                         <i class="fa fa-plus"></i></button>

                 </div>
             </div>
             <div class="box-body">
                 <?php if ($jam == null) { ?>
                     <center>
                         <div class="box-body mt-2">
                             <img src="<?= base_url() ?>assets/img/nodata.svg" alt="" width="30%">
                             <p class="mt-3">Tidak ada data</p>
                         </div>
                     </center>
                 <?php } else { ?>

                     <table class="table table-bordered table-striped table-hover">
                         <tr>
                             <th style="width: 10px" class="bg-info text-center">#</th>
                             <th class="bg-info text-center">Jam</th>
                             <th class="bg-info text-center">Istirahat/Waktu Shalat</th>

                             <th style="width: 90px" class="bg-info">Action</th>
                         </tr>
                         <?php $no = 1;
                            foreach ($jam as $r) { ?>
                             <tr>
                                 <td class="text-center"><?= $no++ ?></td>
                                 <td class="text-center"><?= $r->range_jam ?></td>
                                 <td><?= $r->waktu_shalat ?></td>

                                 <td>
                                     <button type="button" data-toggle="modal" data-target="#modal-edit<?= $r->id ?>" class="btn btn-sm btn-flat btn-warning"> <i class="fa fa-edit"></i></button>
                                     <button type="button" data-toggle="modal" data-target="#modal-hapus<?= $r->id ?>" class="btn btn-sm btn-flat btn-danger"> <i class="fa fa-trash"></i></button>
                                 </td>
                             </tr>
                         <?php } ?>

                     </table>

                 <?php } ?>
             </div>
         </div>

         <!-- Default box -->
         <div class="box box-success">
             <?php if ($jam1 == null) { ?>
                 <div class="box-header with-border">
                     <h3 class="box-title">Data Set Jam</h3>

                     <div class="box-tools pull-right">
                         <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                         <i class="fa fa-minus"></i>
                     </button> -->
                         <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-setJam">
                             <i class="fa fa-plus"></i> Generate Jam
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
                     <h3 class="box-title">Data Set Jam</h3>

                     <div class="box-tools pull-right">
                         <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-setJam">
                             <i class="fa fa-plus"></i> Generate Jam
                         </button>
                     </div>
                 </div>
                 <div class="box-body">
                     <table class="table table-bordered table-striped table-hover">
                         <tr>
                             <th style="width: 10px" class="bg-danger text-center">#</th>
                             <th class="bg-danger text-center">Jam</th>
                             <th class="bg-danger text-center">Waktu Istirahat</th>
                             <th style="width: 90px" class="bg-danger">Action</th>
                         </tr>
                         <?php $no = 1;
                            foreach ($jam1 as $r) { ?>
                             <tr>
                                 <td class="text-center"><?= $no++ ?></td>
                                 <td class="text-center"><?= $r->range_jam ?></td>
                                 <td class="text-center">
                                     <?php if ($r->range_jam == '10:30-11:00') { ?>
                                         <span class="badge bg-red">Waktu Istirahat</span>
                                     <?php } elseif ($r->range_jam == '12:00-13:00') { ?>
                                         <span class="badge bg-red">Waktu Shalat</span>
                                     <?php } else { ?>
                                         <!-- <span class="badge badge-danger">Waktu Istirahat</span> -->
                                     <?php } ?>
                                 </td>

                                 <td>
                                     <button type=" button" data-toggle="modal" data-target="#modal-edit<?= $r->range_jam ?>" class="btn btn-sm btn-flat btn-warning"> <i class="fa fa-edit"></i></button>
                                     <button type="button" data-toggle="modal" data-target="#modal-hapus<?= $r->range_jam ?>" class="btn btn-sm btn-flat btn-danger"> <i class="fa fa-trash"></i></button>
                                 </td>
                             </tr>
                         <?php } ?>

                     </table>
                 </div>
             <?php } ?>
         </div>
         <!-- /.box -->

         <?php foreach ($jam2 as $j) { ?>

             <?php if ($j->nama_hari == 'Senin') { ?>

                 <div class="box box-success">
                     <div class="box-header with-border">
                         <h3 class="box-title">Hari Senin</h3>

                         <div class="box-tools pull-right">
                             <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                 <i class="fa fa-minus"></i>
                             </button>
                             <!-- <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-setJam">
                         <i class="fa fa-plus"></i> Generate Jam
                     </button> -->
                         </div>
                     </div>
                     <div class="box-body">
                         <form id="formAturJadwal" action="<?= base_url('penjadwalan/update-act') ?>" method="post">
                             <div class="table-responsive">
                                 <table class="table table-bordered table-responsive">
                                     <tr>
                                         <th class="danger text-center" style="width: 7%;">Jam/Waktu</th>
                                         <!-- <input type="text" name="id_hari" value="1" class="form-control"> -->
                                         <?php foreach ($kelas as $k) { ?>
                                             <th class="danger text-center" style="width: 10%;"> KELAS <?= $k->nama ?>
                                                 <input type="hidden" name="id_kelas[]" value="<?= $k->id ?>" class="form-control">

                                             </th>
                                         <?php } ?>
                                         <th class="danger text-center">
                                             Action
                                         </th>
                                     </tr>

                                     <?php foreach ($jam1 as $ja) { ?>
                                         <tr>
                                             <td class="text-center"><?= $ja->range_jam ?>
                                                 <input type="text" name="id_jam[]" value="<?= $ja->id_jam ?>" class="form-control">
                                             </td>
                                             <?php foreach ($kelas as $k) { ?>
                                                 <td style="width: 10%;">
                                                     <select name="id_mapel[]" class="form-control select2" aria-hidden="true" style="width: 100%;">
                                                         <option value="">Pilih Mata Pelajaran</option>
                                                         <?php foreach ($mapel as $m) { ?>
                                                             <option value="<?= $m->id_mapel ?>"><?= $m->nama_mapel ?> Kelas <?= $m->kelas ?></option>
                                                         <?php } ?>
                                                     </select>
                                                     <!-- <button type="button" data-toggle="modal" data-target="#modal-addJadwal<?= $k->id ?>" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-edit"></i> Tambah Jadwal</button> -->
                                                 </td>
                                             <?php } ?>
                                             <td>
                                                 <button class="btn btn-sm btn-success btn-flat">Simpan</button>
                                             </td>
                                         </tr>
                                     <?php } ?>
                                 </table>
                             </div>
                             <div class="box-footer table-responsive">
                                 <button type="submit" class="btn btn-success btn-block btn-flat">Simpan Data</button>
                             </div>
                         </form>

                     </div>
                 </div>
             <?php } ?>

             <?php if ($j->nama_hari == 'Selasa') { ?>
                 <div class="box box-danger">
                     <div class="box-header with-border">
                         <h3 class="box-title">Hari Selasa</h3>

                         <div class="box-tools pull-right">
                             <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                 <i class="fa fa-minus"></i>
                             </button>
                             <!-- <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-setJam">
                         <i class="fa fa-plus"></i> Generate Jam
                     </button> -->
                         </div>
                     </div>
                     <div class="box-body">

                     </div>
                 </div>
             <?php } ?>


             <?php if ($j->nama_hari == 'Rabu') { ?>
                 <div class="box box-info">
                     <div class="box-header with-border">
                         <h3 class="box-title">Hari Rabu</h3>

                         <div class="box-tools pull-right">
                             <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                 <i class="fa fa-minus"></i>
                             </button>
                             <!-- <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-setJam">
                         <i class="fa fa-plus"></i> Generate Jam
                     </button> -->
                         </div>
                     </div>
                     <div class="box-body">
                     </div>
                 </div>
             <?php } ?>


             <?php if ($j->nama_hari == 'Kamis') { ?>
                 <div class="box box-primary">
                     <div class="box-header with-border">
                         <h3 class="box-title">Hari Kamis</h3>

                         <div class="box-tools pull-right">
                             <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                 <i class="fa fa-minus"></i>
                             </button>
                             <!-- <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-setJam">
                         <i class="fa fa-plus"></i> Generate Jam
                     </button> -->
                         </div>
                     </div>
                     <div class="box-body">
                     </div>
                 </div>
             <?php } ?>


             <?php if ($j->nama_hari == 'Jumat') { ?>
                 <div class="box box-secondary">
                     <div class="box-header with-border">
                         <h3 class="box-title">Hari Jumat</h3>

                         <div class="box-tools pull-right">
                             <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                 <i class="fa fa-minus"></i>
                             </button>
                             <!-- <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-setJam">
                         <i class="fa fa-plus"></i> Generate Jam
                     </button> -->
                         </div>
                     </div>
                     <div class="box-body">
                     </div>
                 </div>
             <?php } ?>

             <?php if ($j->nama_hari == 'Sabtu') { ?>
                 <div class="box box-warning">
                     <div class="box-header with-border">
                         <h3 class="box-title">Hari Sabtu</h3>

                         <div class="box-tools pull-right">
                             <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                 <i class="fa fa-minus"></i>
                             </button>
                             <!-- <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-setJam">
                         <i class="fa fa-plus"></i> Generate Jam
                     </button> -->
                         </div>
                     </div>
                     <div class="box-body">
                     </div>
                 </div>
             <?php } ?>

         <?php } ?>
     </section>
     <!-- /.content -->




     <div class="modal fade" id="modal-setJam">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Set Jam</h4>
                 </div>

                 <form action="<?= base_url('jam/act-set') ?>" method="post" class="form-horizontal">
                     <div class="box-body">

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Jam</label>
                             <div class="col-sm-8">
                                 <select name="range_jam" class="form-control" required>
                                     <option value="">Pilih Range Jam</option>
                                     <?php foreach ($jam as $r) { ?>
                                         <option value="<?= $r->range_jam ?>"><?= $r->range_jam ?></option>

                                     <?php } ?>

                                 </select>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Kelas</label>
                             <div class="col-sm-8">
                                 <?php
                                    $kls = ['I', 'II', 'III', 'IV', 'V', 'VI'];
                                    $kelas = $this->db->query("SELECT * FROM kelas")->result();
                                    foreach ($kelas as $valueKls) { ?>
                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" name="chkKelas[]" type="checkbox" id="<?= $valueKls->id ?>" value="<?= $valueKls->id ?>">
                                         <label class="form-check-label" for="<?= $valueKls->nama ?>">Kelas <?= $valueKls->nama ?></label>
                                     </div>
                                 <?php } ?>
                             </div>
                         </div>


                         <div class="form-group">
                             <label class="col-sm-4 control-label">Hari</label>
                             <div class="col-sm-8">
                                 <?php
                                    $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                    foreach ($hari as $valueHari) { ?>
                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" name="chkHari[]" type="checkbox" id="<?= $valueHari ?>" value="<?= $valueHari ?>">
                                         <label class="form-check-label" for="<?= $valueHari ?>"><?= $valueHari ?></label>
                                     </div>
                                 <?php } ?>
                                 <!-- <select name="nama_hari" class="form-control" required>
                                     <option value="">Pilih Hari</option>
                                     <option value="Senin">Senin</option>
                                     <option value="Selasa">Selasa</option>
                                     <option value="Rabu">Rabu</option>
                                     <option value="Kamis">Kamis</option>
                                     <option value="Jumat">Jumat</option>
                                     <option value="Sabtu">Sabtu</option>
                                 </select> -->
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