<footer class="main-footer">
    <div class="container">
        <div class="pull-right hidden-xs">
            Versi 1.3
        </div>
        <strong>Copyright &copy; 2024 | Made with <i class="fa fa-heart"></i> by <a href="#">Titik Balik Teknologi</a></strong>
    </div>
    <!-- /.container -->
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url() ?>assets/template_admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>assets/template_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/template_admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>assets/template_admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/template_admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/template_admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/template_admin/dist/js/demo.js"></script>

<!-- js app -->
<script src="<?= base_url() ?>assets/jadwal/js/depan.js"></script>

<script>
    $('#panelPrecios [data-toggle="tooltip"]').tooltip({
        animated: 'fade',
        placement: 'top',
        html: true
    });
</script>

<script>
    $(function() {
        //Initialize Select2 Elements

        $('.select2').select2()
    })
</script>
</body>

</html>