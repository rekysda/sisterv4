<!-- Login Baru -->
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url(); ?>"><b>Welcome</b> Back Student!</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Please user your NIS and TanggalLahir</p>

    <?= $this->session->flashdata('message'); ?>

    <form class="user" method="post" action="<?= base_url('authsiswa'); ?>">
      <div class="form-group has-feedback <?= form_error('nis') ? 'has-error' : '' ?>">
        <input type="text" name="nis" value="<?= set_value('nis'); ?>" class="form-control" placeholder="nis">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?= form_error('nis', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="form-group has-feedback <?= form_error('tanggallahirsiswa') ? 'has-error' : '' ?>">
        <input type="password" id="tanggallahirsiswa" name="tanggallahirsiswa" id="tanggallahirsiswa"  value="<?= set_value('tanggallahirsiswa'); ?>" class="form-control" placeholder="yyyy-mm-dd">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?= form_error('tanggallahirsiswa', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="row">
      <div class="col-xs-8">
      Forgot Password?<br>
      Please contact our School
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