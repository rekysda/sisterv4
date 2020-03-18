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
<li>BK</li>
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
            <form action="" method="post">
            <div class="form-group <?php echo form_error('kategori_id') ? 'has-error' : '' ?>">
                <label for="name">Kategori</label>
                <select name="kategori_id" id="kategori_id" class="form-control">
									<option value="">== Kategori ==</option>
									<?php foreach ($kat_pelanggaran as $dt) : ?>
										<option value="<?= $dt['id']; ?>"><?= $dt['kategori']; ?></option>
									<?php endforeach; ?>
								</select>
                <?= form_error('kategori_id', '<span class="help-block">', '</small>'); ?>
              <div class="form-group <?php echo form_error('pelanggaran') ? 'has-error' : '' ?>">
                <label for="tahun">Pelanggaran</label>
                <input class="form-control" type="text" name="pelanggaran" value="<?= set_value('pelanggaran'); ?>" />
                <?= form_error('pelanggaran', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('point') ? 'has-error' : '' ?>">
                <label for="tahun">Point</label>
                <input class="form-control" type="number" name="point" value="<?= set_value('point'); ?>" />
                <?= form_error('point', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('sanksi') ? 'has-error' : '' ?>">
                <label for="tahun">Sanksi</label>
                <input class="form-control" type="text" name="sanksi" value="<?= set_value('sanksi'); ?>" />
                <?= form_error('sanksi', '<span class="help-block">', '</small>'); ?>
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('bk/pelanggaran'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
          <div class="col-md-12">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped" id="example3">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Kategori</th>
                    <th>Pelanggaran</th>
                    <th>Point</th>
                    <th>Sanksi</th>
                    <th width="10%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($datapelanggaran as $dt) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['kategori']; ?></td>
                      <td><?= $dt['pelanggaran']; ?></td>
                      <td><?= $dt['point']; ?></td>
                      <td><?= $dt['sanksi']; ?></td>
                      <td>
                        <a href="<?= base_url('bk/edit_pelanggaran/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                        <a href="<?= base_url('bk/hapus_pelanggaran/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
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