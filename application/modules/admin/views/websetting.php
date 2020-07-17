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

        <form class="form-horizontal" method="post" action="<?= base_url('admin/websetting'); ?>">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Site Title</label>
              <div class="col-sm-10">
                <input type="text" name="option[site_title]" value="<?= options('site_title') == '' ? set_value('site_title') : options('site_title'); ?>" class="form-control" placeholder="From Email Address">
                <?= form_error('site_title', '<span class="help-block">', '</span>') ?>
              </div>
            </div>
            <div class="form-group <?= form_error('site_description') ? 'has-error' : '' ?>">
              <label for="varchar" class="col-sm-2 control-label">Site Description</label>
              <div class="col-sm-10">
                <textarea name="option[site_description]" cols="30" rows="3" class="form-control" placeholder="Site Description"><?= options('site_description') == '' ? set_value('site_description') : options('site_description'); ?></textarea>
                <?= form_error('site_description', '<span class="help-block">', '</span>') ?>
              </div>
            </div>
            <div class="form-group <?= form_error('site_keyword') ? 'has-error' : '' ?>">
              <label for="varchar" class="col-sm-2 control-label">Site Keyword</label>
              <div class="col-sm-10">
                <textarea name="option[site_keyword]" cols="30" rows="3" class="form-control" placeholder="Site Keyword"><?= options('site_keyword') == '' ? set_value('site_keyword') : options('site_keyword'); ?></textarea>
                <?= form_error('site_keyword', '<span class="help-block">', '</span>') ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Registration</label>
              <div class="col-sm-10">
                <select name="option[signup_member]" class="form-control <?= form_error('signup_member') ? 'is-invalid' : '' ?>">
                  <option value="1" <?= options('signup_member') == 1 ? 'selected' : null ?>>Aktif</option>
                  <option value="0" <?= options('signup_member') == 0 ? 'selected' : null ?>>Tidak Aktif</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Forgot Password</label>
              <div class="col-sm-10">
                <select name="option[forgot_password]" class="form-control <?= form_error('forgot_password') ? 'is-invalid' : '' ?>">
                  <option value="1" <?= options('forgot_password') == 1 ? 'selected' : null ?>>Aktif</option>
                  <option value="0" <?= options('forgot_password') == 0 ? 'selected' : null ?>>Tidak Aktif</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">SMTP Host</label>
              <div class="col-sm-10">
                <input type="text" name="option[smtp_host]" value="<?= options('smtp_host') == '' ? set_value('smtp_host') : options('smtp_host'); ?>" class="form-control" placeholder="SMTP Host">
                <?= form_error('smtp_host', '<span class="help-block">', '</span>') ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">SMTP User</label>
              <div class="col-sm-10">
                <input type="text" name="option[smtp_user]" value="<?= options('smtp_user') == '' ? set_value('smtp_user') : options('smtp_user'); ?>" class="form-control" placeholder="SMTP User">
                <?= form_error('smtp_user', '<span class="help-block">', '</span>') ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">SMTP Pass</label>
              <div class="col-sm-10">
                <input type="password" name="option[smtp_pass]" value="<?= options('smtp_pass') == '' ? set_value('smtp_pass') : options('smtp_pass'); ?>" class="form-control" placeholder="SMTP Password">
                <?= form_error('smtp_pass', '<span class="help-block">', '</span>') ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">SMTP Port</label>
              <div class="col-sm-10">
                <input type="text" name="option[smtp_port]" value="<?= options('smtp_port') == '' ? set_value('smtp_port') : options('smtp_port'); ?>" class="form-control" placeholder="SMTP Port">
                <?= form_error('smtp_port', '<span class="help-block">', '</span>') ?>
              </div>
            </div>
          <div class="form-group">
              <label class="col-sm-2 control-label">Forbidden</label>
              <div class="col-sm-10">
                <select name="option[forbidden]" class="form-control <?= form_error('forbidden') ? 'is-invalid' : '' ?>">
                  <option value="1" <?= options('forbidden') == 1 ? 'selected' : null ?>>Aktif</option>
                  <option value="0" <?= options('forbidden') == 0 ? 'selected' : null ?>>Tidak Aktif</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Email Master</label>
              <div class="col-sm-10">
                <input type="password" name="option[email_master]" value="<?= options('email_master') == '' ? set_value('email_master') : options('email_master'); ?>" class="form-control" placeholder="Email Master">
                <?= form_error('email_master', '<span class="help-block">', '</span>') ?>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <input type="submit" name="submit" value="Save Changes" class="btn btn-primary">
          </div>
        </form>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->