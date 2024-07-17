 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <h1>Data Mata Pelajaran yang diampuh</h1>
             <p>Ringkasan informasi mata pelajaran yang diampuh</p>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">

         <!-- Default box -->
         <div class="box box-danger">
             <div class="box-header with-border">
                 <h3 class="box-title">Daftar Mata Pelajaran yang diampuh/diajarkan</h3>

                 <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip">
                         <i class="fa fa-minus"></i></button>

                 </div>
             </div>
             <div class="box-body">

                 <?php if ($mapelku == null) { ?>
                     <center>
                         <img src="<?= base_url() ?>assets/img/nodata.svg" alt="" width="30%">
                         <p class="mt-3">Tidak ada data</p>
                     </center>
                 <?php } else { ?>

                     <table class="table table-bordered table-striped table-hover">
                         <tr>
                             <th style="width: 10px" class="info text-center">#</th>
                             <th style="width: 150px" class="info text-center">Kode Mata Pelajaran</th>
                             <th style="width: 300px" class="info text-center">Mata Pelajaran</th>
                             <th style="width: 100px" class="info text-center">Kelas Yang Diajarkan</th>
                         </tr>
                         <?php $no = 1;

                            foreach ($mapelku as $m) { ?>
                             <tr>
                                 <td class="text-center"><?= $no++ ?></td>
                                 <td class="text-center"><?= $m->kode_mapel ?></td>
                                 <td class="text-center"><?= $m->nama_mapel ?></td>
                                 <td class="text-center">Kelas <?= $m->kelas ?>.<?= $m->urutan_kelas ?></td>
                             </tr>
                         <?php } ?>
                     </table>


                 <?php } ?>

             </div>
         </div>
         <!-- /.box -->

     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->