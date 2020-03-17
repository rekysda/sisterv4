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
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <div class="box-body">

        <?= $this->session->flashdata('message') ?>
        <form action="<?php base_url('akademik/logoslip') ?>" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label for="content">Images* only JPG allowed</label>
            <input type="file" class="custom-file-input" id="image" name="image">
          </div>
          <div class="form-group">
            <label for="name">Old Images</label><br>
            <img src="<?= base_url('/assets/images/logoslip/') . $getlogoslip['image']; ?> " class="img-thumbnail" width="100">
          </div>
          <input class="form-control" type="hidden" name="id" value="1" />
          <input class="btn btn-success" type="submit" name="btn" value="Simpan" />&nbsp; <a href="<?= base_url('akademik/logoslip'); ?> " class="btn btn-warning">Cancel</a>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->