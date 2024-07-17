 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <h1>Create Penjadwalan</h1>
             <p>Proses penjadwalan mata pelajaran</p>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">

         <?php echo $this->session->flashdata('pesan') ?>
         <?php

            $id_ta = $this->input->post('id_ta');
            $jadwal = $this->db->query("SELECT DISTINCT set_jadwal.id_ta FROM set_jadwal
                JOIN tahun_akademik ON set_jadwal.id_ta=tahun_akademik.id_ta
                JOIN hari ON set_jadwal.id_hari=hari.id_hari
                WHERE set_jadwal.id_ta='$id_ta'")->result();

            $ta = $this->db->query("SELECT * FROM tahun_akademik
            WHERE id_ta='$id_ta'")->result();
            ?>


         <!-- Default box -->

         <div class="box box-warning">
             <div class="box-header with-border">

                 <h3 class="box-title"> Jadwal Untuk Semua Kelas </h3>

                 <div class="box-tools pull-right">
                     <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Tutup">
                 <i class="fa fa-minus"></i></button> -->
                     <a href="<?= base_url('penjadwalan') ?>" class="btn btn-sm btn-default btn-flat"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a>
                     <?php foreach ($ta as $j) { ?>
                         <button type="button" data-toggle="modal" data-target="#modal-addBuat<?= $j->id_ta ?>" class="btn btn-flat btn-sm btn-success"><i class="fa fa-plus"></i> Buat Jadwal</button>
                     <?php } ?>


                     <!-- <button type="button" data-toggle="modal" data-target="#modal-addBuat" class="btn btn-flat btn-sm btn-success"><i class="fa fa-edit"></i> Buat Jadwal</button> -->

                 </div>
             </div>
             <div class="box-body">

                 <div class="table-responsvie">
                     <table class="table table-bordered table-striped table-hover">
                         <tr>
                             <th style="width: 10px" class="bg-success">#</th>
                             <th style="width: 200px" class="bg-success">Kode Mata Pelajaran</th>
                             <th style="width: 500px" class="bg-success">Nama Mata Pelajaran</th>
                             <th style="width: 300px" class="bg-success">Semester</th>
                             <th style="width: 50px" class="bg-success">JP</th>

                             <th style="width: 100px" class="bg-success">Action</th>
                         </tr>
                     </table>
                 </div>
             </div>
         </div>

     </section>
     <!-- /.content -->




     <div class="modal fade" id="modal-addBuat<?= $this->input->post('id_ta') ?>">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Buat Data Jadwal Terbaru</h4>
                 </div>

                 <!-- <form action="<?= base_url('penjadwalan/act-update-plan') ?>" method="post" class="form-horizontal">
                         <div class="box-body">
                             <div class="form-group">
                                 <center>
                                     <p>Membuat Jadwal untuk Tahun Akademik</p>
                                 </center>
                                 <div class="col-sm-8">
                                     <input type="hidden" name="id_ta" class="form-control" required="required" value="<?= $j->id_ta ?>" placeholder="Nama/Kode Ruangan" />
                                     <?php foreach ($hari as $h) { ?>
                                         <input type="hidden" name="id_hari[]" class="form-control" required="required" value="<?= $h->id_hari ?>" placeholder="Range Jam" autocomplete="off" />
                                     <?php } ?>
                                 </div>
                             </div>
                         </div>
                         <div class="box-footer">
                             <button name="cmdSimpanPerguruanTinggiAsalMahasiswa" id="cmdSimpanPerguruanTinggiAsalMahasiswa" class="btn btn-flat btn-success pull-left" value="SimpanPerguruanTinggiAsalMahasiswa"><i class="fa fa-save"></i> Simpan</button>
                             <button type="button" class="btn btn-flat btn-default pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                         </div>
                     </form> -->
                 <form action="<?= base_url('penjadwalan/act-plan') ?>" method="post" class="form-horizontal">
                     <div class="box-body">
                         <div class="form-group">
                             <label class="col-sm-4 control-label">Hari</label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" name="id_ta" value="<?= $this->input->post('id_ta') ?>">
                                 <select name="id_hari" class="form-control select2" style="width: 100%;" required>
                                     <option value="">Pilih Hari</option>
                                     <?php
                                        $hari = $this->db->query("SELECT * FROM hari")->result();
                                        foreach ($hari as $valueHari) { ?>
                                         <option value="<?= $valueHari->id_hari ?>"><?= $valueHari->nama_hari ?></option>
                                     <?php } ?>
                                 </select>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Nama Mata Pelajaran</label>
                             <div class="col-sm-8">
                                 <select name="id_mapel" class="form-control select2" style="width: 100%;" required>
                                     <option value="">Pilih Mata Pelajaran</option>
                                     <?php foreach ($mapel as $m) { ?>
                                         <option value="<?= $m->id_mapel ?>"><?= $m->nama_mapel ?> Kelas <?= $m->kelas ?></option>
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
                                         <label class="form-check-label" for="<?= $valueKls->id ?>">Kelas <?= $valueKls->nama ?></label>
                                     </div>
                                 <?php } ?>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Sesi Waktu/ Jam Mengajar</label>
                             <div class="col-sm-8">
                                 <?php
                                    $jam = $this->db->query("SELECT * FROM jam")->result();
                                    foreach ($jam as $valueJam) { ?>
                                     <div class="form-check form-check-inline">
                                         <input class="form-check-input" name="chkJam[]" type="checkbox" id="<?= $valueJam->range_jam ?>" value="<?= $valueJam->id ?>">
                                         <label class="form-check-label" for="<?= $valueJam->range_jam ?>">Jam/Sesi : <?= $valueJam->range_jam ?></label>
                                     </div>
                                 <?php } ?>

                             </div>
                         </div>

                         <!-- <div class="form-group">
                                 <label class="col-sm-4 control-label">Beban Jam</label>
                                 <div class="col-sm-8">
                                     <input type="text" name="beban_jam" class="form-control" maxlength="2" required="required" value="" placeholder="Beban Jam" autocomplete="off" />
                                 </div>
                             </div> -->
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