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
      <?php $kode_ruangan= generatekodeinc('sar_ruangan','R','kode_ruangan');?>
        <div class="row">
          <div class="col-md-4">
            <form action="" method="post"enctype="multipart/form-data">
            <div class="form-group <?php echo form_error('gedung_id') ? 'has-error' : '' ?>">
                <label for="name">Gedung</label>
                <select name="gedung_id" id="gedung_id" class="form-control">
									<option value="">== Gedung ==</option>
									<?php foreach ($gedung as $dt) : ?>
										<option value="<?= $dt['id']; ?>"><?= $dt['nama_gedung']; ?></option>
									<?php endforeach; ?>
								</select>
                <?= form_error('gedung_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('sekolah_id') ? 'has-error' : '' ?>">
                <label for="name">Sekolah</label>
                <select name="sekolah_id" id="sekolah_id" class="form-control">
									<?php foreach ($sekolah as $dt) : ?>
										<option value="<?= $dt['id']; ?>"><?= $dt['sekolah']; ?></option>
									<?php endforeach; ?>
								</select>
                <?= form_error('sekolah_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('kode_ruangan') ? 'has-error' : '' ?>">
                <label for="name">Kode</label>
                <input class="form-control" type="text" name="kode_ruangan" value="<?= set_value('kode_ruangan', isset($kode_ruangan) ? $kode_ruangan : ''); ?>" />
                <?= form_error('kode_ruangan', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('nama_ruangan') ? 'has-error' : '' ?>">
                <label for="tahun">Nama</label>
                <input class="form-control" type="text" name="nama_ruangan" value="<?= set_value('nama_ruangan'); ?>" />
                <?= form_error('nama_ruangan', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group">
              <label for="tahun">Gambar</label>
              <input type="file" class="custom-file-input" id="image" name="image">
          </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('sarpras/ruangan'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
          <div class="col-md-8">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped" id="example3">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Gedung</th>
                    <th>Kode</th>
                    <th>Ruangan</th>                    
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($ruangan as $dt) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['nama_gedung']; ?></td>
                      <td><?= $dt['kode_ruangan']; ?></td>
                      <td><?= $dt['nama_ruangan']; ?></td>
                      <td><a href="<?= base_url('assets/images/sarpras/'.$dt['image']); ?>"target="new"><img src="<?= base_url('assets/images/sarpras/'.$dt['image']); ?>"height="50px"width="50px"></a></td>
                      <td>
                        <a href="<?= base_url('sarpras/editruangan/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                        <a href="<?= base_url('sarpras/hapusruangan/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
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