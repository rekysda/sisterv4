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
          &nbsp;&nbsp;<a href="<?= base_url('akademik/addjournalkbm/' . $get_datajadwal['id']); ?>" class="btn btn-success btn-sm">
            Tambah Journal</a>
          &nbsp;&nbsp;<a href="<?= base_url('akademik/journalkbm'); ?>" class="btn btn-warning btn-sm">
            Kembali</a>
        </div>
      </div>

      <div class="box-body">
        <div class="row">

          <!-- -->
          <div class='col-md-12'>
            <div class='panel-body'>
              <table class='table table-condensed table-hover'>
                <tbody>
                  <tr>
                    <th scope='row'>Nama Kelas</th>
                    <td><?= $get_datajadwal['nama_kelas'] ?> </td>
                  </tr>
                  <tr>
                    <th scope='row'>Nama Guru</th>
                    <td><?= getfieldtable2('nama_guru', 'm_pegawai', 'id', $get_datajadwal['guru_id']) ?></td>
                  </tr>
                  <tr>
                    <th scope='row'>Mata Pelajaran</th>
                    <td><?= $get_datajadwal['nama_mapel'] ?></td>
                  </tr>
                  <tr>
                    <th scope='row'>Tahun Akademik</th>
                    <td><?= getfieldtable2('nama', 'm_tahunakademik', 'id', $get_datajadwal['tahunakademik_id']) ?></td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Hari</th>
                    <th>Tanggal</th>
                    <th>Jam Ke</th>
                    <th>Materi</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                    <th>Absensi</th>
                    <th>H</th>
                    <th>S</th>
                    <th>I</th>
                    <th>A</th>
                  </tr>
                </thead>
        <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($get_journal as $dt) : ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $dt['hari']; ?></td>
                    <td><?= gettanggalindo($dt['tanggal']); ?></td>
                    <td><?= $dt['jamke']; ?></td>
                    <td><?= $dt['materi']; ?></td>
                    <td><?= $dt['keterangan']; ?></td> 
                    <td>
                      <a href="<?= base_url('akademik/editjournalkbm/' . $dt['jadwal_id'] . '/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                      <a href="<?= base_url('akademik/hapusjurnalkbm/' . $dt['jadwal_id'] . '/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
                    </td>
                    <td>
                      <a href="<?= base_url('akademik/editjournalabsensi/' . $dt['jadwal_id'] . '/' . $dt['id']); ?>" class="btn btn-success btn-xs">ListAbsensi</a>
                      </td>
                      <td><?php 
                      $datahadir = $this->akademik_model->get_absensiswajournal($dt['id'] ,$dt['tanggal'],"H"); 
                      $datasakit = $this->akademik_model->get_absensiswajournal($dt['id'] ,$dt['tanggal'],"S");
                      $dataijin = $this->akademik_model->get_absensiswajournal($dt['id'] ,$dt['tanggal'],"I");
                      $dataalpha = $this->akademik_model->get_absensiswajournal($dt['id'] ,$dt['tanggal'],"A");
                      ?> 
                      <?= $datahadir['jumlah']; ?></td>
                      <td><?= $datasakit['jumlah']; ?></td>
                      <td><?= $dataijin['jumlah']; ?></td>
                      <td><?= $dataalpha['jumlah']; ?></td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

  </section>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->