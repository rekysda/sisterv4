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
          <div class="col-md-4">
            <form action="" method="post">             
              <div class="form-group <?php echo form_error('kategori') ? 'has-error' : '' ?>">
                <label for="name">Kategori</label>
                <input class="form-control" type="text" name="kategori" value="<?= set_value('kategori', isset($kategori) ? $kategori :  $get_kat_pelanggaran['kategori']); ?>" />
                <?= form_error('kategori', '<span class="help-block">', '</small>'); ?>
              </div>               
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('bk/kategori_pelanggaran'); ?> " class="btn btn-default">Cancel</a>
            </form>
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