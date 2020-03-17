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
      <li>PPDB</li>
            <li><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Penjualan Formulir</h3>
      </div>
      <div class="box-body">
        <?= $this->session->flashdata('message') ?>
        <!-- Posts List -->
        <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
          <div class="form-group <?= form_error('tanggal') ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Tanggal <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <input class="form-control <?= form_error('tanggal') ? 'is-invalid' : '' ?>" type="text" id="tanggal" name="tanggal" value="<?= set_value('tanggal', date('Y-m-d H:i:s'), FALSE); ?>" />
              <?= form_error('tanggal', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('nama') ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Nama <span class="text-danger">*</span></label>
            <div class="col-sm-10 <?= form_error('nama') ? 'has-error' : '' ?>">
              <input class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" type="text" id="nama" name="nama" value="<?= set_value('nama'); ?>" />
              <?= form_error('nama', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('asalsekolah') ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Asal Sekolah <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <input class="form-control <?= form_error('asalsekolah') ? 'is-invalid' : '' ?>" type="text" id="asalsekolah" name="asalsekolah" value="<?= set_value('asalsekolah'); ?>" />
              <?= form_error('asalsekolah', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('alamat') ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Alamat <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <input class="form-control <?= form_error('alamat') ? 'is-invalid' : '' ?>" type="text" id="alamat" name="alamat" value="<?= set_value('alamat'); ?>" />
              <?= form_error('alamat', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('hp') ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Nomor Handphone <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <input class="form-control <?= form_error('hp') ? 'is-invalid' : '' ?>" type="text" id="hp" name="hp" value="<?= set_value('hp'); ?>" />
              <?= form_error('hp', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('jumlah_form') ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Jumlah <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <input class="form-control <?= form_error('jumlah_form') ? 'is-invalid' : '' ?>" type="text" id="jumlah_form" name="jumlah_form" value="<?= set_value('jumlah_form', '1', FALSE); ?>" />
              <?= form_error('jumlah_form', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('harga_form') ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Harga Satuan <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <input class="form-control <?= form_error('harga_form') ? 'is-invalid' : '' ?>" type="text" id="harga_form" name="harga_form" value="<?= set_value('harga_form', '250000', FALSE); ?>" />
              <?= form_error('harga_form', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('bayar_form') ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">Bayar <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <input class="form-control <?= form_error('bayar_form') ? 'is-invalid' : '' ?>" type="text" id="bayar_form" name="bayar_form" value="<?= set_value('bayar_form', '250000', FALSE); ?>" />
              <?= form_error('bayar_form', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('no_formulir') ? 'has-error' : '' ?>">
            <label class="col-sm-2 control-label">No. Formulir <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <input class="form-control <?= form_error('no_formulir') ? 'is-invalid' : '' ?>" type="text" id="no_formulir" name="no_formulir" value="<?= set_value('no_formulir'); ?>" />
              <?= form_error('no_formulir', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>

      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <input class="form-control" type="hidden" name="user_id" value="<?= $user['id']; ?>">
        <input class="btn btn-success" type="submit" name="btn" value="Simpan" />&nbsp;
        <a href="<?= base_url('ppdb/formulir_penjualan'); ?> " class="btn btn-primary">Cancel</a>&nbsp;
        <a href="<?= base_url('ppdb/formulir_nota/' . $id_nota); ?> " class="btn btn-warning" target="new">Cetak</a>
      </div>
      </form>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->