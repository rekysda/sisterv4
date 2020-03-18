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

    <?= $this->session->flashdata('message') ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">          
          <div class="table-responsive">
              <table  class="table table-bordered table-striped"id='example3_nosearch'>
                <thead>
                  <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Image</td>
                    <td>Jumlah</td>
                    <td>Penempatan</td>
                    <td>Tersedia</td>
                    <td>DiMusnahkan</td>
                    <td>Aksi</td>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($get_namabarang as $dt) : ?>
                  <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['namabarang']; ?></td>
                      <td><img src="<?= base_url('assets/images/sarpras/'.$dt['image']); ?>"height="50px"width="50px">
                      <td><?= get_jumlahinventaris($dt['id'])?></td>                   
                      <td><?= get_jumlahmutasi($dt['id']) ?></td>                   
                      <td><?= get_jumlahinventaris($dt['id'])-get_jumlahmutasi($dt['id']) ?></td>           
                      <td><?= get_jumlahinventaris_rusak($dt['id'])*(-1)?></td>        
                      <td><a href="<?= base_url('sarpras/rekap_lokasi_barang/'.$dt['id'])?>"class="btn btn-primary">Detail</a></td>
                      <?php $i++; ?>
                 
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
<a href="<?php echo site_url('sarpras/laporanrekapbarang_pdf') ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>pdf.png"> Export ke PDF</a>
<a href="<?php echo site_url('sarpras/laporanrekapbarang_excel') ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>xls.png"> Export ke Excel</a>
<a href="<?php echo site_url('sarpras/laporanrekapbarang_print') ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>print.jpg" width="15"> Cetak ke Printer</a>        

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

