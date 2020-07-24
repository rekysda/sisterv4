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
        <div class="box-tools">
          &nbsp;&nbsp;<a href="<?= base_url('akademik/rekapkbm'); ?>" class="btn btn-warning btn-sm">
            Kembali</a>
        </div>
      </div>

      <div class="box-body">
        <div class="row">

          <!-- -->
          <div class='col-md-12'>
            <div class='panel-body'>
              <form class="form-inline" method="post" action="" enctype="multipart/form-data" id="posts">
                <table class='table table-condensed table-hover'>
                  <tbody>
                    <tr>
                      <th scope='row'>Nama Guru</th>
                      <td><?= getfieldtable2('nama_guru', 'm_pegawai', 'id', $get_datagurukbm['guru_id']) ?></td>
                    </tr>
                    <tr>
                      <th scope='row'>Mata Pelajaran</th>
                      <td><?= $get_datagurukbm['nama_mapel'] ?></td>
                    </tr>
                    <tr>
                      <th scope='row'>Tahun Akademik</th>
                      <td><?= getfieldtable2('nama', 'm_tahunakademik', 'id', $get_datagurukbm['tahunakademik_id']) ?></td>
                    </tr>
                    <tr>
                      <th scope='row'>Bulan</th>
                      <td><select name='bulan' class='form-control'>
                          <option value='' selected>- Bulan -</option>";
                          <?php
                          $blnn = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                          for ($n = 1; $n <= 12; $n++) {
                            if ($bulan == $n) {
                              echo "<option value='$n' selected>$blnn[$n]</option>";
                            } else {
                              echo "<option value='$n'>$blnn[$n]</option>";
                            }
                          }
                          ?>
                        </select>
                        <?= form_error('bulan', '<span class="help-block">', '</small>'); ?>
                      </td>
                    </tr>
                    <tr>
                      <th scope='row'></th>
                      <td>
                        <input class="form-control" type="hidden" name="tahunakademik_id" value="<?= $tahunakademik_id; ?>">
                        <input class="form-control" type="hidden" name="mapel_id" value="<?= $mapel_id; ?>">
                        <input class="form-control" type="hidden" name="guru_id" value="<?= $guru_id; ?>">
                        <input type="submit" value="Lihat" name="submit" class="btn btn-success">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
          <div class="col-md-12">
            <div class="table-responsive">
              <?php if ($get_journal) { ?>
              <h4>Rekap KBM Bulan
                <?php $blnn = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                  for ($n = 1; $n <= 12; $n++) {
                    if ($bulan == $n) {
                      echo "$blnn[$n]";
                    }
                  }   ?></h4>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Kelas</th>
                    <th>Hari</th>
                    <th>Tanggal</th>
                    <th>Jam Ke</th>
                    <th>Materi</th>
                    <th>Keterangan</th>
                    <th>H</th>
                    <th>S</th>
                    <th>I</th>
                    <th>A</th>
                  </tr>
                </thead>
                <tbody> 
                  <?php $i = 1; ?>
                  <?php foreach ($get_journal as $dt) : ?>
                  <?php $databulan = date('n', strtotime($dt['tanggal'])); ?>
                  <?php if ($databulan == $bulan) { ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $dt['nama_kelas']; ?></td>
                    <td><?= $dt['hari']; ?></td>
                    <td><?= gettanggalindo($dt['tanggal']); ?></td>
                    <td><?= $dt['jamke']; ?></td>
                    <td><?= $dt['materi']; ?></td>
                    <td><?= $dt['keterangan']; ?></td>
                    <?php 
                      $datahadir = $this->akademik_model->get_absensiswajournal($dt['id'] ,$dt['tanggal'],"H"); 
                      $datasakit = $this->akademik_model->get_absensiswajournal($dt['id'] ,$dt['tanggal'],"S");
                      $dataijin = $this->akademik_model->get_absensiswajournal($dt['id'] ,$dt['tanggal'],"I");
                      $dataalpha = $this->akademik_model->get_absensiswajournal($dt['id'] ,$dt['tanggal'],"A");
                      ?> 
                      <?= $datahadir['jumlah']; ?></td>
                      <td><?= $datasakit['jumlah']; ?></td>
                      <td><?= $dataijin['jumlah']; ?></td>
                      <td><?= $dataalpha['jumlah']; ?></td>
                  </tr>
                  <?php $i++; ?>
                  <?php } ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <?php } ?>
            </div>
          </div>


          <!-- row -->
        </div>
        <?php if ($get_journal) { ?>
        <a href="<?php echo site_url('akademik/cetak_rekapkbm_print/' . $tahunakademik_id . '/' . $mapel_id . '/' . $guru_id . '/' . $bulan); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>print.jpg" width="15"> Cetak ke Printer</a>
        <?php } ?>
  </section>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->