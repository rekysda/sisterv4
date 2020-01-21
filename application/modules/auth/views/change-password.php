<!-- Login Baru -->
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url(); ?>"><b>Change</b> Password!</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Please Change Your Password</p>

    <?= $this->session->flashdata('message'); ?>

    <form class="user"method="post"action="<?= base_url('auth/changepassword'); ?>">
    <div class="form-group has-feedback <?= form_error('password1') ? 'has-error' : '' ?>">
        <input type="password" name="password1" value="<?= set_value('password1'); ?>" class="form-control" placeholder="Enter New password...">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?= form_error('password1', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="form-group has-feedback <?= form_error('password2') ? 'has-error' : '' ?>">
        <input type="password" name="password2" value="<?= set_value('password2'); ?>" class="form-control" placeholder="Repeat Password...">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?= form_error('password2', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Change</button>
        </div>
        <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="<?= base_url('auth'); ?>">Back to Login</a>
    </div>

 <!-- /.col -->
 </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

