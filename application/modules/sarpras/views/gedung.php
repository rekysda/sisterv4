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
      <?php $kode_gedung= generatekodeinc('sar_gedung','G','kode_gedung');?>
        <div class="row">
          <div class="col-md-4">
            <form action="<?php base_url('sarpras/gedung') ?>" method="post">
              <div class="form-group <?php echo form_error('kode_gedung') ? 'has-error' : '' ?>">
                <label for="name">Kode</label>
                <input class="form-control" type="text" name="kode_gedung" value="<?= set_value('kode_gedung', isset($kode_gedung) ? $kode_gedung : ''); ?>" />
                <?= form_error('kode_gedung', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('nama_gedung') ? 'has-error' : '' ?>">
                <label for="tahun">Nama</label>
                <input class="form-control" type="text" name="nama_gedung" value="<?= set_value('nama_gedung'); ?>" />
                <?= form_error('nama_gedung', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('lantai') ? 'has-error' : '' ?>">
                <label for="tahun">Jumlah Lantai</label>
                <input class="form-control" type="number" name="lantai" value="<?= set_value('lantai'); ?>" />
                <?= form_error('lantai', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('panjang') ? 'has-error' : '' ?>">
                <label for="tahun">Panjang</label>
                <input class="form-control" type="number" name="panjang" value="<?= set_value('panjang'); ?>" />
                <?= form_error('panjang', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('lebar') ? 'has-error' : '' ?>">
                <label for="tahun">Lebar</label>
                <input class="form-control" type="number" name="lebar" value="<?= set_value('lebar'); ?>" />
                <?= form_error('lebar', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('tinggi') ? 'has-error' : '' ?>">
                <label for="tahun">Tinggi</label>
                <input class="form-control" type="text" name="tinggi" value="<?= set_value('tinggi'); ?>" />
                <?= form_error('tinggi', '<span class="help-block">', '</small>'); ?>
              </div>          
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('sarpras/gedung'); ?> " class="btn btn-default">Cancel</a>
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
                    <th>JumlahLantai</th>
                    <th>PxLxT</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($gedung as $dt) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['kode_gedung']; ?></td>
                      <td><?= $dt['nama_gedung']; ?></td>
                      <td><?= $dt['lantai']; ?> Lantai</td>
                      <td><?= $dt['panjang']; ?> Meter x <?= $dt['lebar']; ?> Meter x <?= $dt['panjang']; ?> Meter</td>
                      <td>
                        <a href="<?= base_url('sarpras/editgedung/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                        <a href="<?= base_url('sarpras/hapusgedung/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
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