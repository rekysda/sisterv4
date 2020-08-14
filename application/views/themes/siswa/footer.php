<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b>4.0
  </div>
  &copy; <?= date('Y') ?> <a href="#"><strong>Sister</strong></a>. All rights
  reserved.
</footer>

<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url('assets/themes/backend/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/themes/backend/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- SlimScroll -->
<script src="<?= base_url('assets/themes/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/themes/backend/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/themes/backend/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/themes/backend/dist/js/demo.js') ?>"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/themes/backend/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/themes/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<!-- Select 2 -->
<link href="<?= base_url('assets/themes/backend/bower_components/select2/dist/css/select2.min.css') ?>" rel="stylesheet" />
<script src="<?= base_url('assets/themes/backend/bower_components/select2/dist/js/select2.min.js') ?>"></script>
<script language="JavaScript" type='text/javascript'>
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>


<script>
  $(function() {
    $('#example1').DataTable({
  "pageLength": 30
})
    $('#example2').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': false
    })
  })
</script>
<script>
  var roxyFileman = "<?= base_url('assets/vendors/fileman/index.html') ?>";
  var ckeditor = CKEDITOR.replace('id_textarea', {
    height: 'auto',
    filebrowserBrowseUrl: roxyFileman,
    filebrowserImageBrowseUrl: roxyFileman + '?type=image',
    removeDialogTabs: 'link:upload;image:upload'
  });
  CKEDITOR.disableautoinline = true;
  CKEDITOR.inline('editable');
</script>
</body>

</html>