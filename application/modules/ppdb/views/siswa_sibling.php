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
      <h3 class="box-title">Data Sibling/Saudara</h3>
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

        <div class="row">
          <div class="col-md-6">
            <table class='table table-hover'id='example3'>
              <thead>
                <tr>
                  <th>NoFormulir</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($getsiswaaktif as $dt) :
                  $noformulir = $dt['noformulir'];
                  $nis = $dt['nis'];
                  $namasiswa = $dt['namasiswa'];
                  echo "<tr>";
                  echo "<td>" . $noformulir . "</td>";
                  echo "<td>" . $nis . "</td>";
                  echo "<td>" . $namasiswa . "</td>";
                  ?>
                <td width="100"> <a href="<?= base_url('ppdb/siswa_sibling/' . $dt['id']); ?>" class="btn btn-success btn-xs"> Lihat Sibling >> </a></td>
                </tr>
                <?php endforeach; ?>
              <tbody>
            </table>
          </div>
          <div class="col-md-6">
            


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