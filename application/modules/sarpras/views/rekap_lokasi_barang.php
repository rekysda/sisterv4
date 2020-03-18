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
              <table class="table table-bordered table-striped"id='example3_nosearch'>
                <thead>
                  <tr>
                    <td>No</td>
                    <td>Ruangan</td>
                    <td>Sekolah</td>
                    <td>Nama</td>
                    <td>Image</td>
                    <td>Jumlah</td>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($get_namabarang as $dt) : ?>
                  <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['nama_ruangan']; ?></td>
                      <td><?php if($dt['sekolah']){?><?= $dt['sekolah'] ?><?php } ?></td>
                      <td><?= $dt['namabarang']; ?></td>
                      <td><img src="<?= base_url('assets/images/sarpras/'.$dt['image']); ?>"height="50px"width="50px">                  
                      <td><?= ($dt['stok']) ?></td>                                      
                      <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
<a href="<?php echo site_url('sarpras/laporanlokasibarang_pdf/'.$dt['barang_id']); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>pdf.png"> Export ke PDF</a>
<a href="<?php echo site_url('sarpras/laporanlokasibarang_excel/'.$dt['barang_id']); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>xls.png"> Export ke Excel</a>
<a href="<?php echo site_url('sarpras/laporanlokasibarang_print/'.$dt['barang_id']); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>print.jpg" width="15"> Cetak ke Printer</a>
<a href="<?php echo site_url('sarpras/rekap_barang'); ?>"class='btn btn-primary'>kembali</a>       

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

