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

        <?= $this->session->flashdata('message'); ?>

        <form class="form-horizontal" action="<?= base_url('user/changepassword') ?>" method="post">
          <div class="form-group <?= form_error('current_password') ? 'has-error' : '' ?>">
            <label for="current_password" class="col-sm-2 control-label">Current Password <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current password">
              <?= form_error('current_password', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('new_password1') ? 'has-error' : '' ?>">
            <label for="new_password1" class="col-sm-2 control-label">New Password <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="new_password1" name="new_password1" placeholder="New password">
              <?= form_error('new_password1', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('new_password2') ? 'has-error' : '' ?>">
            <label for="new_password2" class="col-sm-2 control-label">Repeat New Password <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="Repeat new password">
              <?= form_error('new_password2', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
      </div>
      <!-- /.box-body -->
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Change Password</button>
      </div>
      <!-- /.box-footer -->
      </form>
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->