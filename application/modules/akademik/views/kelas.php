<script type='text/javascript'>
  $(function($) {
    $('#nominal').autoNumeric('init', {
      lZero: 'deny',
      aSep: ',',
      mDec: 0
    });
  });
</script>
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
          <div class="col-md-4">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group <?= form_error('tahun') ? 'has-error' : '' ?>">
                <label for="name">Tahun Angkatan</label>
                <select name="tahun" id="tahun" class="form-control <?= form_error('tahun') ? 'is-invalid' : '' ?>">
                  <option value="">== Tahun ==</option>
                  <?php
                  $tahunn = (date("Y") + 1);
                  for ($n = 2019; $n <= $tahunn; $n++) {
                    if ($tahun_default['value'] == $n) {
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
                <select name="jurusan" id="jurusan" class="form-control <?= form_error('jurusan') ? 'is-invalid' : '' ?>">
                  <option value="">== Jurusan ==</option>
                  <?php foreach ($getjurusanAll as $dt) : ?>
                  <option value="<?= $dt['id']; ?>" <?= set_select('jurusan', $dt['id'], FALSE); ?>><?= $dt['nama_jurusan']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('jurusan', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?= form_error('nama_kelas') ? 'has-error' : '' ?>">
                <label for="name">Nama Kelas</label>
                <input class="form-control" type="text" name="nama_kelas" value="<?= set_value('nama_kelas'); ?>" />
                <?= form_error('nama_kelas', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?= form_error('wali_kelas') ? 'has-error' : '' ?>">
                <label for="name">Wali Kelas</label>
                <select name="wali_kelas" id="wali_kelas" class="form-control <?= form_error('wali_kelas') ? 'is-invalid' : '' ?>">
                  <option value="">== Wali Kelas ==</option>
                  <?php foreach ($getpegawai as $dt) : ?>
                  <option value="<?= $dt['id']; ?>" <?= set_select('wali_kelas', $dt['id'], FALSE); ?>><?= $dt['nama_guru']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('wali_kelas', '<span class="help-block">', '</small>'); ?>
              </div>

              <input class="form-control" type="hidden" name="user_id" value="<?= $user['id']; ?>">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('akademik/kelas'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
          <div class="col-md-8">
            <div class="table-responsive">
              <table class="table table-hover" id='example3'>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Jurusan</th>
                    <th>Nama</th>
                    <th>WaliKelas</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>

                  <?php foreach ($getkelasAll as $dt) : ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $dt['tahun'] ?></td>
                    <td><?= $dt['jurusan'] ?></td>
                    <td><?= $dt['nama_kelas'] ?></td>
                    <td><?= $dt['nama_guru'] ?></td>
                    <td>
                      <a href="<?= base_url('akademik/editkelas/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                      <a href="<?= base_url('akademik/hapuskelas/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
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