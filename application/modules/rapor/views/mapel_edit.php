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

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Data</h3>
            </div>
<div class="box-body">
<?= $this->session->flashdata('message') ?>
<?php $statusdefault='aktif'; ?>
<?php $jurusan_id= $getmapel['jurusan_id']; ?>
<?php $guru_mgmp= $getmapel['guru_mgmp']; ?>
<?php $kelompok_id= $getmapel['kelompok_id']; ?>
<form  method="post" action="" enctype ="multipart/form-data" id="posts">
<table class="table table-striped table-hover">
<tr>
		<td>Kode Mapel*</td>
		<td>:</td>
        <td><input type="text" name="kode_mapel" value="<?= $getmapel['kode_mapel']; ?>"  
        class="form-control <?php echo form_error('kode_mapel') ? 'is-invalid' : '' ?>">
        <div class="invalid-feedback"><?= form_error('kode_mapel') ?>
        </div></td>
    </tr>
    <tr>
		<td>Nama Mapel*</td>
		<td>:</td>
        <td><input type="text" name="nama_mapel" value="<?= $getmapel['nama_mapel']; ?>"  
        class="form-control <?php echo form_error('nama_mapel') ? 'is-invalid' : '' ?>">
        <div class="invalid-feedback"><?= form_error('nama_mapel') ?>
        </div></td>
  </tr>
  <tr>
		<td>Singkatan</td>
		<td>:</td>
        <td><input type="text" name="sk_mapel" value="<?= $getmapel['sk_mapel']; ?>"  
        class="form-control <?php echo form_error('sk_mapel') ? 'is-invalid' : '' ?>">
        <div class="invalid-feedback"><?= form_error('sk_mapel') ?>
        </div></td>
	</tr>
    <tr>
		<td>Jurusan*</td>
		<td>:</td>
		<td>
            <select name="jurusan_id" id="jurusan_id" class="form-control <?= form_error('jurusan_id') ? 'is-invalid' : '' ?>">
              <option value="">== Jurusan ==</option>
              <?php foreach ($jurusanmapel as $dt) : ?>
                <option value="<?= $dt['id']; ?>" <?= $dt['id'] == $jurusan_id ? ' selected="selected"' : ''; ?>><?= $dt['nama_jurusan']; ?></option>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
              <?= form_error('jurusan_id') ?>
            </div>
            </td>
	</tr>
    <tr>
		<td>Guru MGMP</td>
		<td>:</td>
		<td>
            <select name="guru_mgmp" id="guru_mgmp" class="form-control <?= form_error('guru_mgmp') ? 'is-invalid' : '' ?>">
              <option value="">== Guru MGMP ==</option>
              <?php foreach ($gurumgmp as $dt) : ?>
                <option value="<?= $dt['id']; ?>" <?= $dt['id'] == $guru_mgmp ? ' selected="selected"' : ''; ?>><?= $dt['nama_guru']; ?></option>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
              <?= form_error('guru_mgmp') ?>
            </div>
            </td>
	</tr>
<tr>
		<td>Tingkat*</td>
		<td>:</td>
        <td><input type="number" name="tingkat" value="<?= $getmapel['tingkat']; ?>"   class="form-control <?php echo form_error('tingkat') ? 'is-invalid' : '' ?>">
        <div class="invalid-feedback">
                            <?= form_error('tingkat') ?>
                        </div></td>
    </tr>
    <tr>
		<td>Urutan</td>
		<td>:</td>
        <td><input type="text" name="urutan" value="<?= $getmapel['urutan']; ?>"   class="form-control <?php echo form_error('urutan') ? 'is-invalid' : '' ?>">
        <div class="invalid-feedback">
                            <?= form_error('urutan') ?>
                        </div></td>
	</tr>
    <tr>
		<td>Kelompok*</td>
		<td>:</td>
		<td>
            <select name="kelompok_id" id="kelompok_id" class="form-control <?= form_error('kelompok_id') ? 'is-invalid' : '' ?>">
              <option value="">== Kelompok ==</option>
              <?php foreach ($kelompokmapel as $dt) : ?>
                <option value="<?= $dt['id']; ?>" <?= $dt['id'] == $kelompok_id ? ' selected="selected"' : ''; ?>><?= $dt['nama_kelompok']; ?></option>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
              <?= form_error('kelompok_id') ?>
            </div>
            </td>
    </tr>
    <tr>
		<td></td>
		<td></td>
        <td>
              <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" <?= $getmapel['is_active'] == '1' ? 'checked' : ''; ?>>
              <label class="form-check-label" for="is_active">
                Active?
              </label>
        </td>
    </tr>
	</table></div>

<table class="table">
	<tr>
		<td width="30%"></td>
		<td></td>
		<td>
		<input type="submit" value="Simpan" name="submit"class="btn btn-success">&nbsp;
		<a href="<?= base_url('rapor/mapel') ?>"><span class="btn btn-warning">Batal</span></a>
		</td>
	</tr>
</table>
</form>
            </div>
        <!-- /.box-body -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->