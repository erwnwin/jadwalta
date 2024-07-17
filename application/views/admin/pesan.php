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
                     <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                         <i class="fa fa-minus"></i></button>

                 </div>
             </div>
             <div class="box-body">
                 <form action="<?php echo base_url('pesan/sendmsg') ?>" method="post">

                     <div class="form-group">
                         <label for="inputEmail" class="col-lg-3 control-label">No Telepon</label>
                         <div class="col-lg-12">
                             <input type="text" name="mobile" class="form-control" placeholder="Ex:Masukan No Tujuan">
                         </div>

                     </div>
                     <div class="form-group">
                         <label for="inputEmail" class="col-lg-3 control-label">Pesan</label>
                         <div class="col-lg-12">
                             <textarea name="message" class="form-control" placeholder="Masukan Pesan Anda"></textarea>
                         </div>

                     </div>

                     <div class="form-group">
                         <label for="" class="col-lg-3">
                             <p></p>
                         </label>
                         <div class="col-lg-12 ">
                             <!-- <button type="reset" class="btn btn-default">Batal</button> -->
                             <button type="submit" class="btn btn-primary btn-flat" name="bkirim"><span class="fa fa-send"></span> Kirim</button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
         <!-- /.box -->

     </section>
     <!-- /.content -->

 </div>
 <!-- /.content-wrapper -->