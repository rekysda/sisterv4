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
      <li>Sarpras</li>
      <li><?= $title; ?></li>
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
<form action="<?php base_url('sarpras/laporan_mutasi_rusak') ?>" method="post"id="FormLaporan">
<table>
<tr><th style="text-align: center; vertical-align: middle;">&nbsp;&nbsp;Dari Tanggal&nbsp;&nbsp;</th>
<th style="text-align: center; vertical-align: middle;"><input class="form-control" type="text" id="daritanggal"name="daritanggal"  value="<?= set_value('daritanggal', date('Y-m-01'),FALSE); ?>"></th>
<th style="text-align: center; vertical-align: middle;">&nbsp;&nbsp;Sampai Tanggal&nbsp;&nbsp;</th><th><input class="form-control" type="text" id="sampaitanggal"name="sampaitanggal"  value="<?= set_value('sampaitanggal', date('Y-m-d'),FALSE); ?>"></th>
<tr><td></td><td><br>
<button type="submit" class="btn btn-primary" name="submit">Tampilkan</button></td><td></td><td></td></tr>
</table>
</form><br>
<?php if($mutasibarang){ ?>
Data Mutasi Pemusnahan <?= $daritanggal; ?>, sampai <?= $sampaitanggal; ?> 
  <table class="table table-striped"id='example3_nosearch'>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Kode</th>
      <th scope="col">Kode.Inv</th>
      <th scope="col">Barang</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Keterangan</th>
    </tr>
  </thead>
  <tbody>
  <?php $no='1'; ?>
  <?php foreach ($mutasibarang as $item): ?>
  <?php
$jumlah=$item['jumlah'];
  ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= date('d M Y',strtotime($item['tanggal'])) ?></td>
      <td><?= $item['kode'] ?></td>
      <td><?= $item['kode_inv'] ?></td>
      <td><?= $item['namabarang'] ?></td>
      <td><?= $jumlah ?></td>
      <td><?= $item['keterangan'] ?></td>
    </tr>
    <?php
    $no++; 
    endforeach; ?>  
  </tbody>
</table>
<a href="<?php echo site_url('sarpras/laporanmutasirusak_pdf/'.$daritanggal.'/'.$sampaitanggal); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>pdf.png"> Export ke PDF</a>
<a href="<?php echo site_url('sarpras/laporanmutasirusak_excel/'.$daritanggal.'/'.$sampaitanggal); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>xls.png"> Export ke Excel</a>
<a href="<?php echo site_url('sarpras/laporanmutasirusak_print/'.$daritanggal.'/'.$sampaitanggal); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>print.jpg" width="15"> Cetak ke Printer</a>
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