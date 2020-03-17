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
        <h3 class="box-title">Gelombang Jalur</h3>
      </div>
      <div class="box-body">

        <div class="row">
          <div class="col-md-4">
            <form action="<?php base_url('akademik/gelombangjalur') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group <?= form_error('tahun_id') ? 'has-error' : '' ?>">
                <label for="name">Tahun PPDB</label>
                <select name="tahun_id" id="tahun_id" class="form-control <?= form_error('tahun_id') ? 'is-invalid' : '' ?>">
                  <option value="">== Tahun ==</option>
                  <?php
                  $tahunn = (date("Y") + 1);
                  for ($n = 2019; $n <= $tahunn; $n++) {
                    if ($tahunppdbdefault['value'] == $n) {
                      echo "<option value='$n' selected>$n</option>";
                    } else {
                      echo "<option value='$n'>$n</option>";
                    }
                  }
                  ?> 
                </select>
                <?= form_error('tahun_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?= form_error('sekolah_id') ? 'has-error' : '' ?>">
                <label for="name">Sekolah</label>
                <select name="sekolah_id" id="sekolah_id" class="form-control <?= form_error('sekolah_id') ? 'is-invalid' : '' ?>">
                  <?php foreach ($sekolah as $dt) : ?>
                  <option value="<?= $dt['id']; ?>" <?= set_select('sekolah_id', $dt['id'], FALSE); ?>><?= $dt['sekolah']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('sekolah_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?= form_error('gelombang_id') ? 'has-error' : '' ?>">
                <label for="name">Gelombang</label>
                <select name="gelombang_id" id="gelombang_id" class="form-control <?= form_error('gelombang_id') ? 'is-invalid' : '' ?>">
                  <option value="">== Gelombang ==</option>
                  <?php foreach ($gelombang as $dt) : ?>
                  <option value="<?= $dt['id']; ?>" <?= set_select('gelombang_id', $dt['id'], FALSE); ?>><?= $dt['nama']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('gelombang_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?= form_error('jalur_id') ? 'has-error' : '' ?>">
                <label for="name">Jalur</label>
                <select name="jalur_id" id="jalur_id" class="form-control <?= form_error('jalur_id') ? 'is-invalid' : '' ?>">
                  <option value="">== Jalur ==</option>
                  <?php foreach ($jalur as $dt) : ?>
                  <option value="<?= $dt['id']; ?>" <?= set_select('jalur_id', $dt['id'], FALSE); ?>><?= $dt['nama']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('jalur_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <input class="form-control" type="hidden" name="user_id" value="<?= $user['id']; ?>">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('akademik/gelombangjalur'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
          <div class="col-md-8">
            <div class="table-responsive">
              <table class="table table-hover" id='example3'>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Sekolah</th>
                    <th>Gelombang - Jalur</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>

                  <?php foreach ($gelombangjalur as $dt) : ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $dt['tahun_id'] ?></td>
                    <td><?= $dt['sekolah'] ?></td>
                    <td><?= $dt['gelombang'] ?> - <?= $dt['jalur'] ?> </td>
                    <td>
                      <a href="<?= base_url('akademik/editgelombangjalur/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                      <a href="<?= base_url('akademik/hapusgelombangjalur/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
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