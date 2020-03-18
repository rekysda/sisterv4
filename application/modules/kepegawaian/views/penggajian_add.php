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
      <li>Kepegawaian</li>
      <li><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <?= $this->session->flashdata('message') ?>
    <?= validation_errors(); ?>
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah Penggajian</h3>
      </div>
      <div class="box-body">
        <?php
        echo "<form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-7'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='160px' rowspan='25'>"; ?>
        <img class='img-thumbnail' style='width:155px' src="<?= base_url('assets/images/pegawai/' . $s['image']); ?>">
        <a href='<?= base_url('kepegawaian/penggajian_list/' . $s['id']) ?>' class='btn btn-success'>Lihat Penggajian</a><br><br>
        NIP<br> <?= $s['nip'] ?><br><br>
        Nama<br> <?= $s['nama_guru'] ?><br><br>
        NUPTK<br> <?= $s['nuptk'] ?><br><br>
        Jenis PTK<br> <?= $s['jenisptk'] ?><br><br>
        Tugas Tambahan<br> <?= $s['tugas_tambahan'] ?><br><br>
        Status Kepegawaian<br> <?= $s['statuspegawai'] ?><br><br>
        Status Nikah<br> <?= $s['statusnikah'] ?><br><br>
        Golongan<br> <?= $s['golongan'] ?><br><br>
        NPWP<br> <?= $s['npwp'] ?><br><br>
        <?php echo "</th>
                    </tr>
                    <input type='hidden' name='id_pegawai' value='$s[id]'>
                    <tr><th width='120px' scope='row'>Bulan*</th><td><select name='bulan' class='form-control'>
                    <option value='' selected>- Bulan -</option>";
        $blnn = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        for ($n = 1; $n <= 12; $n++) {
          if ($blnee == $n) {
            echo "<option value='$n' selected>$blnn[$n]</option>";
          } else {
            echo "<option value='$n'>$blnn[$n]</option>";
          }
        }
        echo "</select></td></tr>
                    <tr><th scope='row'>Tahun*</th><td><select name='tahun' class='form-control'>
                    <option value='' selected>- Tahun -</option>";
        $tahunn = date("Y");
        for ($n = 2019; $n <= $tahunn; $n++) {
          if ($tahun == $n) {
            echo "<option value='$n' selected>$n</option>";
          } else {
            echo "<option value='$n'>$n</option>";
          }
        }
        echo "</select></td></tr>
                    <tr><th scope='row'>Tanggal Cetak*</th>           <td><input type='text' class='form-control' id='tanggalcetak' value='" . set_value('tanggalcetak', date('Y-m-d'), FALSE) . "' name='tanggalcetak'></td></tr>
                    <tr><th width='150px' scope='row'></th><th>Penghasilan</th></tr>
                    <tr><th width='150px' scope='row'>Gaji Pokok</th><td><input type='text' id='gajipokok' class='form-control' name='aa'value='" . set_value('aa', '0', FALSE) . "'></td></tr>
                    <tr><th width='150px' scope='row'></th><th>Pengajaran</th></tr>
                    <tr><th width='150px' scope='row'>Gaji per Jam</th><td><input type='text' id='gajiperjam' class='form-control' name='ae'value='" . set_value('ae', '0', FALSE) . "'></td></tr>
                    <tr><th width='150px' scope='row'>Jam Mengajar/Jam</th><td><input type='text' id='jamngajar' class='form-control' name='af'value='" . set_value('af', '0', FALSE) . "'></td></tr>
                    <tr><th width='150px' scope='row'>Gaji Mengajar</th><td><input type='text' id='gajingajar' class='form-control' name='ag'value='" . set_value('ag', '0', FALSE) . "'></td></tr>
                    <tr><th width='150px' scope='row'></th><th>Tunjangan</th></tr>
                    <tr><th width='150px' scope='row'>Gelar</th><td><input type='text' class='form-control' id='ab' name='ab'value='" . set_value('ab', '0', FALSE) . "'></td></tr>
                    <tr><th width='150px' scope='row'>Sertifikasi</th><td><input type='text' class='form-control' id='ac' name='ac'value='" . set_value('ac', '0', FALSE) . "'></td></tr>
                    <tr><th width='150px' scope='row'>Masa Kerja</th><td><input type='text' class='form-control' id='ad' name='ad'value='" . set_value('ad', '0', FALSE) . "'></td></tr>
                    <tr><th width='150px' scope='row'>Transport</th><td><input type='text' class='form-control' id='ah' name='ah'value='" . set_value('ah', '0', FALSE) . "'></td></tr>
                    <tr><th width='150px' scope='row'>Laboratorium</th><td><input type='text' class='form-control' id='ai' name='ai'value='" . set_value('ai', '0', FALSE) . "'></td></tr>
                    <tr><th width='150px' scope='row'>Wali Kelas</th><td><input type='text' class='form-control' id='aj' name='aj'value='" . set_value('aj', '0', FALSE) . "'></td></tr>
                    <tr><th width='150px' scope='row'>Tunjangan</th><td><input type='text' class='form-control'id='tunjangan' name='tunjangan'value='" . set_value('tunjangan', '0', FALSE) . "'></td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-5'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='150px' scope='row'></th><th>Potongan</th></tr>
                    <tr><th width='150px' scope='row'>Sosial</th><td><input type='text' class='form-control' id='ba' name='ba'value='" . set_value('ba', '0', FALSE) . "'></td></tr>
                    <tr><th width='150px' scope='row'>BPJS</th><td><input type='text' class='form-control' id='bb' name='bb'value='" . set_value('bb', '0', FALSE) . "'></td></tr>
                    <tr><th width='150px' scope='row'>Potongan</th><td><input type='text' class='form-control' id='potongan' name='potongan'value='" . set_value('potongan', '0', FALSE) . "'></td></tr>
                    <tr><th width='150px' height='300px'scope='row'></th><td></td></tr>
                    <tr><th width='150px' scope='row'>Jumlah Gaji Diterima</th><td><input type='text' id='gajiditerima' class='form-control' name='ca'value='" . set_value('ca', '0', FALSE) . "'></td></tr>

                  </tbody>
                  </table>
                </div>
                <div style='clear:both'></div>
                        <div class='box-footer'>
                          <button type='submit' name='submit' class='btn btn-info'>Simpan</button>
                          <a href='" . base_url('kepegawaian/penggajian') . "'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                        </div>
              </div>
            </form>";

        ?>




        <!-- /.box -->
      </div>
      <!-- /.box-body -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->