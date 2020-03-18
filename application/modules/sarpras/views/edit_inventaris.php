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
          <div class="col-md-4">
            <form action="" method="post"enctype="multipart/form-data">
            <div class="form-group <?php echo form_error('tanggal') ? 'has-error' : '' ?>">
                <label for="name">Tanggal</label>
                <input class="form-control" type="text" name="kode_inv" value="<?= $get_inventaris_barang['tanggal'] ?>" />
                <?= form_error('tanggal', '<span class="help-block">', '</small>'); ?>
              </div>
            <input class="form-control" type="hidden" name="barang_id" value="<?= $get_inventaris_barang['barang_id'] ?>" />
                <?= form_error('kode_inv', '<span class="help-block">', '</small>'); ?>
            <div class="form-group <?php echo form_error('kode_inv') ? 'has-error' : '' ?>">
                <label for="name">Kode Inventaris</label>
                <input class="form-control" type="text" name="kode_inv" value="<?= $get_inventaris_barang['kode_inv'] ?>" />
                <?= form_error('kode_inv', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label for="name">Nama Barang</label>
                <input class="form-control" type="text" name="namabarang" value="<?= $namabarang['namabarang'] ?>" readonly/>
               
              </div>
              <div class="form-group <?php echo form_error('kondisi_id') ? 'has-error' : '' ?>">
                <label for="name">Kondisi Barang</label>
                <select name="kondisi_id" id="kondisi_id" class="form-control">
                <?php $kondisi_id = $get_inventaris_barang['kondisi_id'] ?>
									<?php foreach ($kondisibarang as $dt) : ?>
									<option value="<?= $dt['id']; ?>" <?= $dt['id'] == $kondisi_id ? ' selected="selected"' : ''; ?>><?= $dt['kondisi']; ?></option>
									<?php endforeach; ?>
								</select>
                <?= form_error('barang_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('sumber_id') ? 'has-error' : '' ?>">
                <label for="name">Sumber Dana</label>
                <select name="sumber_id" id="sumber_id" class="form-control">
                <?php $sumber_id = $get_inventaris_barang['sumber_id'] ?>
									<?php foreach ($sumberdana as $dt) : ?>
                                    <option value="<?= $dt['id']; ?>" <?= $dt['id'] == $sumber_id ? ' selected="selected"' : ''; ?>><?= $dt['kondisi']; ?><?= $dt['sumber_dana']; ?></option>
									<?php endforeach; ?>
								</select>
                <?= form_error('sumber_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('supplier_id') ? 'has-error' : '' ?>">
                <label for="name">Supplier</label>
                <select name="supplier_id" id="supplier_id" class="form-control">
                <?php $supplier_id = $get_inventaris_barang['supplier_id'] ?>
                <option value="">== Supplier ==</option>
									<?php foreach ($supplier as $dt) : ?>
									<option value="<?= $dt['id']; ?>" <?= $dt['id'] == $supplier_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
									<?php endforeach; ?>
								</select>
                <?= form_error('supplier_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('jumlah') ? 'has-error' : '' ?>">
                <label for="name">Jumlah Item</label>
                <input class="form-control" type="number" name="jumlah" value="<?= $get_inventaris_barang['jumlah'] ?>" />
                <?= form_error('jumlah', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('harga') ? 'has-error' : '' ?>">
                <label for="name">Harga Satuan</label>
                <input class="form-control" type="number" name="harga" value="<?= $get_inventaris_barang['harga'] ?>" />
                <?= form_error('harga', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('umur_bulan') ? 'has-error' : '' ?>">
                <label for="name">Umur Barang (Dalam Bulan)</label>
                <input class="form-control" type="number" name="umur_bulan" value="<?= $get_inventaris_barang['umur_bulan'] ?>" />
                <?= form_error('umur_bulan', '<span class="help-block">', '</small>'); ?>
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('sarpras/detail_inventaris/'.$get_inventaris_barang['barang_id']); ?>" class="btn btn-default">Kembali</a>
            </form>
          </div>

        </div>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

