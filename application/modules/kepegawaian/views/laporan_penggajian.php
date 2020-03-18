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
      <li>Kepegawaian</li>
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
          <a href="<?= base_url('kepegawaian/pegawai_add'); ?>" class="btn btn-primary btn-sm">
            Tambah Pegawai
          </a>
        </div>
        </div>
      </div>
      <div class="box-body">
        <?= $this->session->flashdata('message') ?>

        <form action="" method="post" class="form-inline">
          <label for="name">Bulan</label>
          <select name='bulan' class='form-control'>
            <option value='' selected>- Bulan -</option>";
            <?php $blnn = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
            for ($n = 1; $n <= 12; $n++) {
              if ($bulan == $n) {
                echo "<option value='$n' selected>$blnn[$n]</option>";
              } else {
                echo "<option value='$n'>$blnn[$n]</option>";
              }
            } ?>
          </select>

          <label for="name">Tahun</label>
          <select name='tahun' class='form-control'>
            <option value='' selected>- Tahun -</option>
            <?php $tahunn = date("Y");
            for ($n = 2019; $n <= $tahunn; $n++) {
              if ($tahun == $n) {
                echo "<option value='$n' selected>$n</option>";
              } else {
                echo "<option value='$n'>$n</option>";
              }
            }  ?>
          </select>

          <button type="submit" class="btn btn-primary">Lihat Rekap</button>
        </form>
        <hr>

        <div class="table-responsive">
          <table class="table table-hover" id="example3">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>GajiPokok</th>
                <th>Gelar</th>
                <th>Sertifikasi</th>
                <th>MasaKerja</th>
                <th>GajiNgajar</th>
                <th>Transport</th>
                <th>Laboratorium</th>
                <th>WaliKelas</th>
                <th>(Sosial)</th>
                <th>(BPJS)</th>
                <th>GajidiTerima</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($getgajiall as $dt) : ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $dt['nama_guru']; ?></td>
                  <td><?= nominal($dt['gajipokok']) ?></td>
                  <td><?= nominal($dt['gelar']) ?></td>
                  <td><?= nominal($dt['sertifikasi']) ?></td>
                  <td><?= nominal($dt['masakerja']) ?></td>
                  <td><?= nominal($dt['gajingajar']) ?></td>
                  <td><?= nominal($dt['transport']) ?></td>
                  <td><?= nominal($dt['laboratorium']) ?></td>
                  <td><?= nominal($dt['walikelas']) ?></td>
                  <td><?= nominal($dt['sosial']) ?></td>
                  <td><?= nominal($dt['bpjs']) ?></td>
                  <td><?= nominal($dt['gajiditerima']) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <a href="<?= site_url('kepegawaian/laporangaji_pdf/' . $tahun . '/' . $bulan); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>pdf.png"> Export ke PDF</a>
        <a href="<?= site_url('kepegawaian/laporangaji_excel/' . $tahun . '/' . $bulan); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>xls.png"> Export ke Excel</a>
        <a href="<?= site_url('kepegawaian/laporangaji_print/' . $tahun . '/' . $bulan); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>print.jpg" width="15"> Cetak ke Printer</a>
      </div>

  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->