<!-- Login Baru -->
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url(); ?>"><b>Welcome</b> Back!</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <?= $this->session->flashdata('message'); ?>

    <form class="user" method="post" action="<?= base_url('auth'); ?>">
      <div class="form-group has-feedback <?= form_error('username') ? 'has-error' : '' ?>">
        <input type="username" name="username" value="<?= set_value('username'); ?>" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?= form_error('username', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="form-group has-feedback <?= form_error('password') ? 'has-error' : '' ?>">
        <input type="password" name="password" value="<?= set_value('password'); ?>" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('password', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <?php if (options('forgot_password') == '1') {
            ?>
            <a href="<?= base_url('auth/forgotPassword'); ?>">Forgot Password?</a><br>
          <?php
        }
        ?>
          <?php if (options('signup_member') == '1') {
            ?>
            <a href="<?= base_url('auth/registration'); ?>" class="text-center">Create an Account!</a>
          <?php
        }
        ?>
<a href="<?= base_url(''); ?>" class="text-center">Back !</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->