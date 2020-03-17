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

        <?php $role_idv = $getuserlogin['role_id']; ?>

        <form class="form-horizontal" action="<?php base_url('admin/useredit') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
              <input class="form-control " type="text" name="username" value="<?= $getuserlogin['username']; ?>"  />
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input class="form-control " type="text" name="email" value="<?= $getuserlogin['email']; ?>" readonly />
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="password" value="" />
            </div>
          </div>
          <div class="form-group">
            <label for="role_id" class="col-sm-2 control-label">Role</label>
            <div class="col-sm-10">
              <select name="role_id" id="role_id" class="form-control <?= form_error('role_id') ? 'is-invalid' : '' ?>">
                <option value="">== Role ==</option>
                <?php foreach ($role as $r) : ?>
                  <option value="<?= $r['id']; ?>" <?= $r['id'] == $role_idv ? ' selected="selected"' : ''; ?>><?= $r['role']; ?></option>
                <?php endforeach; ?>
              </select>
              <div class="invalid-feedback">
                <?= form_error('role_id') ?>
              </div>
            </div>
          </div>
          <div class="form-group <?= form_error('name') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">Nama Lengkap</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="name" value="<?= $getuserlogin['name']; ?>" />
              <?= form_error('name', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Photo</label>
            <div class="col-sm-10">
              <img src="<?= base_url('assets/images/profile/') . $getuserlogin['image']; ?> " class="img-thumbnail">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="file" class="custom-file-input" id="image" name="image">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label>
                  <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" <?= $getuserlogin['is_active'] == '1' ? 'checked' : ''; ?>> Active?
                </label>
              </div>
            </div>
          </div>
      </div> <!-- /.box-body -->
      <div class="box-footer">
        <input class="btn btn-info" type="submit" name="btn" value="Save" />
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
          <table class="table table-hover"  id='example3'>
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Is Active</th>
                <th>Foto</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($userlogin as $u) : ?>
                <tr>
                  <th><?= $i; ?></th>
                  <td><?= $u['name']; ?></td>
                  <td><?= $u['username']; ?></td>
                  <td><?= $u['email']; ?></td>
                  <td><?= $u['role']; ?></td>
                  <td><?= $u['is_active']; ?></td>
                  <td><img width="40" src="<?= base_url('assets/images/profile/') . $u['image']; ?>"></td>
                  <td>
                    <a href="<?= base_url('admin/useredit/' . $u['id']); ?>" class="btn btn-info btn-xs">Ubah</a>
                    <a href="<?= base_url('admin/userdelete/' . $u['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Hapus</a>&nbsp;&nbsp;
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