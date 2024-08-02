<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Versi</b> 1.4
    </div>
    <strong>Copyright &copy; 2024 | Made with <i class="fa fa-heart"></i> by <a href="#">TIM ICT.</a></strong>
</footer>


<!-- jQuery 3 -->
<script src="<?= base_url() ?>assets/template_admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>assets/template_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/template_admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>assets/template_admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url() ?>assets/template_admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url() ?>assets/template_admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url() ?>assets/template_admin/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>assets/template_admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- DataTables -->
<!-- <script src="<?= base_url() ?>assets/template_admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/template_admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->

<!-- bootstrap datepicker -->
<script src="<?= base_url() ?>assets/template_admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url() ?>assets/template_admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url() ?>assets/template_admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= base_url() ?>assets/template_admin/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/template_admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/template_admin/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>assets/template_admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?= base_url() ?>assets/template_admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url() ?>assets/template_admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>assets/template_admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/template_admin/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>assets/template_admin/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/template_admin/dist/js/demo.js"></script>


<!-- js app -->
<script src="<?= base_url() ?>assets/jadwal/js/jadwal.js"></script>
<script src="<?= base_url() ?>assets/jadwal/js/atur.js"></script>
<script src="<?= base_url() ?>assets/jadwal/js/ganti_pass.js"></script>
<script src="<?= base_url() ?>assets/jadwal/js/easy-autocomplete.min.js"></script>
<script src="<?= base_url() ?>assets/jadwal/js/croppie.js"></script>

<!-- crops -->
<!-- <script src="<?= base_url() ?>assets/jadwal/js/crop.js"></script> -->
<script src="<?= base_url() ?>assets/jadwal/js/upload.js"></script>



<script>
    $('#panelPrecios [data-toggle="tooltip"]').tooltip({

        animated: 'fade',
        placement: 'top',
        html: true
    });
</script>

<!-- <script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script> -->


<script>
    let log_off = new Date();
    log_off.setSeconds(log_off.getSeconds() + 36000);
    log_off = new Date(log_off)

    let int_logoff = setInterval(function() {
        let now = new Date();
        if (now > log_off) {
            window.location.assign("<?= base_url() ?>logout");
            clearInterval(int_logoff);
        }
    }, 360000);

    $('body').on('click', function() {
        log_off = new Date()
        log_off.setSeconds(log_off.getSeconds() + 5)
        log_off = new Date(log_off)
        console.log(log_off);
    });
</script>


<script>
    $(document).ready(function() {
        $("#kelas").change(function() {
            var url = "<?php echo site_url('jadwal/add_ajax_mapel'); ?>/" + $(this).val();
            $('#mapel').load(url);
            return false;
        })

        $("#mapel").change(function() {
            var url = "<?php echo site_url('jadwal/add_ajax_jam'); ?>/" + $(this).val();
            $('#jam').load(url);
            return false;
        })

        // $("#kecamatan").change(function() {
        //     var url = "<?php echo site_url('jadwal/add_ajax_des'); ?>/" + $(this).val();
        //     $('#desa').load(url);
        //     return false;
        // })

    });
</script>

<?php if ($this->uri->segment(1) == "guru-pengampu") : ?>
    <script>
        var numberForm = 2;
        $("#mapelSelectForm").on('change', function() {
            var selectedVal = $(this).val();
            var dataSelect = $(this).data("mapelselect");
            $.ajax({
                type: "POST",
                url: "<?= base_url('DataPenugasanGuru/getDataKelasByKodeMapel') ?>",
                data: {
                    'kode_mapel': selectedVal
                },
                success: function(data) {
                    dataKelas = JSON.parse(data);
                    console.log(dataKelas);
                }
            })
            console.log('inidata' + dataSelect);
        });
        // Modal 
        $('#TugasGuru').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var mapel = button.data('mapel');
            var kode_mapel = button.data('kodemapel');
            var modal = $(this);
            $.ajax({
                type: 'POST',
                url: "<?= base_url('DataPenugasanGuru/getDataKelas') ?>",
                data: {
                    'kode_mapel': kode_mapel
                },
                success: function(data) {
                    modal.find('.modal-title').text('Mata Pelajaran ' + mapel);
                    modal.find('.modal-body input').val(mapel);
                    modal.find('#form').html(data);
                    // html = JSON.parse(data);
                    // console.log(html);
                }
            })
        })

        $('div.hapus-data').on('click', function() {
            const form = $(this);
            let id_tugas = form.data('idtugas');
            let form_group = form.parent().parent().parent();
            $.ajax({
                url: "<?= base_url('Guru_pengampu/hapus') ?>",
                type: "POST",
                data: {
                    'id_tugas': id_tugas
                },
                success: function(data) {
                    form_group.find(".form-mapel").removeAttr("disabled");
                    form_group.find(".form-kelas").removeAttr("disabled");
                    form_group.find(".form-beban-jam").removeAttr("disabled");
                    form_group.find(".select-guru").removeAttr("disabled");
                    form.remove();
                }
            })
        });
    </script>
