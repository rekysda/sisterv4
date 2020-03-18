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
      <li>Kepegawaian</li>
      <li><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <?= $this->session->flashdata('message') ?>
    <?= validation_errors(); ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">List Penggajian</h3>
      </div>
      <div class="box-body">

        <div class="row">
          <div class="col-md-3">
            <ul class="list-group">
              <li class="list-group-item text-center"><img class='img-thumbnail' style='width:155px' src="<?= base_url('assets/images/pegawai/' . $s['image']); ?>"></li>
              <li class="list-group-item text-center"><a href='<?= base_url('kepegawaian/penggajian_add/' . $s['id']) ?>' class='btn btn-success'>Tambah Penggajian</a></li>
            </ul>
            <ul class="list-group">
              <li class="list-group-item"><strong>NIP</strong><br> <?= $s['nip'] ?></li>
              <li class="list-group-item"><strong>Nama</strong><br> <?= $s['nama_guru'] ?></li>
              <li class="list-group-item"><strong>NUPTK</strong><br> <?= $s['nuptk'] ?></li>
              <li class="list-group-item"><strong>Jenis PTK</strong><br> <?= $s['jenisptk'] ?></li>
              <li class="list-group-item"><strong>Tugas Tambahan</strong><br> <?= $s['tugas_tambahan'] ?></li>
              <li class="list-group-item"><strong>Status Kepegawaian</strong><br> <?= $s['statuspegawai'] ?></li>
              <li class="list-group-item"><strong>Status Nikah</strong><br> <?= $s['statusnikah'] ?></li>
              <li class="list-group-item"><strong>Golongan</strong><br> <?= $s['golongan'] ?></li>
              <li class="list-group-item"><strong>NPWP</strong><br> <?= $s['npwp'] ?></li>
            </ul>
          </div>
          <div class="col-md-9">
            <div class="table-responsive">
              <table class='table table-hover' id="example3">
                <thead>
                  <tr>
                    <th>Tahun</th>
                    <th>Bulan</th>
                    <th>Gaji Pokok</th>
                    <th>Gaji Ngajar</th>
                    <th>Tunjangan</th>
                    <th>Potongan</th>
                    <th>Gaji diTerima</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sno = 1;
                  foreach ($getgaji as $dt) :
                    $tahun = $dt['tahun'];
                    $bulan = $dt['bulan'];
                    $gajipokok = $dt['gajipokok'];
                    $gajingajar = $dt['gajingajar'];
                    $tunjangan = $dt['gelar'] + $dt['sertifikasi'] + $dt['masakerja'] + $dt['transport'] + $dt['laboratorium'] + $dt['walikelas'];
                    $potongan = $dt['sosial'] + $dt['bpjs'];
                    $gajiditerima = $dt['gajiditerima'];
                    ?>
                    <tr>
                      <td><?= $tahun ?></td>
                      <td><?= $bulan ?></td>
                      <td><?= nominal($gajipokok) ?></td>
                      <td><?= nominal($gajingajar) ?></td>
                      <td><?= nominal($tunjangan) ?></td>
                      <td><?= nominal($potongan) ?></td>
                      <td><?= nominal($gajiditerima) ?></td>
                      <td>
                        <a href="<?= base_url('kepegawaian/cetak_slipgaji/' . $dt['id'] . '/' . $dt['id_pegawai']); ?>" class="btn btn-success btn-xs" target="new">Slip</a>
                        <a href="<?= base_url('kepegawaian/penggajian_hapus/' . $dt['id'] . '/' . $dt['id_pegawai']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Hapus</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <a class="btn btn-default" href="<?= base_url('kepegawaian/penggajian') ?>">Kembali ke Daftar Pegawai</a>
      </div>

    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->