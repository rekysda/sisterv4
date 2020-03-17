
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
<form action="" method="post"id="FormLaporan"class="form-inline">
&nbsp;&nbsp;Dari Tanggal&nbsp;&nbsp;
<input class="form-control" type="text" id="daritanggal"name="daritanggal"  value="<?= set_value('daritanggal', date('Y-m-01'),FALSE); ?>">&nbsp;&nbsp;Sampai Tanggal&nbsp;&nbsp;
<input class="form-control" type="text" id="sampaitanggal"name="sampaitanggal"  value="<?= set_value('sampaitanggal', date('Y-m-d'),FALSE); ?>">
<button type="submit" class="btn btn-primary" name="submit">Tampilkan</button>
</form><br>
Data Pembayaran <?= $daritanggal; ?>, sampai <?= $sampaitanggal; ?>
  <table class="table table-striped" id="example3">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Nama</th>
      <th scope="col">AsalSekolah</th>
      <th scope="col">Alamat</th>
      <th scope="col">NoHandphone</th>
      <th scope="col">Jumlah</th>
      <th scope="col">NoFormulir</th>
      <th scope="col">Bayar</th>
    </tr>
  </thead>
  <tbody>
  <?php $no='1'; ?>
  <?php foreach ($penjualanresult as $item): ?>
  <?php if($item['bayar_form']>'0'){?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= date('d M Y',strtotime($item['tanggal'])) ?></td>
      <td><?= $item['nama'] ?></td>
      <td><?= $item['asalsekolah'] ?></td>
      <td><?= $item['alamat'] ?></td>
      <td><?= $item['hp'] ?></td>
      <td><?= $item['jumlah_form'] ?></td>
      <td><?= $item['no_formulir'] ?></td>
      <td><?= nominal($item['bayar_form']) ?></td>
    </tr>
    <?php 
    $tbayar +=$item['bayar_form'];
    $no++; 
     } 
    endforeach; ?>  
  </tbody>
  <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <th> Total </th>
      <td><?= nominal($tbayar) ?></td>
    </tr>
</table>
<a href="<?= site_url('ppdb/laporan_jual_pdf/'.$daritanggal.'/'.$sampaitanggal) ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>pdf.png"> Export ke PDF</a>
<a href="<?= site_url('ppdb/laporan_jual_excel/'.$daritanggal.'/'.$sampaitanggal) ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>xls.png"> Export ke Excel</a>
<a href="<?= site_url('ppdb/laporan_jual_print/'.$daritanggal.'/'.$sampaitanggal) ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>print.jpg" width="15"> Cetak ke Printer</a>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->