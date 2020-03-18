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
      <li>Sarpras</li>
      <li><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <div class="box-body">

        <?= $this->session->flashdata('message') ?>

        <form action="" method="post">
              <div class="form-group <?php echo form_error('kode_gedung') ? 'has-error' : '' ?>">
                <label for="name">Kode</label>
                <input class="form-control" type="text" name="kode_gedung" value="<?= $getgedung['kode_gedung']; ?>" />
                <?= form_error('kode_gedung', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('nama_gedung') ? 'has-error' : '' ?>">
                <label for="tahun">Nama</label>
                <input class="form-control" type="text" name="nama_gedung" value="<?= $getgedung['nama_gedung']; ?>" />
                <?= form_error('nama_gedung', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('lantai') ? 'has-error' : '' ?>">
                <label for="tahun">Jumlah Lantai</label>
                <input class="form-control" type="number" name="lantai" value="<?= $getgedung['lantai']; ?>" />
                <?= form_error('lantai', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('panjang') ? 'has-error' : '' ?>">
                <label for="tahun">Panjang</label>
                <input class="form-control" type="number" name="panjang" value="<?= $getgedung['panjang']; ?>" />
                <?= form_error('panjang', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('lebar') ? 'has-error' : '' ?>">
                <label for="tahun">Lebar</label>
                <input class="form-control" type="number" name="lebar" value="<?= $getgedung['lebar']; ?>" />
                <?= form_error('lebar', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('tinggi') ? 'has-error' : '' ?>">
                <label for="tahun">Tinggi</label>
                <input class="form-control" type="text" name="tinggi" value="<?= $getgedung['tinggi']; ?>" />
                <?= form_error('tinggi', '<span class="help-block">', '</small>'); ?>
              </div>          
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('sarpras/gedung'); ?> " class="btn btn-default">Cancel</a>
            </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->