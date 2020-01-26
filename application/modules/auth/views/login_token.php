<div class="register-box">
  <div class="register-logo">
    <a href="<?= base_url(); ?>"></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Enter Token</p>

    <?= $this->session->flashdata('message'); ?>
    <form class="user" method="post" action="">
      <div class="form-group has-feedback <?= form_error('login_token') ? 'has-error' : '' ?>">
        <input type="login_token" name="login_token" value="<?= set_value('login_token'); ?>" class="form-control" placeholder="Token">
        <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
        <?= form_error('login_token', '<div class="text-danger">', '</div>') ?>
      </div>
      <button type="submit" class="btn btn-primary btn-block btn-flat">
        Login
      </button>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="<?= base_url('auth/generate_token')?>" class="btn btn-success btn-block btn-flat">
     Generate New Token</a>
    </div>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->