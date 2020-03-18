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
      <li>Keuangan</li>
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
        <div class="col-md-12">
<form action="<?php base_url('keuangan/laporan_keuangan') ?>" method="post"id="FormLaporan">
<div class="form-group">
    <label for="exampleFormControlFile1">Dari Tanggal</label><input class="form-control" type="text" id="daritanggal"name="daritanggal"  value="<?= set_value('daritanggal', date('Y-m-01'),FALSE); ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Sampai Tanggal</label><input class="form-control" type="text" id="sampaitanggal"name="sampaitanggal"  value="<?= set_value('sampaitanggal', date('Y-m-d'),FALSE); ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile1">Cara Pembayaran</label> <select class="js-example-basic-single" name="carabayar" style="width:100%;">
<option value="semua">SEMUA</option>
<?php foreach ($mcarabayar as $dt) : ?>
<option value="<?= $dt['carabayar']; ?>"<?= set_select('carabayar', $dt['carabayar'], FALSE); ?> <?= $dt['carabayar'] == $carabayar ? ' selected="selected"' : ''; ?>><?= $dt['carabayar']; ?></option>
<?php endforeach; ?>
</select>
</div>
<div class="form-group">
    <label for="exampleFormControlFile1">Petugas</label> 
    <select class="js-example-basic-single" name="petugas" style="width:100%;">
<option value="semua">SEMUA</option>
<?php foreach ($mpetugas as $dt) : ?>
<option value="<?= $dt['user_id']; ?>"<?= set_select('petugas', $dt['user_id'], FALSE); ?> <?= $dt['user_id'] == $petugas ? ' selected="selected"' : ''; ?>><?= $dt['name']; ?></option>
<?php endforeach; ?>
</select>    
</div>
<div class="form-group">
    <label for="exampleFormControlFile1"></label>
    <button type="submit" class="btn btn-primary" name="submit">Tampilkan</button>
  </div>
</form>
</div>
<br>
<div class="col-md-12">
Data Pembayaran <?= $daritanggal; ?>, sampai <?= $sampaitanggal; ?> , Cara Pembayaran <?= $carabayar; ?>  , Petugas <?= getfieldtable('user','name',$petugas); ?>
  <table class="table table-striped" id="example3">
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
  </div>
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