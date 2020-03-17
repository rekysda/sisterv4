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
    <?php $wali_kelas = $getkelasbyId['wali_kelas']; ?>
    <?php $jurusan = $getkelasbyId['jurusan']; ?>
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Edit</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group <?= form_error('tahun') ? 'has-error' : '' ?>">
                <label for="name">Tahun Angkatan</label>
                <select name="tahun" id="tahun" class="form-control <?= form_error('tahun') ? 'is-invalid' : '' ?>">
                  <option value="">== Tahun ==</option>
                  <?php
                  $tahunn = (date("Y") + 1);
                  for ($n = 2019; $n <= $tahunn; $n++) {
                    if ($getkelasbyId['tahun'] == $n) {
                      echo "<option value='$n' selected>$n</option>";
                    } else {
                      echo "<option value='$n'>$n</option>";
                    }
                  }
                  ?>
                </select>
                <?= form_error('tahun', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?= form_error('jurusan') ? 'has-error' : '' ?>">
                <label for="name">Jurusan</label>
                <select name="jurusan" id="jurusan" class="form-control">
                  <option value="">== jurusan ==</option>
                  <?php foreach ($getjurusanAll as $pr) : ?>
                  <option value="<?= $pr['id']; ?>" <?= $pr['id'] == $jurusan ? ' selected="selected"' : ''; ?>><?= $pr['nama_jurusan']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('jurusan', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?= form_error('nama_kelas') ? 'has-error' : '' ?>">
                <label for="name">Nama</label>
                <input class="form-control" type="text" name="nama_kelas" value="<?= $getkelasbyId['nama_kelas']; ?>" />
                <?= form_error('nama_kelas', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?= form_error('wali_kelas') ? 'has-error' : '' ?>">
                <label for="name">Wali Kelas</label>
                <select name="wali_kelas" id="wali_kelas" class="form-control">
                  <option value="">== Wali Kelas ==</option>
                  <?php foreach ($getpegawai as $pr) : ?>
                  <option value="<?= $pr['id']; ?>" <?= $pr['id'] == $wali_kelas ? ' selected="selected"' : ''; ?>><?= $pr['nama_guru']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('wali_kelas', '<span class="help-block">', '</small>'); ?>
              </div>
              <input class="form-control" type="hidden" name="user_id" value="<?= $user['id']; ?>">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('akademik/kelas'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->