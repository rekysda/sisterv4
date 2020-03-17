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

        <?php $category_ids = $getbiaya['category_id']; ?>
        <form action="<?php base_url('akademik/biaya') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group <?= form_error('nama') ? 'has-error' : '' ?>">
            <label for="name">Nama</label>
            <input class="form-control" type="text" name="nama" value="<?= $getbiaya['nama']; ?>" />
            <?= form_error('nama', '<span class="help-block">', '</small>'); ?>
          </div>
          <div class="form-group <?= form_error('category_id') ? 'has-error' : '' ?>">
            <label for="name">Categories</label>
            <select name="category_id" id="category_id" class="form-control">
              <option value="">== Category ==</option>
              <?php foreach ($parent as $pr) : ?>
              <option value="<?= $pr['id']; ?>" <?= $pr['id'] == $category_ids ? ' selected="selected"' : ''; ?>><?= $pr['nama']; ?></option>
              <?php endforeach; ?>
            </select>
            <?= form_error('category_id', '<span class="help-block">', '</small>'); ?>
          </div>

          <input class="form-control" type="hidden" name="user_id" value="<?= $user['id']; ?>" />
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url('akademik/biaya'); ?> " class="btn btn-default">Cancel</a>
        </form>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->