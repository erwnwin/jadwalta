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

         <div class="box box-warning collapsed-box">
             <div class="box-header with-border">
                 <h3 class="box-title">Create Range Jam</h3>

                 <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse">
                         <i class="fa fa-plus"></i></button>

                 </div>
             </div>
             <div class="box-body">
                 <form action="<?= base_url() ?>jam/act-add" method="post" class="form-horizontal">
                     <div class="form-group">
                         <label class="col-sm-4 control-label">Hari</label>
                         <div class="col-sm-8">

                             <?php
                                $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
                                foreach ($hari as $value) {
                                    $checked = '';
                                    if (in_array($value, array_column($range_jam, 'hari'))) {
                                        $checked = 'disabled checked';
                                    }
                                ?>
                                 <div class="form-check form-check-inline">
                                     <input class="form-check-input flat-red" name="chkJadwalHari[]" type="checkbox" id="<?= $value ?>" value="<?= $value ?>" <?= $checked ?>>
                                     <label class="form-check-label" for="<?= $value ?>"><?= $value ?></label>
                                 </div>
                             <?php } ?>
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="col-sm-4 control-label">Sesi Per Hari</label>
                         <div class="col-sm-8">
                             <input type="number" class="form-control" required="required" name="sesi" id="sesi" min="5" max="20" placeholder="Minimal input 5" autocomplete="off" />
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="col-sm-4 control-label">Waktu Per Sesi</label>
                         <div class="col-sm-8">
                             <input type="number" name="durasi" id="durasi" min="10" max="60" class="form-control" required="required" value="" placeholder="Minimal input 10" autocomplete="off" />
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="col-sm-4 control-label">Sesi Dimulai</label>
                         <div class="col-sm-8">
                             <input type="time" name="waktuMulai" id="waktuMulai" class="form-control" required="required" value="" placeholder="Minimal input 10" autocomplete="off" />
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="col-sm-4 control-label"></label>
                         <div class="col-sm-8">
                             <button type="submit" class="btn btn-sm btn-flat btn-success"><i class="fa fa-save"></i> Simpan</button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>



         <!-- Default box -->
         <div class="box box-success">
             <?php if ($range_jam == null) { ?>
                 <div class="box-header with-border">
                     <h3 class="box-title">Data Range Jam</h3>

                     <div class="box-tools pull-right">
                         <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                         <i class="fa fa-minus"></i>
                     </button> -->
                         <!-- <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-setJam">
                             <i class="fa fa-plus"></i> Generate Jam
                         </button> -->
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
                     <h3 class="box-title">Data Range Jame</h3>

                     <div class="box-tools pull-right">
                         <!-- <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-setJam">
                             <i class="fa fa-plus"></i> Generate Jam
                         </button> -->
                     </div>
                 </div>
                 <div class="box-body">
                     <table class="table table-bordered table-striped table-hover">
                         <tr>
                             <th style="width: 10px" class="bg-danger text-center">#</th>
                             <th class="bg-danger text-center">Hari</th>
                             <th class="bg-danger text-center">Sesi Per Hari</th>
                             <th class="bg-danger text-center">Durasi Per Sesi</th>
                             <th class="bg-danger text-center">Jam Dimulai</th>
                             <th style="width: 90px" class="bg-danger text-center">Action</th>
                         </tr>
                         <?php $no = 1;
                            foreach ($range_jam as $r) { ?>
                             <tr>
                                 <td class="text-center"><?= $no++ ?></td>
                                 <td class="text-center"><?= $r->hari ?></td>
                                 <td class="text-center"><?= $r->jumlah_sesi ?></td>
                                 <td class="text-center"><?= $r->lama_sesi ?></td>
                                 <td class="text-center"><?= $r->jam_mulai ?></td>
                                 <td class="text-center">
                                     <!-- <button type=" button" data-toggle="modal" data-target="#modal-edit<?= $r->range_jam ?>" class="btn btn-sm btn-flat btn-warning"> <i class="fa fa-edit"></i></button> -->
                                     <button type="button" data-toggle="modal" data-target="#modal-hapus<?= $r->id_jadwal ?>" class="btn btn-sm btn-flat btn-danger"> <i class="fa fa-trash"></i></button>
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
                                    $kelas = $this->db->query("SELECT * FROM kelasku")->result();
                                    foreach ($kelas as $valueKls) { ?>
                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" name="chkKelas[]" type="checkbox" id="<?= $valueKls->id_kelas ?>" value="<?= $valueKls->id_kelas ?>">
                                         <label class="form-check-label" for="<?= $valueKls->kelas ?>">Kelas <?= $valueKls->kelas ?></label>
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