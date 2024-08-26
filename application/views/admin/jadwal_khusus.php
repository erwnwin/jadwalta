 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <h1>Jadwal Khusus</h1>
             <p>Ringkasan informasi jadwal khusus untuk Anda</p>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">

         <?php echo $this->session->flashdata('pesan') ?>
         <div id="alertContainer"></div>


         <!-- Default box -->
         <div class="box box-info collapsed-box">
             <div class="box-header with-border">
                 <h3 class="box-title">Create Jadwal Khusus</h3>

                 <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse">
                         <i class="fa fa-plus"></i></button>

                 </div>
             </div>
             <div class="box-body">
                 <form action="<?= base_url() ?>jadwal-khusus/act-add" method="post" class="form-horizontal">
                     <div class="form-group">
                         <label class="col-sm-4 control-label">Hari</label>
                         <div class="col-sm-8">

                             <?php
                                $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
                                foreach ($hari as $value) { ?>
                                 <div class="form-check form-check-inline">
                                     <input class="form-check-input flat-red" name="hari[]" type="checkbox" id="<?= $value ?>" value="<?= $value ?>">
                                     <label class="form-check-label" for="<?= $value ?>"><?= $value ?></label>
                                 </div>
                             <?php } ?>
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="col-sm-4 control-label">Kelas</label>
                         <div class="col-sm-8">
                             <?php
                                $kelas = ['I', 'II', 'III', 'IV', 'V', 'VI'];
                                foreach ($kelas as $value) { ?>
                                 <div class="form-check form-check-inline">
                                     <input class="form-check-input flat-red" name="kelas[]" type="checkbox" id="<?= $value ?>" value="<?= $value ?>">
                                     <label class="form-check-label" for="<?= $value ?>">Kelas <?= $value ?></label>
                                 </div>
                             <?php } ?>
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="col-sm-4 control-label">Keterangan Jadwal Khusus</label>
                         <div class="col-sm-8">
                             <input type="text" name="keterangan" id="keterangan" class="form-control" required="required" value="" placeholder="Keterangan jadwal khusus. Cth: Upacara Bendera, Istirahat" autocomplete="off" />
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="col-sm-4 control-label">Sesi Ke-</label>
                         <div class="col-sm-8">
                             <input type="number" name="sesi" id="sesi" min="0" max="20" class="form-control" required="required" value="" placeholder="Minimal input 0 / maksimal input 20" autocomplete="off" />
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="col-sm-4 control-label">Durasi</label>
                         <div class="col-sm-8">
                             <input type="number" name="durasi" id="durasi" class="form-control" required="required" value="" placeholder="Input number untuk durasi" autocomplete="off" />
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="col-sm-4 control-label"></label>
                         <div class="col-sm-8">
                             <button type="submit" class="btn btn-sm btn-flat btn-success"><i class="fa fa-save"></i> Simpan</button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
         <!-- /.box -->

         <div class="box box-primary">
             <div class="box-header with-border">
                 <h3 class="box-title">Daftar Jadwal Khusus</h3>

                 <div class="box-tools pull-right">
                     <button type="button" class="btn btn-success btn-flat btn-sm" data-toggle="modal" data-target="#modal-addJadwalKhusus">
                         <i class="fa fa-plus"></i> Tambah Jadwal Khusus
                     </button>

                 </div>
             </div>
             <div class="box-body">
                 <div class="table-responsive">
                     <table class="table table-bordered table-striped table-hover">
                         <thead>
                             <tr>
                                 <th style="width: 10px" class="bg-success text-center">#</th>
                                 <th class="bg-success text-center">Hari</th>
                                 <th class="bg-success text-center">Kelas</th>
                                 <th class="bg-success text-center">Keterangan</th>
                                 <th class="bg-success text-center">Sesi</th>
                                 <th class="bg-success text-center">Durasi</th>
                                 <th style="width: 90px" class="bg-success text-center">Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                                $no = 1;
                                $groupedData = [];

                                // Mengelompokkan data berdasarkan hari dan keterangan
                                foreach ($jadwal_khususku as $row) {
                                    $key = $row['hari'] . '-' . $row['keterangan'];
                                    if (!isset($groupedData[$key])) {
                                        $groupedData[$key] = [
                                            'hari' => $row['hari'],
                                            'keterangan' => $row['keterangan'],
                                            'data' => []
                                        ];
                                    }
                                    $groupedData[$key]['data'][] = $row;
                                }

                                // Menampilkan data
                                foreach ($groupedData as $key => $group) {
                                    // Menggabungkan semua kelas dalam satu string
                                    $kelasList = implode(', ', array_column($group['data'], 'kelas'));

                                    foreach ($group['data'] as $index => $row) {
                                        // Tampilkan hanya baris pertama untuk setiap grup
                                        if ($index == 0) {
                                ?>
                                         <tr>
                                             <td><?= $no ?></td>
                                             <td class="text-center"><?= htmlspecialchars($group['hari']) ?></td>
                                             <td class="text-center">Kelas <?= htmlspecialchars($kelasList) ?></td>
                                             <td><?= htmlspecialchars($row['keterangan']) ?></td>
                                             <td class="text-center"><?= htmlspecialchars($row['sesi']) ?></td>
                                             <td class="text-center"><?= htmlspecialchars($row['durasi']) ?></td>
                                             <td class="text-center">

                                                 <button type="button" class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#editModal" data-id="<?= $row['id_jadwal_khusus'] ?>" data-hari="<?= $row['hari'] ?>" data-keterangan="<?= $row['keterangan'] ?>" data-sesi="<?= $row['sesi'] ?>" data-durasi="<?= $row['durasi'] ?>" data-kelas="<?= htmlspecialchars($kelasList) ?>">
                                                     <i class="fa fa-edit"></i>
                                                 </button>
                                                 <button type="button" class="btn btn-danger btn-sm btn-flat"
                                                     data-toggle="modal"
                                                     data-target="#deleteModal"
                                                     data-hari="<?= $row['hari'] ?>"
                                                     data-keterangan="<?= $row['keterangan'] ?>"
                                                     data-sesi="<?= $row['sesi'] ?>">
                                                     <i class="fa fa-trash"></i>
                                                 </button>
                                             </td>
                                         </tr>
                             <?php
                                            $no++;
                                        }
                                    }
                                }
                                ?>
                         </tbody>
                     </table>
                 </div>

             </div>
             <center>
                 <!-- <?= $this->pagination->create_links();
                        ?> -->
                 <div class="box-footer clearfix">
                     <ul class="pagination pagination-sm no-margin ">
                         <li><a href="#">&laquo;</a></li>
                         <li><a href="#">1</a></li>
                         <li><a href="#">2</a></li>
                         <li><a href="#">3</a></li>
                         <li><a href="#">&raquo;</a></li>
                     </ul>
                 </div>
             </center>
         </div>

         <?php
            if (empty($dataKelas)) {
                echo '<div class="alert alert-danger alert-dismissible">';
                echo '<button type="button" class="close" data-dismiss="alert" ;aria-hidden="true">×</button>';
                echo '<h4><i class="icon fa fa-times-circle"></i> Maaf!</h4>';
                echo 'data Kelas Belum Terisi';
                echo '</div>';
            }
            if (empty($jadwal)) {
                echo '<div class="alert alert-danger alert-dismissible">';
                echo '<button type="button" class="close" data-dismiss="alert" ;aria-hidden="true">×</button>';
                echo '<h4><i class="icon fa fa-times-circle"></i> Maaf!</h4>';
                echo 'data Jadwal Belum Terisi';
                echo '</div>';
            }
            ?>

         <?php if (!empty($jadwal) && !empty($dataKelas)) : ?>
             <div class="row">
                 <?php
                    $arrHari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
                    $hari = array_column($jadwal, 'hari');
                    function keteranganSesi($jadwal_khususku, $hari, $kelas, $sesi)
                    {
                        foreach ($jadwal_khususku as $value) {
                            if ($value['hari'] == $hari && $value['kelas'] == $kelas && $value['sesi'] == $sesi) {
                                return $value['keterangan'];
                            }
                        }
                        // return ;
                    }
                    foreach ($arrHari as $valueHari) {
                        if (in_array($valueHari, $hari)) {
                            # code...
                            // foreach ($hari as $valueHari) :
                            $keyJadwal = array_search($valueHari, array_column($jadwal, 'hari'));
                            $jumlahSesi = $jadwal[$keyJadwal]->jumlah_sesi;
                    ?>
                         <div class="col-sm-12">
                             <div class="box box-solid collapsed-box">
                                 <div class="box-header with-border">
                                     <h3 class="box-title"><strong><?= $valueHari ?></strong></h3>

                                     <div class="box-tools">
                                         <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                         </button>
                                     </div>
                                 </div>
                                 <div class="box-body">
                                     <div class="table-responsive">
                                         <table class="table table-bordered table-striped">
                                             <tr>
                                                 <th class="danger text-center">#</th>
                                                 <?php foreach ($dataKelas as $valueKelas) : ?>
                                                     <th class="danger text-center">Kelas <?= $valueKelas->kelas ?>.<?= $valueKelas->urutan_kelas ?> </th>
                                                 <?php endforeach; ?>
                                             </tr>
                                             <?php
                                                // print_r($penjadwalan);
                                                for ($i = 0; $i < $jumlahSesi; $i++) { ?>
                                                 <tr>
                                                     <td class="text-center"><?= $i ?></td>
                                                     <?php foreach ($dataKelas as $valueKelas) : ?>
                                                         <td class="text-center">
                                                             <?php
                                                                $result =  keteranganSesi($jadwal_khususku, $valueHari, $valueKelas->kelas, $i);
                                                                echo $result;
                                                                ?>
                                                         </td>
                                                     <?php endforeach; ?>
                                                 </tr>
                                             <?php } ?>
                                         </table>
                                     </div>


                                 </div>
                                 <!-- /.box-body -->
                             </div>
                             <!-- /.box -->
                         </div>
                 <?php
                            // endforeach;
                        }
                    }
                    ?>
             </div>

         <?php endif; ?>





     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!-- Modal Edit -->
 <div class="modal fade" id="editModal">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title">Edit Data Jadwal Khusus</h4>
             </div>
             <form action="<?= base_url() ?>jadwal-khusus/act-update" method="post" class="form-horizontal">
                 <div class="modal-body">
                     <input type="hidden" name="id_jadwal_khusus" id="id_jadwal_khusus">

                     <div class="form-group">
                         <label class="col-sm-4 control-label" for="editHari">Pilih Hari</label>
                         <div class="col-sm-8">
                             <select name="hari" id="editHari" class="form-control">
                                 <option value="Senin">Senin</option>
                                 <option value="Selasa">Selasa</option>
                                 <option value="Rabu">Rabu</option>
                                 <option value="Kamis">Kamis</option>
                                 <option value="Jum`at">Jum`at</option>
                                 <option value="Sabtu">Sabtu</option>
                             </select>
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="col-sm-4 control-label" for="editKelas">Kelas</label>
                         <div class="col-sm-8">
                             <?php foreach ($kelas as $value) { ?>
                                 <div class="form-check form-check-inline">
                                     <input class="form-check-input" name="kelas[]" type="checkbox" id="kelas<?= $value ?>" value="<?= $value ?>">
                                     <label class="form-check-label" for="kelas<?= $value ?>">Kelas <?= $value ?></label>
                                 </div>
                             <?php } ?>
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="col-sm-4 control-label" for="editKeterangan">Keterangan Jadwal Khusus</label>
                         <div class="col-sm-8">
                             <input type="text" name="keterangan" id="editKeterangan" class="form-control" required="required" placeholder="Keterangan jadwal khusus" autocomplete="off">
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="col-sm-4 control-label" for="editSesi">Sesi Ke-</label>
                         <div class="col-sm-8">
                             <input type="number" name="sesi" id="editSesi" min="0" max="20" class="form-control" required="required" placeholder="Sesi ke-" autocomplete="off">
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="col-sm-4 control-label" for="editDurasi">Durasi</label>
                         <div class="col-sm-8">
                             <input type="number" name="durasi" id="editDurasi" class="form-control" required="required" placeholder="Durasi" autocomplete="off">
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <div class="modal fade" id="deleteModal">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
                 <h4 class="modal-title">Konfirmasi Hapus</h4>
             </div>
             <div class="modal-body">
                 <p>Apakah Anda yakin ingin menghapus data ini?</p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                 <button type="button" class="btn btn-danger" id="confirmDeleteButton">Hapus</button>
             </div>
         </div>
     </div>
 </div>


 <div class="modal fade" id="modal-addJadwalKhusus">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
                 <h4 class="modal-title">Tambah Jadwal Khusus</h4>
             </div>
             <div class="modal-body">
                 <form action="<?= base_url() ?>jadwal-khusus/act-add" method="post" class="form-horizontal">
                     <div class="form-group">
                         <label class="col-sm-4 control-label">Hari</label>
                         <div class="col-sm-8">

                             <?php
                                $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
                                foreach ($hari as $value) { ?>
                                 <div class="form-check form-check-inline">
                                     <input class="form-check-input flat-red" name="hari[]" type="checkbox" id="<?= $value ?>" value="<?= $value ?>">
                                     <label class="form-check-label" for="<?= $value ?>"><?= $value ?></label>
                                 </div>
                             <?php } ?>
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="col-sm-4 control-label">Kelas</label>
                         <div class="col-sm-8">
                             <?php
                                $kelas = ['I', 'II', 'III', 'IV', 'V', 'VI'];
                                foreach ($kelas as $value) { ?>
                                 <div class="form-check form-check-inline">
                                     <input class="form-check-input flat-red" name="kelas[]" type="checkbox" id="<?= $value ?>" value="<?= $value ?>">
                                     <label class="form-check-label" for="<?= $value ?>">Kelas <?= $value ?></label>
                                 </div>
                             <?php } ?>
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="col-sm-4 control-label">Keterangan Jadwal Khusus</label>
                         <div class="col-sm-8">
                             <input type="text" name="keterangan" id="keterangan" class="form-control" required="required" value="" placeholder="Keterangan jadwal khusus. Cth: Upacara Bendera, Istirahat" autocomplete="off" />
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="col-sm-4 control-label">Sesi Ke-</label>
                         <div class="col-sm-8">
                             <input type="number" name="sesi" id="sesi" min="0" max="20" class="form-control" required="required" value="" placeholder="Minimal input 0 / maksimal input 20" autocomplete="off" />
                         </div>
                     </div>

                     <div class="form-group">
                         <label class="col-sm-4 control-label">Durasi</label>
                         <div class="col-sm-8">
                             <input type="number" name="durasi" id="durasi" class="form-control" required="required" value="" placeholder="Input number untuk durasi" autocomplete="off" />
                         </div>
                     </div>



             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                 <button type="submit" class="btn btn-success" id="confirmDeleteButton">Simpan</button>
             </div>
             </form>
         </div>
     </div>
 </div>