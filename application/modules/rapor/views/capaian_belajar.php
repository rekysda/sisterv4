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
      <li class="active"><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <?= $this->session->flashdata('message') ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
        <div class="box-tools">
          <form class="form-inline" method="post" action="" enctype="multipart/form-data" id="posts">
            <select name="tahunakademik_id" class="form-control <?= form_error('tahunakademik_id') ? 'is-invalid' : '' ?>">
              <option value="">== Tahun Akademik ==</option>
              <?php foreach ($tahunakademik as $dt) : ?>
                <?php if ($tahunakademik_id == $dt['id']) { ?>
                  <option value='<?= $dt['id'] ?>' selected> <?= $dt['nama'] ?></option>";
                <?php  } else { ?>
                  <option value="<?= $dt['id']; ?>" <?= set_select('tahunakademik_id', $dt['id'], FALSE); ?>><?= $dt['nama']; ?></option>
                <?php } ?>
              <?php endforeach; ?>
            </select>
            <select name="kelas_id" class="form-control <?= form_error('kelas_id') ? 'is-invalid' : '' ?>">
              <option value="">== Kelas ==</option>
              <?php foreach ($kelas as $dt) : ?>
                <?php if ($kelas_id == $dt['id']) { ?>
                  <option value='<?= $dt['id'] ?>' selected> <?= $dt['nama_kelas']; ?> (<?= $dt['tahun']; ?>)</option>";
                <?php  } else { ?>
                  <option value="<?= $dt['id']; ?>" <?= set_select('kelas_id', $dt['id'], FALSE); ?>><?= $dt['nama_kelas']; ?> (<?= $dt['tahun']; ?>)</option>
                <?php } ?>
              <?php endforeach; ?>
            </select>
            <input type="submit" value="Lihat" name="submit" class="btn btn-success">
            </a>
          </form>
        </div>

      </div>

      <div class="box-body">
        <div class="row">

          <!-- -->
          <div class="col-md-12">
            <?php if ($getcapaianbelajar) { ?>

              <form method="post" action="<?= base_url('rapor/capaian_belajar_add') ?>">
                <table id='example' class='table table-bordered table-striped'>
                  <thead>
                    <tr>
                      <th rowspan='2'>No</th>
                      <th rowspan='2'>NIS</th>
                      <th rowspan='2'>Nama Siswa</th>
                      <th colspan='2'>
                        <center>Sikap Spiritual</center>
                      </th>
                      <th colspan='2'>
                        <center>Sikap Sosial</center>
                      </th>
                    </tr>
                    <tr>
                      <th>
                        <center>Predikat</center>
                      </th>
                      <th>
                        <center>Deskripsi</center>
                      </th>
                      <th>
                        <center>Predikat</center>
                      </th>
                      <th>
                        <center>Deskripsi</center>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sno = $row + 1;
                    foreach ($getcapaianbelajar as $dt) : ?>
                      <tr>
                        <td><?= $sno++ ?></td>
                        <td><?= $dt['nis'] ?></td>
                        <td><?= $dt['namasiswa'] ?> </td>
                        <input type='hidden' name='siswa_id[]' value='<?= $dt['siswa_id'] ?>'>
                        <td>
                          <center><input type='text' name='a1[]' value='<?= $dt['spiritual_predikat'] ?>' style='width:70px; text-align:center; padding:0px; color:blue'></center>
                        </td>
                        <td><?= $dt['spiritual_deskripsi'] ?></td>
                        <td>
                          <center><input type='text' name='c1[]' value='<?= $dt['sosial_predikat'] ?>' style='width:70px; text-align:center; padding:0px; color:blue'></center>
                        </td>
                        <td><?= $dt['sosial_deskripsi'] ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <input type='hidden' name='tahunakademik_id' value='<?= $tahunakademik_id ?>'>
                <input type='hidden' name='kelas_id' value='<?= $kelas_id ?>'>
                <input type='hidden' name='user_id' value='<?= $user['id'] ?>'>
                <div style='clear:both'></div>
                <div class='box-footer'>
                  <button type='submit' name='simpan' class='btn btn-info'>Simpan</button>
                  <button type='reset' class='btn btn-default pull-right'>Cancel</button>
                </div>

              </form>
            <?php } else {
              echo "<br><div align='center'><font color='red'>Silahkan Memilih Tahun akademik dan Kelas Terlebih dahulu...</font></div><br><br><br>";
            } ?>
          </div>

          <!-- table -->
        </div>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Catatan</h3>
      </div>

      <div class="box-body">
        <div class='panel-body'>
          <table class='table table-condensed table-hover'>
            <tbody>
              <tr>
                <td><b>KKM</b><br>
                  A = Sangat Baik <br>
                  B = Baik <br>
                </td>
              </tr>
          </table>

        </div>
      </div>
  </section>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->