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
<?php $diterima=$get_bukutamu['diterima'];?>
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <div class="box-body">
      <?php $nomor= generatekodeinc4('bukutamu',$tahunskrg,'nomor');?>
        <div class="row">
          <div class="col-md-4">
            <form action="" method="post">
              <div class="form-group <?php echo form_error('tahun') ? 'has-error' : '' ?>">
                <label for="name">Tahun</label>
                <input class="form-control" type="text" name="tahun" value="<?= $get_bukutamu['tahun']; ?>" readonly/>
                <?= form_error('tahun', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('nomor') ? 'has-error' : '' ?>">
                <label for="name">Nomor</label>
                <input class="form-control" type="text" name="nomor" value="<?= $get_bukutamu['nomor']; ?>"readonly />
                <?= form_error('nomor', '<span class="help-block">', '</small>'); ?>
              </div>        
              <div class="form-group <?php echo form_error('tanggal') ? 'has-error' : '' ?>">
                <label for="name">Tanggal</label>
                <input class="form-control" type="text" id="tanggal" name="tanggal" value="<?= $get_bukutamu['tanggal']; ?>" />
                <?= form_error('tanggal', '<span class="help-block">', '</small>'); ?>
              </div>  
              <div class="form-group <?php echo form_error('nama') ? 'has-error' : '' ?>">
                <label for="name">Nama</label>
                <input class="form-control" type="text" name="nama" value="<?= $get_bukutamu['nama']; ?>" />
                <?= form_error('nama', '<span class="help-block">', '</small>'); ?>
              </div>  
              <div class="form-group <?php echo form_error('jabatan') ? 'has-error' : '' ?>">
                <label for="name">Jabatan</label>
                <input class="form-control" type="text" name="jabatan" value="<?= $get_bukutamu['jabatan']; ?>" />
                <?= form_error('jabatan', '<span class="help-block">', '</small>'); ?>
              </div>  
              <div class="form-group <?php echo form_error('hp') ? 'has-error' : '' ?>">
                <label for="name">Nomor WA</label>
                <input class="form-control" type="text" name="hp" value="<?= $get_bukutamu['hp']; ?>" />
                <?= form_error('hp', '<span class="help-block">', '</small>'); ?>
              </div>  
              <div class="form-group <?php echo form_error('maksud') ? 'has-error' : '' ?>">
                <label for="name">Maksud dan Tujuan</label>
                <input class="form-control" type="text" name="maksud" value="<?= $get_bukutamu['maksud']; ?>" />
                <?= form_error('maksud', '<span class="help-block">', '</small>'); ?>
              </div>    
              <div class="form-group <?php echo form_error('diterima') ? 'has-error' : '' ?>">
                <label for="name">Yang Dituju</label>
                <select class="js-example-basic-single" name="diterima" style="width:100%;">
                  <?php foreach ($selectpegawai as $dt) : ?>
                    <option value="<?= $dt['id']; ?>" <?= $dt['id'] == $diterima ? ' selected="selected"' : ''; ?>><?= $dt['nama_guru']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('diterima', '<span class="help-block">', '</small>'); ?>
              <div class="form-group <?php echo form_error('catatan') ? 'has-error' : '' ?>">
                <label for="name">Catatan</label>
                <input class="form-control" type="text" name="catatan" value="<?= $get_bukutamu['catatan']; ?>" />
                <?= form_error('catatan', '<span class="help-block">', '</small>'); ?>
              </div>  
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('bukutamu'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
        </div>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->