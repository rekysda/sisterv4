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
                <h3 class="box-title">Edit</h3>
            </div>
            <div class="box-body">

                <?= $this->session->flashdata('message') ?>
                <?php $tahun_id = $getjalurbiaya['tahun_id']; ?>
                <?php $gelombang_id = $getjalurbiaya['gelombang_id']; ?>
                <?php $jalur_id = $getjalurbiaya['jalur_id']; ?>
                <?php $biaya_id = $getjalurbiaya['biaya_id']; ?>
                <form action="<?php base_url('ppdb/biaya') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Tahun Akademik*</label>
                        <select name="tahun_id" id="tahun_id" class="form-control <?= form_error('tahun_id') ? 'is-invalid' : '' ?>">
                            <option value="">== Tahun ==</option>
                            <?php foreach ($tahun as $dt) : ?>
                                <option value="<?= $dt['id']; ?>"<?= set_select('tahun_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $tahun_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('tahun_id') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Gelombang*</label>
                        <select name="gelombang_id" id="gelombang_id" class="form-control <?= form_error('gelombang_id') ? 'is-invalid' : '' ?>">
                            <option value="">== Gelombang ==</option>
                            <?php foreach ($gelombang as $dt) : ?>
                                <option value="<?= $dt['id']; ?>"<?= set_select('gelombang_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $gelombang_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('gelombang_id') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Jalur*</label>
                        <select name="jalur_id" id="jalur_id" class="form-control <?= form_error('jalur_id') ? 'is-invalid' : '' ?>">
                            <option value="">== Jalur ==</option>
                            <?php foreach ($jalur as $dt) : ?>
                                <option value="<?= $dt['id']; ?>"<?= set_select('jalur_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $jalur_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('jalur_id') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Biaya*</label>
                        <select name="biaya_id" id="biaya_id" class="form-control <?= form_error('biaya_id') ? 'is-invalid' : '' ?>">
                            <option value="">== Biaya ==</option>
                            <?php foreach ($biaya as $dt) : ?>
                                <option value="<?= $dt['id']; ?>"<?= set_select('biaya_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $biaya_id ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('biaya_id') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Nominal*</label>
                        <input class="form-control <?php echo form_error('nominal') ? 'is-invalid' : '' ?>" type="text"  id="nominal" name="nominal" value="<?= $getjalurbiaya['nominal']; ?>" />
                        <div class="invalid-feedback">
                            <?= form_error('nominal') ?>
                        </div>
                    </div>
                    <input class="form-control" type="hidden" name="user_id" value="<?= $user['id']; ?>" />
                    <input class="btn btn-success" type="submit" name="btn" value="Save" />&nbsp; <a href="<?= base_url('ppdb/biaya'); ?> " class="btn btn-warning">Cancel</a>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
<!-- Default box -->
<div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">All Data</h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-hover" id="dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Gelombang  - Jalur</th>
                <th>Biaya</th>
                <th>Nominal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>

              <?php foreach ($jalurbiaya as $dt) : ?>
                <tr>
                  <td><?= $i ?></td>
                  <td><?= $dt['tahun'] ?></td>
                  <td><?= $dt['gelombang'] ?> - <?= $dt['jalur'] ?> </td>
                  <td><?= $dt['biaya'] ?></td>
                  <td><?= nominal($dt['nominal']); ?></td>
                  <td>
                  <a href="<?= base_url('ppdb/editjalurbiaya/' . $dt['id']); ?>" class="btn btn-success btn-xs">Edit</a>
                    <a href="<?= base_url('ppdb/hapusjalurbiaya/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->