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
      <li>BK</li>
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
          <div class="col-md-4">
            <form action="" method="post">
              <div class="form-group <?php echo form_error('tahunakademik_id') ? 'has-error' : '' ?>">
                <label for="tahun">Tahun Akademik</label><br>   
                <?= getfieldtable2('nama', 'm_tahunakademik', 'id', $tahunakademikdefault); ?>
                <input class="form-control" type="hidden" name="tahunakademik_id" value="<?= $tahunakademikdefault; ?>" />
                <?= form_error('tahunakademik_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('semester') ? 'has-error' : '' ?>">
                <label for="tahun">Semester</label><br>   
                <?= $semesterdefault; ?>
                <input class="form-control" type="hidden" name="semester" value="<?= $semesterdefault; ?>" />
                <?= form_error('semester', '<span class="help-block">', '</small>'); ?>
              </div>
              
              <div class="form-group <?php echo form_error('tanggal') ? 'has-error' : '' ?>">
                <label for="tanggal">Tanggal</label><br>
                <input class="form-control" type="text" id="tanggal" name="tanggal" value="<?= set_value('tanggal', date('Y-m-d'), FALSE); ?>">
                <?= form_error('tanggal', '<span class="help-block">', '</small>'); ?>
              </div>

              <div class="form-group <?php echo form_error('siswa_id') ? 'has-error' : '' ?>">
                <label for="name">Nama Siswa</label><br>
                <select class="js-example-basic-single" name="siswa_id" style="width:100%;">
                  <?php foreach ($selectsiswa as $dt) : ?>
                    <option value="<?= $dt['id']; ?>"><?= $dt['namasiswa']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('siswa_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('pelanggaran_id') ? 'has-error' : '' ?>">
                <label for="name">Pelanggaran</label><br>
                <select class="js-example-basic-single" name="pelanggaran_id" style="width:100%;">
                  <?php foreach ($datapelanggaran as $dt2) : ?>
                    <option value="<?= $dt2['id']; ?>"><?= $dt2['pelanggaran']; ?> [<?= $dt2['point']; ?>]</option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('pelanggaran_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('bk/pelanggaran_siswa'); ?> " class="btn btn-default">Cancel</a>
            </form>
          </div>
          <div class="col-md-8">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped" id="example3">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Pelanggaran</th>
                    <?php if(apiemail('send_notif_pelanggaran') == 1){ ?>
                    <th>NotifEmail</th>
                    <?php } ?>
                    <th width="15%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($datapelanggaransiswa as $dt) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= gettanggalindo($dt['tanggal']); ?></td>
                      <td><a href=<?= base_url('bk/detail_pelanggaran_siswa/'.$dt['siswa_id']) ?>><?= $dt['namasiswa']; ?></a></td>
                      <td><?= $dt['nama_kelas']; ?></td>
                      <td><?= $dt['pelanggaran']; ?> [<?= $dt['point']; ?>]</td>

                      <?php if(apiemail('send_notif_pelanggaran') == 1){ ?>
                      <td> <?= 
                      ( $dt['status']) == 0 ? '<a href= '.base_url('bk/kirimemail/' . $dt['id']).' class="btn btn-success btn-xs">Kirim</a>' :'<a href= '.base_url('bk/kirimemail/' . $dt['id']).' class="btn btn-warning btn-xs">Ulang</a>' ?>
                      </td>
                      <?php } ?>
                      <td>
                        <a href="<?= base_url('bk/edit_pelanggaran_siswa/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                        <a href="<?= base_url('bk/hapus_pelanggaran_siswa/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
                      </td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
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