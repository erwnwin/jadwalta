 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <h1>Penjadwalan</h1>
             <p>Proses penjadwalan mata pelajaran</p>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">

         <?php echo $this->session->flashdata('pesan') ?>

         <!-- Default box -->
         <div class="box box-danger">
             <div class="box-header with-border">
                 <h3 class="box-title">Atur Penjadwalan</h3>

                 <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Tutup">
                         <i class="fa fa-minus"></i></button>

                 </div>
             </div>
             <div class="box-body">
                 <form id="formPenjadwalan" action="<?= base_url('penjadwalan') ?>" method="post">
                     <div class="input-group">
                         <div class="input-group-addon">
                             <i class="fa fa-search"></i>
                         </div>
                         <select name="btnTahunAkademik" id="btnTahunAkademik" class="form-control select2 select2-hidden-accessible" aria-hidden="true" style="width: 100%;">
                             <option value="">Pilih Tahun Akademik</option>
                             <?php foreach ($ta as $t) {  ?>
                                 <option value="<?= $t->id_ta ?>" <?php if ($this->input->post('btnTahunAkademik') == $t->id_ta) {
                                                                        echo 'selected="selected"';
                                                                    } ?>>
                                     <?= $t->tahun_akademik ?> | <?= $t->tipe_semester ?></option>
                             <?php } ?>
                         </select>
                     </div>
                 </form>

             </div>
             <?php if (isset($_POST["btnTahunAkademik"])) {

                    $jadwal = $this->db->query("SELECT * FROM jadwal_plan 
                    JOIN tahun_akademik ON jadwal_plan.id_ta=tahun_akademik.id_ta
                    WHERE jadwal_plan.id_ta='$_POST[btnTahunAkademik]' ")->result(); ?>

                 <?php foreach ($jadwal as $j) {  ?>
                     <div class="box-footer table-responsive">
                         <table class="table table-bordered table-hover">
                             <tr>
                                 <th class="success" style="width: 40%;">Tahun Akademik</th>
                                 <td><?= $j->tahun_akademik ?> | <?= $j->tipe_semester ?></td>
                             </tr>
                             <tr>
                                 <th class="success">Tanggal Mulai</th>
                                 <td><?php echo tanggal_indonesia($j->tgl_mulai) ?></td>
                             </tr>
                             <tr>
                                 <th class="success">Tanggal Akhir</th>
                                 <td><?php echo tanggal_indonesia($j->tgl_akhir) ?></td>
                             </tr>
                             <tr>
                                 <th class="success">Status</th>
                                 <td><?= $j->status ?></td>
                             </tr>
                         </table>
                     </div>
                 <?php } ?>
             <?php } ?>

             <div id="divOverlayFormPenjadwalan" class="overlay hide">
                 <i class="fa fa-refresh fa-spin"></i>
             </div>

         </div>
         <!-- /.box -->
         <?php if (isset($_POST["btnTahunAkademik"])) {

                $jadwal = $this->db->query("SELECT * FROM jadwal_plan
             JOIN tahun_akademik ON jadwal_plan.id_ta=tahun_akademik.id_ta
             WHERE jadwal_plan.id_ta='$_POST[btnTahunAkademik]' ")->result(); ?>

             <?php foreach ($jadwal as $j) {  ?>
                 <!-- Default box -->
                 <div class="box box-success">
                     <div class="box-header with-border">
                         <h3 class="box-title"> Buat Jadwal - Tahun Akademik <?= $j->tahun_akademik ?></h3>

                         <div class="box-tools pull-right">
                             <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Tutup">
                                 <i class="fa fa-minus"></i></button> -->
                             <button type="button" data-toggle="modal" data-target="#modal-addBuat" class="btn btn-flat btn-sm btn-success"><i class="fa fa-edit"></i> Buat Jadwal</button>

                         </div>
                     </div>
                     <div class="box-body">

                         <div class="row">
                             <?php foreach ($hari as $h) { ?>
                                 <div class="ml-2 mr-2">
                                     <div class="col-md-12">
                                         <div class="panel box box-info">
                                             <div class="box-header with-border">
                                                 <h4 class="box-title">
                                                     <a data-toggle="collapse" data-parent="#accordion" href="#buatJadwalHari<?= $h->nama ?>">
                                                         <i class="fa fa-calendar"></i> <?= $h->nama ?>
                                                     </a>
                                                 </h4>
                                             </div>
                                             <div id="buatJadwalHari<?= $h->nama ?>" class="panel-collapse collapse">
                                                 <div class="box-body">
                                                     <div class="table-responsive">

                                                         <table class="table table-bordered">
                                                             <tr>
                                                                 <th class="danger" style="width: 30%;">Jam/Waktu</th>

                                                                 <?php foreach ($kelas as $k) { ?>
                                                                     <th class="danger" style="width: 35%;"><?= $k->nama ?></th>
                                                                 <?php } ?>
                                                             </tr>

                                                             <?php foreach ($jam as $ja) { ?>
                                                                 <tr>
                                                                     <td><?= $ja->range_jam ?></td>
                                                                     <?php foreach ($jadwal as $j) {  ?>
                                                                         <?php foreach ($kelas as $k) { ?>
                                                                             <td>
                                                                                 <?php if ($j->id_kelas !== $k->id and $j->id_mapel == 0) { ?>
                                                                                     <button type="button" data-toggle="modal" data-target="#modal-addJadwal<?= $k->id ?>" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-edit"></i> Tambah Jadwal</button>
                                                                                 <?php } ?>

                                                                             </td>
                                                                         <?php } ?>
                                                                     <?php } ?>

                                                                 </tr>
                                                             <?php } ?>

                                                         </table>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <!-- ./col -->
                             <?php } ?>

                         </div>
                         <!-- /.row -->

                         <button type="submit" class="btn btn-success btn-flat btn-block"><i class="fa fa-check"></i> Publikasi Jadwal Fix</button>
                         <button type="submit" class="btn btn-danger btn-flat btn-block"><i class="fa fa-undo"></i> Batal Publikasi Jadwal Fix</button>
                     </div>
                 </div>
             <?php } ?>
         <?php } ?>

     </section>
     <!-- /.content -->

     <?php if (isset($_POST["btnTahunAkademik"])) {

            $jadwal = $this->db->query("SELECT * FROM jadwal_plan
JOIN tahun_akademik ON jadwal_plan.id_ta=tahun_akademik.id_ta
WHERE jadwal_plan.id_ta='$_POST[btnTahunAkademik]' ")->result(); ?>

         <?php foreach ($jadwal as $j) {  ?>
             <div class="modal fade" id="modal-addBuat">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span></button>
                             <h4 class="modal-title">Buat Data Jadwal Terbaru Tahun Akademik <?= $j->tahun_akademik ?></h4>
                         </div>

                         <form action="<?= base_url('penjadwalan/act-update-plan') ?>" method="post" class="form-horizontal">
                             <div class="box-body">
                                 <div class="form-group">
                                     <label class="col-sm-4 control-label">Tahun Akademik</label>
                                     <div class="col-sm-8">
                                         <?php foreach ($hari as $h) { ?>
                                             <input type="hidden" name="id_hari[]" class="form-control" maxlength="11" required="required" value="<?= $h->id ?>" placeholder="Range Jam" autocomplete="off" />
                                         <?php } ?>
                                         <input type="hidden" name="id_ta" class="form-control" required="required" value="<?= $j->id_ta ?>" placeholder="Nama/Kode Ruangan" />

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
         <?php } ?>
     <?php } ?>



     <?php foreach ($kelas as $k) { ?>
         <div class="modal fade" id="modal-addJadwal<?= $k->id ?>">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title">Updat Data Jam</h4>
                     </div>

                     <form action="<?= base_url('jam/act-update') ?>" method="post" class="form-horizontal">
                         <div class="box-body">
                             <div class="form-group">
                                 <label class="col-sm-4 control-label">Range Jam</label>
                                 <div class="col-sm-8">
                                     <input type="text" name="range_jam" class="form-control" maxlength="11" required="required" value="" placeholder="Range Jam" autocomplete="off" />
                                     <input type="hidden" name="id" class="form-control" required="required" value="<?= $k->id ?>" placeholder="Nama/Kode Ruangan" />
                                     <small class="text-danger"><strong>*Format penulisan : 08:00-09:00</strong></small>
                                 </div>
                             </div>

                             <div class="form-group">
                                 <label class="col-sm-4 control-label">Keterangan</label>
                                 <div class="col-sm-8">
                                     <select name="waktu_shalat" class="form-control">
                                         <option value="">Pilih Keterangan</option>
                                         <option value="Istirahat">Istirahat</option>
                                         <option value="Shalat">Shalat</option>
                                     </select>
                                     <small class="text-danger"><strong>*Boleh dikosongkan jika tidak ada keterangan</strong></small>
                                 </div>
                             </div>

                             <!-- <div class="form-group">
                                 <label class="col-sm-4 control-label">Angkatan</label>
                                 <div class="col-sm-8">
                                     <input type="text" name="tahun_angkatan" class="form-control" required="required" value="" maxlength="4" placeholder="Tahun Angkatan" autocomplete="off" />
                                 </div>
                             </div> -->
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