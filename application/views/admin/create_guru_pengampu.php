 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <h1>Data Guru Pengampu</h1>
             <p>Silahkan buat guru pengampu untuk masing-masing kelas</p>
         </h1>

     </section>

     <!-- Main content -->
     <section class="content">
         <div class="box box-success">
             <div class="box-header with-border">
                 <h3 class="box-title">Tambah Guru Pengampu : <b> <?= $nama_mapel ?></b></h3>

                 <div class="box-tools pull-right">
                     <button type="button" class="btn btn-box-tool" data-widget="collapse">
                         <i class="fa fa-minus"></i></button>
                 </div>
             </div>
             <div class="box-body">
                 <form action="<?= base_url('guru-pengampu/act-add') ?>" method="POST">
                     <input type="hidden" value="<?= count($dataMapel) ?>" name="jml_data">
                     <input type="hidden" value="<?= $kodeMapel ?>" name="kode_mapel">
                     <?php
                        $data = 0;
                        foreach ($dataMapel as $value) { ?>
                         <div class="form-group" data-group='<?= $data ?>'>
                             <label for="exampleFormControlInput1">KELAS ~ <?= $value->kelas ?> <?= $value->urutan_kelas ?></label>
                             <?php if ($value->id_guru == null) { ?>
                                 <input type="hidden" value="<?= $value->id_kelas ?>" name="id_kelas[]">
                                 <input type="hidden" value="<?= $value->id_mapel ?>" name="id_mapel[]">
                                 <input type="hidden" value="<?= $value->beban_jam ?>" name="beban_jam[]">
                             <?php } else { ?>
                                 <input type="hidden" class="form-kelas" value="<?= $value->id_kelas ?>" name="id_kelas[]" disabled>
                                 <input type="hidden" class="form-mapel" value="<?= $value->id_mapel ?>" name="id_mapel[]" disabled>
                                 <input type="hidden" class="form-beban-jam" value="<?= $value->beban_jam ?>" name="beban_jam[]" disabled>
                             <?php } ?>
                             <?php if ($value->id_guru == null) { ?>
                                 <div class="row">
                                     <div class="col-sm-9">
                                         <select name="guru[]" class="form-control select2" style="width: 100%;">
                                             <option selected="selected">Pilih Guru</option>
                                             <?php foreach ($guru as $datalistGuru) : ?>
                                                 <option value="<?= $datalistGuru->id_guru ?>"><?= $datalistGuru->nama ?> </option>;
                                             <?php endforeach; ?>
                                         </select>
                                     </div>
                                 </div>
                             <?php } else { ?>
                                 <div class="row">
                                     <div class="col-sm-9">
                                         <select name="guru[]" class="form-control select2 select-guru" style="width: 100%;" disabled>
                                             <?php foreach ($guru as $datalistGuru) :
                                                    $selected = ($value->id_guru == $datalistGuru->id_guru) ? 'selected' : ''; ?>
                                                 <option value="<?= $datalistGuru->id_guru ?>" <?= $selected ?>><?= $datalistGuru->nama ?> </option>;
                                             <?php endforeach; ?>
                                         </select>
                                     </div>
                                     <div class="col-xs-3">
                                         <div class="btn btn-warning btn-block btn-flat hapus-data" data-idtugas="<?= $value->id_tugas ?>" data-group="<?= $data ?>"><i class="fa fa-trash"></i> Hapus</div>
                                         <!-- <div class="btn btn-warning hapus-data" data-idtugas="<?= $value->id_tugas ?>" data-group="<?= $data ?>"> Hapus</div> -->
                                     </div>
                                 </div>
                             <?php } ?>
                         </div>
                     <?php
                            $data++;
                        } ?>
                     <div class="box-footer">
                         <button type="submit" class="btn btn-success btn-flat mb-2"><i class="fa fa-save"></i> Simpan</button>
                         <!-- <input type="submit" class="btn btn-success btn-block btn-flat mb-2" value="Simpan"> -->
                         <a href="<?= base_url('guru-pengampu') ?>" class="btn btn-flat btn-danger"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                     </div>

                 </form>
             </div>
         </div>
         <!-- /.box -->

     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->