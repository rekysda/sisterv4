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

    <?= $this->session->flashdata('message') ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
<img src="<?= base_url('assets/images/qrcode/'.$kode_inv.'.png') ?>"width="150px"><br>
<?=$get_inventaris_barang['namabarang']?>/<?= $kode_inv ?>/<?= $tahuninv ?>

          </div>
        </div>
        <a href="<?= base_url('sarpras/detail_cetak_label/'.$barang_id); ?>" class="btn btn-default">Kembali</a>&nbsp;&nbsp;<a href="<?= base_url('sarpras/cetak_label_print/'.$barang_id.'/'.$kode_inv.'/'.$jumlah_cetak); ?>" class="btn btn-primary"target="new">Cetak <?= $jumlah_cetak ?></a>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

