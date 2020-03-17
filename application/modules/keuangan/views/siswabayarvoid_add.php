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
            <li>Keuangan</li>
      <li><?= $title; ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <?= $this->session->flashdata('message') ?>
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">All</h3>
                <div class="box-tools">
          <a href="<?= base_url('keuangan/siswabayarvoid'); ?>" class="btn btn-success btn-sm">
            Kembali
          </a>&nbsp;&nbsp;
        </div>
            </div>
            <div class="box-body">
            <?= $this->session->flashdata('message') ?>
 <!-- Default box -->
 <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Informasi Pembayaran</h3>
      </div>
      <div class="box-body"></div>
        <div class="row">
          <div class="col-md-6">
          <form action="<?php base_url('keuangan/siswabayarvoid_add') ?>" method="post">
              <div class="form-group">
                <label for="nomor_nota">No.Nota Pembayaran</label><br>
                   
                <input class="form-control" type="text" id="nomor_nota" name="nomor_nota" value="<?= $getsiswabayarmaster['nomor_nota'] ?> "readonly/>             
              </div>
              <div class="form-group <?php echo form_error('tanggal') ? 'has-error' : '' ?>">
                <label for="tanggal">Tanggal Batal</label><br>
                <input class="form-control" type="text" id="tanggal"name="tanggal"  value="<?= set_value('tanggal', date('Y-m-d H:i:s'),FALSE); ?>">
                <?= form_error('tanggal', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group  <?php echo form_error('keterangan_batal') ? 'has-error' : '' ?>">
                <label for="keterangan_batal">Keterangan Batal</label><br>
                <input class="form-control" type="text" id="keterangan_batal" name="keterangan_batal" value="<?= set_value('keterangan_batal') ?> "/> 
              </div>
              <div class="form-group <?php echo form_error('namasiswa') ? 'has-error' : '' ?>">
                <label for="namasiswa">Nama Siswa</label><br>
                <input type='text' name='namasiswa' class='form-control' id='namasiswa' value="<?= $getsiswabayarmaster['namasiswa'] ?>"readonly>

              </div>
              <div class="form-group <?php echo form_error('petugas') ? 'has-error' : '' ?>">
                <label for="petugas">Petugas Pembatalan</label><br>
                <input type='text' name='petugas' class='form-control' id='petugas' value="<?= $user['name'] ?>" readonly>
                <?= form_error('petugas', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="hidden" name="siswa_id" class="form-control" id="siswa_id"  value="<?= $getsiswabayarmaster['siswa_id'] ?>"/>
                <input type="hidden" name="user_batal" class="form-control" id="user_batal"  value="<?= $user['id'] ?>"/>
              <button type="submit" class="btn btn-primary"id="submit" name="submit">Tambah</button>
              <a href="<?= base_url('keuangan/siswabayarvoid_add/'.$id_master); ?> " class="btn btn-default">Cancel</a>
              <a href="<?= base_url('keuangan/siswabayarvoid_list'); ?> " class="btn btn-warning">Kembali</a>
                </div>
            </form>         
                </div>
                <b>Detail Biaya</b>
                <div class="col-md-6">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Biaya</th>
      <th scope="col">Nominal</th>
    </tr>
  </thead>
  <tbody>
  <?php $no='1'; ?>
  <?php foreach ($getsiswabayardetail as $item): ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $item['biaya'] ?></td>
      <td><?= nominal($item['nominal']) ?></td>
    </tr>
    <?php  
    $ttotal +=$item['nominal'];
    $no++; 
    endforeach; ?>  
  </tbody>
</table>

    </div>
          </div>
   </div>
        <!-- /.box-body -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->