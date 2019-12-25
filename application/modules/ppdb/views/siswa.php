<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $title; ?>
      <small>untuk mengelola <?= $title; ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">All</h3>
        <div class="box-tools">
          <a href="<?= base_url('ppdb/siswa_add'); ?>" class="btn btn-primary btn-sm">
            Calon Siswa
          </a>&nbsp;&nbsp;<a href="<?= base_url('ppdb/siswalama_add'); ?>" class="btn btn-warning btn-sm">
            Siswa Lama
          </a>&nbsp;&nbsp;<a href="<?= base_url('ppdb/siswa_login'); ?>" class="btn btn-success btn-sm">
            Atur Login Siswa
          </a>
        </div>
      </div>
      <div class="box-body">
        <?= $this->session->flashdata('message') ?>
        <!-- Search form (start) -->

        <!-- Posts List -->
        <table class='table table-hover' id="example1">
          <thead>
            <tr>
              <th>#</th>
              <th>NoFormulir</th>
              <th>NIS</th>
              <th>Nama</th>
              <th>Tahun PPDB</th>
              <th>Gelombang</th>
              <th>Jalur</th>
              <th>Status</th>
              <th width='15%'>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sno = $row + 1;
            foreach ($siswa as $dt) : ?>
              <tr>
                <td><?= $sno++ ?></td>
                <td><?= $dt['noformulir'] ?></td>
                <td><?= $dt['nis'] ?></td>
                <td><?= $dt['namasiswa'] ?></td>
                <td><?= $dt['namatahun'] ?></td>
                <td><?= $dt['gelombang'] ?></td>
                <td><?= $dt['jalur'] ?></td>
                <td><?= $dt['ppdb_status'] ?></td>
                <td width="100">
                  <a href="<?= base_url('ppdb/editsiswa/' . $dt['id']); ?>" class="btn btn-warning btn-xs">Ubah</a>
                  <a href="<?= base_url('ppdb/hapussiswa/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Hapus</a>
                  <a href="<?= base_url('ppdb/print_siswa_detail/' . $dt['id']); ?>" class="btn btn-primary btn-xs"target="new">Cetak</a>
                </td>
              </tr>
            <?php endforeach; ?>
          <tbody>
        </table>

      </div>
      <!-- /.box-body -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->