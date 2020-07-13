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
      <li class="active"><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <?= $this->session->flashdata('message') ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">List <?= $title; ?></h3>
      </div>
      <div class="box-body">

        <div class="row">
          <div class="col-md-4">

            <form action="" method="post">
              <div class="form-group <?= form_error('jenis') ? 'has-error' : '' ?>">
                <label for="name">Jenis*</label>
                <input class="form-control" type="text" name="jenis" value="<?= set_value('jenis'); ?>" placeholder="jenis">
                <?= form_error('jenis', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?= form_error('nama_kelompok') ? 'has-error' : '' ?>">
                <label for="name">Nama Kelompok*</label>
                <input class="form-control" type="text" name="nama_kelompok" value="<?= set_value('nama_kelompok'); ?>" placeholder="nama_kelompok">
                <?= form_error('nama_kelompok', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?= form_error('keterangan') ? 'has-error' : '' ?>">
                <label for="name">Keterangan</label>
                <input class="form-control" type="text" name="keterangan" value="<?= set_value('keterangan'); ?>" placeholder="keterangan">
                <?= form_error('keterangan', '<span class="help-block">', '</small>'); ?>
              </div>
              <button type="submit" class="btn btn-primary">Tambah</button>
              <a href="<?= base_url('rapor/kelompok_mapel'); ?> " class="btn btn-default">Cancel</a>
            </form>

          </div>
          <div class="col-md-8">

            <div class="table-responsive">
              <table class="table table-hover" id="dataTable">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Jenis</th>
                    <th>Nama Kelompok</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($kelompokmapel as $dt) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['jenis']; ?></td>
                      <td><?= $dt['nama_kelompok']; ?></td>
                      <td><?= $dt['keterangan']; ?></td>
                      <td>
                        <a href="<?= base_url('rapor/edit_kelompok_mapel/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                        <a href="<?= base_url('rapor/hapus_kelompok_mapel/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
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
      <!-- /.box -->
    </div>
    <!-- /.box-body -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->