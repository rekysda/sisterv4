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
                <h3 class="box-title">Edit Nilai Rapor Asal Sekolah</h3><br>
                * Pengisian Nilai Harap Menggunakan Nilai Nominal antar 0 sd 100
            </div>
            <div class="box-body">
            <?= $this->session->flashdata('message') ?>
<form  method="post" action="<?= base_url('siswa/siswa_rapor_add')?>" id="posts">
<table class="table table-striped table-hover">

<tr>
<td align="right" colspan="3"><b>Kelas 7 Semester 1 </b></td>
</tr>
<tr>
<td>Bahasa Indonesia</td>
<td>:</td>
<td><input type="number" name="mapel1" value="<?= $getrapor['mapel1']; ?>" class="form-control"required>
</td>
</tr>
<tr>
<td>Bahasa Inggris</td>
<td>:</td>
<td><input type="number" name="mapel2" value="<?= $getrapor['mapel2']; ?>" class="form-control"required>
</td>
</tr>
<tr>
<td>Matematika</td>
<td>:</td>
<td><input type="number" name="mapel3" value="<?= $getrapor['mapel3']; ?>" class="form-control"required>
</td>
</tr>
<tr>
<td>IPA</td>
<td>:</td>
<td><input type="number" name="mapel4" value="<?= $getrapor['mapel4']; ?>" class="form-control"required>
</td>
</tr>
<tr>
<td>IPS</td>
<td>:</td>
<td><input type="number" name="mapel5" value="<?= $getrapor['mapel5']; ?>" class="form-control"required>
</td>
</tr>
<tr>
<td align="right" colspan="3"><b>Kelas 7 Semester 2 </b></td>
</tr>
<tr>
<td>Bahasa Indonesia</td>
<td>:</td>
<td><input type="number" name="mapel6" value="<?= $getrapor['mapel6']; ?>" class="form-control"required>
</td>
</tr>
<tr>
<td>Bahasa Inggris</td>
<td>:</td>
<td><input type="number" name="mapel7" value="<?= $getrapor['mapel7']; ?>" class="form-control"required>
</td>
</tr>
<tr>
<td>Matematika</td>
<td>:</td>
<td><input type="number" name="mapel8" value="<?= $getrapor['mapel8']; ?>" class="form-control"required>
</td>
</tr>
<tr>
<td>IPA</td>
<td>:</td>
<td><input type="number" name="mapel9" value="<?= $getrapor['mapel9']; ?>" class="form-control"required>
</td>
</tr>
<tr>
<td>IPS</td>
<td>:</td>
<td><input type="number" name="mapel10" value="<?= $getrapor['mapel10']; ?>" class="form-control"required>
</td>
</tr>
<tr>
<td align="right" colspan="3"><b>Kelas 8 Semester 1 </b></td>
</tr>
<tr>
<td>Bahasa Indonesia</td>
<td>:</td>
<td><input type="number" name="mapel11" value="<?= $getrapor['mapel11']; ?>" class="form-control"required>
</td>
</tr>
<tr>
<td>Bahasa Inggris</td>
<td>:</td>
<td><input type="number" name="mapel12" value="<?= $getrapor['mapel12']; ?>" class="form-control"required>
</td>
</tr>
<tr>
<td>Matematika</td>
<td>:</td>
<td><input type="number" name="mapel13" value="<?= $getrapor['mapel13']; ?>" class="form-control"required>
</td>
</tr>
<tr>
<td>IPA</td>
<td>:</td>
<td><input type="number" name="mapel14" value="<?= $getrapor['mapel14']; ?>" class="form-control"required>
</td>
</tr>
<tr>
<td>IPS</td>
<td>:</td>
<td><input type="number" name="mapel15" value="<?= $getrapor['mapel15']; ?>" class="form-control"required>
</td>
</tr>
<tr>
<td align="right" colspan="3"><b>Kelas 8 Semester 2 </b></td>
</tr>
<tr>
<td>Bahasa Indonesia</td>
<td>:</td>
<td><input type="number" name="mapel16" value="<?= $getrapor['mapel16']; ?>" class="form-control"required>
</td>
</tr>
<tr>
<td>Bahasa Inggris</td>
<td>:</td>
<td><input type="number" name="mapel17" value="<?= $getrapor['mapel17']; ?>" class="form-control"required>
</td>
</tr>
<tr>
<td>Matematika</td>
<td>:</td>
<td><input type="number" name="mapel18" value="<?= $getrapor['mapel18']; ?>" class="form-control"required>
</td>
</tr>
<tr>
<td>IPA</td>
<td>:</td>
<td><input type="number" name="mapel19" value="<?= $getrapor['mapel19']; ?>" class="form-control"required>
</td>
</tr>
<tr>
<td>IPS</td>
<td>:</td>
<td><input type="number" name="mapel20" value="<?= $getrapor['mapel20']; ?>" class="form-control"required>
</td>
</tr>

	</table>
    
    
    </div>

<table class="table">
	<tr>
		<td width="30%"></td>
		<td></td>
		<td>
        <input class="form-control" type="hidden" name="user_id" value="<?= $user['id']; ?>" />
		<input type="submit" value="Simpan" name="submit"class="btn btn-success">&nbsp;
		<a href="<?= base_url('siswa') ?>"><span class="btn btn-warning">Batal</span></a>&nbsp;
		</td>
	</tr>
</table>
</form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->