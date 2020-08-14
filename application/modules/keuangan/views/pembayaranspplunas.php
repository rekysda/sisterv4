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
  <div class="box">
      <div class="box-header with-border">
      <div class="col-md-6">
        <div class="box-tools">
          <a href="<?= base_url('keuangan/pembayaranspp'); ?>" class="btn btn-primary btn-sm">
            Belum Bayar</a>
          </a>&nbsp;<a href="<?= base_url('keuangan/pembayaranspplunas'); ?>" class="btn btn-warning btn-sm">
            Bayar</a>
        </div>
        </div>
      </div>
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
      <div class="col-md-6">
      <h4>Biaya : <?= $biaya['nama'] ?> <?= $biaya_id?></h4>
          <select class="form-control" name="biaya_id"  id="biaya_id">
<option value="" selected>Pilih Biaya</option>';
<?php foreach ($listbiaya as $dt2) : ?>
<option value="<?= base_url('keuangan/biaya_tujuan/' . $dt2['id']) ?>" <?= set_select('biaya_id', $dt2['id'], FALSE); ?>><?= $dt2['nama'] ?></option>';
<?php endforeach; ?>
</select>
      </div>
</div>
      <br>
      <div class="box-body">
        <?= $this->session->flashdata('message') ?>
        <!-- Posts List -->
        <form method="POST" action="<?= base_url('keuangan/bayarbiayagagal') ?>" enctype="multipart/form-data" class="form-inline">
          <table class='table table-hover' id='example3'>
            <thead>
              <tr>
                <th>#</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Biaya</th>
                <th>Nominal</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $sno = 1; ?>
              <?php foreach ($biayasiswa as $dt) :
                $id = $dt['id'];
                $siswa_id = $dt['siswa_id'];
                $nis = $dt['nis'];
                $namasiswa = $dt['namasiswa'];
                $namabiaya = $dt['namabiaya'];
                $nominal = $dt['nominal'];
                $is_paid = $dt['is_paid'];
                if($is_paid =='1'){
                echo "<tr>";
                echo "<td><input name='check[]' type='checkbox' value='" . $id . "'></td>";
                echo "<td>$nis</td>";
                echo "<td>$namasiswa</td>";
                echo "<td>$namabiaya</td>";
                echo "<td>" . $nominal . "</td>";
                echo "<td> Terbayar </td>";
                }
                ?>                
                </tr>
                <?php $sno++; ?>
              <?php endforeach; ?>
            <tbody>
              <?php
              echo "<tr>
    <td colspan='7' align='right'>";
              echo '<a href="#" onclick="chunchall(this);return false"class="btn btn-warning">Check all</a>&nbsp;with selected &nbsp; <input class="btn btn-primary" type="submit" onclick="return confirm(Anda yakin ? )" name="btn" value="Batal Bayar"></td></tr></form>';

              ?>
          </table>
        </form>
      </div>
      <!-- /.box-body -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->