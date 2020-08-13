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
      <li>Pengumuman</li>
      <li><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <div class="box-body">

        <?= $this->session->flashdata('message') ?>

        <form action="<?php base_url('keuangan/editpengumuman') ?>" method="post">
          <div class="form-group <?= form_error('nama') ? 'has-error' : '' ?>">
            <label for="name">Nama</label>
            <input class="form-control" type="text" name="nama" value="<?= $getpengumuman['nama']; ?>" />
            <?= form_error('nama', '<span class="help-block">', '</small>'); ?>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url('keuangan/pengumuman'); ?> " class="btn btn-default">Cancel</a>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->