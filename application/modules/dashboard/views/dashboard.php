<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $title; ?>
      <small>Version 2.0</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Pegawai</span>
            <span class="info-box-number"><?= $jumlahpegawai; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-fw fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Siswa Aktif</span>
            <span class="info-box-number"><?= $jumlahsiswa; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Inventaris</span>
            <span class="info-box-number"><?= $jumlahinventaris; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Siswa PPDB</span>
            <span class="info-box-number"><?= $jumlahppdb?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

<div class="box box-success">
          <div class="box-header with-border">
          <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
            <h3 class="box-title"><i class="fa fa-fw fa-android"></i>User Agent</h3>
            </div>
          <div class="box-body">
        <table>
        <tr><td>Agent&nbsp;&nbsp;</td><td>:&nbsp;<?= $agent ?></td></tr>
        <tr><td>OS&nbsp;&nbsp;</td><td>:&nbsp;<?= $sistemoperasi ?></td></tr>
        <tr><td>IP Address&nbsp;&nbsp;</td><td>:&nbsp;<?= $alamatip ?></td></tr>
        </table>
      </div>
  </div>

    <div class="row">
      <div class="col-sm-6">
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
          
            <h3 class="box-title"><i class="fa fa-fw fa-calendar"></i> Siswa Berulang Tahun Bulan <?= getbulanindo($bulansekarangshort) ?> </h3>

          </div>
          <table class='table table-hover'>
            <thead>
              <tr>
                <th>#</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tanggal Lahir</th>
                <th>Umur</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sno = $row + 1;
              foreach ($list_siswa as $dt) : ?>
                <?php if ($dt['tanggallahirsiswa'] <> '0000-00-00') { ?>
                  <?php if ($bulansekarang == date('m', strtotime($dt['tanggallahirsiswa']))) { ?>
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
          <!-- /.box-body -->
        </div>

      </div>
      <div class="col-sm-6">
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-fw fa-calendar"></i> Guru Berulang Tahun Bulan <?= getbulanindo($bulansekarangshort) ?> </h3>

          </div>
          <table class='table table-hover'id='example3_nosearch'>
            <thead>
              <tr>
                <th>#</th>
                <th>NIP</th>
                <th>Guru</th>
                <th>JK</th>
                <th>Tanggal Lahir</th>
                <th>Umur</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sno = $row + 1;
              foreach ($list_pegawai as $dt) : ?>
                <?php if ($dt['tanggal_lahir'] <> '0000-00-00') { ?>
                  <?php if ($bulansekarang == date('m', strtotime($dt['tanggal_lahir']))) { ?>
                    <tr>
                      <td><?= $sno++ ?></td>
                      <td><?= $dt['nip'] ?></td>
                      <td><?= $dt['nama_guru'] ?></td>
                      <td><?= ($dt['jeniskelamin']) ?></td>
                      <td><?= gettanggalindo($dt['tanggal_lahir']) ?></td>
                      <td><?= get_umur($dt['tanggal_lahir']) ?></td>
                    </tr>
                  <?php } ?>
                <?php } ?>
              <?php endforeach; ?>
            <tbody>
          </table>

          <!-- /.box-body -->
        </div>
      </div>
      
      <!-- /.col md -->
    </div>
            <!-- BAR CHART -->
            <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Bar Chart</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>

          </div>
          <div class="box-body">
            <div class="chart">
            <div id="graph"></div>Graph
            </div>


          </div>
          <!-- /.box-body -->
        </div>
          <!-- BAR CHART -->
        <!-- /.box -->
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

 
    <script src="<?php echo base_url().'assets/vendors/morris/js/jquery.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/morris/js/raphael-min.js'?>"></script>
    <script src="<?php echo base_url().'assets/vendors/morris/js/morris.min.js'?>"></script>
    <script>
        Morris.Bar({
          element: 'graph',
          data: <?php echo $dataaccount;?>,
          xkey: 'tahun_ppdb',
          ykeys: ['laki-laki', 'perempuan', 'calon', 'aktif'],
          labels: ['laki-laki', 'perempuan', 'calon', 'aktif']
        });
        Morris.Donut({
          element: 'donuts',
          data: <?php echo $pegawaikelamin;?>
        });
    </script>