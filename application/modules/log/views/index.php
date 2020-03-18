
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
      <li>Log</li>
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
<form action="" method="post"id="FormLaporan"class="form-inline">
&nbsp;&nbsp;Dari Tanggal&nbsp;&nbsp;
<input class="form-control" type="text" id="daritanggal"name="daritanggal"  value="<?= set_value('daritanggal', date('Y-m-01'),FALSE); ?>">&nbsp;&nbsp;Sampai Tanggal&nbsp;&nbsp;
<input class="form-control" type="text" id="sampaitanggal"name="sampaitanggal"  value="<?= set_value('sampaitanggal', date('Y-m-d'),FALSE); ?>">
<button type="submit" class="btn btn-primary" name="submit">Tampilkan</button>
</form><br>
Data Log Aktifitas <?= $daritanggal; ?>, sampai <?= $sampaitanggal; ?>
  <table class="table table-striped"id="example3">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Waktu</th>
      <th scope="col">User</th>
      <th scope="col">Aksi</th>
      <th scope="col">Item</th>
    </tr>
  </thead>
  <tbody>
  <?php $no='1'; ?>
  <?php foreach ($logresult as $item): ?>
  <?php if($item['tanggal']<>''){?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= date('d M Y',strtotime($item['tanggal'])) ?></td>
      <td><?= date('H:i:s',strtotime($item['tanggal'])) ?></td>
      <td><?= $item['user'] ?></td>
      <td><?= $item['aksi'] ?></td>
      <td><?= $item['item'] ?></td>
    </tr>
    <?php 
    $no++; 
     } 
    endforeach; ?>  
  </tbody>
  <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
</table>
<a href="<?= site_url('log/laporan_log_print/'.$daritanggal.'/'.$sampaitanggal) ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>print.jpg" width="15"> Cetak ke Printer</a>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->