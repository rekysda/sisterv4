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

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
      <div class="col-md-6">
        <div class="box-tools">
          <a href="<?= base_url('keuangan/siswabayar_list'); ?>" class="btn btn-success btn-sm">
            Kembali
          </a>&nbsp;&nbsp;
        </div>
      </div>
      </div>
      <div class="box-body">
        <?= $this->session->flashdata('message') ?>
        <!-- Search form (start) -->

        <div class="row">
          <div class="col-md-12">

            <!-- Search form (start) -->
            <form method='post' action="<?= base_url('keuangan/siswabayar_list') ?>" class="form-inline">
              <div class="form-group mb-2">
                <label for="staticEmail2" class="sr-only">Nomor Nota</label>
                <input type='text' name='search' value='<?= $search ?>' class='form-control'>
              </div>
              <input type='submit' name='submit' value='Submit' class='btn btn-primary mb-2'>
            </form>
            <br />

            <!-- Posts List -->
            <table class="table table-striped" id="example3">
            <thead>
              <tr>
                <th>#</th>
                <th>Nomor Nota</th>
                <th>Tanggal</th>
                <th>Nominal</th>
                <th>Cara Bayar</th>
                <th>Bayar</th>
                <th>Nama Siswa</th>
                <th>Petugas</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sno = $row + 1;
              foreach ($result as $data) {

                echo "<tr>";
                echo "<td>" . $sno . "</td>";
                echo "<td>" . $data['nomor_nota'] . "</td>";
                echo "<td>" . date('d M Y', strtotime($data['tanggal'])) . "</td>";
                echo "<td>" . nominal($data['totalcart']) . "</td>";
                echo "<td>" . $data['carabayar'] . "</td>";
                echo "<td>" . nominal($data['bayar']) . "</td>";
                echo "<td>" . $data['namasiswa'] . "</td>";
                echo "<td>" . $data['name'] . "</td>";
                echo "<td><a href='" . base_url('keuangan/siswabayar_nota/' . $data['id_master']) . "' target='new' class='btn btn-success btn-xs'>Cetak</a></td>";
                echo "</tr>";
                $sno++;
              }?>
              </tbody>
              <?php 
              if (count($result) == 0) {
                echo "<tr>";
                echo "<td colspan='3'>No record found.</td>";
                echo "</tr>";
              }
              ?>
            </table>

            <!-- Paginate -->
            <div style='margin-top: 10px;'>
              <?= $pagination; ?>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->