<?php endif; ?>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        $('.select3').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })

        $('#datepicker1').datepicker({
            autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })
</script>

<script>
    $(function() {
        //Initialize Select2 Elements

        $('.select3').select2()
    })
</script>

<!-- <script type="text/javascript">
    $(document).ready(function() {

        $('#populasiHelper').hide();
        $('select[name=dataFilter]').selectpicker('hide');
        $('#formBuatJadwal').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'fas fa-exclamation-circle',
                validating: 'glyphicon glyphicon-refresh'
            },
            excluded: ':disabled'

        })
    })

    $('#formBuatJadwal').submit(function() {
        return false;
    });

    $('#filterTable').submit(function() {
        return false;
    })



    $('select[name=filter]').change(function(e) {
        var val = e.target.value;
        $('select[name=dataFilter]').empty();
        $('select[name=dataFilter]').selectpicker({
                title: 'Memproses...'
            })
            .selectpicker('refresh');
        if (val == "") {
            $('select[name=dataFilter]').selectpicker('hide');
            $('#table').bootstrapTable('filterBy', {});
        } else {
            $('select[name=dataFilter]').selectpicker('show');

            getDataFilter(val);
        }
    })

    function getDataFilter(val) {
        if (val == "programstudi") {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>" + "jadwal/buatjadwal",
                dataType: 'json',
                data: {
                    manajemen: 'getDataFilter',
                    tabel: "prodi"
                },
                success: function(res) {
                    var option = "";
                    $.each(res, function(keys, value) {
                        option += "<option>" + value.nama + "</option>";
                    })

                    $('select[name=dataFilter]').html(option);
                    $('select[name=dataFilter]').selectpicker({
                            title: '- Pilih Program Studi -'
                        })
                        .selectpicker('refresh');
                }
            })
        } else
        if (val == "nama_mk") {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>" + "jadwal/buatjadwal",
                dataType: 'json',
                data: {
                    manajemen: 'getDataFilter',
                    tabel: "matakuliah"
                },
                success: function(res) {
                    var option = "";
                    var cek = "";
                    $.each(res, function(keys, value) {
                        if (value.programstudi !== cek) {
                            if (cek != '') {
                                option += "</optgroup>";
                            }
                            option += "<optgroup label='" + value.programstudi + "'>";
                        }
                        option += "<option data-subtext='Semester " + value.semester + "' value='" + value.nama + "'>" + value.nama + "</option>";

                        cek = value.programstudi;
                    })

                    option += "</optgroup>";

                    $('select[name=dataFilter]').html(option);
                    $('select[name=dataFilter]').selectpicker({
                            title: '- Pilih Matakuliah -'
                        })
                        .selectpicker('refresh');
                }
            })
        } else
        if (val == "dosen") {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>" + "jadwal/buatjadwal",
                dataType: 'json',
                data: {
                    manajemen: 'getDataFilter',
                    tabel: "dosen"
                },
                success: function(res) {
                    var option = "";
                    $.each(res, function(keys, value) {
                        var dosen = value.nama + ', ' + value.title;
                        option += "<option value='" + dosen + "' data-subtext='" + value.title + "'>" + value.nama + "</option>";
                    })

                    $('select[name=dataFilter]').html(option);
                    $('select[name=dataFilter]').selectpicker({
                            title: '- Pilih Dosen -'
                        })
                        .selectpicker('refresh');
                }
            })
        } else
        if (val == "kelas") {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>" + "jadwal/buatjadwal",
                dataType: 'json',
                data: {
                    manajemen: 'getDataFilter',
                    tabel: "kelas"
                },
                success: function(res) {
                    var option = "";
                    var cek = "";
                    var kelas;
                    $.each(res, function(keys, value) {
                        if (value.programstudi !== cek) {
                            if (cek != '') {
                                option += "</optgroup>";
                            }
                            option += "<optgroup label='" + value.programstudi + "'>";
                        }
                        // option += "<option value='" + value.id + "' data-subtext='Semester " + value.semester +"'>"+ value.nama +"</option>";
                        kelas = JSON.parse(value.nama);
                        for (var i = 0; i < kelas.length; i++) {
                            option += '<option value="' + [kelas[i], value.tahun_angkatan, value.programstudi] + '" data-subtext="' + value.jenis + '">' + value.tahun_angkatan + ' ' + kelas[i] + '</option>';
                        }

                        cek = value.programstudi;
                    })

                    option += "</optgroup>";

                    $('select[name=dataFilter]').html(option);
                    $('select[name=dataFilter]').selectpicker({
                            title: '- Pilih Kelas -'
                        })
                        .selectpicker('refresh');
                }
            })
        }
    }

    $('select[name=dataFilter]').change(function(e) {
        var field = $('select[name=filter]').val();

        switch (field.toString()) {
            case 'programstudi':
                $('#table').bootstrapTable('filterBy', {
                    programstudi: $(this).val()
                });
                break;
            case 'nama_mk':
                $('#table').bootstrapTable('filterBy', {
                    nama_mk: $(this).val()
                });
                break;
            case 'dosen':
                $('#table').bootstrapTable('filterBy', {
                    dosen: $(this).val()
                });
                break;
            case 'kelas':
                var dataFilter = e.target.value.split(",");
                $('#table').bootstrapTable('filterBy', {
                    kelas: dataFilter[0],
                    tahun_angkatan: dataFilter[1],
                    programstudi: dataFilter[2]
                });
                break;
            default:
                $('#table').bootstrapTable('filterBy', {});
        }
    })

    $("#submitBtn").click(function() {
        $('#formBuatJadwal').submit();

        var data = $('#formBuatJadwal').serializeArray();
        var result_jurusan = [];

        $.each(data, function(index, value) {
            return value['name'] == 'prodi' ? result_jurusan.push({
                'jurusan': value['value']
            }) : '';
        })

        data = jQuery.grep(data, function(value) {
            return value['name'] != 'id' && value['name'] != 'prodi';
        });

        var hasErr = $('#formBuatJadwal').find(".has-error").length;

        if (hasErr == 0) {
            if ($('input[name=populasi]').val() == '') {
                $('#populasiHelper').show();
            } else {
                $('#populasiHelper').hide();

                // $('.progress').removeClass('d-none').addClass('d-block');

                $('#submitBtn')
                    .attr('disabled', true)
                    .html('<span class="icon text-white-50"><i class="spinner-border spinner-border-sm" role="status"aria-hidden="true"></i></span><span class="text">Memproses...</span>');

                var start = new Date().getTime();

                // run_server_ga(data[0].value, data[1].value, start);
                generateJadwal(data[0].value, data[1].value, start);

            }
        }
    })



    function createNotification(status, teks) {
        $('.progress').removeClass('d-block').addClass('d-none');

        $('#submitBtn')
            .attr('disabled', false)
            .html('<span class="icon text-white-50"><i class="far fa-paper-plane"></i></span><span class="text">Proses</span>');

        Swal.fire({
            position: 'top-end',
            icon: status,
            title: teks,
            showConfirmButton: true
        })

    }

    function convertTime(start) {
        const sec_num = parseInt((new Date().getTime() - start) / 1000, 10);
        const hours = Math.floor(sec_num / 3600);
        const minutes = Math.floor((sec_num - (hours * 3600)) / 60);
        const seconds = sec_num - (hours * 3600) - (minutes * 60);

        return (hours == 0) ? (minutes == 0) ? seconds + ' Detik' : minutes + ' Menit, ' + seconds + ' Detik' : hours + ' Jam, ' + minutes + ' Menit, ' + seconds + ' Detik';
    }

    function generateJadwal(jenis_semester, tahun_akademik, start) {
        const request = jQuery.ajax({
            type: "GET",
            url: "<?php echo base_url() ?>" + "jadwal/generatejadwal",
            dataType: "JSON",
            data: {
                jenis_semester: jenis_semester,
                tahun_akademik: tahun_akademik
            },
            success: function(res) {
                console.log(res);
                if (res.status == true) {
                    const waktu = convertTime(start);

                    createNotification('success', 'Jadwal kuliah berhasil dibuat, Waktu Proses = ' + waktu);

                    $('#table').bootstrapTable('refresh');
                } else
                if (res.status == "gagal") {
                    const waktu = convertTime(start);

                    createNotification('error', 'Tidak ditemukan solusi optimal, Waktu Proses = ' + waktu);
                }

            },
            error: function(res) {
                console.log(res);
                const waktu = convertTime(start);

                createNotification('error', 'Terjadi masalah di server, Waktu Proses = ' + waktu);
            }
        });
    }


    function getTotalJadwal(data, prodi) {
        var res = jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>" + "jadwal/cekDataTotalJadwal",
            dataType: 'json',
            data: {
                data: data,
                jurusan: prodi
            },
            async: false
        })
        return res.responseJSON;
    }

    function getJurusan(data, prodi) {
        var res = jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>" + "jadwal/cekDataJenisJadwal",
            dataType: 'json',
            data: {
                data: data,
                jurusan: prodi
            },
            async: false
        })
        return res.responseJSON;
    }

    $('#hapusBtn').click(function() {
        swal.fire({
            title: "Warning",
            text: "Anda yakin untuk menghapus jadwal kuliah ini?",
            icon: 'warning',
            showCancelButton: true,
            showCloseButton: false,
            cancelButtonColor: '#001473',
            confirmButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then(function(res) {
            if (res.value) {
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>" + "jadwal/buatjadwal",
                    dataType: "JSON",
                    data: {
                        manajemen: "hapus-tabel"
                    },
                    success: function(res) {
                        if (res === true) {
                            Swal.fire(
                                'Berhasil!',
                                'Jadwal Kuliah Berhasil Dihapus',
                                'success'
                            )
                            $('#table').bootstrapTable('removeAll');
                        }
                    }
                });
            }
        });
    })

    $('#bentrokBtn').click(function(event) {
        const totalRows = $('#table').bootstrapTable('getOptions').totalRows;

        if (totalRows > 0) {
            $('#myBentrok').modal();
            var grid = $('#tableBentrok').grid();
            grid.reload();
        } else {
            Swal.fire(
                'Informasi',
                'Belum ada jadwal yang dibuat',
                'warning'
            )
        }
    });

    function cetakClick() {
        const field = $('select[name=filter]').val().toString();
        const filter = $('select[name=dataFilter]').val().toString();

        const totalRows = $('#table').bootstrapTable('getOptions').totalRows;
        const laporan = '<embed src="<?php echo base_url() ?>cetak?field=' + field + '&filter=' + filter + '" frameborder="1" width="100%" height="400px">';

        if (totalRows > 0) {
            $('#myCetak').modal();
            $('.isi-laporan').empty();
            $('.isi-laporan').append(laporan);
        } else {
            Swal.fire(
                'Informasi',
                'Belum ada jadwal yang dibuat',
                'warning'
            )
        }
    }

    function indexFormatter(val, row, index) {
        return index + 1;
    }

    function detailFormatter(index, row) {
        var html = []
        var title = {
            "nama_mk": "Matakuliah",
            "sks": "SKS",
            "semester": "Semester",
            "programstudi": "Program Studi"
        }

        $.each(row, function(key, value) {
            if (typeof value !== 'object' && value !== undefined && title[key] !== undefined) {
                html.push('<tr><td><b>' + title[key] + '</b></td><td>' + value + '</td></tr>');
            }
        })

        return html.join('')
    }

    function aksiFormatter(val) {
        return ["<button data-toggle='tooltip' title='Ubah' class='ubah btn btn-info btn-sm'>",
            "<i class='fas fa-pencil-alt'></i>",
            "</button>"
        ].join(' ');
    }

    window.aksiEvents = {
        'click .ubah': function(e, value, row, index) {
            $('#tableBentrok').editable();
        }
    }


    function rowStyle(row, index) {
        var classes = [
            'table-info',
            'table-secondary',
            'table-warning',
            'table-light'
        ]

        if (row.programstudi == 'Teknik Informatika') {
            return {
                classes: classes[0]
            }
        } else
        if (row.programstudi == 'Teknik Elektro') {
            return {
                classes: classes[1]
            }
        } else
        if (row.programstudi == 'Teknik Sipil') {
            return {
                classes: classes[2]
            }
        } else
        if (row.programstudi == 'Perencanaan Wilayah dan Kota') {
            return {
                classes: classes[3]
            }
        }
        return {}
    }

    jQuery.fn.ForceNumericOnly = function() {
        return this.each(function() {
            $(this).keydown(function(e) {
                var key = e.charCode || e.keyCode || 0;
                // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
                // home, end, period, and numpad decimal
                return (
                    key == 8 ||
                    key == 9 ||
                    key == 13 ||
                    key == 46 ||
                    key == 110 ||
                    key == 190 ||
                    (key >= 35 && key <= 40) ||
                    (key >= 48 && key <= 57) ||
                    (key >= 96 && key <= 105));
            });
        });
    };

    $('input[name="populasi"]').ForceNumericOnly();
</script> -->

</body>

</html>