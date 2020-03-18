<div class="content-wrapper">
  <!-- CoAntent Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $title; ?>
      <small>to manage <?= $title; ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Akademik</li>
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
        <div class="col-md-6">
        <div class="box-tools">
          <form class="form-inline" method="post" action="" enctype="multipart/form-data" id="posts">
          <select name='bulan' class='form-control'>
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
            <input type="submit" value="Lihat" name="submit" class="btn btn-success">
          </form>
        </div>
      </div>
      </div>
<br><br>
      <div class="box-body">
        <div class="row">
          <!-- -->
          <div class="col-md-12">
            <?php if ($bulan<>'') { ?>
                <table class='table table-hover' id='example3'>
            <thead>
              <tr>
                <th>#</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tanggal</th>
                <th>Umur</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sno = $row + 1;
              foreach ($list_siswa as $dt) : ?>
                <?php if ($dt['tanggallahirsiswa'] <> '0000-00-00') { ?>
                  <?php if ($bulan == date('m', strtotime($dt['tanggallahirsiswa']))) { ?>
                    <tr>
                      <td><?= $sno++ ?></td>
                      <td><?= $dt['nis'] ?></td>
                      <td><?= $dt['namasiswa'] ?></td>
                      <td><?= get_namakelas($dt['kelas_id']) ?></td>
                      <td><?= gettanggalindo($dt['tanggallahirsiswa']) ?></td>
                      <td><?= get_umur($dt['tanggallahirsiswa']) ?></td>
                    </tr>
                  <?php } ?>
                <?php } ?>
              <?php endforeach; ?>
            <tbody>
          </table>
          <a href="<?php echo site_url('akademik/ultah_siswa_print/' . $bulan); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>print.jpg" width="15"> Cetak ke Printer</a>
            <?php } else {
              echo "<br><div align='center'><font color='red'>Silahkan Memilih Bulan Terlebih dahulu...</font></div><br><br><br>";
            } ?>
          </div>

          <!-- table -->
        </div>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->