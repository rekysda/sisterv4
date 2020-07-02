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
      </div>
      <div class="box-body">
      <?php $nomor= generatekodeinc4('bukutamu',$tahunskrg,'nomor');?>
        <div class="row">
          <div class="col-md-4">
            <form action="" method="post">
              <div class="form-group <?php echo form_error('tahun') ? 'has-error' : '' ?>">
                <label for="name">Tahun</label>
                <input class="form-control" type="text" name="tahun" value="<?= set_value('tahun', isset($tahun) ? $tahun : $tahunskrg); ?>" readonly/>
                <?= form_error('tahun', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('nomor') ? 'has-error' : '' ?>">
                <label for="name">Nomor</label>
                <input class="form-control" type="text" name="nomor" value="<?= set_value('nomor', isset($nomor) ? $nomor : ''); ?>" readonly/>
                <?= form_error('nomor', '<span class="help-block">', '</small>'); ?>
              </div>         
              <div class="form-group <?php echo form_error('tanggal') ? 'has-error' : '' ?>">
                <label for="tanggal">Tanggal</label>
                <input class="form-control" type="text" id="tanggal" name="tanggal" value="<?= set_value('tanggal', isset($tanggal) ? $tanggal : $tanggalskrg); ?>" />
                <?= form_error('tanggal', '<span class="help-block">', '</small>'); ?>
              </div>  
              <div class="form-group <?php echo form_error('nama') ? 'has-error' : '' ?>">
                <label for="name">Nama</label>
                <input class="form-control" type="text" name="nama" value="<?= set_value('nama', isset($nama) ? $nama : ''); ?>" />
                <?= form_error('nama', '<span class="help-block">', '</small>'); ?>
              </div>  
              <div class="form-group <?php echo form_error('jabatan') ? 'has-error' : '' ?>">
                <label for="jabatan">Jabatan</label>
                <input class="form-control" type="text" name="jabatan" value="<?= set_value('jabatan', isset($jabatan) ? $jabatan : ''); ?>" />
                <?= form_error('jabatan', '<span class="help-block">', '</small>'); ?>
              </div>    
              <div class="form-group <?php echo form_error('hp') ? 'has-error' : '' ?>">
                <label for="hp">Nomor WA</label>
                <input class="form-control" type="text" name="hp" value="<?= set_value('jabatan', isset($hp) ? $hp : ''); ?>" />
                <?= form_error('hp', '<span class="help-block">', '</small>'); ?>
              </div> 
              <div class="form-group <?php echo form_error('maksud') ? 'has-error' : '' ?>">
                <label for="maksud">Maksud dan Tujuan</label>
                <input class="form-control" type="text" name="maksud" value="<?= set_value('maksud', isset($maksud) ? $maksud : ''); ?>" />
                <?= form_error('maksud', '<span class="help-block">', '</small>'); ?>
              </div> 
              <div class="form-group <?php echo form_error('diterima') ? 'has-error' : '' ?>">
                <label for="diterima">Yang Dituju</label>
                <select class="js-example-basic-single" name="diterima" style="width:100%;">
                  <?php foreach ($selectpegawai as $dt) : ?>
                    <option value="<?= $dt['id']; ?>" <?= $dt['id'] == $diterima ? ' selected="selected"' : ''; ?>><?= $dt['nama_guru']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('diterima', '<span class="help-block">', '</small>'); ?>
              </div> 
              <div class="form-group <?php echo form_error('catatan') ? 'has-error' : '' ?>">
                <label for="catatan">Catatan</label>
                <input class="form-control" type="text" name="catatan" value="<?= set_value('catatan', isset($catatan) ? $catatan : ''); ?>" />
                <?= form_error('catatan', '<span class="help-block">', '</small>'); ?>
              </div> 
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="<?= base_url('bukutamu'); ?> " class="btn btn-default">Cancel</a>
            </form><br>
            <hr>
            <a href="<?= base_url('bukutamupengunjung')?>"target="new"class="btn btn-warning">Link Isi Buku Tamu pengunjung</a><br><br>
            <a href="<?= base_url('bukutamu/cetakqrcode')?>"target="new"class="btn btn-primary">Cetak QR Isi Buku Tamu pengunjung</a>
          </div>
          <div class="col-md-8">
            <div class="table-responsive">
            <h4>Buku Tamu Tanggal <?= gettanggalindo($tanggalskrg); ?> </h4>
              <table  class="table table-bordered table-striped"id='example3'>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nomor</th>
                    <th>Nama<br>Jabatan</th>
                    <th>HP</th>
                    <th>Maksud</th>
                    <th>Yang Dituju</th>
                    <th>Catatan</th>
                    <?php if(apiemail('send_notif_bukutamu') == 1){ ?>
                    <th>NotifEmail</th>
                    <?php } ?>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($bukutamuskrg as $dt) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['nomor']; ?></td>
                      <td><?= $dt['nama']; ?><br><?= $dt['jabatan']; ?></td>
                      <td><?= $dt['hp']; ?></td>
                      <td><?= $dt['maksud']; ?></td>
                      <td><?= $dt['nama_guru']; ?></td>
                      <td><?= $dt['catatan']; ?></td>
                      <?php if(apiemail('send_notif_bukutamu') == 1){ ?>
                      <td> <?= 
                      ( $dt['status']) == 0 ? '<a href= '.base_url('bukutamu/kirimemail/' . $dt['id']).' class="btn btn-success btn-xs">Kirim</a>' :'<a href= '.base_url('bukutamu/kirimemail/' . $dt['id']).' class="btn btn-warning btn-xs">Ulang</a>' ?>
                      </td>
                      <?php } ?>
                      <td>
                        <a href="<?= base_url('bukutamu/edit_bukutamu/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                        <a href="<?= base_url('bukutamu/hapus_bukutamu/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
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