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

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Data Siswa</h3>
      </div>
      <div class="box-body">
      <table class="table">
      <tr><td>Nama Siswa</td><td>: <?= $user['namasiswa'] ?></td></tr>
      <tr><td>No.Formulir</td><td>: <?= $user['noformulir'] ?></td></tr>
      <tr><td>NIS</td><td>: <?= $user['nis'] ?></td></tr>
      </table>
      </div>
      <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Rincian Pelanggaran Siswa</h3>
      </div>
      <div class="box-body">
        <table class="table table-hover">
          <thead>
            <tr>
            <th width="5%">#</th>
                    <th width="5%">Tanggal</th>
                    <th width="10%">Nama</th>
                    <th width="10%">Kelas</th>
                    <th>Pelanggaran</th>
                    <th width="5%">Point</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php if($siswapelanggaran) { ?>
            <?php foreach ($siswapelanggaran as $dt) : ?>
            <tr>
                      <td><?= $i; ?></td>
                      <td><?= gettanggalindo($dt['tanggal']); ?></td>
                      <td><?= $dt['namasiswa']; ?></td>
                      <td><?= $dt['nama_kelas']; ?></td>
                      <td><?= $dt['pelanggaran']; ?></td>
                      <td><?= $dt['point']; ?></td>
                    </tr>
                    <?php $total += $dt['point'] ?>
            <?php endforeach; ?>
            <?php } ?>
            <tr>
            <td colspan="5" align="right">Total</td>
            <td colspan="5"><?= $total; ?></td>
            </tr>      
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->