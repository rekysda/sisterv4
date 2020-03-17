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

        <form action="<?php base_url('akademik/edittahun') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group <?= form_error('nama') ? 'has-error' : '' ?>">
            <label for="name">Nama</label>
            <input class="form-control" type="text" name="nama" value="<?= $gettahun['nama']; ?>" />
            <?= form_error('nama', '<span class="help-block">', '</small>'); ?>
          </div>
          <div class="form-group <?= form_error('tahun') ? 'has-error' : '' ?>">
            <label for="tahun">Tahun</label>
            <input class="form-control" type="text" name="tahun" value="<?= $gettahun['tahun']; ?>" />
            <?= form_error('tahun', '<span class="help-block">', '</small>'); ?>
          </div>
          <div class="form-group <?= form_error('semester') ? 'has-error' : '' ?>">
            <label for="semester">Semester</label>
            <input class="form-control" type="number" name="semester" value="<?= $gettahun['semester']; ?>" />
            <?= form_error('semester', '<span class="help-block">', '</small>'); ?>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url('akademik/tahunakademik'); ?> " class="btn btn-default">Cancel</a>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->