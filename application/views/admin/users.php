 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <h1>Pengguna</h1>
             <p>Daftar pengguna yang memiliki akses</p>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">

         <!-- Default box -->
         <div class="box box-info">
             <div class="box-header with-border">
                 <h3 class="box-title">Title</h3>

                 <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse">
                         <i class="fa fa-minus"></i></button>

                 </div>
             </div>
             <div class="box-body">
                 <?php foreach ($jadwal as $j) { ?>
                     <p><?= $j->telp_wa ?></p>
                 <?php } ?>
             </div>
         </div>
         <!-- /.box -->

     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->