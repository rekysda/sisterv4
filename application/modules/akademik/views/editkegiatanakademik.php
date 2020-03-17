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
      <li>Akademik</li>
      <li><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Edit <?= $title; ?></h3>
      </div>
      <div class="box-body">

        <?= $this->session->flashdata('message') ?>

        <form action="<?php base_url('akademik/editkegiatanakademik') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group <?= form_error('judul') ? 'has-error' : '' ?>">
            <label for="name">Judul</label>
            <input class="form-control" type="text" name="judul" value="<?= $getkegiatanakademik['judul']; ?>" />
            <?= form_error('judul', '<span class="help-block">', '</small>'); ?>
          </div>
          <div class="form-group <?php echo form_error('tanggal_awal') ? 'has-error' : '' ?>">
            <label for="name">Tanggal Awal</label>
            <input class="form-control" type="text" id="tanggal_awal" name="tanggal_awal" value="<?= $getkegiatanakademik['tanggal_awal']; ?>" />
            <?= form_error('tanggal_awal', '<span class="help-block">', '</small>'); ?>
          </div>
          <div class="form-group <?php echo form_error('tanggal_akhir') ? 'has-error' : '' ?>">
            <label for="name">Tanggal Akhir</label>
            <input class="form-control" type="text" id="tanggal_akhir" name="tanggal_akhir" value="<?= $getkegiatanakademik['tanggal_akhir']; ?>" />
            <?= form_error('tanggal_akhir', '<span class="help-block">', '</small>'); ?>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url('akademik/kegiatanakademik'); ?> " class="btn btn-default">Cancel</a>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->