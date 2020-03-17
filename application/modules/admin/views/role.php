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
      <li>Admin</li>
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

        <form action="<?php base_url('admin/role') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Role*</label>
            <input class="form-control <?= form_error('role') ? 'is-invalid' : '' ?>" type="text" name="role" value="<?= set_value('role'); ?>" />
            <div class="invalid-feedback">
              <?php echo form_error('role') ?>
            </div>
          </div>
          <input class="btn btn-success" type="submit" name="btn" value="Save" />&nbsp; <a href="<?= base_url('admin/role'); ?> " class="btn btn-warning">Cancel</a>
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
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($role as $r) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $r['role']; ?></td>
                  <td>
                    <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="btn btn-warning btn-xs">Access</a>

                    <a href="<?= base_url('admin/roleedit/') . $r['id']; ?>" class="btn btn-info btn-xs">Edit</a>
                    <a href="<?= base_url('admin/roledelete/') . $r['id']; ?>" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...'); " class="btn btn-danger btn-xs">Hapus</a>

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