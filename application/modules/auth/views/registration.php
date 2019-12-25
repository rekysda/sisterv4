<div class="register-box">
  <div class="register-logo">
    <a href="<?= base_url(); ?>"><b>Create</b> an Account</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form class="user" method="post" action="<?= base_url('auth/registration'); ?>">
      <div class="form-group has-feedback <?= form_error('name') ? 'has-error' : '' ?>">
        <input type="text" name="name" value="<?= set_value('name'); ?>" class="form-control" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?= form_error('name', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="form-group has-feedback <?= form_error('email') ? 'has-error' : '' ?>">
        <input type="email" name="email" value="<?= set_value('email'); ?>" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?= form_error('email', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="form-group has-feedback <?= form_error('password1') ? 'has-error' : '' ?>">
        <input type="password" name="password1" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('password1', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="form-group has-feedback <?= form_error('password2') ? 'has-error' : '' ?>">
        <input type="password" name="password2" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        <?= form_error('password2', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a><br>
      <a href="<?= base_url('auth'); ?>" class="text-center">I already have a account</a>
    </div>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->