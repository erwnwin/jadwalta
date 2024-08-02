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
                 <h3 class="box-title">Users Sistem</h3>

                 <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse">
                         <i class="fa fa-minus"></i></button>

                 </div>
             </div>
             <div class="box-body">
                 <table class="table table-bordered table-striped table-hover">
                     <tr>
                         <th style="width: 10px" class="bg-warning text-center">#</th>
                         <th style="width: 200px" class="bg-warning text-center">Nama Pengguna</th>
                         <th style="width: 300px" class="bg-warning text-center">Username</th>
                         <th style="width: 300px" class="bg-warning text-center">Role</th>
                         <th style="width: 300px" class="bg-warning text-center">Action</th>
                     </tr>
                     <?php $no = 1;
                        foreach ($users as $r) { ?>
                         <tr>
                             <td class="text-center"><?= $no++ ?></td>
                             <td><?= $r->nama ?></td>
                             <td><?= $r->username ?></td>
                             <td class="text-center"><?php if ($r->hak_akses == '1') { ?>
                                     <span class="badge bg-red">Admin</span>
                                 <?php } else { ?>
                                     <span class="badge bg-blue">Kurikulum</span>
                                 <?php } ?>
                             </td>
                             <td class="text-center">
                                 <a href="" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-edit"></i></a>
                                 <button type="button" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i></button>
                             </td>
                         </tr>
                     <?php } ?>

                 </table>
             </div>
         </div>
         <!-- /.box -->

     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->