<script type='text/javascript'>
  $(function($) {
    $('#nominal').autoNumeric('init', {
      lZero: 'deny',
      aSep: ',',
      mDec: 0
    });
  });
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $title; ?>
      <small>to manage <?= $title; ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>PPDB</li>
            <li><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">


    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">All Data</h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-hover" id='example3'>
            <thead>
              <tr>
                <th>No</th>
                <th>Sekolah</th>
                <th>Tahun</th>
                <th>gelombang</th>
                <th>Jalur</th>
                <th>Nominal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($gelombangjalur as $gelombangjalur) : ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= getfieldtable('m_sekolah','sekolah',$gelombangjalur['sekolah_id']); ?></td>
                  <td><?= $gelombangjalur['tahun_id'] ?></td>
                  <td><?= $gelombangjalur['gelombang'] ?></td>
                  <td><?= $gelombangjalur['jalur'] ?></td>
                  <td>
                    <?= nominal(getjumlahbiaya($gelombangjalur['id'])); ?>
                  </td>
                  <td> <a href="<?= base_url('ppdb/jalurbiaya_add/' . $gelombangjalur['id']); ?>" class="btn btn-warning btn-xs">Tambah Biaya</a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

        </div>
        <!-- /.box-body -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->