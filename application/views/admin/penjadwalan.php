 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <h1>Penjadwalan</h1>
             <p>Proses penjadwalan mata pelajaran</p>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">

         <?php echo $this->session->flashdata('pesan') ?>

         <?php
            if (empty($rangeJam)) {
                echo '<div class="alert alert-danger alert-dismissible">';
                echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                echo '<h4><i class="icon fa fa-ban"></i> Gagal</h4>';
                echo 'Data Range Jam Belum Terisi';
                echo '</div>';
            }
            if (empty($penjadwalan)) {
                echo '<div class="alert alert-danger alert-dismissible">';
                echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                echo '<h4><i class="icon fa fa-ban"></i> Gagal</h4>';
                echo 'Data Penjadwalan Belum Terisi';
                echo '</div>';
            } else {

                echo '<div class="alert alert-success alert-dismissible">';
                echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                echo '<h4><i class="icon fa fa-check"></i> Sukses</h4>';
                echo 'Data Penjadwalan Siap';
                echo '</div>';
            }
            if (empty($rumusan)) {

                echo '<div class="alert alert-danger alert-dismissible">';
                echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                echo '<h4><i class="icon fa fa-ban"></i> Gagal</h4>';
                echo 'Data Rumusan Belum Terisi';
                echo '</div>';
            } else {
                echo '<div class="alert alert-success alert-dismissible">';
                echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                echo '<h4><i class="icon fa fa-check"></i> Sukses</h4>';
                echo 'Data Rumusan Siap';
                echo '</div>';
            }
            ?>


         <div class="callout callout-info">
             <h4>Jadwal Belum Terplot</h4>
             <div class="table-responsive">
                 <table class="table table-bordered">
                     <tr>
                         <th class="text-center">Kelas</th>
                         <!-- <th class="text-center">Id Guru</th> -->
                         <th class="text-center">Nama Guru</th>
                         <th class="text-center">Mata Pelajaran</th>
                         <th class="text-center">Beban Jam</th>
                         <th class="text-center">Jumlah Yang belum Terplot</th>
                         <th class="text-center">Request Jadwal</th>
                         <?php if (!empty($rumusan) && !empty($penjadwalan)) : ?>
                             <th class="text-center">Action</th>
                         <?php endif; ?>
                     </tr>

                     <?php if ($belumterplot == null) { ?>
                         <tr>
                             <td colspan="7" class="text-center">Belum ada data</td>
                         </tr>
                     <?php } else { ?>
                         <?php foreach ($belumterplot as $valueBelumterplot) : ?>
                             <tr>
                                 <td><?= $valueBelumterplot->id_kelas ?></td>
                                 <!-- <td><?= $valueBelumterplot->id_guru ?></td> -->
                                 <td><?= $valueBelumterplot->nama ?></td>
                                 <td><?= $valueBelumterplot->nama_mapel ?></td>
                                 <td><?= $valueBelumterplot->beban_jam ?></td>
                                 <td><?= $valueBelumterplot->sisa_jam ?></td>
                                 <td><?= $valueBelumterplot->hari ?></td>
                                 <?php if (!empty($rumusan) && !empty($penjadwalan)) : ?>
                                     <td><button data-tugasguru="<?= $valueBelumterplot->id_tugas ?>" data-guru="<?= $valueBelumterplot->nama ?>" data-mapel="<?= $valueBelumterplot->nama_mapel ?>" data-kelas="<?= $valueBelumterplot->id_kelas ?>" data-request="<?= $valueBelumterplot->hari ?>" class="btn btn-primary plotting">Plotting</button></td>
                                 <?php endif; ?>
                             </tr>
                         <?php endforeach; ?>
                     <?php } ?>

                 </table>
             </div>
         </div>


         <div class="box box-success">
             <div class="box-header with-border">
                 <h3 class="box-title"> Jadwal Untuk Semua Kelas</h3>

                 <div class="box-tools pull-right">
                     <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Tutup">
                 <i class="fa fa-minus"></i></button> -->
                     <!-- <button type="button" data-toggle="modal" data-target="#modal-addBuat" class="btn btn-flat btn-sm btn-success"><i class="fa fa-edit"></i> Buat Jadwal</button> -->
                 </div>
             </div>
             <div class="box-body">
                 <?php if (empty($rumusan)) { ?>
                     <?php if (!empty($penjadwalan)) { ?>
                         <a class="ml-3 btn btn-primary btn-flat pull-right" href="<?= base_url('penjadwalan/rumusan') ?>"><i class="fa fa-edit"></i> Masukkan Rumusan</a>
                     <?php } ?>
                 <?php } else { ?>
                     <a class="ml-3 btn btn-danger btn-flat pull-left" href="<?= base_url('penjadwalan/reset-rumusan') ?>"><i class="fa fa-undo"></i> Reset Rumusan</a>
                 <?php } ?>
                 <?php
                    if (empty($penjadwalan)) {
                        if (!empty($rangeJam)) {
                    ?>
                         <a type="button" data-toggle="modal" data-target="#modal-addBuat" class="ml-3 btn btn-success btn-flat pull-right">Buat Jadwal</a>

                     <?php
                        }
                    } else {
                        ?>
                     <a class="ml-3 btn btn-warning btn-flat pull-left" href="<?= base_url('penjadwalan/reset-jadwal') ?>"><i class="fa fa-undo"></i> Reset Jadwal</a>
                 <?php } ?>

                 <?php if (!empty($rumusan) && !empty($penjadwalan)) : ?>
                     <a class="ml-3 btn btn-warning btn-flat pull-right" href="<?= base_url('penjadwalan/export') ?>"><i class="fa fa-file-excel-o"></i> Export Penjadwalan</a>
                     <a class="ml-3 btn btn-danger btn-flat pull-right" href="<?= base_url('penjadwalan/reset-penjadwalan') ?>"><i class="fa fa-undo"></i> Reset Penjadwalan</a>
                     <a class="btn btn-success btn-flat pull-right" href="<?= base_url('penjadwalan/ploting-jadwal') ?>"><i class="fa fa-check-square-o"></i> Ploting Jadwal</a>
                     <!-- <a class="btn btn-primary" href="<?= base_url('penjadwalan/tampil-jadwal-sementara') ?>">tampil jadwal Sementara</a> -->
                     <!-- <a class="btn btn-primary" href="<?= base_url('penjadwalan/tampil-jadwal') ?>">tampil jadwal</a> -->
                 <?php endif; ?>
             </div>
         </div>

         <!-- aleet untuk ganti jadwal -->
         <div class="row">
             <div class="col-12">
                 <div id="pindahkelas">
                 </div>
             </div>
         </div>

         <!-- Table Penjadwalan -->
         <?php if (!empty($rumusan) && !empty($penjadwalan)) : ?>
             <div class="row">
                 <?php
                    $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum`at', 'Sabtu'];
                    function filter_jadwal($penjadwalan, $hari, $kelas, $sesi)
                    {
                        $data = [];
                        foreach ($penjadwalan as $value) {
                            if ($value->hari == $hari && $value->sesi == $sesi && $value->id_kelas == $kelas) {
                                $data[] = $value;
                            }
                        }
                        return $data;
                    }
                    function getkodeMapel($mapel, $idMapel)
                    {
                        $key = array_search($idMapel, array_column($mapel, 'id_mapel'));
                        return $mapel[$key]->kode_mapel;
                    }
                    foreach ($hari as $valueHari) :
                        $keyJadwal = array_search($valueHari, array_column($jadwal, 'hari'));
                        $jumlahSesi = $jadwal[$keyJadwal]->jumlah_sesi;
                    ?>
                     <div class="col-sm-12">
                         <div class="box box-solid">
                             <div class="box-header with-border">
                                 <h3 class="box-title"><strong><?= $valueHari ?></strong></h3>

                                 <div class="box-tools">
                                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                     </button>
                                 </div>
                             </div>
                             <div class="box-body">
                                 <!-- <h3><?= $valueHari ?></h3> -->
                                 <div class="table-responsive">
                                     <table class="table table-bordered ">
                                         <tr>
                                             <th class="warning text-center" style="width: 5%;">#</th>
                                             <?php foreach ($kelas as $valueKelas) : ?>
                                                 <th class="warning text-center"><?= $valueKelas->id_kelas ?></th>
                                             <?php endforeach; ?>
                                         </tr>
                                         <?php
                                            // print_r($penjadwalan);
                                            for ($i = 0; $i < $jumlahSesi; $i++) { ?>
                                             <tr>
                                                 <td class="text-center"><?= $i ?></td>
                                                 <?php
                                                    foreach ($kelas as $valueKelas) :
                                                        $dataJadwalKelas = filter_jadwal($penjadwalan, $valueHari, $valueKelas->id_kelas, $i);
                                                        if ($dataJadwalKelas[0]->id_guru !== null) { ?>
                                                         <td id="<?= $dataJadwalKelas[0]->id_penjadwalan ?>" class='penjadwalan first' data-kelas='<?= $valueKelas->id_kelas ?>' data-hari='<?= $valueHari ?>' data-jadwal='<?= json_encode($dataJadwalKelas[0]) ?>' data-request='<?= $dataJadwalKelas[0]->request ?>' style="padding: 10px; background-color: <?= $dataJadwalKelas[0]->warna_guru ?> ;">
                                                             <div>
                                                                 <?= '' . $dataJadwalKelas[0]->nama . ' ~ ' .  getkodeMapel($mapel, $dataJadwalKelas[0]->id_mapel) ?>
                                                             </div>
                                                         </td>
                                                 <?php
                                                        } else {
                                                            $color = 'blue';
                                                            if ($dataJadwalKelas[0]->keterangan == 'kosong') {
                                                                $color = 'red';
                                                            }
                                                            echo "<td style='color: $color ;' data-request='-' data-guru='" . $dataJadwalKelas[0]->id_guru . "' data-kelas='$valueKelas->id_kelas' data-hari='$valueHari' class='penjadwalan first' data-jadwal='" . json_encode($dataJadwalKelas[0]) . "'>" . $dataJadwalKelas[0]->keterangan . "</td>";
                                                        }
                                                    endforeach; ?>
                                             </tr>
                                         <?php } ?>
                                     </table>
                                 </div>
                             </div>
                             <!-- /.card-body -->
                         </div>
                         <!-- /.card -->
                     </div>
                     <!-- /.col -->
                 <?php
                    endforeach; ?>
             </div>
         <?php endif; ?>

     </section>
     <!-- /.content -->

     <div class="modal fade" id="modal-addBuat">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title">Buat Data Jadwal Terbaru</h4>
                 </div>

                 <form action="<?= base_url('penjadwalan/create-jadwal') ?>" method="post" class="form-horizontal">
                     <div class="box-body">
                         <!-- <div class="form-group">
                                 <label class="col-sm-4 control-label">Tahun Akademik</label>
                                 <div class="col-sm-8">

                                 </div>
                             </div> -->
                     </div>
                     <div class="box-footer">
                         <button name="cmdSimpanPerguruanTinggiAsalMahasiswa" id="cmdSimpanPerguruanTinggiAsalMahasiswa" class="btn btn-flat btn-primary pull-left" value="SimpanPerguruanTinggiAsalMahasiswa"><i class="fa fa-check"></i> Buat Jadwal</button>
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