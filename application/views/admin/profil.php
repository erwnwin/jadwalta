 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <h1>Profil</h1>
             <p>Ringkasan informasi untuk Anda</p>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">

         <?php echo $this->session->flashdata('pesan') ?>

         <div class="row">
             <div class="col-md-4">

                 <!-- Profile Image -->
                 <div class="box box-success">
                     <?php if (
                            $this->session->userdata('hak_akses') == '1'
                        ) { ?>
                         <div class="box-body box-profile">

                             <?php if (
                                    $this->session->userdata('foto_pengguna') == null
                                ) { ?>
                                 <img id="imgFotoProfilPengguna" title="Klik untuk mengganti foto profil pengguna Anda" class="profile-user-img img-responsive img-circle img-foto-profil-pengguna" src="<?= base_url() ?>assets/user/guru1.png" alt="User profile picture">
                             <?php } else { ?>
                                 <img id="imgFotoProfilPengguna" title="Klik untuk mengganti foto profil pengguna Anda" class="profile-user-img img-responsive img-circle img-foto-profil-pengguna" src="<?= base_url() ?>upload/img-profil/<?= $this->session->userdata('foto_pengguna') ?>" alt="User profile picture">

                             <?php } ?>

                             <h3 class="profile-username text-center"><?=
                                                                        $this->session->userdata('nama');
                                                                        ?></h3>

                             <p class="text-muted text-center">Administrator</p>

                             <ul class="list-group list-group-unbordered">
                                 <li class="list-group-item">
                                     <b>Jenis Akses</b>
                                     <p class="pull-right">Administrator / Admin</p>
                                 </li>
                                 <li class="list-group-item">
                                     <b>Username</b>
                                     <p class="pull-right"><?=
                                                            $this->session->userdata('email');
                                                            ?></p>
                                 </li>
                                 <li class="list-group-item">
                                     <b>Status Pengguna</b>
                                     <p class="pull-right"><span class="label label-danger">Aktif</span></p>
                                 </li>
                             </ul>
                             <div class="hide">
                                 <!-- <input type="file" name="input_file_foto" id="input_file_foto" accept="image/png, image/jpeg, image/jpg"> -->
                                 <input type="file" name="fileFotoProfilPengguna" id="fileFotoProfilPengguna" accept="image/jpg, image/jpeg, image/png" class="form-control" />
                             </div>
                             <div id="uploaded_image"></div>

                             <button id="cmdFotoProfilPengguna" class="btn btn-flat btn-primary btn-block" title="Klik untuk mengganti foto profil pengguna Anda"><i class="fa fa-camera"></i> Ganti Foto Profil Pengguna</button>
                         </div>
                         <br>
                         <div class="box-footer">
                             <form id="frmGantiKataSandi" action="<?= base_url('profil') ?>" method="post">
                                 <div class="form-group">
                                     <label>Ganti Kata Sandi</label>
                                     <div class="input-group">
                                         <input type="hidden" class="form-control" name="id_user" value="<?=
                                                                                                            $this->session->userdata('id_user');
                                                                                                            ?>">
                                         <input type="password" name="txtKataSandiBaru" class="form-control" required="required" placeholder="Kata Sandi Baru" />
                                         <span class="input-group-btn">
                                             <button type="submit" name="cmdGantiKataSandi" class="btn btn-warning btn-flat" value="Ganti"><i class="fa fa-refresh"></i> Ganti</button>
                                         </span>
                                     </div>
                                 </div>
                             </form>

                         </div>
                     <?php } ?>

                     <?php if (
                            $this->session->userdata('hak_akses') == '2'
                        ) { ?>
                         <div class="box-body box-profile">
                             <!-- <img class="profile-user-img img-responsive img-circle img-foto-profil-pengguna" src="<?= base_url() ?>assets/user/guru1.png" alt="User profile picture"> -->
                             <?php if (
                                    $this->session->userdata('foto_pengguna') == null
                                ) { ?>
                                 <img id="imgFotoProfilPengguna" class="profile-user-img img-responsive img-circle img-foto-profil-pengguna" src="<?= base_url() ?>assets/user/guru1.png" alt="User profile picture">
                             <?php } else { ?>
                                 <img id="imgFotoProfilPengguna" class="profile-user-img img-responsive img-circle img-foto-profil-pengguna" src="<?= base_url() ?>upload/img-profil/<?= $this->session->userdata('foto_pengguna') ?>" alt="User profile picture">

                             <?php } ?>
                             <h3 class="profile-username text-center"><?=
                                                                        $this->session->userdata('nama');
                                                                        ?></h3>

                             <p class="text-muted text-center">Bagian Kurikulum</p>

                             <ul class="list-group list-group-unbordered">
                                 <li class="list-group-item">
                                     <b>Jenis Akses</b>
                                     <p class="pull-right">Bagian Kurikulum</p>
                                 </li>
                                 <li class="list-group-item">
                                     <b>Username</b>
                                     <p class="pull-right"><?=
                                                            $this->session->userdata('email');
                                                            ?></p>
                                 </li>
                                 <li class="list-group-item">
                                     <b>Status Pengguna</b>
                                     <p class="pull-right"><span class="label label-danger">Aktif</span></p>
                                 </li>
                             </ul>
                             <div class="hide">
                                 <!-- <input type="file" name="input_file_foto" id="input_file_foto" accept="image/png, image/jpeg, image/jpg"> -->
                                 <input type="file" name="fileFotoProfilPengguna" id="fileFotoProfilPengguna" accept="image/jpg, image/jpeg, image/png" class="form-control" />
                             </div>
                             <div id="uploaded_image"></div>

                             <button id="cmdFotoProfilPengguna" class="btn btn-flat btn-primary btn-block" title="Klik untuk mengganti foto profil pengguna Anda"><i class="fa fa-camera"></i> Ganti Foto Profil Pengguna</button>
                             <!-- <button id="cmdGantiFotoProfilAkunPengguna" class="btn btn-flat btn-primary btn-block" title="Klik untuk mengganti foto profil pengguna Anda"><i class="fa fa-camera"></i> Ganti Foto Profil Pengguna</button> -->
                         </div>
                         <br>
                         <div class="box-footer">
                             <form id="frmGantiKataSandi" action="<?= base_url('profil') ?>" method="post">
                                 <div class="form-group">
                                     <label>Ganti Kata Sandi</label>
                                     <div class="input-group">
                                         <input type="hidden" name="id_user" class="form-control" value="<?= $this->session->userdata('id_user') ?>" />
                                         <input type="password" name="txtKataSandiBaru" class="form-control" required="required" placeholder="Kata Sandi Baru" />
                                         <span class="input-group-btn">
                                             <button type="submit" name="cmdGantiKataSandi" class="btn btn-warning btn-flat" value="Ganti"><i class="fa fa-refresh"></i> Ganti</button>
                                         </span>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     <?php } ?>


                     <?php if (
                            $this->session->userdata('hak_akses') == '3'
                        ) { ?>
                         <div class="box-body box-profile">
                             <img class="profile-user-img img-responsive img-circle img-foto-profil-pengguna" src="<?= base_url() ?>assets/user/guru1.png" alt="User profile picture">

                             <h3 class="profile-username text-center"><?=
                                                                        $this->session->userdata('nama');
                                                                        ?></h3>

                             <p class="text-muted text-center">Guru</p>

                             <ul class="list-group list-group-unbordered">
                                 <li class="list-group-item">
                                     <b>Jenis Akses</b>
                                     <p class="pull-right">Guru</p>
                                 </li>
                                 <li class="list-group-item">
                                     <b>Username</b>
                                     <p class="pull-right"><?=
                                                            $this->session->userdata('alamat_email');
                                                            ?></p>
                                 </li>
                                 <li class="list-group-item">
                                     <b>Status Pengguna</b>
                                     <p class="pull-right"><span class="label label-danger">Aktif</span></p>
                                 </li>
                             </ul>
                             <div class="hidden">
                                 <input type="file" name="" id="input_file_foto" accept="image/png, image/jpeg, image/jpg">
                             </div>
                             <script type="text/javascript">
                                 function open_file() {
                                     document.getElementById('input_file_foto').click();
                                 }
                             </script>
                             <button onclick="open_file()" class="btn btn-flat btn-primary btn-block" title="Klik untuk mengganti foto profil pengguna Anda"><i class="fa fa-camera"></i> Ganti Foto Profil Pengguna</button>
                         </div>
                         <br>
                         <div class="box-footer">
                             <form id="frmGantiKataSandi" action="<?= base_url('profil') ?>" method="post">
                                 <div class="form-group">
                                     <label>Ganti Kata Sandi</label>
                                     <div class="input-group">
                                         <input type="hidden" class="form-control" name="id_guru" value="<?=
                                                                                                            $this->session->userdata('id_guru');
                                                                                                            ?>">
                                         <input type="password" name="textPasswordku" class="form-control" required="required" placeholder="Kata Sandi Baru" />
                                         <span class="input-group-btn">
                                             <button type="submit" name="cmdGantiKataSandi" class="btn btn-warning btn-flat" value="Ganti"><i class="fa fa-refresh"></i> Ganti</button>
                                         </span>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     <?php } ?>

                     <div id="divOverlayfrmGantiKataSandi" class="overlay hide">
                         <i class="fa fa-refresh fa-spin"></i>
                     </div>

                 </div>
                 <!-- /.box -->


             </div>
             <!-- /.col -->
             <div class="col-md-8">
                 <div class="box box-success">
                     <div class="box-header with-border">
                         <h3 class="box-title">Profil Pengguna :
                             <?php if (
                                    $this->session->userdata('hak_akses') == '1'
                                ) { ?>
                                 Administrator
                             <?php } ?>
                             <?php if (
                                    $this->session->userdata('hak_akses') == '2'
                                ) { ?>
                                 Bagian Kurikulum
                             <?php } ?>
                             <?php if (
                                    $this->session->userdata('hak_akses') == '3'
                                ) { ?>
                                 Guru / Pengajar
                             <?php } ?>
                         </h3>


                     </div>



                     <?php if (
                            $this->session->userdata('hak_akses') == '1' ||  $this->session->userdata('hak_akses') == '2'
                        ) { ?>
                         <div class="box-body">
                             <div id="idku">
                                 <?php if (
                                        $this->session->userdata('foto_profil') == null
                                    ) { ?>
                                     <div class='text-center'><img id="imgFotoProfilAkunPengguna" src='<?= base_url() ?>assets/user/guru1.png' class='img-thumbnail img-foto-akun-pengguna' width='120' height='180' title='Klik untuk mengganti foto profil mahasiswa Anda' />
                                     </div>
                                 <?php } else { ?>
                                     <div class='text-center'><img id="imgFotoProfilAkunPengguna" src='<?= base_url() ?>upload/img-akun/<?= $this->session->userdata('foto_profil') ?>' class='img-thumbnail img-foto-akun-pengguna' width='120' height='180' title='Klik untuk mengganti foto profil mahasiswa Anda' />
                                     </div>
                                 <?php } ?>
                             </div>

                             <!-- <?php

                                    $hari = nama_hariku(date('Y-m-d'));

                                    echo " NAMA HARI = $hari"; ?> -->
                         </div>
                         <div class="box-footer">
                             <div>
                                 <table class='table table-bordered table-hover'>


                                     <tr>
                                         <th class='success'>NIK</th>
                                         <td><?=
                                                $this->session->userdata('nik');
                                                ?></td>
                                     </tr>
                                     <tr>
                                         <th class='success'>Nama Lengkap</th>
                                         <td><?= strtoupper($this->session->userdata('nama'));
                                                ?></td>
                                     </tr>
                                     <tr>
                                         <th class='success'>Jenis Kelamin</th>
                                         <td><?=
                                                $this->session->userdata('jk');
                                                ?></td>
                                     </tr>

                                     <tr>
                                         <th class='success'>Alamat</th>
                                         <td><?=
                                                $this->session->userdata('alamat');
                                                ?></td>
                                     </tr>

                                     <tr>
                                         <th class='success'>Handphone</th>
                                         <td><?=
                                                $this->session->userdata('handphone');
                                                ?></td>
                                     </tr>
                                     <tr>
                                         <th class='success'>Alamat Email</th>
                                         <td><?=
                                                $this->session->userdata('email');
                                                ?>
                                         </td>
                                     </tr>
                                 </table>
                             </div>
                         </div>
                         <div class="box-footer">
                             <div class="hide">
                                 <input type="file" name="fileFotoAkunPengguna" id="fileFotoAkunPengguna" class="form-control" accept="image/png, image/jpeg, image/jpg">
                             </div>
                             <div id="uploaded_image"></div>

                             <button name="cmdFotoAkunPengguna" id="cmdFotoAkunPengguna" title="Klik untuk mengganti foto profil pengguna Anda" class="btn btn-warning btn-flat btn-block"><i class="fa fa-camera"></i> Update Foto Profil</button>
                             <button type="button" data-toggle="modal" data-target="#modal-udpateProfil<?=
                                                                                                        $this->session->userdata('id_user');
                                                                                                        ?>" class="btn btn-warning btn-flat btn-block"><i class="fa fa-pencil"></i> Update Profil</button>
                         </div>

                     <?php } ?>



                     <?php if (
                            $this->session->userdata('hak_akses') == '3'
                        ) { ?>
                         <div class="box-body">
                             <div id="divProfilPengguna">
                                 <div class='text-center'><img id='imgFotoProfilMahasiswa' src='<?= base_url() ?>assets/user/guru1.png' class='img-thumbnail img-foto-profil-mahasiswa' width='120' height='180' title='Klik untuk mengganti foto profil mahasiswa Anda' />
                                 </div>
                             </div>

                             <!-- <?php

                                    $hari = nama_hariku(date('Y-m-d'));

                                    echo " NAMA HARI = $hari"; ?> -->
                         </div>
                         <div class="box-footer">
                             <div>
                                 <table class='table table-bordered table-hover'>


                                     <tr>
                                         <th class='success'>NIK</th>
                                         <td><?=
                                                $this->session->userdata('nip_nik');
                                                ?></td>
                                     </tr>
                                     <tr>
                                         <th class='success'>Nama Lengkap</th>
                                         <td><?= strtoupper($this->session->userdata('nama'));
                                                ?></td>
                                     </tr>
                                     <tr>
                                         <th class='success'>Jenis Kelamin</th>
                                         <td><?=
                                                $this->session->userdata('jenis_kelamin');
                                                ?></td>
                                     </tr>

                                     <tr>
                                         <th class='success'>Alamat</th>
                                         <td><?=
                                                $this->session->userdata('alamat');
                                                ?></td>
                                     </tr>

                                     <tr>
                                         <th class='success'>Handphone</th>
                                         <td>+<?=
                                                $this->session->userdata('telp_wa');
                                                ?></td>
                                     </tr>
                                     <tr>
                                         <th class='success'>Alamat Email</th>
                                         <td><?=
                                                $this->session->userdata('alamat_email');
                                                ?></td>
                                     </tr>

                                 </table>
                             </div>
                         </div>
                         <div class="box-footer">
                             <button class="btn btn-warning btn-flat btn-block" title="Klik untuk mengganti foto profil pengguna Anda"><i class="fa fa-camera"></i> Update Foto Profil</button>
                             <button type="button" data-toggle="modal" data-target="#modal-udpateProfil<?=
                                                                                                        $this->session->userdata('id_guru');
                                                                                                        ?>" class="btn btn-warning btn-flat btn-block"><i class="fa fa-pencil"></i> Update Profil</button>
                         </div>

                     <?php } ?>

                 </div>
                 <!-- /.box -->
             </div>
             <!-- /.col -->
         </div>
         <!-- /.row -->


     </section>
     <!-- /.content -->



     <?php if (
            $this->session->userdata('hak_akses') == '1' || $this->session->userdata('hak_akses') == '2'
        ) { ?>
         <div id="modalCropUploadFotoProfilPengguna" class="modal" role="dialog">
             <div class="modal-dialog modal-sm">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title">Foto Profil Pengguna</h4>
                     </div>
                     <div class="modal-body">
                         <center>
                             <div id="divCropUploadFotoProfilPengguna" style="width: 275px"></div>
                         </center>
                     </div>
                     <div class="modal-footer">
                         <button name="cmdCropUploadFotoProfilPengguna" id="cmdCropUploadFotoProfilPengguna" class="btn btn-success btn-flat pull-left ">Simpan</button>
                         <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                     </div>
                 </div>
             </div>
         </div>


         <div id="modalCropUploadFotoPengguna" class="modal" role="dialog">
             <div class="modal-dialog modal-sm">
                 <div class="modal-content">
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title">Foto Pengguna</h4>
                     </div>
                     <div class="modal-body">
                         <center>
                             <div id="divCropUploadFotoPengguna" style="width: 275px"></div>
                         </center>
                     </div>
                     <div class="modal-footer">
                         <button name="cmdCropUploadFotoPengguna" id="cmdCropUploadFotoPengguna" class="btn btn-success btn-flat pull-left ">Simpan</button>
                         <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                     </div>
                 </div>
             </div>
         </div>

     <?php } ?>


     <div class="modal fade" id="modal-udpateProfil<?=
                                                    $this->session->userdata('id_user');
                                                    ?>">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Update Profil Pengguna</h4>
                 </div>

                 <form action="<?= base_url('profil/update-pengguna') ?>" method="post" class="form-horizontal">
                     <div class="box-body">
                         <div class="form-group">
                             <label class="col-sm-4 control-label">NIK</label>
                             <div class="col-sm-8">
                                 <input type="hidden" name="id_user" class="form-control" value="<?=
                                                                                                    $this->session->userdata('id_user');
                                                                                                    ?>" readonly>
                                 <?php if (
                                        $this->session->userdata('nik') == null
                                    ) { ?>
                                     <input type="text" name="nik" maxlength="16" class="form-control" value="<?=
                                                                                                                $this->session->userdata('nik');
                                                                                                                ?>" placeholder="NIK" required="">
                                 <?php } else { ?>
                                     <input type="text" name="nik" class="form-control" value="<?=
                                                                                                $this->session->userdata('nik');
                                                                                                ?>" readonly>
                                 <?php } ?>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-4 control-label">Nama Lengkap</label>
                             <div class="col-sm-8">
                                 <input type="text" name="nama" class="form-control" value="<?=
                                                                                            $this->session->userdata('nama');
                                                                                            ?>" placeholder="Nama Lengkap" required="">
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-4 control-label">Jenis Kelamin</label>
                             <div class="col-sm-8">
                                 <?php if (
                                        $this->session->userdata('jk') == null
                                    ) { ?>
                                     <select name="jk" class="form-control select2" style="width: 100%;" required>
                                         <option value="">Pilih Jenis Kelamin</option>
                                         <option value="Laki-laki">Laki-laki</option>
                                         <option value="Perempuan">Perempuan</option>
                                     </select>
                                 <?php } else { ?>
                                     <input type="text" name="jk" class="form-control" value="<?=
                                                                                                $this->session->userdata('jk');
                                                                                                ?>" readonly>
                                 <?php } ?>

                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-4 control-label">Alamat</label>
                             <div class="col-sm-8">
                                 <input type="text" name="alamat" class="form-control" value="<?=
                                                                                                $this->session->userdata('alamat');
                                                                                                ?>" placeholder="Alamat" required="">
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">No Handphone/WA</label>
                             <div class="col-sm-8">
                                 <input type="text" name="handphone" class="form-control" maxlength="12" value="<?=
                                                                                                                $this->session->userdata('handphone');
                                                                                                                ?>" placeholder="0821xxxxxx" required="">
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Userame Login</label>
                             <div class="col-sm-8">
                                 <input type="text" name="username" class="form-control" value="<?=
                                                                                                $this->session->userdata('username');
                                                                                                ?>" placeholder="Username" required="">
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Alamat Email</label>
                             <div class="col-sm-8">
                                 <input type="text" name="email" class="form-control" value="<?=
                                                                                                $this->session->userdata('email');
                                                                                                ?>" placeholder="Alamat Email" required="">
                             </div>
                         </div>
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



     <div class="modal fade" id="modal-udpateProfil<?=
                                                    $this->session->userdata('id_guru');
                                                    ?>">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Update Profil Pengguna</h4>
                 </div>

                 <form action="<?= base_url('profil/update-pengguna') ?>" method="post" class="form-horizontal">
                     <div class="box-body">
                         <div class="form-group">
                             <label class="col-sm-4 control-label">NIK/NIP</label>
                             <div class="col-sm-8">
                                 <input type="hidden" name="id_guru" class="form-control" value="<?=
                                                                                                    $this->session->userdata('id_guru');
                                                                                                    ?>" readonly>
                                 <?php if (
                                        $this->session->userdata('nip_nik') == null
                                    ) { ?>
                                     <input type="text" name="nip_nik" maxlength="16" class="form-control" value="<?=
                                                                                                                    $this->session->userdata('nip_nik');
                                                                                                                    ?>" placeholder="NIK" required="">
                                 <?php } else { ?>
                                     <input type="text" name="nip_nik" class="form-control" value="<?=
                                                                                                    $this->session->userdata('nip_nik');
                                                                                                    ?>" readonly>
                                 <?php } ?>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-4 control-label">Nama Lengkap Guru</label>
                             <div class="col-sm-8">
                                 <input type="text" name="nama" class="form-control" value="<?=
                                                                                            $this->session->userdata('nama');
                                                                                            ?>" placeholder="Nama Lengkap" required="">
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-4 control-label">Jenis Kelamin</label>
                             <div class="col-sm-8">
                                 <?php if (
                                        $this->session->userdata('jenis_kelamin') == null
                                    ) { ?>
                                     <select name="jk" class="form-control select2" style="width: 100%;" required>
                                         <option value="">Pilih Jenis Kelamin</option>
                                         <option value="Laki-laki">Laki-laki</option>
                                         <option value="Perempuan">Perempuan</option>
                                     </select>
                                 <?php } else { ?>
                                     <input type="text" name="jenis_kelamin" class="form-control" value="<?=
                                                                                                            $this->session->userdata('jenis_kelamin');
                                                                                                            ?>" readonly>
                                 <?php } ?>

                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-4 control-label">Alamat</label>
                             <div class="col-sm-8">
                                 <input type="text" name="alamat" class="form-control" value="<?=
                                                                                                $this->session->userdata('alamat');
                                                                                                ?>" placeholder="Alamat" required="">
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">No Handphone/WA</label>
                             <div class="col-sm-8">
                                 <div class="input-group">
                                     <span class="input-group-addon"><b>+62</b></span>
                                     <input type="text" name="telp_wa" class="form-control" required="required" value="<?=
                                                                                                                        $this->session->userdata('telp_wa');
                                                                                                                        ?>" maxlength="11" placeholder="821xxxxxxx" autocomplete="off" />
                                 </div>

                             </div>
                         </div>


                         <div class="form-group">
                             <label class="col-sm-4 control-label">Alamat Email (untuk login)</label>
                             <div class="col-sm-8">
                                 <input type="text" name="alamat_email" class="form-control" value="<?=
                                                                                                    $this->session->userdata('alamat_email');
                                                                                                    ?>" placeholder="Alamat Email" required="">
                             </div>
                         </div>
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

 </div>
 <!-- /.content-wrapper -->