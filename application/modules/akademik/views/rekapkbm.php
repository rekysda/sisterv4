<div class="content-wrapper">
  <!-- CoAntent Header (Page header) -->
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
      <div class="col-md-12">
        <div class="box-tools">
          <form class="form-inline" method="post" action="" enctype="multipart/form-data" id="posts">
            <select name="tahunakademik_id" class="form-control <?= form_error('tahunakademik_id') ? 'is-invalid' : '' ?>">
              <option value="">== Tahun Akademik ==</option>
              <?php foreach ($tahunakademik as $dt) : ?>
              <option value="<?= $dt['id']; ?>" <?= set_select('tahunakademik_id', $dt['id'], FALSE); ?>><?= $dt['nama']; ?></option>
              <?php endforeach; ?>
            </select>
            <input type="submit" value="Lihat" name="submit" class="btn btn-success">
          </form>
        </div>
        </div>

      </div>

      <div class="box-body">
        <div class="row">

          <!-- -->
          <div class="col-md-12">
            <?php if ($jadwal_pelajaran) { ?>
            <table class='table table-hover'id='example3_nosearch'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Mata Pelajaran</th>
                  <th>Guru</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sno = $row + 1;
                  foreach ($jadwal_pelajaran as $dt) : ?>
                <tr>
                  <td><?= $sno++ ?></td>
                  <td><?= $dt['nama_mapel'] ?></td>
                  <td><?= $dt['nama_guru'] ?></td>
                  <td>
                    <a href="<?= base_url('akademik/rekapkbm_list/' . $dt['tahunakademik_id'] . '/' . $dt['mapel_id'] . '/' . $dt['guru_id']); ?>" class="btn btn-success btn-xs"><span class='glyphicon glyphicon-th-list'></span> Lihat</a>
                  </td>
                </tr>
                <?php endforeach; ?>
              <tbody>
            </table>
            <?php } else {
              echo "<br><div align='center'><font color='red'>Silahkan Memilih Tahun akademik Terlebih dahulu...</font></div><br><br><br>";
            } ?>
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