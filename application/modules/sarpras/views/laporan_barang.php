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
            <select id="mutasi_asal" name="mutasi_asal" class="form-control">
              <option value="">== Asal ==</option>
              <?php foreach ($get_ruangan as $dt) : ?>
              <option value="<?= base_url('sarpras/laporan_barang/'.$dt['id'])?>" <?= set_select('mutasi_asal', $dt['id'], FALSE); ?>> <?= $dt['nama_ruangan'] ?>
              
              </option>';
              <?php endforeach; ?>
              </select>
          <?php if ($get_namabarang) { ?>
            <br>
Gedung : <?= $getruangan['nama_gedung']; ?><br>
 Ruangan : <?= $getruangan['nama_ruangan']; ?><br>
 Sekolah : <?= $getruangan['sekolah']; ?>
 <br>
          <div class="table-responsive">
              <table  class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Image</td>
                    <td>Jumlah</td>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($get_namabarang as $dt) : ?>
                  <?php if ( $dt['stok']>0) { ?>
                  <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['namabarang']; ?></td>
                      <td><img src="<?= base_url('assets/images/sarpras/'.$dt['image']); ?>"height="50px"width="50px">
                      <td><?= $dt['stok']; ?></td>                   
                    </tr>
                  <?php } ?>
                    <?php $i++; ?>
                 
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
<a href="<?php echo site_url('sarpras/laporanbarang_pdf/'.$ruangan_id); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>pdf.png"> Export ke PDF</a>
<a href="<?php echo site_url('sarpras/laporanbarang_excel/'.$ruangan_id); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>xls.png"> Export ke Excel</a>
<a href="<?php echo site_url('sarpras/laporanbarang_print/'.$ruangan_id); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>print.jpg" width="15"> Cetak ke Printer</a>
 
            <?php } else {
              echo "<br><div align='center'><font color='red'>Silahkan Memilih Asal Ruangan terlebih Dahulu...</font></div><br><br><br>";
            } ?>
          </div>
         

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

