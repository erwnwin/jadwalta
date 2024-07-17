 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <h1>Bantuan</h1>
             <p>Ringkasan informasi untuk Anda</p>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">


         <div class="box box-solid">

             <div class="box-body">
                 <div class="box-group" id="accordion">
                     <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->

                     <div class="panel box box-success">
                         <div class="box-header with-border">
                             <h4 class="box-title">
                                 <a data-toggle="collapse" data-parent="#accordion" href="#infoSiJadwalTa">
                                     Informasi Tentang SiJadwalTa
                                 </a>
                             </h4>
                         </div>
                         <div id="infoSiJadwalTa" class="panel-collapse collapse">
                             <div class="box-body">
                                 <b><i class="fa fa-archive"></i> Versi 1.3</b>
                                 <p style="text-align: justify;">
                                 <ul>
                                     <li>Menambahkan fitur notifikasi melalu SMS ke nomor seluler aktif guru</li>
                                     <li>SMS diperuntukkan jika ada guru tidak memilik kuota internet untuk mendapatkan notifikasi BOT WhatsApp</li>
                                     <li class="text-danger">ICT terus mengatasi error yang terjadi. Terima kasih!!</li>
                                     <!-- <li>Menambahkan fitur request jadwal</li>
                                     <li>Integrasi BOT WhatsApp</li> -->
                                 </ul>
                                 </p>
                                 <hr style="border-top: 1px solid #FFE4E1;">
                                 <b><i class="fa fa-archive"></i> Versi 1.2</b>
                                 <p style="text-align: justify;">
                                 <ul>
                                     <li>Menambahkan form utama untuk akses bagi Orang Tua Siswa</li>
                                     <li>Menambahkan fitur export excel Penjadwalan</li>
                                     <!-- <li>ICT terus mengatasi error yang terjadi. Terima kasih!!</li> -->
                                     <!-- <li>Menambahkan fitur request jadwal</li>
                                     <li>Integrasi BOT WhatsApp</li> -->
                                 </ul>
                                 </p>
                                 <hr style="border-top: 1px solid #FFE4E1;">
                                 <b><i class="fa fa-archive"></i> Versi 1.1</b>
                                 <p style="text-align: justify;">
                                 <ul>
                                     <li>Penjadwalan dilakukan secara otomatis</li>
                                     <li>Menambahkan fitur request jadwal</li>
                                     <li>Integrasi BOT WhatsApp</li>
                                 </ul>
                                 </p>
                                 <hr style="border-top: 1px solid #FFE4E1;">
                                 <b><i class="fa fa-archive"></i> Versi 1.0</b>
                                 <p style="text-align: justify;">
                                 <ul>
                                     <!-- <li>Penjadwalan dilakukan secara otomatis</li> -->
                                     <li>Menampilkan notifikasi ke WhatsApp guru ketika akun telah didaftarkan oleh Administator</li>
                                 </ul>
                                 </p>
                             </div>
                         </div>


                     </div>

                     <div class="panel box box-warning">
                         <div class="box-header with-border">
                             <h4 class="box-title">
                                 <a data-toggle="collapse" data-parent="#accordion" href="#manualBook">
                                     Manual Book SiJadwalTa
                                 </a>
                             </h4>
                         </div>
                         <div id="manualBook" class="panel-collapse collapse">
                             <div class="box-body">
                                 <div class="table-responsive mailbox-messages">
                                     <table class="table table-hover">
                                         <tbody>

                                             <?php if ($this->session->userdata('hak_akses') == '1') { ?>
                                                 <tr>
                                                     <td class="mailbox-subject"><b><i class="fa fa-file-text"></i> Manual Book Kurikulum</b>
                                                     </td>
                                                     <td class="mailbox-date"><a href="<?= base_url('manual-book/files/Manual Book Kurikulum.pdf') ?>" target="_blank" class=""><i class="fa fa-file-pdf-o"></i> Lihat Manual Book</a></td>
                                                 </tr>
                                                 <tr>
                                                     <td class="mailbox-subject"><b><i class="fa fa-file-text"></i> Manual Book Guru</b>
                                                     </td>
                                                     <td class="mailbox-date"><a href="<?= base_url('manual-book/files/Manual Book Guru.pdf') ?>" target="_blank" class=""><i class="fa fa-file-pdf-o"></i> Lihat Manual Book</a></td>
                                                 </tr>
                                                 <tr>
                                                     <td class="mailbox-subject"><b><i class="fa fa-file-text"></i> Manual Book Administrator</b>
                                                     </td>
                                                     <td class="mailbox-date" style="width: 150px;"><a href="<?= base_url('manual-book/files/Manual Book Guru.pdf') ?>" target="_blank" class=""><i class="fa fa-file-pdf-o"></i> Lihat Manual Book</a></td>
                                                 </tr>
                                                 <tr>
                                                     <td class="mailbox-subject"><b><i class="fa fa-file-text"></i> Manual Book Orang Tua Siswa</b>
                                                     </td>
                                                     <td class="mailbox-date" style="width: 150px;"><a href="<?= base_url('manual-book/files/Manual Book Guru.pdf') ?>" target="_blank" class=""><i class="fa fa-file-pdf-o"></i> Lihat Manual Book</a></td>
                                                 </tr>
                                             <?php } ?>

                                             <?php if ($this->session->userdata('hak_akses') == '2') { ?>
                                                 <tr>
                                                     <td class="mailbox-subject"><b><i class="fa fa-file-text"></i> Manual Book Kurikulum</b>
                                                     </td>
                                                     <td class="mailbox-date"><a href="<?= base_url('manual-book/files/Manual Book Kurikulum.pdf') ?>" target="_blank" class=""><i class="fa fa-file-pdf-o"></i> Lihat Manual Book</a></td>
                                                 </tr>
                                                 <tr>
                                                     <td class="mailbox-subject"><b><i class="fa fa-file-text"></i> Manual Book Guru</b>
                                                     </td>
                                                     <td class="mailbox-date"><a href="<?= base_url('manual-book/files/Manual Book Guru.pdf') ?>" target="_blank" class=""><i class="fa fa-file-pdf-o"></i> Lihat Manual Book</a></td>
                                                 </tr>

                                                 <tr>
                                                     <td class="mailbox-subject"><b><i class="fa fa-file-text"></i> Manual Book Orang Tua Siswa</b>
                                                     </td>
                                                     <td class="mailbox-date" style="width: 150px;"><a href="<?= base_url('manual-book/files/Manual Book Guru.pdf') ?>" target="_blank" class=""><i class="fa fa-file-pdf-o"></i> Lihat Manual Book</a></td>
                                                 </tr>
                                             <?php } ?>

                                             <?php if ($this->session->userdata('hak_akses') == '3') { ?>
                                                 <tr>
                                                     <td class="mailbox-subject"><b><i class="fa fa-file-text"></i> Manual Book Kurikulum</b>
                                                     </td>
                                                     <td class="mailbox-date"><a href="<?= base_url('manual-book/files/Manual Book Kurikulum.pdf') ?>" target="_blank" class=""><i class="fa fa-file-pdf-o"></i> Lihat Manual Book</a></td>
                                                 </tr>
                                                 <tr>
                                                     <td class="mailbox-subject"><b><i class="fa fa-file-text"></i> Manual Book Guru</b>
                                                     </td>
                                                     <td class="mailbox-date"><a href="<?= base_url('manual-book/files/Manual Book Guru.pdf') ?>" target="_blank" class=""><i class="fa fa-file-pdf-o"></i> Lihat Manual Book</a></td>
                                                 </tr>

                                                 <tr>
                                                     <td class="mailbox-subject"><b><i class="fa fa-file-text"></i> Manual Book Orang Tua Siswa</b>
                                                     </td>
                                                     <td class="mailbox-date" style="width: 150px;"><a href="<?= base_url('manual-book/files/Manual Book Guru.pdf') ?>" target="_blank" class=""><i class="fa fa-file-pdf-o"></i> Lihat Manual Book</a></td>
                                                 </tr>
                                             <?php } ?>

                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="panel box box-danger">
                         <div class="box-header with-border">
                             <h4 class="box-title">
                                 <a data-toggle="collapse" data-parent="#accordion" href="#infoBot">
                                     BOT WhatsApp dan BOT Telegram
                                 </a>
                             </h4>
                         </div>
                         <div id="infoBot" class="panel-collapse collapse">
                             <div class="box-body">
                                 <div class="box box-widget widget-user-2">
                                     <!-- Add the bg color to the header using any of the bg-* classes -->
                                     <div class="widget-user-header bg-green">
                                         <div class="widget-user-image">
                                             <img class="img-circle" src="<?= base_url() ?>assets/img/wa1.png" alt="User Avatar">
                                         </div>
                                         <!-- /.widget-user-image -->
                                         <h3 class="widget-user-username">BOT WhatsApp</h3>
                                         <h5 class="widget-user-desc">Cara Menggunakan BOT WhatsApp</h5>
                                     </div>
                                     <div class="box-footer no-padding">
                                         <ul class="nav nav-stacked">
                                             <li>
                                                 <a style="text-align: justify;">
                                                     Berikut adalah cara dalam menggunakan BOT WhatsApp pada Sistem Penjadwalan Mata Pelajaran
                                                 </a>
                                             </li>
                                             <li>
                                                 <a>
                                                     <dl class="dl-horizontal">
                                                         <dt># Simpan Nomor</dt>
                                                         <dd style="text-align: justify;">Silahkan Bapak/Ibu menyimpan nomor BOT WhatsApp SiJadwalTa</dd>
                                                         <dd style="text-align: justify;"><strong>Nomor BOT : 0857 5653 8447</strong>, Simpan dengan nama <b>BOT SiJadwalTa</b></dd>
                                                         <br>
                                                         <dd style="text-align: justify;">*Jika nomor WhatsApp Bapak/Ibu telah didaftarkan pada proses pembuatan akun maka nomor BOT WhatsApp akan mengirimkan notifikasi terkait akun LOGIN. Kelik tombol <b>Lihat Contoh</b> untuk menampilkan detail notifikasi BOT</dd>
                                                         <dd><button class="btn btn-info btn-flat btn-xs" data-toggle="modal" data-target="#modal-lihatContoh"><i class="fa fa-hand-pointer-o"></i> Lihat Contoh Notifikasi</button></dd>
                                                         <br>
                                                         <dt># Buka WhatsApp</dt>
                                                         <dd style="text-align: justify;">Silahkan buka room chat BOT WhatsApp dan mengirimkan kata kunci yang ditentukan (tanda pagar / tagar harus ada), seperti</dd>
                                                         <dd style="text-align: justify;"><strong>#jadwalsaya</strong>, digunakanan untuk <b>Melihat jadwal guru terkait</b></dd>
                                                         <dd style="text-align: justify;"><strong>#akunsaya</strong>, digunakanan untuk <b>Melihat akun guru terkait</b></dd>
                                                         <!-- <dd style="text-align: justify;"><strong>#nomorhpguru</strong>, digunakanan untuk <b>Melihat nomor HP/WhatsApp guru yang diinginkan</b></dd> -->
                                                         <dd><button class="btn btn-info btn-flat btn-xs" data-toggle="modal" data-target="#modal-lihatContohTagar"><i class="fa fa-hand-pointer-o"></i> Lihat Contoh Penggunaan Kata Kunci</button></dd>


                                                     </dl>
                                                 </a>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>
                                 <!-- /.widget-user -->

                                 <div class="box box-widget widget-user-2">
                                     <!-- Add the bg color to the header using any of the bg-* classes -->
                                     <div class="widget-user-header bg-primary">
                                         <div class="widget-user-image">
                                             <img class="img-circle" src="<?= base_url() ?>assets/img/tele.png" alt="User Avatar">
                                         </div>
                                         <!-- /.widget-user-image -->
                                         <h3 class="widget-user-username">BOT Telegram</h3>
                                         <h5 class="widget-user-desc">Cara Menggunakan BOT Telegram</h5>
                                     </div>
                                     <div class="box-footer no-padding">
                                         <p class="text-center mt-2"> # SEGERA RILIS #</p>
                                         <!-- <ul class="nav nav-stacked">
                                             <li><a>Projects <span class="pull-right badge bg-blue">31</span></a></li>
                                             <li><a>Tasks <span class="pull-right badge bg-aqua">5</span></a></li>
                                             <li><a>Completed Projects <span class="pull-right badge bg-green">12</span></a></li>
                                             <li><a>Followers <span class="pull-right badge bg-red">842</span></a></li>
                                         </ul> -->
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>

                 </div>
             </div>
             <!-- /.box-body -->
         </div>
         <!-- /.box -->

     </section>
     <!-- /.content -->

     <div class="modal fade" id="modal-lihatContoh">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Detail notifikasi akun guru</h4>
                 </div>

                 <div class="box-body">
                     <img class="img-responsive pad" src="<?= base_url() ?>assets/img/notif.png" alt="Photo">
                 </div>
                 <div class="box-footer">
                     <!-- <button name="cmdSimpanPerguruanTinggiAsalMahasiswa" id="cmdSimpanPerguruanTinggiAsalMahasiswa" class="btn btn-flat btn-success pull-left" value="SimpanPerguruanTinggiAsalMahasiswa"><i class="fa fa-save"></i> Simpan</button> -->
                     <button type="button" class="btn btn-flat btn-danger pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
                 </div>
             </div>
         </div>
     </div>


     <div class="modal fade" id="modal-lihatContohTagar">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Detail penggunaan kata kunci BOT WhatsApp</h4>
                 </div>

                 <div class="box-body">
                     <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                         <ol class="carousel-indicators">
                             <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                             <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                             <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                         </ol>
                         <div class="carousel-inner">
                             <div class="item active">
                                 <img class="img-responsive pad" src="<?= base_url() ?>assets/img/slide1.png" alt="Photo">
                                 <div class="carousel-caption">
                                     Menampilkan Jadwal
                                 </div>
                             </div>
                             <div class="item">
                                 <img class="img-responsive pad" src="<?= base_url() ?>assets/img/slide2.png" alt="Photo">

                                 <div class="carousel-caption">
                                     Menampilkan Akun
                                 </div>
                             </div>
                             <div class="item">
                                 <img class="img-responsive pad" src="<?= base_url() ?>assets/img/slide3.png" alt="Photo">

                                 <div class="carousel-caption">
                                     Notifikasi Jadwal Mata Pelajaran Mendatang
                                 </div>
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
                 <div class="box-footer">
                     <!-- <button name="cmdSimpanPerguruanTinggiAsalMahasiswa" id="cmdSimpanPerguruanTinggiAsalMahasiswa" class="btn btn-flat btn-success pull-left" value="SimpanPerguruanTinggiAsalMahasiswa"><i class="fa fa-save"></i> Simpan</button> -->
                     <button type="button" class="btn btn-flat btn-danger pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
                 </div>
             </div>
         </div>
     </div>


 </div>
 <!-- /.content-wrapper -->