 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <h1>Data Jadwal Saya </h1>
             <p>Ringkasan informasi jadwal mata pelajaran untuk anda</p>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">

         <!-- Default box -->
         <div class="box box-info">
             <div class="box-header with-border">
                 <h3 class="box-title">Daftar Jadwal Mengajar Saya : <?= $this->session->userdata('nama') ?></h3>


                 <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                         <i class="fa fa-minus"></i></button>

                 </div>
             </div>
             <div class="box-body">
                 <?php

                    $id_guru = $this->session->userdata('id_guru');

                    $jadwalku = $this->db->query("SELECT * FROM penjadwalan
                   JOIN mapelku ON penjadwalan.id_mapel=mapelku.id_mapel
                   JOIN guru ON penjadwalan.id_guru=guru.id_guru
                   JOIN kelasku ON penjadwalan.id_kelas=kelasku.id_kelas
                   WHERE penjadwalan.id_guru='$id_guru' ")->result();

                    if ($jadwalku == null) { ?>
                     <center>
                         <img src="<?= base_url() ?>assets/img/nodata.svg" alt="" width="30%">
                         <p class="mt-3">Tidak ada data</p>
                     </center>
                 <?php } else { ?>

                     <form id="formJadwalku" action="<?= base_url('jadwalku') ?>" method="post">
                         <div class="input-group">
                             <div class="input-group-addon">
                                 <i class="fa fa-search"></i>
                             </div>
                             <select name="btnPilihJadwal" id="btnPilihJadwal" class="form-control select2 select2-hidden-accessible" aria-hidden="true" style="width: 100%;">
                                 <option value="">Pilih Hari</option>
                                 <?php foreach ($hari as $h) {  ?>
                                     <option value="<?= $h->nama_hari ?>" <?php if ($this->input->post('btnPilihJadwal') == $h->nama_hari) {
                                                                                echo 'selected="selected"';
                                                                            } ?>>
                                         <?= $h->nama_hari ?></option>
                                 <?php } ?>
                             </select>
                         </div>
                     </form>

             </div>
             <?php if (isset($_POST["btnPilihJadwal"])) {

                            $id_guru = $this->session->userdata('id_guru');

                            $jadwalkuu = $this->db->query("SELECT * FROM penjadwalan
                            JOIN mapelku ON penjadwalan.id_mapel=mapelku.id_mapel
                            JOIN guru ON penjadwalan.id_guru=guru.id_guru
                            JOIN kelasku ON penjadwalan.id_kelas=kelasku.id_kelas
                            WHERE penjadwalan.hari='$_POST[btnPilihJadwal]' AND penjadwalan.id_guru='$id_guru' ")->result(); ?>

                 <div class="box-footer table-responsive">

                     <?php if ($jadwalkuu == null) { ?>

                         <div class="callout callout-danger">
                             <h4>Maaf!</h4>
                             <p>Tidak ada data jadwal yang cocok untuk hari yang dipilih</p>
                         </div>

                     <?php } else { ?>
                         <!-- <p>Hari : <?= $_POST["btnPilihJadwal"] ?></p> -->
                         <div class="table-responsive">
                             <table class="table table-bordered table-striped table-hover">
                                 <tr>
                                     <th style="width: 10px" class="bg-danger text-center">#</th>
                                     <th style="width: 150px" class="bg-danger text-center">Kode Mata Pelajaran</th>
                                     <th style="width: 270px" class="bg-danger text-center">Mata Pelajaran</th>
                                     <th style="width: 100px" class="bg-danger text-center">Kelas</th>
                                     <th style="width: 30px" class="bg-danger text-center">Sesi</th>
                                     <th style="width: 100px" class="bg-danger text-center">Hari</th>
                                     <th style="width: 250px" class="bg-danger text-center">Jam Mulai s.d Jam Selesai</th>
                                 </tr>
                                 <?php $no = 1;
                                    $tgl = date('Y-m-d');
                                    $hari = nama_hariku($tgl);
                                    // $hari = "Senin";
                                    // echo "$hari";
                                    foreach ($jadwalkuu as $j) { ?>
                                     <tr>
                                         <td class="text-center"><?= $no++ ?></td>
                                         <td class="text-center"><?= $j->kode_mapel ?></td>
                                         <td class="text-center"><?= $j->nama_mapel ?></td>
                                         <td class="text-center">Kelas <?= $j->kelas ?>.<?= $j->urutan_kelas ?></td>
                                         <td class="text-center"><?= $j->sesi ?></td>
                                         <td class="text-center"><?= $j->hari ?>
                                             <?php if ($j->hari == $hari) { ?>
                                                 <span class="label label-danger">Hari Ini</span>
                                             <?php } else { ?>

                                             <?php } ?>
                                         </td>
                                         <td class="text-center"><?= $j->jam_mulai ?> s.d <?= $j->jam_selesai ?></td>
                                     </tr>
                                 <?php } ?>
                             </table>
                         </div>
                     <?php } ?>
                 </div>
             <?php } ?>
         <?php } ?>


         <div id="divOverlayformJadwalku" class="overlay hide">
             <i class="fa fa-refresh fa-spin"></i>
         </div>

         </div>
         <!-- /.box -->

     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->