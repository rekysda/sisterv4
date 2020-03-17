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
      <li>Akademik</li>
      <li><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <?= $this->session->flashdata('message') ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
      <div class="col-md-6">
        <div class="box-tools">
          <a href="<?= base_url('akademik/kelas_addsiswa'); ?>" class="btn btn-primary btn-sm">
            Tambah</a>
          </a>&nbsp;<a href="<?= base_url('akademik/kelas_pindahsiswa'); ?>" class="btn btn-warning btn-sm">
            Pindah</a>
          &nbsp;<a href="<?= base_url('akademik/kelas_naiksiswa'); ?>" class="btn btn-info btn-sm">
            Kenaikan</a>
          &nbsp;<a href="<?= base_url('akademik/kelas_cetak'); ?>" class="btn btn-success btn-sm">
            Cetak</a>
        </div>
        </div>
      </div>
      <div class="box-body">
        <div class="row">

          <!-- //kelas asal -->
          <div class="col-md-8">
            <select class="form-control" name="kelas_asalcetak" id="kelas_asalcetak">
              <option value="" selected>Pilih Kelas</option>';
              <?php foreach ($m_kelas as $dt2) : ?>
              <option value="<?= base_url('akademik/kelas_asalcetak/' . $dt2['id'] . '/' . $dt2['tahun']) ?>" <?= set_select('kelas_asalcetak', $dt2['id'], FALSE); ?>>[<?= $dt2['tahun'] ?>] <?= $dt2['nama_kelas'] ?></option>';
              <?php endforeach; ?>
            </select>
            <?php if ($listsiswaasal) { ?>
            Angkatan : <?= $getkelasasal['tahun'] ?><br>
            Nama Kelas : <?= $getkelasasal['nama_kelas'] ?><br>
            Jurusan : <?= $getkelasasal['jurusan'] ?><br>
            Wali Kelas : <?= $getkelasasal['nama_guru'] ?><br>
            <?php } ?>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>JK</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php if ($listsiswaasal) { ?>
                  <?php foreach ($listsiswaasal as $dt3) : ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $dt3['nis'] ?></td>
                    <td><?= $dt3['namasiswa'] ?></td>
                    <td><?= $dt3['kelaminsiswa'] ?></td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <?php if ($listsiswaasal) { ?>
            <!-- /.box-body -->
            <div class="box-footer">
              <a href="<?php echo site_url('akademik/cetak_kelas_pdf/' . $kelas_asalcetak); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>pdf.png"> Export ke PDF</a>
              <a href="<?php echo site_url('akademik/cetak_kelas_excel/' . $kelas_asalcetak); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>xls.png"> Export ke Excel</a>
              <a href="<?php echo site_url('akademik/cetak_kelas_print/' . $kelas_asalcetak); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>print.jpg" width="15"> Cetak ke Printer</a>
            </div>
            <!-- /.box-footer -->
            <?php } ?>
          </div>

          <!-- //kelas tujuan -->

          <!-- table -->
        </div>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->