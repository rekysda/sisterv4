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
      <?php $kode_inv= generatekodeinc('sar_inventaris','INV','kode_inv');?>
        <div class="row">
          <div class="col-md-4">
            <form action="" method="post"enctype="multipart/form-data">
            <div class="form-group <?php echo form_error('tanggal') ? 'has-error' : '' ?>">
                <label for="name">Tanggal</label>
                <input class="form-control" type="text"id="tanggal" name="tanggal" value="<?= set_value('tanggal', isset($tanggal) ? $tanggal : ''); ?>" />
                <?= form_error('tanggal', '<span class="help-block">', '</small>'); ?>
              </div>
            <div class="form-group <?php echo form_error('kode_inv') ? 'has-error' : '' ?>">
                <label for="name">Kode Inventaris</label>
                <input class="form-control" type="text" name="kode_inv" value="<?= set_value('kode_inv', isset($kode_inv) ? $kode_inv : ''); ?>" />
                <?= form_error('kode_inv', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('barang_id') ? 'has-error' : '' ?>">
                <label for="name">Nama Barang</label>
                <select name="barang_id" id="barang_id" class="form-control">
									<option value="">== Nama Barang ==</option>
									<?php foreach ($namabarang as $dt) : ?>
										<option value="<?= $dt['id']; ?>"><?= $dt['namabarang']; ?></option>
									<?php endforeach; ?>
								</select>
                <?= form_error('barang_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('kondisi_id') ? 'has-error' : '' ?>">
                <label for="name">Kondisi Barang</label>
                <select name="kondisi_id" id="kondisi_id" class="form-control">
									<?php foreach ($kondisibarang as $dt) : ?>
										<option value="<?= $dt['id']; ?>"><?= $dt['kondisi']; ?></option>
									<?php endforeach; ?>
								</select>
                <?= form_error('barang_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('sumber_id') ? 'has-error' : '' ?>">
                <label for="name">Sumber Dana</label>
                <select name="sumber_id" id="sumber_id" class="form-control">
									<?php foreach ($sumberdana as $dt) : ?>
										<option value="<?= $dt['id']; ?>"><?= $dt['sumber_dana']; ?></option>
									<?php endforeach; ?>
								</select>
                <?= form_error('sumber_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('supplier_id') ? 'has-error' : '' ?>">
                <label for="name">Supplier</label>
                <select name="supplier_id" id="supplier_id" class="form-control">
									<?php foreach ($supplier as $dt) : ?>
										<option value="<?= $dt['id']; ?>"><?= $dt['nama']; ?></option>
									<?php endforeach; ?>
								</select>
                <?= form_error('supplier_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('jumlah') ? 'has-error' : '' ?>">
                <label for="name">Jumlah Item</label>
                <input class="form-control" type="number" name="jumlah" value="<?= set_value('jumlah'); ?>" />
                <?= form_error('jumlah', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('harga') ? 'has-error' : '' ?>">
                <label for="name">Harga Satuan</label>
                <input class="form-control" type="number" name="harga" value="<?= set_value('harga'); ?>" />
                <?= form_error('harga', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('umur_bulan') ? 'has-error' : '' ?>">
                <label for="name">Umur Barang (Dalam Bulan)</label>
                <input class="form-control" type="number" name="umur_bulan" value="<?= set_value('umur_bulan'); ?>" />
                <?= form_error('umur_bulan', '<span class="help-block">', '</small>'); ?>
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('sarpras/inventaris'); ?>" class="btn btn-default">Cancel</a>
            </form>
          </div>
          <div class="col-md-8">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped" id="example3">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Image</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($namabarang as $dt) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['namabarang']; ?></td>
                      <td><img src="<?= base_url('assets/images/sarpras/'.$dt['image']);?>"height="50px"width="50px">
                      <td><?= get_jumlahinventaris($dt['id']) ?></td>
                      <td>
                        <a href="<?= base_url('sarpras/detail_inventaris/' . $dt['id']); ?>" class="btn btn-info btn-xs">Detail</a>
                      </td>
                    </tr>
                    <?php $i++; ?>
                 
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
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

