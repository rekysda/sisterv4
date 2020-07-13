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
                <h3 class="box-title">Add Data</h3>
            </div>
<div class="box-body">
<?= $this->session->flashdata('message') ?>
<?php $statusdefault='aktif'; ?>
<form  method="post" action="" enctype ="multipart/form-data" id="posts">
<table class="table table-striped table-hover">
<tr>
		<td>Tahun Akademik*</td>
		<td>:</td>
		<td>
                        <select name="tahunakademik_id" class="form-control <?= form_error('tahunakademik_id') ? 'is-invalid' : '' ?>">
                            <option value="">== Tahun Akademik ==</option>
                            <?php foreach ($tahunakademik as $dt) : ?>
                            <option value="<?= $dt['id']; ?>"<?= set_select('tahunakademik_id', $dt['id'], FALSE); ?>><?= $dt['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('tahunakademik_id') ?>
                        </div>
                        </td>
    </tr>
    <tr>
		<td>Mata Pelajaran*</td>
		<td>:</td>
		<td>
                        <select name="mapel_id"class="form-control <?= form_error('mapel_id') ? 'is-invalid' : '' ?>">
                            <option value="">== Mapel ==</option>
                            <?php foreach ($mapel as $dt) : ?>
                            <option value="<?= $dt['id']; ?>"<?= set_select('mapel_id', $dt['id'], FALSE); ?>><?= $dt['nama_mapel']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('mapel_id') ?>
                        </div>
                        </td>
    </tr>
    <tr>
		<td>Kelas*</td>
		<td>:</td>
		<td>
                        <select name="kelas_id"class="form-control <?= form_error('kelas_id') ? 'is-invalid' : '' ?>">
                            <option value="">== Kelas ==</option>
                            <?php foreach ($kelas as $dt) : ?>
                            <option value="<?= $dt['id']; ?>"<?= set_select('kelas_id', $dt['id'], FALSE); ?>><?= $dt['nama_kelas']; ?> (<?= $dt['tahun']; ?>)</option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('kelas_id') ?>
                        </div>
                        </td>
    </tr>
    <tr>
		<td>Guru*</td>
		<td>:</td>
		<td>
                        <select name="guru_id"class="form-control <?= form_error('guru_id') ? 'is-invalid' : '' ?>">
                            <option value="">== Guru Pengajar ==</option>
                            <?php foreach ($guru as $dt) : ?>
                            <option value="<?= $dt['id']; ?>"<?= set_select('guru_id', $dt['id'], FALSE); ?>><?= $dt['nama_guru']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('guru_id') ?>
                        </div>
                        </td>
    </tr>
    <tr>
		<td>Hari*</td>
		<td>:</td>
		<td>
                        <select name="hari"class="form-control <?= form_error('hari') ? 'is-invalid' : '' ?>">
<?php $harin = array('', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
for ($n = 1; $n <= 6; $n++) {?>
<option value="<?= $harin[$n]?>" <?= set_select('hari', $harin[$n], FALSE); ?>><?= $harin[$n]?></option>
<?php }?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('hari') ?>
                        </div>
                        </td>
    </tr>
    <tr>
		<td>Jam Mulai</td>
		<td>:</td>
        <td><input type="text" name="jam_mulai" value="<?= set_value('jam_mulai',date('H:i:s')); ?>"
        class="form-control <?php echo form_error('jam_mulai') ? 'is-invalid' : '' ?>">
        <div class="invalid-feedback"><?= form_error('jam_mulai') ?>
        </div></td>
    </tr>
    <tr>
		<td>Jam Selesai</td>
		<td>:</td>
        <td><input type="text" name="jam_selesai" value="<?= set_value('jam_selesai',date('H:i:s')); ?>"  
        class="form-control <?php echo form_error('jam_selesai') ? 'is-invalid' : '' ?>">
        <div class="invalid-feedback"><?= form_error('jam_selesai') ?>
        </div></td>
    </tr>
    <tr>
	</table></div>

<table class="table">
	<tr>
		<td width="30%"></td>
		<td></td>
		<td>
		<input type="submit" value="Simpan" name="submit"class="btn btn-success">&nbsp;
		<a href="<?= base_url('rapor/jadwal_pelajaran') ?>"><span class="btn btn-warning">Batal</span></a>
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