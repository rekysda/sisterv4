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
      <li>Menu</li>
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

        <form action="<?php base_url('menu') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Menu*</label>
            <input class="form-control <?php echo form_error('menu') ? 'is-invalid' : '' ?>" type="text" name="menu" value="<?= set_value('menu'); ?>" />
            <div class="invalid-feedback">
              <?php echo form_error('menu') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="name">Icon*</label>
            <input type="text" class="form-control <?= form_error('icon') ? 'is-invalid' : '' ?>" id="icon" name="icon" placeholder="icon" value="<?= set_value('icon'); ?>">
            <div class="invalid-feedback">
              <?= form_error('icon') ?>
            </div>
          </div>
          <input class="btn btn-success" type="submit" name="btn" value="Save" />&nbsp; <a href="<?= base_url('menu'); ?> " class="btn btn-warning">Cancel</a>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">List</h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-hover" id='example3'>
            <thead>
              <tr>
                <th>#</th>
                <th>Menu</th>
                <th>Icon</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($menu as $m) : ?>
                <tr>
                  <th><?= $i; ?></th>
                  <td><?= $m['menu']; ?></td>
                  <td><?= $m['icon']; ?></td>
                  <td>
                    <a href="<?= base_url('menu/editMenu/' . $m['id']); ?>" class="btn btn-success btn-xs">Edit</a>
                    <a href="<?= base_url('menu/hapusMenu/' . $m['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->