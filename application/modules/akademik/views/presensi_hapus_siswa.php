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
        <div class="box-tools">
      <div class="col-md-6">
          </a>&nbsp;&nbsp;<a href="<?= base_url('akademik/presensi_siswa'); ?>" class="btn btn-success btn-sm">
            Tambah Presensi</a>
          &nbsp;&nbsp;<a href="<?= base_url('akademik/presensi_hapus_siswa'); ?>" class="btn btn-danger btn-sm">
            Hapus Presensi</a>
        </div>
      </div>
      </div>

      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group <?= form_error('nama') ? 'has-error' : '' ?>">
              <label for="name">Kelas</label>
              <select class="form-control" name="kelas_asalcetak" id="kelas_asalcetak">
                <option value="" selected>Pilih Kelas</option>';
                <?php foreach ($m_kelas as $dt2) : ?>
                <option value="<?= base_url('akademik/kelas_hapus_presensi/' . $dt2['id'] . '/' . $dt2['tahun']) ?>" <?= set_select('kelas_asalcetak', $dt2['id'], FALSE); ?>>[<?= $dt2['tahun'] ?>] <?= $dt2['nama_kelas'] ?></option>';
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
            <form action="" method="post">
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

              <input class="form-control" type="hidden" name="kelas_id" value="<?= $kelas_presensi ?>">
              <button type="submit" class="btn btn-primary">Lihat</button>
              <a href="<?= base_url('akademik/presensi_hapus_siswa'); ?> " class="btn btn-default">Cancel</a>
            </form>
            <?php } ?>
          </div>
          <div class="col-md-6">
            <?php if ($gettglabsensi) { ?>
            <br>
            <b>List Absensi</b>
            <table class="table">
              <tr>
                <td>No</td>
                <td>Kelas</td>
                <td>Tanggal</td>
                <td>Aksi</td>
                <?php $i = 1; ?>
                <?php foreach ($gettglabsensi as $dt3) : ?>
              <tr>
                <td><?= $i ?></td>
                <td><?= getfieldtable("m_kelas", "nama_kelas", $dt3['kelas_id']) ?></td>
                <td><?= date('d-m-Y', strtotime($dt3['tanggal'])) ?></td>
                <td><a href="<?= base_url('akademik/kelas_hapus_presensitgl/' . $dt3['tanggal']) ?>" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');" class="btn btn-danger">Hapus Data</a></td>
              </tr>
              <?php $i++; ?>
              <?php endforeach; ?>
            </table>
            <?php } ?>
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