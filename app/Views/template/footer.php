<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.2.0
  </div>
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>


<script src="<?php echo base_url('plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?php echo base_url('plugins/select2/js/select2.full.min.js') ?>"></script>
<script src="<?php echo base_url('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') ?>"></script>
<script src="<?php echo base_url('plugins/moment/moment.min.js') ?>"></script>
<script src="<?php echo base_url('plugins/inputmask/jquery.inputmask.min.js') ?>"></script>
<script src="<?php echo base_url('plugins/daterangepicker/daterangepicker.js') ?>"></script>
<script src="<?php echo base_url('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') ?>"></script>
<script src="<?php echo base_url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<script src="<?php echo base_url('plugins/bootstrap-switch/js/bootstrap-switch.min.js') ?>"></script>
<script src="<?php echo base_url('plugins/bs-stepper/js/bs-stepper.min.js') ?>"></script>
<script src="<?php echo base_url('plugins/dropzone/min/dropzone.min.js') ?>"></script>
<script src="<?php echo base_url('dist/js/adminlte.js?v=3.2.0') ?>"></script>
<script src="<?php echo base_url('dist/js/demo.js') ?>"></script>
<script src="<?php echo base_url('js/global.js') ?>"></script>

<script>
  $(function() {

    //Date picker

    var loginDate = "<?= session()->get('login_date') ?>";

    if (loginDate) {
      $('#datePengajuan').val(loginDate);
    } else {
      $('#datePengajuan').datetimepicker({
        format: 'L'
      });
    }
    //Date and time picker
    $('#dateDiperlukan').datetimepicker({
      format: 'L'
    });

    $('#PeriodeAktif').daterangepicker();
    $('#PeriodeAktifLama').daterangepicker();

  });
</script>

</body>

</html>