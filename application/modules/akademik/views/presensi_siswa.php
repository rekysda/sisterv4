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
                <option value="<?= base_url('akademik/kelas_presensi/' . $dt2['id'] . '/' . $dt2['tahun']) ?>" <?= set_select('kelas_asalcetak', $dt2['id'], FALSE); ?>>[<?= $dt2['tahun'] ?>] <?= $dt2['nama_kelas'] ?></option>';
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
              <div class="form-group <?= form_error('tanggal') ? 'has-error' : '' ?>">
                <label for="name">Tanggal Presensi</label>
                <input class="form-control" type="text" id="tanggalpresensi" name="tanggal" placeholder="YYYY-MM-DD" value="<?= set_value('tanggal'); ?>">
                <?= form_error('tanggal', '<span class="help-block">', '</small>'); ?>
              </div>
              <button type="submit" class="btn btn-primary">Lihat</button>
              <a href="<?= base_url('akademik/presensi_siswa'); ?> " class="btn btn-default">Cancel</a>
            </form>
            <?php } ?>
            <?php if ($listsiswa) { ?>
            <h4>Tanggal Absensi : <?= date('d-M-Y', strtotime($tanggal)); ?></h4>
            <h4><?= $getkelas['nama_kelas']; ?></h4>
            <h4>Daftar Siswa</h4>
            <div class="table-responsive">
              <form method="post" action="<?= base_url('akademik/kelas_addpresensi') ?>">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php if (($listabsensi) and ($tanggal)) { ?>
                    <?php foreach ($listabsensi as $dt3) : ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $dt3['nis'] ?></td>
                      <td><?= $dt3['namasiswa'] ?></td>
                      <td>
                        <input type="hidden" name="siswa_id[]" value="<?= $dt3['siswa_id'] ?>">
                        <select name='status[]' class='form-control'width='100%>
                          <?php $stats = array('', 'H', 'S', 'I', 'A');
                                for ($n = 0; $n <= 4; $n++) {
                                  if ($dt3['status'] == $stats[$n]) {
                                    echo "<option value='$stats[$n]' selected>$stats[$n]</option>";
                                  } else {
                                    echo "<option value='$stats[$n]'>$stats[$n]</option>";
                                  }
                                }
                                ?>
                        </select>
                      </td> 
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>

                    <?php } else { ?>
                    <?php foreach ($listsiswa as $dt3) : ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $dt3['nis'] ?></td>
                      <td><?= $dt3['namasiswa'] ?></td>
                      <td>
                        <input type="hidden" name="siswa_id[]" value="<?= $dt3['siswa_id'] ?>">
                        <select name='status[]' class='form-control'width='100%'>
                          <?php $stats = array('', 'H', 'S', 'I', 'A');
                                for ($n = 1; $n <= 4; $n++) {
                                  echo "<option value='$stats[$n]'>$stats[$n]</option>";
                                } ?>
                        </select>
                      </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach;
                      } ?>
                    <tr>
                      <td colspan="5"><input type="submit" value="Simpan" name="submit" class="btn btn-success"></td>
                    </tr>
                  </tbody>
                </table>
              </form>
            </div>
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