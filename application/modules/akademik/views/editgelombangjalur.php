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

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Gelobang Jalur</h3>
      </div>
      <div class="box-body">

        <?php $sekolah_id = $getgelombangjalur['sekolah_id']; ?>
        <?php $gelombang_id = $getgelombangjalur['gelombang_id']; ?>
        <?php $jalur_id = $getgelombangjalur['jalur_id']; ?>
        <form class="form-horizontal" action="<?php base_url('akademik/gelombangjalur') ?>" method="post">
          <div class="form-group <?= form_error('tahun_id') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">Tahun PPDB</label>
            <div class="col-sm-10">
              <select name="tahun_id" id="tahun_id" class="form-control">
                <option value="">== Tahun ==</option>
                <?php
                $tahunn = (date("Y") + 1);
                for ($n = 2019; $n <= $tahunn; $n++) {
                  if ($getgelombangjalur['tahun_id'] == $n) {
                    echo "<option value='$n' selected>$n</option>";
                  } else {
                    echo "<option value='$n'>$n</option>";
                  }
                }
                ?>
              </select>
              <?= form_error('tahun_id', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('sekolah_id') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">Gelombang</label>
            <div class="col-sm-10">
              <select name="sekolah_id" id="sekolah_id" class="form-control">
                <?php foreach ($sekolah as $dt) : ?>
                <option value="<?= $dt['id']; ?>" <?= set_select('sekolah_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $sekolah_id ? ' selected="selected"' : ''; ?>><?= $dt['sekolah']; ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('sekolah_id', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('gelombang_id') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">Gelombang</label>
            <div class="col-sm-10">
              <select name="gelombang_id" id="gelombang_id" class="form-control">
                <option value="">== Gelombang ==</option>
                <?php foreach ($gelombang as $dt) : ?>
                <option value="<?= $dt['id']; ?>" <?= set_select('gelombang_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $gelombang_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('gelombang_id', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group <?= form_error('jalur_id') ? 'has-error' : '' ?>">
            <label for="name" class="col-sm-2 control-label">Jalur</label>
            <div class="col-sm-10">
              <select name="jalur_id" id="jalur_id" class="form-control">
                <option value="">== Jalur ==</option>
                <?php foreach ($jalur as $dt) : ?>
                <option value="<?= $dt['id']; ?>" <?= set_select('jalur_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $jalur_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('jalur_id', '<span class="help-block">', '</small>'); ?>
            </div>
          </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <input class="form-control" type="hidden" name="user_id" value="<?= $user['id']; ?>">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('akademik/gelombangjalur'); ?> " class="btn btn-default">Cancel</a>
      </div>
      </form>
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->