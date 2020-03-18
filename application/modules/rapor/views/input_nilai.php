
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $title; ?>
      <small>to manage <?= $title; ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Rapor</li>
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
        <div class="box-tools">
        <form   class="form-inline" method="post" action="" enctype ="multipart/form-data" id="posts">
        <select name="tahunakademik_id" class="form-control <?= form_error('tahunakademik_id') ? 'is-invalid' : '' ?>">
                            <option value="">== Tahun Akademik ==</option>
                            <?php foreach ($tahunakademik as $dt) : ?>
                            <option value="<?= $dt['id']; ?>"<?= set_select('tahunakademik_id', $dt['id'], FALSE); ?>><?= $dt['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select name="kelas_id" class="form-control <?= form_error('kelas_id') ? 'is-invalid' : '' ?>">
                            <option value="">== Kelas ==</option>
                            <?php foreach ($kelas as $dt) : ?>
                            <option value="<?= $dt['id']; ?>"<?= set_select('kelas_id', $dt['id'], FALSE); ?>><?= $dt['nama_kelas']; ?> (<?= $dt['tahun']; ?>)</option>
                            <?php endforeach; ?>
                        </select>
        <input type="submit" value="Lihat" name="submit"class="btn btn-success">
    </a>
</form>
        </div>

      </div>
      
      <div class="box-body">
        <div class="row">
       
<!-- -->
<div class="col-md-12">
    <?php if($jadwal_pelajaran){ ?>
<table class='table table-hover'>
          <thead>
            <tr>
              <th>#</th>
              <th>Mata Pelajaran</th>
              <th>Kelas</th>
              <th>Guru</th>
              <th>Hari</th>
              <th>Mulai</th>
              <th>Selesai</th>
              <th>Penilaian</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sno = $row + 1;
            foreach ($jadwal_pelajaran as $dt) : ?>
              <tr>
                <td><?= $sno++ ?></td>
                <td><?= $dt['nama_mapel'] ?></td>
                <td><?= $dt['nama_kelas'] ?></td>
                <td><?= $dt['nama_guru'] ?></td>
                <td><?= $dt['hari'] ?></td>
                <td><?= $dt['jam_mulai'] ?></td>
                <td><?= $dt['jam_selesai'] ?></td>
                <td>
                  <a href="<?= base_url('rapor/input_nilai_pengetahuan_edit/' . $dt['id']); ?>" class="btn btn-success btn-xs"><span class='glyphicon glyphicon-th-list'></span> Nilai Pengetahuan</a>
                  <a href="<?= base_url('rapor/input_nilai_keterampilan_edit/' . $dt['id']); ?>" class="btn btn-primary btn-xs"><span class='glyphicon glyphicon-th-list'></span> Nilai Keterampilan</a>
                </td>
              </tr>
            <?php endforeach; ?>
          <tbody>
        </table>
    <?php }else{
echo "<br><div align='center'><font color='red'>Silahkan Memilih Tahun akademik dan Kelas Terlebih dahulu...</font></div><br><br><br>";

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