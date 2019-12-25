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
<form action="<?php base_url('keuangan/laporan_keuangan') ?>" method="post"id="FormLaporan">
<table>
<tr><th style="text-align: center; vertical-align: middle;">&nbsp;&nbsp;Dari Tanggal&nbsp;&nbsp;</th>
<th style="text-align: center; vertical-align: middle;"><input class="form-control" type="text" id="daritanggal"name="daritanggal"  value="<?= set_value('daritanggal', date('Y-m-01'),FALSE); ?>"></th>
<th style="text-align: center; vertical-align: middle;">&nbsp;&nbsp;Sampai Tanggal&nbsp;&nbsp;</th><th><input class="form-control" type="text" id="sampaitanggal"name="sampaitanggal"  value="<?= set_value('sampaitanggal', date('Y-m-d'),FALSE); ?>"></th>
<th style="text-align: center; vertical-align: middle;">&nbsp;&nbsp;Cara Pembayaran&nbsp;&nbsp;</th>
<th>
<select class="js-example-basic-single" name="carabayar">
<option value="semua">SEMUA</option>
                <?php foreach ($mcarabayar as $dt) : ?>
                    <option value="<?= $dt['carabayar']; ?>"<?= set_select('carabayar', $dt['carabayar'], FALSE); ?> <?= $dt['carabayar'] == $carabayar ? ' selected="selected"' : ''; ?>><?= $dt['carabayar']; ?></option>
                <?php endforeach; ?>
                </select>
</th>
<th style="text-align: center; vertical-align: middle;">&nbsp;&nbsp;Petugas&nbsp;&nbsp;</th>
<th>
<select class="js-example-basic-single" name="petugas">
<option value="semua">SEMUA</option>
                <?php foreach ($mpetugas as $dt) : ?>
                    <option value="<?= $dt['user_id']; ?>"<?= set_select('petugas', $dt['user_id'], FALSE); ?> <?= $dt['user_id'] == $petugas ? ' selected="selected"' : ''; ?>><?= $dt['name']; ?></option>
                <?php endforeach; ?>
                </select>
</th></tr>
<tr><td></td><td><br>
<button type="submit" class="btn btn-primary" name="submit">Tampilkan</button></td><td></td><td></td></tr>
</table>
</form><br>
Data Pembayaran <?= $daritanggal; ?>, sampai <?= $sampaitanggal; ?> , Cara Pembayaran <?= $carabayar; ?>  , Petugas <?= getfieldtable('user','name',$petugas); ?>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Nomor Nota</th>
      <th scope="col">Total</th>
      <th scope="col">Bayar</th>
      <th scope="col">Cara Pembayaran</th>
      <th scope="col">Siswa</th>
      <th scope="col">Petugas</th>
    </tr>
  </thead>
  <tbody>
  <?php $no='1'; ?>
  <?php foreach ($siswabayar as $item): ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= date('d M Y',strtotime($item['tanggal'])) ?></td>
      <td><?= $item['nomor_nota'] ?></td>
      <td><?= nominal($item['totalcart']) ?></td>
      <td><?= nominal($item['bayar']) ?></td>
      <td><?= $item['carabayar'] ?></td>
      <td><?= $item['namasiswa'] ?></td>
      <td><?= $item['name'] ?></td>
    </tr>
    <?php  
    $ttotal +=$item['totalcart'];
    $tbayar +=$item['bayar'];
    $no++; 
    endforeach; ?>  
  </tbody>
  <tr>
      <td></td>
      <td></td>
      <th> Total </th>
      <td><?= nominal($ttotal) ?></td>
      <td><?= nominal($tbayar) ?></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
</table>
<a href="<?php echo site_url('keuangan/laporan_pdf/'.$daritanggal.'/'.$sampaitanggal.'/'.$carabayar.'/'.$petugas); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>pdf.png"> Export ke PDF</a>
<a href="<?php echo site_url('keuangan/laporan_excel/'.$daritanggal.'/'.$sampaitanggal.'/'.$carabayar.'/'.$petugas); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>xls.png"> Export ke Excel</a>
<a href="<?php echo site_url('keuangan/laporan_print/'.$daritanggal.'/'.$sampaitanggal.'/'.$carabayar.'/'.$petugas); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>print.jpg" width="15"> Cetak ke Printer</a>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->