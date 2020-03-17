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

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Data Siswa</h3>
        <div class="box-tools">

        </div>
      </div>
      <div class="box-body">
        <?= $this->session->flashdata('message') ?>
        <div class="row">
          <div class="col-sm-4">No Formulir</div>
          <div class="col-sm-8"><?= $getdatasiswa['noformulir'] ?></div>
        </div>
        <div class="row">
          <div class="col-sm-4">NIS</div>
          <div class="col-sm-8"><?= $getdatasiswa['nis'] ?></div>
        </div>
        <div class="row">
          <div class="col-sm-4">Nama</div>
          <div class="col-sm-8"><?= $getdatasiswa['namasiswa'] ?></div>
        </div>
        <div class="row">
          <div class="col-sm-4">Kelas</div>
          <div class="col-sm-8"><?= getfieldtable("m_kelas", "nama_kelas", $getkelassiswa['kelas_id']) ?></div>
        </div>
        <div class="row">
          <div class="col-sm-4">Tahun Akademik</div>
          <div class="col-sm-8"><?= getfieldtable("m_tahunakademik", "nama", $tahun_akademik_default['value']) ?></div>
        </div>
        <div class="row">
          <div class="col-sm-4">Presensi</div>
          <div class="col-sm-8"></div>
        </div>
        <div class="row">
          <div class="col-sm-4">Hadir</div>
          <div class="col-sm-8"><?= $get_siswahadir['jumlah']; ?></div>
        </div>
        <div class="row">
          <div class="col-sm-4">Sakit</div>
          <div class="col-sm-8"><?= $get_siswasakit['jumlah']; ?></div>
        </div>
        <div class="row">
          <div class="col-sm-4">Ijin</div>
          <div class="col-sm-8"><?= $get_siswaijin['jumlah']; ?></div>
        </div>
        <div class="row">
          <div class="col-sm-4">Tanpa Keterangan</div>
          <div class="col-sm-8"><?= $get_siswaalpa['jumlah']; ?></div>
        </div>
        <hr>
        <a href="<?php echo site_url('akademik/cetak_presensi_detail_pdf/' . $getdatasiswa['id']); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>pdf.png"> Export ke PDF</a>
        <a href="<?php echo site_url('akademik/cetak_presensi_detail_excel/' . $getdatasiswa['id']); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>xls.png"> Export ke Excel</a>
        <a href="<?php echo site_url('akademik/cetak_presensi_detail_print/' . $getdatasiswa['id']); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>print.jpg" width="15"> Cetak ke Printer</a>
        <!-- Posts List -->


      </div>
      <!-- /.box-body -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->