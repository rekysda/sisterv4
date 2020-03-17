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
            <form action="<?php base_url('akademik/kegiatanakademik') ?>" method="post">
              <div class="form-group <?php echo form_error('judul') ? 'has-error' : '' ?>">
                <label for="name">Judul</label>
                <input class="form-control" type="text" name="judul" value="<?= set_value('judul'); ?>" />
                <?= form_error('judul', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('tanggal_awal') ? 'has-error' : '' ?>">
                <label for="name">Tanggal Awal</label>
                <input class="form-control" type="text" id="tanggal_awal" name="tanggal_awal" value="<?= set_value('tanggal_awal'); ?>" />
                <?= form_error('tanggal_awal', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('tanggal_akhir') ? 'has-error' : '' ?>">
                <label for="name">Tanggal Akhir</label>
                <input class="form-control" type="text" id="tanggal_akhir" name="tanggal_akhir" value="<?= set_value('tanggal_akhir'); ?>" />
                <?= form_error('tanggal_akhir', '<span class="help-block">', '</small>'); ?>
              </div>
              <button type="submit" class="btn btn-primary">Tambah</button>
              <a href="<?= base_url('akademik/kegiatanakademik'); ?> " class="btn btn-default">Cancel</a>
              &nbsp;&nbsp;
              <a href="<?= base_url('akademik/view_fullcalendar'); ?>" class="btn btn-success" target="new">Calendar</a>
            </form>
          </div>
          <div class="col-md-8">
            <div class="table-responsive">
              <table class="table table-hover" id="example3">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Tanggal Awal</th>
                    <th>Tanggal Akhir</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($kegiatanakademik as $dt) : ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $dt['judul']; ?></td>
                    <td><?= $dt['tanggal_awal']; ?></td>
                    <td><?= $dt['tanggal_akhir']; ?></td>
                    <td>
                      <a href="<?= base_url('akademik/editkegiatanakademik/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                      <a href="<?= base_url('akademik/hapuskegiatanakademik/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
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