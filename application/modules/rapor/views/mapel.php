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
        <h3 class="box-title"></h3>
        <div class="box-tools">
          <a href="<?= base_url('rapor/mapel_add'); ?>" class="btn btn-primary btn-sm">
            Tambahkan Data
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
              <th>Kode Mapel</th>
              <th>Nama Mapel</th>
              <th>ShortName</th>
              <th>Jurusan</th>
              <th>Tingkat</th>
              <th>Guru MGMP</th>
              <th>Urutan</th>
              <th>Kelompok</th>
              <th>Is_Active?</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sno = $row + 1;
            foreach ($mapel as $dt) : ?>
              <tr>
                <td><?= $sno++ ?></td>
                <td><?= $dt['kode_mapel'] ?></td>
                <td><?= $dt['nama_mapel'] ?></td>
                <td><?= $dt['sk_mapel'] ?></td>
                <td><?= $dt['nama_jurusan'] ?></td>
                <td><?= $dt['tingkat'] ?></td>
                <td><?= $dt['nama_guru'] ?></td>
                <td><?= $dt['urutan'] ?></td>
                <td><?= $dt['nama_kelompok'] ?></td>
                <td><?= $dt['is_active'] ?></td>
                <td width="100">
                  <a href="<?= base_url('rapor/mapel_edit/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                  <a href="<?= base_url('rapor/mapel_hapus/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
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