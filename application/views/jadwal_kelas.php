<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <h1>Jadwal Kelas</h1>
                <!-- <p>Example 2.0</p> -->
            </h1>
            <ol class="breadcrumb">
                <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Layout</a></li> -->
                <li class="active">Sistem Informasi Penjadwalan Mata Pelajaran</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="text-center">
                <?php
                $ta = $this->db->query("SELECT * FROM tahun_akademik
                        WHERE status='Aktif'")->result();

                ?>
                <div class='callout callout-success'>
                    <?php foreach ($ta as $t) { ?>
                        <h4>Semester <?= $t->status ?>
                            <hr style="border-top: 1.5px solid #FFFF;"><?= $t->tahun_akademik ?> <?= $t->tipe_semester ?>
                        </h4>
                    <?php } ?>
                </div>
            </div>

            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Pilih Kelas</h3>
                </div>
                <div class="box-body">
                    <form id="formJadwal" action="<?= base_url('jadwal-kelas') ?>" method="post">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-search"></i>
                            </div>
                            <select name="btnJadwal" id="btnJadwal" class="form-control select2" style="width: 100%;">
                                <option value="">Pilih Kelas</option>
                                <?php foreach ($kelas as $k) { ?>
                                    <option value="<?= $k->id_kelas ?>" <?php if ($this->input->post('btnJadwal') == $k->id_kelas) {
                                                                            echo 'selected="selected"';
                                                                        } ?>> Kelas <?= $k->kelas ?> <?= $k->urutan_kelas ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </form>
                </div>
                <!-- tekan select -->

                <?php if (isset($_POST["btnJadwal"])) {

                    $jadwalkuu = $this->db->query("SELECT * FROM penjadwalan
                        JOIN mapelku ON penjadwalan.id_mapel=mapelku.id_mapel
                        JOIN guru ON penjadwalan.id_guru=guru.id_guru
                        JOIN kelasku ON penjadwalan.id_kelas=kelasku.id_kelas
                        WHERE penjadwalan.id_kelas='$_POST[btnJadwal]'")->result(); ?>

                    <?php if ($jadwalkuu == null) { ?>

                    <?php } else { ?>
                        <div class="box-footer table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th class="info" style="width: 40%;">Kelas</th>
                                    <td>#<?= $_POST['btnJadwal'] ?></td>
                                </tr>
                                <tr>
                                    <th class="info">Hari Pelaksanaan</th>
                                    <td>#Semua Hari</td>
                                </tr>
                                <tr>
                                    <th class="info">Guru Mata Pelajaran</th>
                                    <td>#Semua Guru</td>
                                </tr>

                            </table>
                        </div>


                    <?php } ?>
                <?php } ?>

                <div id="divOverlayformJadwal" class="overlay hide">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>

            </div>



            <?php if (isset($_POST["btnJadwal"])) {

                $jadwalkuu = $this->db->query("SELECT * FROM penjadwalan
                    JOIN mapelku ON penjadwalan.id_mapel=mapelku.id_mapel
                    JOIN guru ON penjadwalan.id_guru=guru.id_guru
                    JOIN kelasku ON penjadwalan.id_kelas=kelasku.id_kelas
                    WHERE penjadwalan.id_kelas='$_POST[btnJadwal]'")->result(); ?>

                <?php if ($jadwalkuu == null) { ?>

                <?php } else { ?>

                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Jadwal Mata Pelajaran : <span class="label label-info"><?= $_POST['btnJadwal'] ?></span></h3>
                        </div>
                        <div class="box-body">


                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <tr>
                                        <th style="width: 10px" class="bg-danger text-center">#</th>
                                        <!-- <th style="width: 120px" class="bg-danger text-center">Kode Mata Pelajaran</th> -->
                                        <th style="width: 250px" class="bg-danger text-center">Mata Pelajaran</th>
                                        <th style="width: 80px" class="bg-danger text-center">Kelas</th>
                                        <th style="width: 150px" class="bg-danger text-center">Guru Pengajar</th>
                                        <th style="width: 100px" class="bg-danger text-center">Hari</th>
                                        <th style="width: 250px" class="bg-danger text-center">Jam Mulai s.d Jam Selesai</th>
                                    </tr>

                                    <?php $no = 1;
                                    $tgl = date('Y-m-d');
                                    // $bsk = date("Y-m-d", strtotime("+1 day"));
                                    $hari = nama_hariku($tgl);
                                    // $hari = "Senin";
                                    // echo "$hari";
                                    foreach ($jadwalkuu as $j) { ?>

                                        <tr <?php if ($j->hari == $hari) {
                                                echo "class='success'";
                                            } ?>>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <!-- <td class="text-center"><?= $j->kode_mapel ?></td> -->
                                            <td class="text-center"><?= $j->nama_mapel ?></td>
                                            <td class="text-center">Kelas <?= $j->kelas ?>.<?= $j->urutan_kelas ?></td>
                                            <td class="text-center" id="panelPrecios"> <a data-toggle="tooltip" style="background-color: aliceblue;" title="<br><img src='<?= base_url() ?>assets/template_admin/img/userk.jpg' width='100%'></img><br>
                        <br><span class='label label-warning'>Nama Guru : <?= $j->nama ?></span><br><span class='label label-info'>Guru : <?= $j->nama_mapel ?></span><br><span class='label label-danger'>Nomor HP/WA : <?= $j->telp_wa ?></span><br><span></span>">
                                                    <b><?= $j->nama ?></b>
                                                </a>
                                                <!-- <a type="button"><?= $j->nama ?></a> -->
                                            </td>
                                            <td class="text-center"><?= $j->hari ?>
                                                <?php if ($j->hari == $hari) { ?>
                                                    <span class="label label-danger">Hari Ini</span>
                                                <?php } else { ?>

                                                <?php } ?>
                                            </td>
                                            <td class="text-center"><?= $j->jam_mulai ?> s/d <?= $j->jam_selesai ?></td>
                                        </tr>
                                    <?php } ?>

                                </table>
                            </div>

                            <div class="text-center">
                                <i class="fa fa-info-circle"> </i> Silahkan sorot nama guru untuk melihat nomor HP/WA Guru Pengajar
                            </div>



                        </div>
                    </div>

                <?php } ?>
            <?php } ?>

        </section>
        <!-- /.content -->


    </div>
    <!-- /.container -->
</div>
<!-- /.content-wrapper -->