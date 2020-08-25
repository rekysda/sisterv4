<script type='text/javascript'>
    $(function($) {
      $('#nominal').autoNumeric('init', {  lZero: 'deny', aSep: ',', mDec: 0 });    
    });  
  </script>
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
                <h3 class="box-title">Jalur Biaya</h3>
            </div>
            <div class="box-body">

                <?= $this->session->flashdata('message') ?>
                <form action="<?php base_url('ppdb/jalurbiaya_add') ?>" method="post" enctype="multipart/form-data">
                <input class="form-control" type="hidden" name="gelombangjalur_id" value="<?=  $gelombangjalur['gelombangjalur_id'] ?>" />
                <div class="form-group">
                <label for="name">Sekolah</label>
                        <input class="form-control" type="text" name="ket2" value="<?= getfieldtable('m_sekolah','sekolah',$gelombangjalur['sekolah_id']) ?>"readonly />
                        </div>
                        <div class="form-group">
                        <label for="name">Tahun-Gelombang-Jalur</label>
                        <input class="form-control" type="text" name="ket" value="<?= $gelombangjalur['tahun_id']; ?> - <?= $gelombangjalur['gelombang']; ?> - <?= $gelombangjalur['jalur']; ?>"readonly />
                        </div>
                         <div class="form-group">
                        <label for="name">Biaya*</label>
                        <select name="biaya_id" class="form-control <?= form_error('biaya_id') ? 'is-invalid' : '' ?>">
                            <option value="">== Biaya ==</option>
                            <?php foreach ($biayacategories as $pr) : ?>
                                <option value="<?= $pr['id']; ?>" disabled><?= $pr['nama']; ?></option>
                            
                            <?php foreach ($biaya as $dt) : ?>
                            <?php if($pr['id']==$dt['category_id']) { ?>
                                <option value="<?= $dt['id']; ?>"<?= set_select('biaya_id', $dt['id'], FALSE); ?>> -- <?= $dt['nama']; ?></option>
                            <?php } ?>
                            <?php endforeach; ?>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('biaya_id') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Nominal*</label>
                        <input class="form-control <?php echo form_error('nominal') ? 'is-invalid' : '' ?>" type="text" name="nominal" value="<?= set_value('nominal'); ?>" />
                        <div class="invalid-feedback">
                            <?= form_error('nominal') ?>
                        </div>
                    </div>
                    <input class="form-control" type="hidden" name="user_id" value="<?= $user['id']; ?>" />
                    <input class="btn btn-success" type="submit" name="btn" value="Simpan" />&nbsp; <a href="<?= base_url('ppdb/jalurbiaya_add/').$gelombangjalur['gelombangjalur_id']; ?> " class="btn btn-warning">Cancel</a>&nbsp; <a href="<?= base_url('ppdb/jalurbiaya')?>"class="btn btn-primary">Kembali</a>
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
          <table class="table table-hover" id='example3'>
            <thead>
              <tr>
                <th>No</th>
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
                  <td><?= $dt['biaya'] ?></td>
                  <td><?= nominal($dt['nominal']) ?></td>
                  <td>
                    <a href="<?= base_url('ppdb/hapusjalurbiaya/' . $dt['id'].'/' . $dt['gelombangjalur_id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
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