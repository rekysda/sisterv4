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

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <div class="box-body">

        <?= $this->session->flashdata('message') ?>

        <form action="" method="post">
          <div class="form-group <?= form_error('jenis') ? 'has-error' : '' ?>">
            <label for="name">Jenis*</label>
            <input class="form-control" type="text" name="jenis" value="<?= $getkelompokmapel['jenis']; ?>" />
            <?= form_error('jenis', '<span class="help-block">', '</small>'); ?>
          </div>
          <div class="form-group <?= form_error('nama_kelompok') ? 'has-error' : '' ?>">
            <label for="name">Nama Kelompok*</label>
            <input class="form-control" type="text" name="nama_kelompok" value="<?= $getkelompokmapel['nama_kelompok']; ?>" />
            <?= form_error('nama_kelompok', '<span class="help-block">', '</small>'); ?>
          </div>
          <div class="form-group <?= form_error('keterangan') ? 'has-error' : '' ?>">
            <label for="name">Keterangan</label>
            <input class="form-control" type="text" name="keterangan" value="<?= $getkelompokmapel['keterangan']; ?>" />
            <?= form_error('keterangan', '<span class="help-block">', '</small>'); ?>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url('rapor/edit_kelompok_mapel'); ?> " class="btn btn-default">Cancel</a>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->