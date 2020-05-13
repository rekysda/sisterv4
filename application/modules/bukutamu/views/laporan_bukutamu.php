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
      <li class="active"><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?> Per Tanggal</h3>
      </div>
      <div class="box-body">
<form action="<?php base_url('sarpras/laporan_bukutamu') ?>" method="post"id="FormLaporan">
<table>
<tr><th style="text-align: center; vertical-align: middle;">&nbsp;&nbsp;Dari Tanggal&nbsp;&nbsp;</th>
<th style="text-align: center; vertical-align: middle;"><input class="form-control" type="text" id="daritanggal"name="daritanggal"  value="<?= set_value('daritanggal', date('Y-m-01'),FALSE); ?>"></th>
<th style="text-align: center; vertical-align: middle;">&nbsp;&nbsp;Sampai Tanggal&nbsp;&nbsp;</th><th><input class="form-control" type="text" id="sampaitanggal"name="sampaitanggal"  value="<?= set_value('sampaitanggal', date('Y-m-d'),FALSE); ?>"></th>
<tr><td></td><td><br>
<button type="submit" class="btn btn-primary" name="submit">Tampilkan</button></td><td></td><td></td></tr>
</table>
</form><br>
<?php if($bukutamu){ ?>
Data Buku Tamu <?= $daritanggal; ?>, sampai <?= $sampaitanggal; ?> 
  <table class="table table-striped"id='example3'>
  <thead>
    <tr>
<td scope="col">#</td>
<td>Nomor</td>
<td>Nama</td>
<td>Jabatan</td>
<td>HP</td>
<td>Maksud</td>
<td>Yang Dituju</td>
<td>Catatan</td>
    </tr>
  </thead>
  <tbody>
  <?php $no='1'; ?>
  <?php foreach ($bukutamu as $dt): ?>
    <tr>
    <td><?= $no; ?></td>
                      <td><?= $dt['nomor']; ?></td>
                      <td><?= $dt['nama']; ?></td>
                      <td><?= $dt['jabatan']; ?></td>
                      <td><?= $dt['hp']; ?></td>
                      <td><?= $dt['maksud']; ?></td>
                      <td><?= $dt['nama_guru']; ?></td>
                      <td><?= $dt['catatan']; ?></td>
    </tr>
    <?php
    $no++; 
    endforeach; ?>  
  </tbody>
</table>
<a href="<?php echo site_url('bukutamu/laporanbukutamu_pdf/'.$daritanggal.'/'.$sampaitanggal); ?>" target='new' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>pdf.png"> Export ke PDF</a>
<a href="<?php echo site_url('bukutamu/laporanbukutamu_print/'.$daritanggal.'/'.$sampaitanggal); ?>" target='new' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>print.jpg" width="15"> Cetak ke Printer</a>
<?php }else{
echo "<br><div align='center'><font color='red'>Silahkan Memilih Tanggal Laporan...</font></div><br><br><br>";

    } ?>
    </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->