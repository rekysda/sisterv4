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
        <div class="row">
          <div class="col-md-4">
            <form action="" method="post"enctype="multipart/form-data">      
              <div class="form-group <?php echo form_error('namabarang') ? 'has-error' : '' ?>">
                <label for="tahun">Nama Barang</label>
                <input class="form-control" type="text" name="namabarang" value="<?= set_value('namabarang'); ?>" />
                <?= form_error('namabarang', '<span class="help-block">', '</small>'); ?>
              </div>    
              <div class="form-group">
              <label for="tahun">Gambar</label>
              <input type="file" class="custom-file-input" id="image" name="image">
          </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('sarpras/namabarang'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
          <div class="col-md-8">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped" id="example3">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($namabarang as $dt) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['namabarang']; ?></td>
                      <td><a href="<?= base_url('assets/images/sarpras/'.$dt['image']); ?>"target="new"><img src="<?= base_url('assets/images/sarpras/'.$dt['image']); ?>"height="50px"width="50px"></a></td>
                      <td>
                        <a href="<?= base_url('sarpras/editnamabarang/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                        <a href="<?= base_url('sarpras/hapusnamabarang/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
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

