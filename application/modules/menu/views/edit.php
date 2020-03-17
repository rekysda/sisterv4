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

        <form action="<?php base_url('menu/editMenu') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Menu*</label>
            <input class="form-control <?php echo form_error('menu') ? 'is-invalid' : '' ?>" type="text" name="menu" value="<?= $getmenu['menu']; ?>" />
            <input type="hidden" name="id" value="<?= $getmenu['id']; ?>" />
            <div class="invalid-feedback">
              <?php echo form_error('menu') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="name">Icon*</label>
            <input type="text" class="form-control <?= form_error('icon') ? 'is-invalid' : '' ?>" id="icon" name="icon" placeholder="icon" value="<?= $getmenu['icon']; ?>">
            <div class="invalid-feedback">
              <?= form_error('icon') ?>
            </div>
          </div>
          <input class="btn btn-success" type="submit" name="btn" value="Update" />&nbsp; <a href="<?= base_url('menu'); ?> " class="btn btn-warning">Cancel</a>
        </form>

      </div> <!-- /.box-body -->
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
                <th scope="col">#</th>
                <th scope="col">Menu</th>
                <th scope="col">Icon</th>
                <th scope="col" class="text-right">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($menu as $m) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $m['menu']; ?></td>
                  <td><?= $m['icon']; ?></td>
                  <td class="text-right">
                    <a href="<?= base_url('menu/editMenu/' . $m['id']); ?>" class="btn btn-success btn-sm">Edit</a>
                    <a href="<?= base_url('menu/hapusMenu/' . $m['id']); ?>" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...'); " class="btn btn-danger Small btn-sm">Delete</a>
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