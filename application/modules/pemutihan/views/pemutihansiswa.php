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
<li>Pemutihan</li>
<li><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <?= $this->session->flashdata('message') ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Informasi Nota</h3>
      </div>
      <div class="box-body">

        <div class="row">
          <div class="col-md-4">
            <form action="" method="post">
              <div class="form-group <?php echo form_error('nomor_nota') ? 'has-error' : '' ?>">
                <label for="nomor_nota">No.Nota</label><br>
                <input type="text" name="nomor_nota" class="form-control" id="nomor_nota" value="<?= set_value('nomor_nota', strtoupper(uniqid()), FALSE); ?>">
                <?= form_error('nomor_nota', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('tanggal') ? 'has-error' : '' ?>">
                <label for="tanggal">Tanggal</label><br>
                <input class="form-control" type="text" id="tanggal" name="tanggal" value="<?= set_value('tanggal', date('Y-m-d'), FALSE); ?>">
                <?= form_error('tanggal', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('petugas') ? 'has-error' : '' ?>">
                <label for="petugas">Petugas</label><br>
                <input type='text' name='petugas' class='form-control' id='petugas' value="<?= $user['name'] ?>" readonly>
                <?= form_error('petugas', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('siswa_id') ? 'has-error' : '' ?>">
                <label for="name">Nama</label><br>
                <select class="js-example-basic-single" name="siswa_id"style="width:100%;">
                  <?php foreach ($selectsiswa as $dt) : ?>
                    <option value="<?= $dt['id']; ?>" <?= $dt['id'] == $siswa_id ? ' selected="selected"' : ''; ?>><?= $dt['namasiswa']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('siswa_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="addsiswa">Tambah</button>
                <a href="<?= base_url('pemutihan/pemutihan_cancel'); ?> " class="btn btn-default">Cancel</a>
              </div>
            </form>
          </div>
          <div class="col-md-4">
            <div class="form-group <?php echo form_error('noformulir') ? 'has-error' : '' ?>">
              <label for="noformulir">No.Formulir</label>
              <input class="form-control" type="text" name="noformulir" value="<?= $siswaresult['noformulir']; ?>" readonly />
            </div>
            <div class="form-group <?php echo form_error('nis') ? 'has-error' : '' ?>">
              <label for="name">NIS</label>
              <input class="form-control" type="text" name="nis" value="<?= $siswaresult['nis']; ?>" readonly />
            </div>
            <div class="form-group <?php echo form_error('namasiswa') ? 'has-error' : '' ?>">
              <label for="name">Nama</label>
              <input class="form-control" type="text" name="namasiswa" value="<?= $siswaresult['namasiswa']; ?>" readonly />
            </div>
            <div class="form-group">
              <label for="ket">Keterangan Siswa : </label><br>
              <?= $sk['keterangan']; ?>
            </div>
          </div>
          <div class="col-md-4">
            <form action="<?php base_url('pemutihan/pemutihansiswa') ?>" method="post">
              <div class="form-group <?php echo form_error('biaya_id') ? 'has-error' : '' ?>">
                <label for="name">Nama Biaya</label><br>
                <select class="js-example-basic-single" name="biaya_id" style="width:100%;">
                  <?php foreach ($selectbiayasiswa as $dt) : ?>
                    <option value="<?= $dt['biaya_id']; ?>" <?= set_select('biaya_id', $dt['biaya_id'], FALSE); ?> <?= $dt['biaya_id'] == $biaya_id ? ' selected="selected"' : ''; ?>><?= $dt['biaya']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('biaya_id', '<span class="help-block">', '</small>'); ?>
              </div>

              <button type="submit" class="btn btn-primary" name="addbiaya">Tambah</button>
            </form>
          </div>
        </div>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Rincian</h3>
      </div>
      <div class="box-body">

        <div class="row">

          <div class="col-md-6">
            <?php
            $no = 1;
            $cart_check = $this->cart->contents();
            if (empty($cart_check)) {
              echo 'To add products to your shopping cart click on "Add to Cart" Button';
              $total = '0';
              $this->session->set_userdata('totalcart', $total);
            }
            if ($cart = $this->cart->contents()) { ?>
              <table class='table table-bordered'>
                <thead>
                  <tr>
                    <th style='width:35px;'>#</th>
                    <th style='width:210px;'>Jenis</th>
                    <th>Nama Biaya</th>
                    <th style='width:120px;'>Nominal</th>
                    <th style='width:40px;'></th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($cart as $item) : ?>
                    <tr>
                      <td style='width:35px;'><?= $no; ?></td>
                      <td style='width:210px;'><?= $item['jenis']; ?></td>
                      <td> <?= $item['name']; ?></td>
                      <td style='width:120px;'> <?= nominal($item['harga']); ?></td>
                      <td style='width:40px;'>
                        <a href="<?= base_url('pemutihan/hapus_item/' . $item['rowid']); ?>" class="btn btn-danger">Hapus</a></td>
                    </tr>
                    <?php $total += $item['harga'];
                    $this->session->set_userdata('totalcart', $total);
                    $no++;
                  endforeach; ?>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      <?= nominal($this->session->userdata('totalcart')) ?> </td>
                    <td><a onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');" href="<?= base_url('pemutihan/kosongkancart/'); ?>" class="btn btn-warning">Kosongkan</a> </td>
                  </tr>
                </tbody>
              </table>

            <?php
          } ?>
          </div>
          <div class="col-md-6">
            <form action="<?php base_url('pemutihan/pemutihansiswa') ?>" method="post">

              <div class="form-group <?php echo form_error('keterangan') ? 'has-error' : '' ?>">
                <label for="Keterangan">Keterangan</label>
                <input class="form-control" type="text" name="keterangan" value="<?= ($this->session->userdata('keterangan')) ?>" />
              </div>
              <div class="form-group <?php echo form_error('penanggungjawab') ? 'has-error' : '' ?>">
                <label for="penanggungjawab">Penanggung Jawab</label>
                <input class="form-control" type="text" name="penanggungjawab" value="<?= ($this->session->userdata('penanggungjawab')) ?>" />
              </div>
              <div class="form-group <?php echo form_error('image') ? 'has-error' : '' ?>">
              <label for="lampiran">Lampiran</label>
                        <input type="file" class="custom-file-input" id="image" name="image">
                </div>
                <div class="form-group">
              <input type="hidden" name="nomor_nota2" class="form-control" id="nomor_nota2" value="" />
              <input type="hidden" name="tanggal2" class="form-control" id="tanggal2" value="" />
              <input type="hidden" name="user_id" class="form-control" id="user_id" value="<?= $user['id'] ?>" /><br>
              <button type="submit" class="btn btn-primary" name="simpan_transaksi" id="simpan_transaksi">Simpan</button>
          </div>
          </form>

        </div>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->