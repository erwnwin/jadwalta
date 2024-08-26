<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <h1>Home</h1>
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



            <div class="box box-solid">
                <!-- <div class="box-header with-border">
                    <h3 class="box-title">Carousel</h3>
                </div> -->
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="<?= base_url() ?>assets/img/slider-3.jpg" alt="Photo">
                                <!-- <div class="carousel-caption">
                                    First Slide
                                </div> -->
                            </div>
                            <div class="item">
                                <img src="<?= base_url() ?>assets/img/slider-2.jpg" alt="Photo">

                            </div>
                            <div class="item">
                                <img src="<?= base_url() ?>assets/img/slider-1.jpg" alt="Photo">

                            </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="fa fa-angle-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="fa fa-angle-right"></span>
                        </a>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


            <div class="callout callout-danger">
                <h4>Selamat Datang!</h4>
                <p>Pada sistem penjadwalan mata pelajaran yang dinamakan <b>SiJadwalTa</b>.</p>
            </div>


            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->

                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li><a>Pengunjung Hari ini <span class="pull-right badge bg-red" data-toggle="tooltip" title="<?php echo $pengunjunghariini ?> Orang"><?php echo $pengunjunghariini ?></span> </a></li>
                        <!-- <li><a>Pengunjung Online <span class="pull-right badge bg-aqua" data-toggle="tooltip" title="<?php echo $pengunjungonline ?> Orang"><?php echo $pengunjungonline ?></span></a></li> -->
                        <li class="bg-danger"><a>Total Akses Pengunjung Keseluruhan <span class="pull-right badge bg-green" data-toggle="tooltip" title="<?php echo $totalpengunjung ?> Orang"><?php echo $totalpengunjung ?></span></a></li>

                    </ul>
                </div>
            </div>

            <!-- <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Blank Box</h3>
                </div>
                <div class="box-body">
                    The great content goes here
                </div>
            </div>
             -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.container -->
</div>
<!-- /.content-wrapper -->