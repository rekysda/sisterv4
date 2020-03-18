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

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah Data</h3>
      </div>
      <div class="box-body">

        <form method="POST" class="form-horizontal" action="" enctype="multipart/form-data">

          <!-- row -->
          <div class="row">
            <!-- col-md-6 -->
            <div class="col-md-6">
              <div class="form-group <?= form_error('aa') ? 'has-error' : '' ?>">
                <label for="Nip" class="col-sm-3 control-label">Nip</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="aa" value="<?= set_value('aa') ?>" placeholder="Nip">
                  <?= form_error('aa', '<span class="help-block">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group <?= form_error('ab') ? 'has-error' : '' ?>">
                <label for="Password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" name="ab" value="<?= set_value('ab') ?>" placeholder="Password">
                  <?= form_error('ab', '<span class="help-block">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group <?= form_error('ac') ? 'has-error' : '' ?>">
                <label for="NamaLengkap" class="col-sm-3 control-label">Nama Lengkap</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="ac" value="<?= set_value('ac') ?>" placeholder="Nama Lengkap">
                  <?= form_error('ac', '<span class="help-block">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group <?= form_error('ad') ? 'has-error' : '' ?>">
                <label for="TempatLahir" class="col-sm-3 control-label">Tempat Lahir</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="ad" value="<?= set_value('ad') ?>" placeholder="Tempat Lahir">
                </div>
              </div>
              <div class="form-group">
                <label for="TanggalLahir" class="col-sm-3 control-label">Tanggal Lahir</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="ae" value="<?= set_value('ae') ?>" placeholder="Tanggal Lahir">
                </div>
              </div>
              <div class="form-group">
                <label for="JenisKelamin" class="col-sm-3 control-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                  <select class='form-control' name='af' id='af'>
                    <option value='0' selected>- Pilih Jenis Kelamin -</option>"; ?>
                    <?php foreach ($m_kelamin as $dt) : ?>
                      <option value="<?= $dt['id']; ?>" <?= set_select('af', $dt['id'], FALSE); ?>> <?= $dt['nama']; ?></option>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Agama</label>
                <div class="col-sm-9">
                  <select class='form-control' name='ag'>
                    <option value='0' selected>- Pilih Agama -</option>"; ?>
                    <?php foreach ($m_agama as $dt) : ?>
                      <option value="<?= $dt['id']; ?>" <?= set_select('ag', $dt['id'], FALSE); ?>> <?= $dt['nama']; ?></option>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">No Hp</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='ah' value="<?= set_value(' ah') ?>">
                </div>
              </div>
              <div class=" form-group">
                <label for="field" class="col-sm-3 control-label">No Telpon</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='ai' value="<?= set_value(' ai') ?>">
                </div>
              </div>
              <div class=" form-group">
                <label for="field" class="col-sm-3 control-label">Alamat Email</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='aj' value="<?= set_value(' aj') ?>">
                </div>
              </div>
              <div class=" form-group">
                <label for="field" class="col-sm-3 control-label">Alamat</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='ak' value="<?= set_value(' ak') ?>">
                </div>
              </div>
              <div class=" form-group">
                <label for="field" class="col-sm-3 control-label">RT/RW</label>
                <div class="col-sm-9"><input type='text' class='form-control' value='00/00' name='al' value="<?= set_value(' al') ?>"></div>
              </div>
              <div class=" form-group">
                <label for="field" class="col-sm-3 control-label">Dusun</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='am' value="<?= set_value(' am') ?>">
                </div>
              </div>
              <div class=" form-group">
                <label for="field" class="col-sm-3 control-label">Kelurahan</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='an' value="<?= set_value(' an') ?>">
                </div>
              </div>
              <div class=" form-group">
                <label for="field" class="col-sm-3 control-label">Kecamatan</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='ao' value="<?= set_value(' ao') ?>">
                </div>
              </div>
              <div class=" form-group">
                <label for="field" class="col-sm-3 control-label">Kode Pos</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='ap' value="<?= set_value(' ap') ?>">
                </div>
              </div>
              <div class=" form-group">
                <label for="field" class="col-sm-3 control-label">NUPTK</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='aq' value="<?= set_value(' aq') ?>">
                </div>
              </div>
              <div class=" form-group">
                <label for="field" class="col-sm-3 control-label">Bidang Studi</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='ar' value="<?= set_value(' ar') ?>">
                </div>
              </div>
              <div class=" form-group">
                <label for="field" class="col-sm-3 control-label">Jenis PTK</label>
                <div class="col-sm-9">
                  <select class='form-control' name='as'>
                    <option value='0' selected>- Pilih Jenis PTK -</option>" ; ?>
                    <?php foreach ($m_jenisptk as $dt) : ?>
                      <option value="<?= $dt['id']; ?>" <?= set_select('ag', $dt['id'], FALSE); ?>> <?= $dt['nama']; ?></option>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Tugas Tambahan</label>
                <td><input type='text' class='form-control' name='at' value="<?= set_value(' at') ?>"></td>
              </div>
              <div class="form-group">
                <label for=" field" class="col-sm-3 control-label">Status Pegawai</label>
                <div class="col-sm-9">
                  <select class='form-control' name='au'>
                    <option value='0' selected>- Pilih Status Kepegawaian -</option>" ; ?>
                    <?php foreach ($m_statuspegawai as $dt) : ?>
                      <option value="<?= $dt['id']; ?>" <?= set_select('ag', $dt['id'], FALSE); ?>> <?= $dt['nama']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Status Keaktifan</label>
                <div class="col-sm-9">
                  <select class='form-control' name='av'>
                    <option value='0' selected>- Pilih Status Keaktifan -</option>"; ?>
                    <?php foreach ($m_statuskeaktifan as $dt) : ?>
                      <option value="<?= $dt['id']; ?>" <?= set_select('ag', $dt['id'], FALSE); ?>> <?= $dt['nama']; ?></option>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Status Nikah</label>
                <div class="col-sm-9">
                  <select class='form-control' name='aw'>
                    <option value='0' selected>- Pilih Status Pernikahan -</option>"; ?>
                    <?php foreach ($m_statusnikah as $dt) : ?>
                      <option value="<?= $dt['id']; ?>" <?= set_select('ag', $dt['id'], FALSE); ?>> <?= $dt['nama']; ?></option>
                      </option>
                    <?php endforeach; ?>

                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Foto</label>
                <div class="col-sm-9"><input type='file' name='image'>
                  <p class='help-block'>Extensi foto harus JPG</p>
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
            <!-- col-md-6 -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">NIK</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='ba' value="<?= set_value('ba') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">SK CPNS</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='bb' value="<?= set_value('bb') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Tanggal CPNS</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='bc' value="<?= set_value('bc') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">SK Pengangkat</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='bd' value="<?= set_value('bd') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">TMT Pengangkat</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='be' value="<?= set_value('be') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Lemb. Pengangkat</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='bf' value="<?= set_value('bf') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Golongan</label>
                <div class="col-sm-9">
                  <select class='form-control' name='bg'>
                    <option value='0' selected>- Pilih Golongan -</option>"; ?>
                    <?php foreach ($m_golongan as $dt) : ?>
                      <option value="<?= $dt['id']; ?>" <?= set_select('ag', $dt['id'], FALSE); ?>> <?= $dt['nama']; ?></option>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Sumber Gaji</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' value="<?= set_value('bh') ?>" name='bh'>
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Ahli Laboratorium</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='bi' value="<?= set_value('bi') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Nama Ibu Kandung</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='bj' value="<?= set_value('bj') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Nama Suami/Istri</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='bk' value="<?= set_value('bk') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Nip Suami/Istri</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='bl' value="<?= set_value('bl') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Pekerjaan Suami/Istri</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='bm' value="<?= set_value('bm') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">TMT PNS</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='bn' value="<?= set_value('bn') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Lisensi Kepsek</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='bo' value="<?= set_value('bo') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Jml Sekolah Binaan</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='bp' value="<?= set_value('bp') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Diklat Kepengawasan</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='bq' value="<?= set_value('bq') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Mampu Handle KK</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='br' value="<?= set_value('br') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Keahlian Breile</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='bs' value="<?= set_value('bs') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Keahlian B.Isyarat</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='bt' value="<?= set_value('bt') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">Kewarganegaraan</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='bu' value="<?= set_value('bu') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">NIY NIGK</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='bv' value="<?= set_value('bv') ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field" class="col-sm-3 control-label">NPWP</label>
                <div class="col-sm-9">
                  <input type='text' class='form-control' name='bw' value="<?= set_value('bw') ?>">
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->

      </div>
      <!-- /.box-body -->

      <div class='box-footer'>
        <button type="submit" name="submit" class="btn btn-info">Tambah</button>
        <a class="btn btn-default" href="' . base _url(' kepegawaian/pegawai') . '">Cancel</a>
      </div>
      </form>

    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->