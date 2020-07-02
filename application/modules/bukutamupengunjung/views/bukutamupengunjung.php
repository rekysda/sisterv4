<div class="register-box">
  <div class="register-logo">
Isi <b>Buku Tamu</b><br>
*semua wajib isi<br>
<?= $this->session->flashdata('message') ?>
<?php $nomor= generatekodeinc4('bukutamu',$tahunskrg,'nomor');?>
  </div>
  <div class="register-box-body">
    <form class="user" method="post" action="">
      <div class="form-group has-feedback <?= form_error('nama') ? 'has-error' : '' ?>">
        <input type="text" name="nama" value="<?= set_value('nama'); ?>" class="form-control" placeholder="Nama Sesuai KTP">
        <?= form_error('nama', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="form-group has-feedback <?= form_error('jabatan') ? 'has-error' : '' ?>">
        <input type="text" name="jabatan" value="<?= set_value('jabatan'); ?>" class="form-control" placeholder="Jabatan">
        <?= form_error('jabatan', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="form-group has-feedback <?= form_error('hp') ? 'has-error' : '' ?>">
        <input type="text" name="hp" value="<?= set_value('hp'); ?>" class="form-control" placeholder="Nomor WA">
        <?= form_error('hp', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="form-group has-feedback <?= form_error('maksud') ? 'has-error' : '' ?>">
        <input type="text" name="maksud" value="<?= set_value('maksud'); ?>" class="form-control" placeholder="Maksud dan Tujuan">
        <?= form_error('maksud', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="form-group has-feedback <?= form_error('diterima') ? 'has-error' : '' ?>">
      <select class="js-example-basic-single" name="diterima" style="width:100%;">
                  <?php foreach ($selectpegawai as $dt) : ?>
                    <option value="<?= $dt['id']; ?>" <?= $dt['id'] == $diterima ? ' selected="selected"' : ''; ?>><?= $dt['nama_guru']; ?></option>
                  <?php endforeach; ?>
                </select>
        <?= form_error('diterima', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="form-group has-feedback <?= form_error('catatan') ? 'has-error' : '' ?>">
        <input type="text" name="catatan" value="<?= set_value('catatan'); ?>" class="form-control" placeholder="Catatan Tambahan">
        <?= form_error('catatan', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="row">
        <div class="col-xs-4">
        <input type="hidden" name="tahun" value="<?=  $tahunskrg ?>">
        <input type="hidden" name="nomor" value="<?=  $nomor ?>">
        <input type="hidden" name="tanggal" value="<?=  $tanggalskrg ?>">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->