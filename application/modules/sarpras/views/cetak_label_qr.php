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
          <div class="col-md-6">
<img src="<?= base_url('assets/images/qrcode/'.$kode_inv.'.png') ?>"height="150px"><br>
<?=$get_inventaris_barang['namabarang']?>/<?= $kode_inv ?>/<?= $tahuninv ?><br>
<a href="<?= base_url('sarpras/detail_cetak_label/'.$barang_id); ?>" class="btn btn-default">Kembali</a>&nbsp;&nbsp;<a href="<?= base_url('sarpras/cetak_label_print/'.$barang_id.'/'.$kode_inv.'/'.$jumlah_cetak); ?>" class="btn btn-primary"target="new">Cetak QR<?= $jumlah_cetak ?></a>
</div>
<div class="col-md-6">
<img src="<?= base_url('assets/images/barcode/'.$kode_inv.'.png') ?>"height="150px"><br>
<?= $kode_inv ?><br>
<a href="<?= base_url('sarpras/detail_cetak_label/'.$barang_id); ?>" class="btn btn-default">Kembali</a>&nbsp;&nbsp;<a href="<?= base_url('sarpras/cetak_labelbarcode_print/'.$barang_id.'/'.$kode_inv.'/'.$jumlah_cetak); ?>" class="btn btn-success"target="new">Cetak Barcode<?= $jumlah_cetak ?></a>
</div>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

