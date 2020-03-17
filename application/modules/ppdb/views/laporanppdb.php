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
        <div class="box-tools">

        </div>
      </div>
      <div class="box-body">
        <?= $this->session->flashdata('message') ?>
        <!-- Search form (start) -->
        <form method='post' action="<?= base_url('ppdb/laporanppdb') ?>" class='form-inline'>
        
        <select name="sekolah_id" id="sekolah_id" class="form-control <?= form_error('sekolah_id') ? 'is-invalid' : '' ?>">
            <?php foreach ($sekolah as $dt) : ?>
              <option value="<?= $dt['id']; ?>" <?= set_select('sekolah_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $sekolah_id ? ' selected="selected"' : ''; ?>><?= $dt['sekolah']; ?></option>
            <?php endforeach; ?>
          </select>&nbsp;

          <select name="tahun_ppdb" id="tahun_ppdb" class="form-control <?= form_error('tahun_ppdb') ? 'is-invalid' : '' ?>">
            <option value="">== Tahun PPDB ==</option>
            <?php $tahunn = (date("Y") + 1);
            for ($n = 2019; $n <= $tahunn; $n++) {
              if ($tahun_ppdb == $n) {
                echo "<option value='$n' selected>$n</option>";
              } else {
                echo "<option value='$n'>$n</option>";
              }
            }
            ?>
          </select> &nbsp;

          <select name="gelombang_id" id="gelombang_id" class="form-control <?= form_error('gelombang_id') ? 'is-invalid' : '' ?>">
            <option value="">== Gelombang ==</option>
            <?php foreach ($gelombang as $dt) : ?>
              <option value="<?= $dt['gelombang_id']; ?>" <?= set_select('gelombang_id', $dt['gelombang_id'], FALSE); ?> <?= $dt['gelombang_id'] == $gelombang_id ? ' selected="selected"' : ''; ?>><?= $dt['gelombang']; ?></option>
            <?php endforeach; ?>
          </select>&nbsp;

          <select name="jalur_id" id="jalur_id" class="form-control <?= form_error('jalur_id') ? 'is-invalid' : '' ?>">
            <option value="">== Jalur ==</option>
            <?php foreach ($jalur as $dt) : ?>
              <option value="<?= $dt['jalur_id']; ?>" <?= set_select('jalur_id', $dt['jalur_id'], FALSE); ?> <?= $dt['jalur_id'] == $jalur_id ? ' selected="selected"' : ''; ?>><?= $dt['jalur']; ?></option>
            <?php endforeach; ?>
          </select>

          &nbsp;<input class='btn btn-success' type='submit' name='submit' value='Submit'>
        </form>
        <br>
        <!-- Posts List -->
        <table class='table table-hover' id="example3">
          <thead>
            <tr>
              <th>#</th>
              <th>Tahun PPDB</th>
              <th>Gelombang</th>
              <th>Jalur</th>
              <th>NoFormulir</th>
              <th>NIS</th>
              <th>Nama</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sno = $row + 1;
            foreach ($siswa as $dt) :
              $noformulir = $dt['noformulir'];
              $nis = $dt['nis'];
              $namasiswa = $dt['namasiswa'];
              $sekolah = $dt['sekolah'];
              $tahun_ppdb = $dt['tahun_ppdb'];
              $gelombang = $dt['gelombang'];
              $jalur = $dt['jalur'];
              $ppdb_status = $dt['ppdb_status'];
              if ($tahun_ppdb <> '') {
                echo "<tr>";
                echo "<td>" . $sno . "</td>";
                echo "<td>" . $tahun_ppdb . "</td>";
                echo "<td>" . $gelombang . "</td>";
                echo "<td>" . $jalur . "</td>";
                echo "<td>" . $noformulir . "</td>";
                echo "<td>" . $nis . "</td>";
                echo "<td>" . $namasiswa . "</td>";
                echo "<td>" . $ppdb_status . "</td>"; ?>
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
      <div class="box-footer">
        <a href="<?php echo site_url('ppdb/laporan_pdf/' . $sekolah_id . '/' . $tahun_ppdb . '/' . $gelombang_id . '/' . $jalur_id); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>pdf.png"> Export ke PDF</a>
        <a href="<?php echo site_url('ppdb/laporan_excel/' . $sekolah_id . '/' . $tahun_ppdb . '/' . $gelombang_id . '/' . $jalur_id); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>xls.png"> Export ke Excel</a>
        <a href="<?php echo site_url('ppdb/laporan_print/' . $sekolah_id . '/' . $tahun_ppdb . '/' . $gelombang_id . '/' . $jalur_id); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>print.jpg" width="15"> Cetak ke Printer</a>
      </div>
      <!-- /.box-footer -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->