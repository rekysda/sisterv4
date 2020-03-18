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

    <?= $this->session->flashdata('message') ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <div class="box-body">
      <?php $kode= generatekodeinc('sar_supplier','S','kode');?>
        <div class="row">
          <div class="col-md-4">
            <form action="<?php base_url('sarpras/supplier') ?>" method="post">
              <div class="form-group <?php echo form_error('kode') ? 'has-error' : '' ?>">
                <label for="name">Kode</label>
                <input class="form-control" type="text" name="kode" value="<?= set_value('kode', isset($kode) ? $kode : ''); ?>" />
                <?= form_error('kode', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('nama') ? 'has-error' : '' ?>">
                <label for="tahun">Nama</label>
                <input class="form-control" type="text" name="nama" value="<?= set_value('nama'); ?>" />
                <?= form_error('nama', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('alamat') ? 'has-error' : '' ?>">
                <label for="tahun">Alamat</label>
                <input class="form-control" type="text" name="alamat" value="<?= set_value('alamat'); ?>" />
                <?= form_error('alamat', '<span class="help-block">', '</small>'); ?>
              </div>  
              <div class="form-group <?php echo form_error('telepon') ? 'has-error' : '' ?>">
                <label for="tahun">Telepon</label>
                <input class="form-control" type="number" name="telepon" value="<?= set_value('telepon'); ?>" />
                <?= form_error('telepon', '<span class="help-block">', '</small>'); ?>
              </div>           
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('sarpras/supplier'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
          <div class="col-md-8">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped" id="example3">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($supplier as $dt) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['kode']; ?></td>
                      <td><?= $dt['nama']; ?></td>
                      <td><?= $dt['telepon']; ?></td>
                      <td>
                        <a href="<?= base_url('sarpras/editsupplier/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                        <a href="<?= base_url('sarpras/hapussupplier/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
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