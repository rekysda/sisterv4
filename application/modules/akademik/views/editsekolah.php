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
      <li>Akademik</li>
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
        <div class="row">
          <div class="col-md-12">


      <div class="box-header with-border">
        <h3 class="box-title">Sekolah</h3>
      </div>
      <form class="form-horizontal" action="<?php base_url('akademik/sekolah') ?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group <?= form_error('sekolah') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">Nama Sekolah*</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="sekolah" value="<?= $infosekolah['sekolah']; ?>" />
              <?= form_error('sekolah', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('npsn') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">NPSN</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="npsn" value="<?= $infosekolah['npsn']; ?>" />
              <?= form_error('npsn', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('cnss') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">NSS</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="nss" value="<?= $infosekolah['nss']; ?>" />
              <?= form_error('nss', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('alamat') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">Alamat*</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="alamat" value="<?= $infosekolah['alamat']; ?>" />
              <?= form_error('alamat', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('kodepos') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">Kode Pos</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="kodepos" value="<?= $infosekolah['kodepos']; ?>" />
              <?= form_error('kodepos', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('telepon') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">Telepon*</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="telepon" value="<?= $infosekolah['telepon']; ?>" />
              <?= form_error('telepon', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('kelurahan') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">Kelurahan</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="kelurahan" value="<?= $infosekolah['kelurahan']; ?>" />
              <?= form_error('kelurahan', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('kecamatan') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">Kecamatan</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="kecamatan" value="<?= $infosekolah['kecamatan']; ?>" />
              <?= form_error('kecamatan', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('kota') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">Kota*</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="kota" value="<?= $infosekolah['kota']; ?>" />
              <?= form_error('kota', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('provinsi') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">Provinsi</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="provinsi" value="<?= $infosekolah['provinsi']; ?>" />
              <?= form_error('provinsi', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('website') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">Website</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" name="website" value="<?= $infosekolah['website']; ?>" />
              <?= form_error('website', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('email') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input class="form-control" type="email" name="email" value="<?= $infosekolah['email']; ?>" />
              <?= form_error('email', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <input class="btn btn-success" type="submit" name="btn" value="Simpan" />&nbsp;
          <a href="<?= base_url('akademik/sekolah'); ?> " class="btn btn-default">Cancel</a>
        </div>
      </form>
      </div>
    </div>
    
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->