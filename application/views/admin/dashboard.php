<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <h1>Dashboard</h1>
            <p>Ringkasan informasi untuk Anda</p>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">


        <div class="text-center">
            <!-- <?php
                    $ta = $this->db->query("SELECT * FROM tahun_akademik")->result();

                    ?> -->

            <?php foreach ($ta as $t) { ?>
                <?php if ($t->status == 'Non Aktif') { ?>

                <?php } else { ?>
                    <div class='callout callout-danger'>
                        <h4>Semester <?= $t->status ?>
                            <hr style="border-top: 1.5px solid #FFFF;"><?= $t->tahun_akademik ?> <?= $t->tipe_semester ?>
                        </h4>
                    </div>
                <?php } ?>
            <?php } ?>

        </div>
        <!-- Info boxes -->

        <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-calendar-check-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Tanggal/Hari</span>
                <span class="info-box-number"><?= tanggal_indonesia_lengkap(date('Y-m-d')) ?></span>

                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                    Waktu Login :
                </span>
            </div>
        </div>
        <!-- /.info-box-content -->
        <?php if (
            $this->session->userdata('hak_akses') == '1'
        ) { ?>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                        <?php
                        $guru = $this->db->query("SELECT * FROM guru")->num_rows();;
                        ?>
                        <div class="info-box-content">
                            <span class="info-box-text">Guru/Pengajar</span>
                            <span class="info-box-number"><?= $guru; ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-file-text"></i></span>
                        <?php
                        $mapelku = $this->db->query("SELECT * FROM mapelku")->num_rows();;
                        ?>
                        <div class="info-box-content">
                            <span class="info-box-text">Mata Pelajaran</span>
                            <span class="info-box-number"><?= $mapelku ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-building"></i></span>
                        <?php
                        $kelasku = $this->db->query("SELECT * FROM kelasku")->num_rows();;
                        ?>
                        <div class="info-box-content">
                            <span class="info-box-text">Kelas</span>
                            <span class="info-box-number"><?= $kelasku ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Siswa</span>
                            <span class="info-box-number">#not ready</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->


            </div>


            <div class="row">
                <div class="col-md-7">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Pemberitahuan</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <p style="text-align: justify;">
                                        <b>#</b> Jadwal yang dibuat otomatis menggunakan sistem. Jadi tidak akan ada hari Libur pada jadwal yang telah digenerate/ploting.
                                    </p>
                                    </td>
                                </tr>
                                <tr>
                                    <p style="text-align: justify;"><b>#</b> Jika terdapat <b>Hari Libur/Cuti</b> sesuai dengan kalender Pemerintah maka pihak sekolah wajib mengikuti.
                                    </p>
                                    </td>
                                </tr>
                                <tr>
                                    <p style="text-align: justify;"><b>#</b> <b>SiJadwalTa</b> adalah sistem informasi penjadwalan mata pelajaran sebagai sarana penyampaian informasi terkait jadwal dan juga menunjang dalam proses pembuatan jadwal mata pelajaran.</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.col -->
                </div>

                <div class="col-md-5">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Pengguna/Guru Aktif
                                <?php if ($onlinetot == null) { ?>

                                <?php } else { ?>
                                    <span class="badge bg-info"><?php echo $onlinetot ?></span>
                                <?php } ?>
                            </h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <?php if ($online == null) { ?>
                            <div class="box-body">
                                <center>
                                    <img src="<?= base_url() ?>assets/img/nodata.svg" alt="" width="30%">
                                    <p class="mt-3">Tidak ada pengguna aktif</p>

                                </center>
                            </div>
                        <?php } else { ?>
                            <div class="box-body text-center">
                                <div class="tolltip" id="panelPrecios">
                                    <?php foreach ($online as $o) { ?>
                                        <img src="<?= base_url() ?>assets/user/guru1.png" class="img-circle img-foto-profil-pengguna" width="35" height="35" data-toggle="tooltip" title="<img src='<?= base_url() ?>assets/user/guru1.png' width='130' height='130'></img><br><span class='label label-success'><?= $o->nama; ?></span> <br>
                                <span class='label label-danger'>Guru</span><br><p></p>" />
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="text-center">
                                <i class="fa fa-info-circle"> </i> Silahkan sorot untuk melihat detail pengguna online
                            </div>
                            <br>
                        <?php } ?>

                    </div>
                </div>

            </div>

        <?php } ?>
        <!-- /.row -->


        <?php if (
            $this->session->userdata('hak_akses') == '2'
        ) { ?>


            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                        <?php
                        $guru = $this->db->query("SELECT * FROM guru")->num_rows();;
                        ?>
                        <div class="info-box-content">
                            <span class="info-box-text">Guru/Pengajar</span>
                            <span class="info-box-number"><?= $guru; ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-file-text"></i></span>
                        <?php
                        $mapelku = $this->db->query("SELECT * FROM mapelku")->num_rows();;
                        ?>
                        <div class="info-box-content">
                            <span class="info-box-text">Mata Pelajaran</span>
                            <span class="info-box-number"><?= $mapelku ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-building"></i></span>
                        <?php
                        $kelasku = $this->db->query("SELECT * FROM kelasku")->num_rows();;
                        ?>
                        <div class="info-box-content">
                            <span class="info-box-text">Kelas</span>
                            <span class="info-box-number"><?= $kelasku ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Siswa</span>
                            <span class="info-box-number">#not ready</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->


            </div>


            <div class="row">
                <div class="col-md-7">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Pemberitahuan</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <p style="text-align: justify;">
                                        <b>#</b> Jadwal yang dibuat otomatis menggunakan sistem. Jadi tidak akan ada hari Libur pada jadwal yang telah digenerate/ploting.
                                    </p>
                                    </td>
                                </tr>
                                <tr>
                                    <p style="text-align: justify;"><b>#</b> Jika terdapat <b>Hari Libur/Cuti</b> sesuai dengan kalender Pemerintah maka pihak sekolah wajib mengikuti.
                                    </p>
                                    </td>
                                </tr>
                                <tr>
                                    <p style="text-align: justify;"><b>#</b> <b>SiJadwalTa</b> adalah sistem informasi penjadwalan mata pelajaran sebagai sarana penyampaian informasi terkait jadwal dan juga menunjang dalam proses pembuatan jadwal mata pelajaran.</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.col -->
                </div>

                <div class="col-md-5">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Pengguna/Guru Aktif
                                <?php if ($onlinetot == null) { ?>

                                <?php } else { ?>
                                    <span class="badge bg-info"><?php echo $onlinetot ?></span>
                                <?php } ?>
                            </h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <?php if ($online == null) { ?>
                            <div class="box-body">
                                <center>
                                    <img src="<?= base_url() ?>assets/img/nodata.svg" alt="" width="30%">
                                    <p class="mt-3">Tidak ada pengguna aktif</p>

                                </center>
                            </div>
                        <?php } else { ?>
                            <div class="box-body text-center">
                                <div class="tolltip" id="panelPrecios">
                                    <?php foreach ($online as $o) { ?>
                                        <img src="<?= base_url() ?>assets/user/guru1.png" class="img-circle img-foto-profil-pengguna" width="35" height="35" data-toggle="tooltip" title="<img src='<?= base_url() ?>assets/user/guru1.png' width='130' height='130'></img><br><span class='label label-success'><?= $o->nama; ?></span> <br>
                                <span class='label label-danger'>Guru</span><br><p></p>" />
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="text-center">
                                <i class="fa fa-info-circle"> </i> Silahkan sorot untuk melihat detail pengguna online
                            </div>
                            <br>
                        <?php } ?>

                    </div>
                </div>

            </div>

        <?php } ?>



        <?php if (
            $this->session->userdata('hak_akses') == '3'
        ) { ?>


            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <div class="col-md-8">

                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Jadwal Mendatang</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php if ($mapelbsk == null) { ?>
                                <div class="callout callout-info text-danger">
                                    <h4><i class="mdi mdi-info-circle"></i> Info!</h4>
                                    <p>Tidak ada jadwal untuk hari ini.</p>
                                </div>
                            <?php } else { ?>
                                <ul class="timeline">
                                    <!-- timeline time label -->
                                    <li class="time-label">
                                        <span class="bg-red">
                                            <?php
                                            $tgl_bsk = date("Y-m-d", strtotime("+1 day"));

                                            $bsk = nama_hariku($tgl_bsk);
                                            ?>
                                            <?php echo $bsk ?>
                                            /
                                            <?php echo tanggal_indonesia($tgl_bsk) ?>
                                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-calendar bg-blue"></i>

                                        <div class="timeline-item">
                                            <span class="time"> <span class="label label-danger">Besok</span></span>
                                            <h3 class="timeline-header"><b>Jadwal Mengajar Bapak/Ibu:</b></h3>
                                            <div class="timeline-body">
                                                <ol>
                                                    <?php foreach ($mapelbsk as $m) { ?>
                                                        <li>Nama Kelas : <span class="label label-info">Kelas <?= $m->kelas ?>.<?= $m->urutan_kelas ?></span> <br>
                                                            Jam Mulai : <?= $m->jam_mulai ?> <br>
                                                            Jam Selesai : <?= $m->jam_selesai ?> <br>
                                                            Mata Pelajaran : <?= $m->nama_mapel ?></li>

                                                        <p>*******************</p>
                                                    <?php } ?>
                                                </ol>

                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            <?php } ?>
                        </div>
                        <!-- /.box-body -->
                    </div>

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Pemberitahuan</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table">
                                <tr>
                                    <p style="text-align: justify;">
                                        <b>#</b> Jadwal yang dibuat otomatis menggunakan sistem. Jadi tidak akan ada hari Libur pada jadwal yang telah digenerate/ploting.
                                    </p>
                                    </td>
                                </tr>
                                <tr>
                                    <p style="text-align: justify;"><b>#</b> Jika terdapat <b>Hari Libur/Cuti</b> sesuai dengan kalender Pemerintah maka pihak sekolah wajib mengikuti.
                                    </p>
                                    </td>
                                </tr>
                                <tr>
                                    <p style="text-align: justify;"><b>#</b> <b>SiJadwalTa</b> adalah sistem informasi penjadwalan mata pelajaran sebagai sarana penyampaian informasi terkait jadwal dan juga menunjang dalam proses pembuatan jadwal mata pelajaran.</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.col -->

                <div class="col-md-4">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Pengguna/Guru Aktif
                                <?php if ($onlinetot == null) { ?>

                                <?php } else { ?>
                                    <span class="badge bg-info"><?php echo $onlinetot ?></span>
                                <?php } ?>
                            </h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <?php if ($online == null) { ?>
                            <div class="box-body">
                                <center>
                                    <img src="<?= base_url() ?>assets/img/nodata.svg" alt="" width="30%">
                                    <p class="mt-3">Tidak ada pengguna aktif</p>

                                </center>
                            </div>
                        <?php } else { ?>
                            <div class="box-body text-center">
                                <div class="tolltip" id="panelPrecios">
                                    <?php foreach ($online as $o) { ?>
                                        <img src="<?= base_url() ?>assets/user/guru1.png" class="img-circle" width="35" height="35" data-toggle="tooltip" title="<img src='<?= base_url() ?>assets/user/guru1.png' width='130' height='130'></img><br><span class='label label-success'><?= $o->nama; ?></span> <br>
                                <span class='label label-danger'>Guru</span><br><p></p>" />
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="text-center">
                                <i class="fa fa-info-circle"> </i> Silahkan sorot untuk melihat detail pengguna online
                            </div>
                            <br>
                        <?php } ?>

                    </div>
                </div>
                <!-- /.col -->






            </div>
            <!-- /.row -->




        <?php } ?>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->