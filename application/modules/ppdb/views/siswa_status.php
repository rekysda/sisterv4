!-- Content Wrapper. Contains page content -->
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

    <?= $this->session->flashdata('message') ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
      </div>
      
      <div class="box-body">

        <div class="row">
          <div class="col-md-6">
          <h4 class="box-title">calon & aktif</h4>
          <table class='table table-hover' id='example3' >
   <thead>
    <tr>
      <th>NoFormulir</th>
      <th>NIS</th>
      <th>Nama</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php
      foreach ($getsiswaaktif as $dt) :
      $sekolah_id = $dt['sekolah_id'];
      $noformulir = $dt['noformulir'];
      $nis = $dt['nis'];
      $namasiswa = $dt['namasiswa']; 
      $ppdb_status = $dt['ppdb_status']; 
      echo "<tr>";
      echo "<td>".$noformulir."</td>";
      echo "<td>".$nis."</td>";
      echo "<td>".$namasiswa."</td>";
      echo "<td>".$ppdb_status."</td>";
    ?>
      <td width="100"> <a href="<?= base_url('ppdb/status_ubah/' . $dt['id'].'/'.$status_tujuan); ?>" class="btn btn-success btn-xs" > Pindah >> </a></td>
      </tr>
          <?php endforeach; ?>
       <tbody>
   </table>
          </div>
          <div class="col-md-6">
            <h4>Status : <?= $status_tujuan ?></h4>
          <select class="form-control" name="status_tujuan"  id="status_tujuan">
<option value="" selected>Pilih Status Tujuan</option>';
<?php 
$statusn = array('','calon','aktif','ditolak', 'keluar', 'alumni');
        for ($n = 1; $n <= 5; $n++) {
            echo "<option value=".base_url('ppdb/list_statustujuan/'.$statusn[$n])." ".set_select('status_tujuan').">$statusn[$n]</option>";
        }
?>
</select>
<?php if ($status_tujuan){ ?>
<?php } ?>
            <div class="table-responsive">
              <table class='table table-hover' id='example4'>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                    <?php if ($listsiswatujuan){ ?>
                  <?php foreach ($listsiswatujuan as $dt3) : ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $dt3['nis'] ?></td>
                      <td><?= $dt3['namasiswa'] ?></td>
                      <td><?= $dt3['ppdb_status'] ?></td>
                      <td>
                        
                        <a href="<?= base_url('ppdb/status_aktif/' . $dt3['id']); ?>" class="btn btn-warning btn-xs" onclick="return confirm('Anda yakin ? status diubah menjadi aktif...');"><< Kembali </a>
                      </td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                    <?php } ?>
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