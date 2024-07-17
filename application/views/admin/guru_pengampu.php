 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <h1>Guru Pengampu</h1>
             <p>Data guru pengampu mata pelajaran terdaftar</p>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">

         <?php echo $this->session->flashdata('pesan') ?>

         <?php if (empty($kelas)) {
                echo '<div class="alert alert-danger alert-dismissible">';
                echo '<button type="button" class="close" data-dismiss="alert" ;aria-hidden="true">&times;</button>';
                echo '<h4><i class="icon fa fa-times-circle"></i> Maaf!</h4>';
                echo 'Data Kelas Belum Terisi';
                echo '</div>';
            }
            if (empty($guru)) {
                echo '<div class="alert alert-danger alert-dismissible">';
                echo '<button type="button" class="close" data-dismiss="alert" ;aria-hidden="true">&times;</button>';
                echo '<h4><i class="icon fa fa-times-circle"></i> Maaf!</h4>';
                echo 'Data Guru Belum Terisi';
                echo '</div>';
            }
            if (empty($mapel)) {
                echo '<div class="alert alert-danger alert-dismissible">';
                echo '<button type="button" class="close" data-dismiss="alert" ;aria-hidden="true">&times;</button>';
                echo '<h4><i class="icon fa fa-times-circle"></i> Maaf!</h4>';
                echo 'Data Mapel Belum Terisi';
                echo '</div>';
            }
            ?>

         <!-- input penugasan guru -->
         <?php if (!empty($kelas) && !empty($guru) && !empty($mapel)) : ?>

             <!-- Default box -->
             <div class="box box-primary">
                 <div class="box-header with-border">
                     <h3 class="box-title">Tambah Guru Pengampu</h3>

                     <div class="box-tools pull-right">
                         <button type="button" class="btn btn-box-tool" data-widget="collapse">
                             <i class="fa fa-minus"></i></button>
                     </div>
                 </div>
                 <div class="box-body">
                     <table class="table table-bordered table-striped table-hover">
                         <tr>
                             <th style="width: 5%;" class="bg-danger text-center">#</th>
                             <th class="bg-danger text-center" style="width: 70%;">Nama Mata Pelajaran</th>

                             <th style="width: 50%;" class="bg-danger">Action</th>
                         </tr>
                         <?php
                            $no = 1;
                            foreach ($mapel as $ValueListMapel) : ?>
                             <tr>
                                 <td><?= $no ?></td>
                                 <td><?= $ValueListMapel->nama_mapel ?></td>
                                 <td>
                                     <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#TugasGuru" data-kodemapel="<?= $ValueListMapel->kode_mapel ?>" data-mapel="<?= $ValueListMapel->nama_mapel ?>">Tambah Guru Pengajar</button> -->
                                     <a href="<?= base_url('guru-pengampu/create-pengampu/' . $ValueListMapel->kode_mapel) ?>"><button class="btn btn-sm btn-flat <?= ($ValueListMapel->jumlah_kosong == 0) ? 'btn-success' : 'btn-danger'; ?>">Lihat Guru Pengajar</button></a>
                                 </td>
                             </tr>
                         <?php
                                $no++;
                            endforeach; ?>
                     </table>
                 </div>
             </div>

         <?php endif; ?>

     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->