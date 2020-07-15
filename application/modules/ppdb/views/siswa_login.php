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
                <h3 class="box-title">Add Data</h3>
            <div class="col-md-6">
          <div class="box-tools">
          <a href="<?= base_url('ppdb/siswa_add'); ?>" class="btn btn-primary btn-sm">
            Calon Siswa
          </a>&nbsp;&nbsp;<a href="<?= base_url('ppdb/siswalama_add'); ?>" class="btn btn-warning btn-sm">
            Siswa Lama
          </a>&nbsp;&nbsp;<a href="<?= base_url('ppdb/siswa_login'); ?>" class="btn btn-success btn-sm">
            Login Siswa
          </a>&nbsp;&nbsp;<a href="<?= base_url('ppdb/siswa_sibling'); ?>" class="btn btn-default btn-sm">
            Siswa Sibling
          </a>
        </div>
        </div>
            </div>
            <div class="box-body">
            <?= $this->session->flashdata('message') ?>
<!-- Search form (start) -->
<h2>Petunjuk :</h2>
Untuk Login siswa menggunakan <b>NIS</b> sebagai username dan <b>TanggalLahirSiswa</b> sebagai Password.

   <!-- Posts List -->
   <table class='table table-hover' id='example3' >
   <thead>
    <tr>
    <th>#</th>
      <th>NIS</th>
      <th>Nama</th>
      <th>TanggalLahir</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php 
    $sno = $row+1;
      foreach ($siswa as $dt) :
      $nis = $dt['nis'];
      $namasiswa = $dt['namasiswa'];
      $tanggallahirsiswa = $dt['tanggallahirsiswa'];
      $ppdb_status = $dt['ppdb_status'];
      if($ppdb_status=='calon'or'aktif'){
      echo "<tr>";
      echo "<td>".$sno."</td>";
      echo "<td>".$nis."</td>";
      echo "<td>".$namasiswa."</td>";
      echo "<td>".$tanggallahirsiswa."</td>";
      echo "<td>".$ppdb_status."</td>";?>
      <td width="100"> <a href="<?= base_url('ppdb/editsiswalogin/' . $dt['id']); ?>" class="btn btn-warning btn-xs" >Edit</a></td>
      </tr>
      <?php
      $sno++;
      }
    ?>
          <?php endforeach; ?>
       <tbody>
   </table>



            </div>
        <!-- /.box-body -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->