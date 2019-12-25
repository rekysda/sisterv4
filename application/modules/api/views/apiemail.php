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

    <?= $this->session->flashdata('message') ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <div class="box-body">

        <form class="form-horizontal" method="post" action="">
          <div class="form-group">
              <label class="col-sm-2 control-label">Kirim Email Pembayaran</label>
              <div class="col-sm-10">
                <select name="apiemail[sent_notif_paid]" class="form-control <?= form_error('sent_notif_paid') ? 'is-invalid' : '' ?>">
                  <option value="1" <?= apiemail('sent_notif_paid') == 1 ? 'selected' : null ?>>Aktif</option>
                  <option value="0" <?= apiemail('sent_notif_paid') == 0 ? 'selected' : null ?>>Tidak Aktif</option>
                </select>
              </div>
            </div>

          
          <!-- /.box-body -->
          <div class="form-group">
              <label class="col-sm-2 control-label"></label>
              <div class="col-sm-10">
            <input type="submit" name="submit" value="Save Changes" class="btn btn-primary">              
              </div>
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