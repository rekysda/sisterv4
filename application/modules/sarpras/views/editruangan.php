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

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <div class="box-body">

        <?= $this->session->flashdata('message') ?>
        <?php $gedung_id = $getruangan['gedung_id'] ?>
        <?php $sekolah_id = $getruangan['sekolah_id'] ?>
        <form action="" method="post"enctype="multipart/form-data">
            <div class="form-group <?php echo form_error('gedung_id') ? 'has-error' : '' ?>">
                <label for="name">Gedung</label>
                <select name="gedung_id" id="gedung_id" class="form-control">
									<option value="">== Gedung ==</option>
									<?php foreach ($gedung as $dt) : ?>
                <option value="<?= $dt['id']; ?>" <?= $dt['id'] == $gedung_id ? ' selected="selected"' : ''; ?>><?= $dt['nama_gedung']; ?></option>
									<?php endforeach; ?>
								</select>
                <?= form_error('gedung_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('sekolah_id') ? 'has-error' : '' ?>">
                <label for="name">Sekolah</label>
                <select name="sekolah_id" id="sekolah_id" class="form-control">
									<?php foreach ($sekolah as $dt) : ?>
                <option value="<?= $dt['id']; ?>" <?= $dt['id'] == $sekolah_id ? ' selected="selected"' : ''; ?>><?= $dt['sekolah']; ?></option>
									<?php endforeach; ?>
								</select>
                <?= form_error('sekolah_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('kode_ruangan') ? 'has-error' : '' ?>">
                <label for="name">Kode</label>
                <input class="form-control" type="text" name="kode_ruangan" value="<?= $getruangan['kode_ruangan']; ?>" />
                <?= form_error('kode_ruangan', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('nama_ruangan') ? 'has-error' : '' ?>">
                <label for="tahun">Nama</label>
                <input class="form-control" type="text" name="nama_ruangan" value="<?= $getruangan['nama_ruangan']; ?>" />
                <?= form_error('nama_ruangan', '<span class="help-block">', '</small>'); ?>
              </div> 
              <div class="form-group">
          <label for="tahun">Gambar</label>
              <input type="file" class="custom-file-input" id="image" name="image">
          </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('sarpras/ruangan'); ?> " class="btn btn-default">Cancel</a>
            </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->