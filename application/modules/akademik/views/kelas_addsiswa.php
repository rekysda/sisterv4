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
      <div class="col-md-6">
        <div class="box-tools">
          <a href="<?= base_url('akademik/kelas_addsiswa'); ?>" class="btn btn-primary btn-sm">
            Tambah</a>
          </a>&nbsp;<a href="<?= base_url('akademik/kelas_pindahsiswa'); ?>" class="btn btn-warning btn-sm">
            Pindah</a>
          &nbsp;<a href="<?= base_url('akademik/kelas_naiksiswa'); ?>" class="btn btn-info btn-sm">
            Kenaikan</a>
          &nbsp;<a href="<?= base_url('akademik/kelas_cetak'); ?>" class="btn btn-success btn-sm">
            Cetak</a>
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
                <td width="100"> <a href="<?= base_url('akademik/kelas_addsiswabaru/' . $dt['id']); ?>" class="btn btn-success btn-xs"> Masuk ke Kelas >> </a></td>
                </tr>
                <?php endforeach; ?>
              <tbody>
            </table>
          </div>
          <div class="col-md-6">
            <select class="form-control" name="kelas_id" id="kelas_id">
              <option value="" selected>Pilih Kelas Tujuan</option>';
              <?php foreach ($kelasbaru as $dt2) : ?>
              <option value="<?= base_url('akademik/kelas_tujuan/' . $dt2['id'] . '/' . $dt2['tahun']) ?>" <?= set_select('kelas_id', $dt2['id'], FALSE); ?>>[<?= $dt2['tahun'] ?>] <?= $dt2['nama_kelas'] ?></option>';
              <?php endforeach; ?>
            </select>
            <?php if ($kelas_tujuan) { ?>
            Angkatan : <?= $getkelasbyId['tahun'] ?><br>
            Nama Kelas : <?= $getkelasbyId['nama_kelas'] ?><br>
            Jurusan : <?= $getkelasbyId['jurusan'] ?><br>
            Wali Kelas : <?= $getkelasbyId['nama_guru'] ?><br>
            <?php } ?>
            <div class="table-responsive">
              <table class="table table-hover"id='example3_nosearch'>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php if ($listsiswabykelas) { ?>
                  <?php foreach ($listsiswabykelas as $dt3) : ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $dt3['nis'] ?></td>
                    <td><?= $dt3['namasiswa'] ?></td>
                    <td>

                      <a href="<?= base_url('akademik/kelas_delsiswa/' . $dt3['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Hapus</a>
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