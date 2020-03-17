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
      <li>Akademik</li>
      <li><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
      <div class="col-md-6">
        <div class="box-tools">
          <a href="<?= base_url('akademik/siswa_add'); ?>" class="btn btn-primary btn-sm">
            Calon Siswa
          </a>&nbsp;&nbsp;<a href="<?= base_url('akademik/siswalama_add'); ?>" class="btn btn-warning btn-sm">
            Siswa Lama
          </a>&nbsp;&nbsp;<a href="<?= base_url('akademik/siswa_login'); ?>" class="btn btn-success btn-sm">
            Atur Login Siswa
          </a>
        </div>
      </div>
      </div>
      <div class="box-body">
        <?= $this->session->flashdata('message') ?>
        <!-- Search form (start) -->

        <!-- Posts List -->
        <table class='table table-hover'id='example3'>
          <thead>
            <tr>
              <th>#</th>
              <th>NoFormulir</th>
              <th>NIS</th>
              <th>Nama</th>
              <th>Angkatan</th>
              <th>Kelas</th>
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
              <td><?= $dt['tahun'] ?></td>
              <td><?= $dt['nama_kelas'] ?></td>
              <td><?= $dt['ppdb_status'] ?></td>
              <td width="100">
                <a href="<?= base_url('akademik/editsiswa/' . $dt['id']); ?>" class="btn btn-warning btn-xs">Ubah</a>
                <a href="<?= base_url('akademik/hapussiswa/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Hapus</a>
                <a href="<?= base_url('akademik/print_siswa_detail/' . $dt['id']); ?>" class="btn btn-primary btn-xs" target="new">Cetak</a>
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