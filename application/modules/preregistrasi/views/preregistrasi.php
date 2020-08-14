<div class="register-box">
  <div class="register-logo">
  <img src="<?= base_url('assets/images/logoslip/1594698390216.jpg');?>"width="100px"><br>
Isi <b>PPDB</br>
  </div>
<?= $this->session->flashdata('message') ?>
  <div class="register-box-body">
    <form class="user" method="post" action="">
      <div class="form-group has-feedback <?= form_error('nama') ? 'has-error' : '' ?>">
        <input type="text" name="nama" value="<?= set_value('nama'); ?>" class="form-control" placeholder="Nama Sesuai KTP">
        <?= form_error('nama', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="form-group has-feedback <?= form_error('hp') ? 'has-error' : '' ?>">
        <input type="text" name="hp" value="<?= set_value('hp'); ?>" class="form-control" placeholder="Nomor WA">
        <?= form_error('hp', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="form-group has-feedback <?= form_error('asalsekolah') ? 'has-error' : '' ?>">
        <input type="text" name="asalsekolah" value="<?= set_value('asalsekolah'); ?>" class="form-control" placeholder="Asal Sekolah">
        <?= form_error('asalsekolah', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="row">
        <div class="col-xs-4">
        <input type="hidden" name="tanggal" value="<?=  $tanggalskrg ?>">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
        </div>
        <!-- /.col -->
      </div>
      <div class="row">  <b>catatan:</b><br>Setelah melakukan Pendaftaran , lakukan konfirmasi Pendaftaran dengan ketik nama,alamat,asal TK melalui Whatsapp SDK Santo Xaverius (WA 0821-4303-1298).</div>
    </form>
  </div>
  <!-- /.form-box -->
</div>

<!-- /.register-box -->