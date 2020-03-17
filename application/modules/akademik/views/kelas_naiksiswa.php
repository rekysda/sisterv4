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
        <b>Catatan : </b> Dengan melakukan Naik Kelas maka Siswa akan pindah ke kelas tujuan dan siswa di kelas asal tidak akan hilang. Harap Perhatikan Tahun Angkatan Tiap Kelas
        <div class="row">

          <!-- //kelas asal -->
          <div class="col-md-6">
            <select class="form-control" name="kelas_asalnaik" id="kelas_asalnaik">
              <option value="" selected>Pilih Kelas Asal</option>';
              <?php foreach ($m_kelas as $dt2) : ?>
              <option value="<?= base_url('akademik/kelas_asalnaik/' . $dt2['id'] . '/' . $dt2['tahun']) ?>" <?= set_select('kelas_asalnaik', $dt2['id'], FALSE); ?>>[<?= $dt2['tahun'] ?>] <?= $dt2['nama_kelas'] ?></option>';
              <?php endforeach; ?>
            </select>
            <?php if ($listsiswaasal) { ?>
            Angkatan : <?= $getkelasasal['tahun'] ?><br>
            Nama Kelas : <?= $getkelasasal['nama_kelas'] ?><br>
            Jurusan : <?= $getkelasasal['jurusan'] ?><br>
            Wali Kelas : <?= $getkelasasal['nama_guru'] ?><br>
            <?php } ?>
            <div class="table-responsive">
              <table class="table table-hover">
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
                  <?php if ($listsiswaasal) { ?>
                  <?php foreach ($listsiswaasal as $dt3) : ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $dt3['nis'] ?></td>
                    <td><?= $dt3['namasiswa'] ?></td>
                    <td>

                      <a href="<?= base_url('akademik/kelas_upsiswa/' . $dt3['id']); ?>" class="btn btn-success btn-xs"> Pindah >> </a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>

          <!-- //kelas tujuan -->
          <div class="col-md-6">
            <select class="form-control" name="kelas_tujuannaik" id="kelas_tujuannaik">
              <option value="" selected>Pilih Kelas Tujuan</option>';
              <?php foreach ($m_kelas as $dt2) : ?>
              <?php if ($this->session->userdata('kelas_asal') <> $dt2['id']) { ?>
              <option value="<?= base_url('akademik/kelas_tujuannaik/' . $dt2['id'] . '/' . $dt2['tahun']) ?>" <?= set_select('kelas_tujuannaik', $dt2['id'], FALSE); ?>>[<?= $dt2['tahun'] ?>] <?= $dt2['nama_kelas'] ?></option>';
              <?php } ?>
              <?php endforeach; ?>
            </select>
            <?php if ($listsiswatujuan) { ?>
            Angkatan : <?= $getkelastujuan['tahun'] ?><br>
            Nama Kelas : <?= $getkelastujuan['nama_kelas'] ?><br>
            Jurusan : <?= $getkelastujuan['jurusan'] ?><br>
            Wali Kelas : <?= $getkelastujuan['nama_guru'] ?><br>
            <?php } ?>
            <div class="table-responsive">
              <table class="table table-hover">
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
                  <?php if ($listsiswatujuan) { ?>
                  <?php foreach ($listsiswatujuan as $dt3) : ?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $dt3['nis'] ?></td>
                    <td><?= $dt3['namasiswa'] ?></td>
                    <td>

                      <a href="<?= base_url('akademik/kelas_delsiswanaik/' . $dt3['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Hapus</a>&nbsp;&nbsp;&nbsp;
                    </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>

          <!-- table -->
        </div>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->