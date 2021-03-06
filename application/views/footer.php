<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 1.0
  </div>
  <strong>Copyright &copy; 2016 <a href="http://www.instagram.com/ayraagas">Agas Arya Widodo</a>.</strong> All rights
  reserved.
</footer>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="assets/plugins/jQuery/jquery-3.1.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/plugins/jQueryUI/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="assets/datatables/datatables.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true
    });

    $(document).ready(function() {
    $('table.display').DataTable();
} );

    $(document).on( "click", '#terima',function(e) {

      var id = $(this).data('id');

      $(".id_asisten").val(id);

    });

    $(document).on("click", "#ubahkriteria", function (e) {
      var id= $(this).data('id');
      var nama= $(this).data('nama');
      var bobot= $(this).data('bobot');
      var kategori= $(this).data('kategori');
      $("#id").val(id);
      $("#nama").val(nama);
      $("#bobot").val(bobot);
      $('#kategori').val(kategori);
      $("#kategori").children("option").filter(":selected").text(kategori);
    });

    $(document).on("click", "#ubahsubkriteria", function (e) {
      var id= $(this).data('id');
      var nama= $(this).data('nama');
      var bobot= $(this).data('bobot');
      var kategori= $(this).data('kategori');
      $("#id").val(id);
      $("#nama").val(nama);
      $("#bobot").val(bobot);
      $('#kategori').val(kategori);
      $("#kategori").children("option").filter(":selected").text(kategori);
    });

   $(function () {
    //Initialize Select2 Elements
    $(".select2").select2(); });
  });

</script>
<!-- SlimScroll -->
<script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- Morris.js charts -->
<script src="assets/plugins/morris/raphael-min.js"></script>
<script src="assets/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- jvectormap -->
<script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="assets/plugins/daterangepicker/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="assets/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="assets/plugins/chartjs/ChartNew.js"></script>
<!-- script tambahan -->
<script src="assets/dist/addinput.js" type="text/javascript" charset="utf-8" async defer></script>
<script src="assets/sweetalert/dist/sweetalert.min.js"></script>

<script src="assets/js/warn_delete.js"></script>

</body>
</html>