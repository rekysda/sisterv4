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
        <h3 class="box-title">Edit Data</h3>
      </div>
      <div class="box-body">
        <?php
        echo "<form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value='$s[id]'>
                    <tr><th style='background-color:#E7EAEC' width='160px' rowspan='25'>"; ?>
        <img class='img-thumbnail' style='width:155px' src="<?= base_url('assets/images/pegawai/' . $s['image']); ?>">
        <?php echo "</th>
                    </tr>
                    <input type='hidden' name='id' value='$s[nip]'>
                    <tr><th width='120px' scope='row'>Nip*</th>      <td><input type='text' class='form-control' value='$s[nip]' name='aa'></td></tr>
                    <tr><th scope='row'>Password (isi apabila ingin ganti password)</th>               <td><input type='password' class='form-control' name='ab'></td></tr>
                    <tr><th scope='row'>Nama Lengkap*</th>           <td><input type='text' class='form-control' value='$s[nama_guru]' name='ac'></td></tr>
                    <tr><th scope='row'>Tempat Lahir</th>           <td><input type='text' class='form-control' value='$s[tempat_lahir]' name='ad'></td></tr>
                    <tr><th scope='row'>Tanggal Lahir</th>          <td><input type='text' class='form-control' value='$s[tanggal_lahir]' name='ae'></td></tr>
                    <tr><th scope='row'>Jenis Kelamin</th>          <td><select class='form-control' name='af'>
                                                                          <option value='0' selected>- Pilih Jenis Kelamin -</option>";                                                                         ?>
        <?php foreach ($m_kelamin as $dt) : ?>
          <option value="<?= $dt['id']; ?>" <?= set_select('af', $dt['id'], FALSE); ?><?= $dt['id'] == $s['id_jenis_kelamin'] ? ' selected="selected"' : ''; ?>> <?= $dt['nama']; ?></option>
          </option>
        <?php endforeach; ?>
        <?php
        echo "</select></td></tr>
                    <tr><th scope='row'>Agama</th>                  <td><select class='form-control' name='ag'>
                                                                          <option value='0' selected>- Pilih Agama -</option>"; ?>
        <?php foreach ($m_agama as $dt) : ?>
          <option value="<?= $dt['id']; ?>" <?= set_select('ag', $dt['id'], FALSE); ?><?= $dt['id'] == $s['id_agama'] ? ' selected="selected"' : ''; ?>> <?= $dt['nama']; ?></option>
          </option>
        <?php endforeach; ?>
        <?php

        echo "</select></td></tr>
                    <tr><th scope='row'>No Hp</th>                  <td><input type='text' class='form-control' value='$s[hp]' name='ah'></td></tr>
                    <tr><th scope='row'>No Telpon</th>              <td><input type='text' class='form-control' value='$s[telepon]' name='ai'></td></tr>
                    <tr><th scope='row'>Alamat Email</th>           <td><input type='text' class='form-control' value='$s[email]' name='aj'></td></tr>
                    <tr><th scope='row'>Alamat</th>                 <td><input type='text' class='form-control' value='$s[alamat_jalan]' name='ak'></td></tr>
                    <tr><th scope='row'>RT/RW</th>                  <td><input type='text' class='form-control' value='$s[rt]/$s[rw]' name='al'></td></tr>
                    <tr><th scope='row'>Dusun</th>                  <td><input type='text' class='form-control' value='$s[nama_dusun]' name='am'></td></tr>
                    <tr><th scope='row'>Kelurahan</th>              <td><input type='text' class='form-control' value='$s[desa_kelurahan]' name='an'></td></tr>
                    <tr><th scope='row'>Kecamatan</th>              <td><input type='text' class='form-control' value='$s[kecamatan]' name='ao'></td></tr>
                    <tr><th scope='row'>Kode Pos</th>               <td><input type='text' class='form-control' value='$s[kode_pos]' name='ap'></td></tr>
                    <tr><th scope='row'>NUPTK</th>                  <td><input type='text' class='form-control' value='$s[nuptk]' name='aq'></td></tr>
                    <tr><th scope='row'>Bidang Studi</th>           <td><input type='text' class='form-control' value='$s[pengawas_bidang_studi]' name='ar'></td></tr>
                    <tr><th scope='row'>Jenis PTK</th>              <td><select class='form-control' name='as'>
                                                                          <option value='0' selected>- Pilih Jenis PTK -</option>"; ?>
        <?php foreach ($m_jenisptk as $dt) : ?>
          <option value="<?= $dt['id']; ?>" <?= set_select('ag', $dt['id'], FALSE); ?><?= $dt['id'] == $s['id_jenis_ptk'] ? ' selected="selected"' : ''; ?>> <?= $dt['nama']; ?></option>
          </option>
        <?php endforeach; ?>
        <?php

        echo "</select></td></tr>
                    <tr><th scope='row'>Tugas Tambahan</th>         <td><input type='text' class='form-control' value='$s[tugas_tambahan]' name='at'></td></tr>
                    <tr><th scope='row'>Status Pegawai</th>         <td><select class='form-control' name='au'>
                                                                          <option value='0' selected>- Pilih Status Kepegawaian -</option>"; ?>
        <?php foreach ($m_statuspegawai as $dt) : ?>
          <option value="<?= $dt['id']; ?>" <?= set_select('ag', $dt['id'], FALSE); ?><?= $dt['id'] == $s['id_status_kepegawaian'] ? ' selected="selected"' : ''; ?>> <?= $dt['nama']; ?></option>
          </option>
        <?php endforeach; ?>
        <?php

        echo "</select></td></tr>
                    <tr><th scope='row'>Status Keaktifan</th>       <td><select class='form-control' name='av'>
                                                                          <option value='0' selected>- Pilih Status Keaktifan -</option>"; ?>
        <?php foreach ($m_statuskeaktifan as $dt) : ?>
          <option value="<?= $dt['id']; ?>" <?= set_select('ag', $dt['id'], FALSE); ?><?= $dt['id'] == $s['id_status_keaktifan'] ? ' selected="selected"' : ''; ?>> <?= $dt['nama']; ?></option>
          </option>
        <?php endforeach; ?>
        <?php

        echo "</select></td></tr>
                    <tr><th scope='row'>Status Nikah</th>           <td><select class='form-control' name='aw'>
                                                                          <option value='0' selected>- Pilih Status Pernikahan -</option>"; ?>
        <?php foreach ($m_statusnikah as $dt) : ?>
          <option value="<?= $dt['id']; ?>" <?= set_select('ag', $dt['id'], FALSE); ?><?= $dt['id'] == $s['id_status_pernikahan'] ? ' selected="selected"' : ''; ?>> <?= $dt['nama']; ?></option>
          </option>
        <?php endforeach; ?>
        <?php

        echo "</select></td></tr>
                    <tr><th scope='row'>Ganti Foto</th>             <td><input type='file' name='image'><p class='help-block'>Extensi foto harus JPG</p>
                    </td></tr>
                  </tbody>
                  </table>
                </div>

                <div class='col-md-5'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='150px' scope='row'>NIK</th>      <td><input type='text' class='form-control' value='$s[nik]' name='ba'></td></tr>
                    <tr><th scope='row'>SK CPNS</th>                <td><input type='text' class='form-control' value='$s[sk_cpns]' name='bb'></td></tr>
                    <tr><th scope='row'>Tanggal CPNS</th>           <td><input type='text' class='form-control' value='$s[tanggal_cpns]' name='bc'></td></tr>
                    <tr><th scope='row'>SK Pengangkat</th>          <td><input type='text' class='form-control' value='$s[sk_pengangkatan]' name='bd'></td></tr>
                    <tr><th scope='row'>TMT Pengangkat</th>         <td><input type='text' class='form-control' value='$s[tmt_pengangkatan]' name='be'></td></tr>
                    <tr><th scope='row'>Lemb. Pengangkat</th>       <td><input type='text' class='form-control' value='$s[lembaga_pengangkatan]' name='bf'></td></tr>
                    <tr><th scope='row'>Golongan</th>               <td><select class='form-control' name='bg'>
                                                                          <option value='0' selected>- Pilih Golongan -</option>"; ?>
        <?php foreach ($m_golongan as $dt) : ?>
          <option value="<?= $dt['id']; ?>" <?= set_select('ag', $dt['id'], FALSE); ?><?= $dt['id'] == $s['id_golongan'] ? ' selected="selected"' : ''; ?>> <?= $dt['nama']; ?></option>
          </option>
        <?php endforeach; ?>
        <?php

        echo "</select></td></tr>
                    <tr><th scope='row'>Sumber Gaji</th>            <td><input type='text' class='form-control' value='$s[sumber_gaji]' name='bh'></td></tr>

                    <tr><th scope='row'>Ahli Laboratorium</th>      <td><input type='text' class='form-control' value='$s[keahlian_laboratorium]' name='bi'></td></tr>
                    <tr><th scope='row'>Nama Ibu Kandung</th>       <td><input type='text' class='form-control' value='$s[nama_ibu_kandung]' name='bj'></td></tr>
                    <tr><th scope='row'>Nama Suami/Istri</th>       <td><input type='text' class='form-control' value='$s[nama_suami_istri]' name='bk'></td></tr>
                    <tr><th scope='row'>Nip Suami/Istri</th>        <td><input type='text' class='form-control' value='$s[nip_suami_istri]' name='bl'></td></tr>
                    <tr><th scope='row'>Pekerjaan Suami/Istri</th>  <td><input type='text' class='form-control' value='$s[pekerjaan_suami_istri]' name='bm'></td></tr>
                    <tr><th scope='row'>TMT PNS</th>                <td><input type='text' class='form-control' value='$s[tmt_pns]' name='bn'></td></tr>
                    <tr><th scope='row'>Lisensi Kepsek</th>         <td><input type='text' class='form-control' value='$s[lisensi_kepsek]' name='bo'></td></tr>
                    <tr><th scope='row'>Jml Sekolah Binaan</th>     <td><input type='text' class='form-control' value='$s[jumlah_sekolah_binaan]' name='bp'></td></tr>
                    <tr><th scope='row'>Diklat Kepengawasan</th>    <td><input type='text' class='form-control' value='$s[diklat_kepengawasan]' name='bq'></td></tr>
                    <tr><th scope='row'>Mampu Handle KK</th>        <td><input type='text' class='form-control' value='$s[mampu_handle_kk]' name='br'></td></tr>
                    <tr><th scope='row'>Keahlian Breile</th>        <td><input type='text' class='form-control' value='$s[keahlian_breile]' name='bs'></td></tr>
                    <tr><th scope='row'>Keahlian B.Isyarat</th>     <td><input type='text' class='form-control' value='$s[keahlian_bahasa_isyarat]' name='bt'></td></tr>
                    <tr><th scope='row'>Kewarganegaraan</th>        <td><input type='text' class='form-control' value='$s[kewarganegaraan]' name='bu'></td></tr>
                    <tr><th scope='row'>NIY NIGK</th>               <td><input type='text' class='form-control' value='$s[niy_nigk]' name='bv'></td></tr>
                    <tr><th scope='row'>NPWP</th>                   <td><input type='text' class='form-control' value='$s[npwp]' name='bw'></td></tr>

                  </tbody>
                  </table>
                </div>
                <div style='clear:both'></div>
                        <div class='box-footer'>
                        <input type='hidden' class='form-control' value='$s[image]' name='old_image'>
                          <button type='submit' name='submit' class='btn btn-info'>Update</button>
                          <a href='" . base_url('kepegawaian/pegawai') . "'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                        </div>
              </div>
            </form>";

        ?>




      </div>
      <!-- /.box -->
    </div>
    <!-- /.box-body -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->