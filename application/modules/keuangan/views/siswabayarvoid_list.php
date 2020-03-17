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
                <h3 class="box-title">All</h3>
                <div class="box-tools">
          <a href="<?= base_url('keuangan/siswabayarvoid'); ?>" class="btn btn-success btn-sm">
            Kembali
          </a>&nbsp;&nbsp;
        </div>
            </div>
            <div class="box-body">
            <?= $this->session->flashdata('message') ?>
<!-- Search form (start) -->

<div class="row">
<div class="col-md-12">
<table class="table table-striped"  id="example1">
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
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php $no='1'; ?>
  <?php foreach ($siswabayarmaster_all as $item): ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= date('d M Y',strtotime($item['tanggal'])) ?></td>
      <td><?= $item['nomor_nota'] ?></td>
      <td><?= nominal($item['totalcart']) ?></td>
      <td><?= nominal($item['bayar']) ?></td>
      <td><?= $item['carabayar'] ?></td>
      <td><?= $item['namasiswa'] ?></td>
      <td><?= $item['name'] ?></td>
      <td><a href="<?= base_url('keuangan/siswabayarvoid_add/'.$item['id_master']) ?>"class="btn btn-warning">Pilih Transaksi ini</td>
    </tr>
    <?php  
    $ttotal +=$item['totalcart'];
    $tbayar +=$item['bayar'];
    $no++; 
    endforeach; ?>  
  </tbody>
</table>

    </div>
            </div>
        <!-- /.box-body -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->