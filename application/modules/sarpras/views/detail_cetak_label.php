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
          <div class="col-md-12">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped" id="example3">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kondisi</th>
                    <th>Sumber</th>
                    <th>Supplier</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Jumlah Cetak</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($get_inventaris_barang as $dt) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['kode_inv']; ?></td>
                      <td><?= $dt['namabarang']; ?></td>
                      <td><?= $dt['kondisi']; ?></td>
                      <td><?= $dt['sumber_dana']; ?></td>
                      <td><?= $dt['nama_supplier']; ?></td>
                      <td><?= $dt['jumlah']; ?></td>
                      <td><?= nominal($dt['harga']) ?></td>
                      <td>    
            <form action="" method="post"enctype="multipart/form-data">
            <input class="form-control" type="hidden" name="barang_id" value="<?= $dt['barang_id']; ?>"/>
            <input class="form-control" type="hidden" name="kode_inv" value="<?= $dt['kode_inv']; ?>"/>
            <input class="form-control" type="number" name="jumlah_cetak" value="<?= set_value('jumlah_cetak'); ?>" />
            <?= form_error('jumlah_cetak', '<span class="help-block">', '</small>'); ?>
            <button type="submit" class="btn btn-primary">Preview</button>

            </form>
                      </td>
                    </tr>
                    <?php $i++; ?>
                 
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <a href="<?= base_url('sarpras/cetak_label'); ?>" class="btn btn-default">Kembali</a>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

