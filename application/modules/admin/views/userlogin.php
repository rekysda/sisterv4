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

    <?= $this->session->flashdata('message') ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <div class="box-body">

        <?php $role_idv = set_value('role_id'); ?>

        <form class="form-horizontal" action="<?php base_url('admin/userlogin') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group <?= form_error('username') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">Username <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="username" value="<?= set_value('username'); ?>" />
              <?= form_error('username', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('email') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">Email <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="email" value="<?= set_value('email'); ?>" />
              <?= form_error('email', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?php echo form_error('password') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">Password <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="password" value="" />
              <?= form_error('password', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?php echo form_error('role_id') ? 'has-error' : '' ?>">
            <label for="role_id" class="col-sm-2 control-label">Role <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <select name="role_id" id="role_id" class="form-control <?= form_error('role_id') ? 'is-invalid' : '' ?>">
                <option value="">== Role ==</option>
                <?php foreach ($role as $r) : ?>
                  <option value="<?= $r['id']; ?>" <?= $r['id'] == $role_idv ? ' selected="selected"' : ''; ?>><?= $r['role']; ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('role_id', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?php echo form_error('name') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">Full Name <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input class="form-control <?php echo form_error('name') ? 'is-invalid' : '' ?>" type="text" name="name" value="<?= set_value('name'); ?>" />
              <?= form_error('name', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label>
                  <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked> Active?
                </label>
              </div>
            </div>
          </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <input class="btn btn-info" type="submit" name="btn" value="Save">
        <a href="<?= base_url('admin/userlogin'); ?> " class="btn btn-default">Cancel</a>
      </div>
      <!-- /.box-footer -->
      </form>
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
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Is Active</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($userlogin as $u) : ?>
                <?php $is_active = ($u['is_active'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>'; ?>
                <tr>
                  <th><?= $i; ?></th>
                  <td><?= $u['name']; ?></td>
                  <td><?= $u['username']; ?></td>
                  <td><?= $u['email']; ?></td>
                  <td><?= $u['role']; ?></td>
                  <td><?= $is_active; ?></td>
                  <td><img width="40" src="<?= base_url('assets/images/profile/') . $u['image']; ?>"></td>
                  <td>
                    <a href="<?= base_url('admin/useredit/' . $u['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                    <a href="<?= base_url('admin/userdelete/' . $u['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>&nbsp;&nbsp;
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