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
            <li>PPDB</li>
            <li><?= $title; ?></li>
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
<form  method="post" action="<?php base_url('ppdb/editsiswalogin') ?>" enctype ="multipart/form-data" id="posts">
<table class="table table-striped table-hover">
<tr>
		<td>NIS*</td>
		<td>:</td>
		<td><input type="text" name="nis" value="<?= set_value('nis', isset($getsiswa['nis']) ?$getsiswa['nis']:'') ?>" class="form-control <?php echo form_error('nis') ? 'is-invalid' : '' ?>">
        <div class="invalid-feedback">
                            <?= form_error('nis') ?>
                        </div></td>
	</tr>
<tr>
		<td>Nama Siswa*</td>
		<td>:</td>
		<td><input type="text" name="namasiswa" value="<?= set_value('namasiswa', isset($getsiswa['namasiswa']) ?$getsiswa['namasiswa']:'') ?>"class="form-control <?php echo form_error('namasiswa') ? 'is-invalid' : '' ?>">
        <div class="invalid-feedback">
                            <?= form_error('namasiswa') ?>
                        </div></td>
	</tr>
    <tr>
		<td>Tanggal Lahir*</td>
		<td>:</td>
		<td><input type="text" name="tanggallahirsiswa" id="tanggallahirsiswa"  value="<?= set_value('tanggallahirsiswa', isset($getsiswa['tanggallahirsiswa']) ?$getsiswa['tanggallahirsiswa']:'') ?>"  >
		<div class="invalid-feedback">
		<?= form_error('tanggallahirsiswa') ?>
		</div>
		</td>
    </tr>
     
	</table></div>

<table class="table">
	<tr>
		<td width="30%"></td>
		<td></td>
		<td>

		<input type="submit" value="Simpan" name="submit"class="btn btn-success">&nbsp;
		<a href="<?= base_url('ppdb/siswa_login') ?>"><span class="btn btn-warning">Batal</span></a>
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