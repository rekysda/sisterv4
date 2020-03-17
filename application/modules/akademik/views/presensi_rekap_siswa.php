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

      </div>

      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group <?= form_error('nama') ? 'has-error' : '' ?>">
              <label for="name">Kelas</label>
              <select class="form-control" name="kelas_asalcetak" id="kelas_asalcetak">
                <option value="" selected>Pilih Kelas</option>';
                <?php foreach ($m_kelas as $dt2) : ?>
                <option value="<?= base_url('akademik/kelas_rekap_presensi/' . $dt2['id'] . '/' . $dt2['tahun']) ?>" <?= set_select('kelas_asalcetak', $dt2['id'], FALSE); ?>>[<?= $dt2['tahun'] ?>] <?= $dt2['nama_kelas'] ?></option>';
                <?php endforeach; ?>
              </select>
            </div>
            <?php if ($getkelas) { ?>
            <div class="form-group">
              <label for="name">Tahun</label><br>
              <?= $getkelas['tahun'] ?></div>
            <div class="form-group">
              <label for="name">Kelas</label><br>
              <?= $getkelas['nama_kelas'] ?></div>
            <div class="form-group">
              <label for="name">Jurusan</label><br>
              <?= $getkelas['jurusan'] ?></div>
            <div class="form-group">
              <label for="name">Wali Kelas</label><br>
              <?= $getkelas['nama_guru'] ?></div>
            <div class="form-group">
              <label for="name">Tahun Akademik</label><br>
              <?= $m_tahunakademik['nama'] ?></div>
            <?php } ?>
          </div>
          <div class="col-md-6">
            <?php if ($getkelas) { ?>
            <form action="<?= base_url('akademik/cetak_rekap_presensi') ?>" method="post" target="new">
              <div class="form-group <?= form_error('tahun') ? 'has-error' : '' ?>">
                <label for="name">Tahun</label>
                <select name='tahun' class='form-control'>
                  <option value='' selected>- Tahun -</option>";
                  <?php $tahunn = (date('Y'));
                    for ($n = 2019; $n <= $tahunn; $n++) {
                      if ($tahun == $n) {
                        echo "<option value='$n' selected>$n</option>";
                      } else {
                        echo "<option value='$n'>$n</option>";
                      }
                    }
                    ?>
                </select>
              </div>
              <div class="form-group <?= form_error('bulan') ? 'has-error' : '' ?>">
                <label for="name">Bulan</label>
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
              </div>
              <div class="form-group <?= form_error('tanggalakhir') ? 'has-error' : '' ?>">
                <label for="name">Format</label>
                <select name='format' class='form-control'>
                  <?php
                    $blnn = array('', 'Print', 'Excel', 'PDF');
                    for ($n = 1; $n <= 3; $n++) {
                      echo "<option value='$blnn[$n]'>$blnn[$n]</option>";
                    }
                    echo "</select>
        </div>"; ?>
                  <input class="form-control" type="hidden" name="kelas_id" value="<?= $kelas_presensi ?>">
                  <button type="submit" class="btn btn-primary">Lihat</button>
                  <a href="<?= base_url('akademik/presensi_rekap_siswa'); ?> " class="btn btn-default">Cancel</a>
            </form>
            <?php } ?>

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