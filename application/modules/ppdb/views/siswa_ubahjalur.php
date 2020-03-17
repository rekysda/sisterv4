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
                <h3 class="box-title">Edit Jalur</h3>
            </div>
<div class="box-body">
<?= $this->session->flashdata('message') ?>
<?php $siswa_sekolah = $getsiswabyId['sekolah_id']; ?>
<?php $siswa_tahun_ppdb = $getsiswabyId['tahun_ppdb']; ?>
<?php $siswa_gelombang = $getsiswabyId['gelombang_id']; ?>
<?php $siswa_jalur = $getsiswabyId['jalur_id']; ?>
<form  method="post" action="<?php base_url('ppdb/siswa_ubahjalur') ?>" enctype ="multipart/form-data" id="posts">
<table class="table table-striped table-hover">
<tr>
		<td>NoFormulir</td>
		<td>:</td>
		<td><input type="text" name="noformulir" value="<?= $getsiswabyId['noformulir'] ?>"  class="form-control"readonly></td>
	</tr>
<tr>
		<td>Nama Siswa*</td>
		<td>:</td>
		<td><input type="text" name="namasiswa" value="<?= $getsiswabyId['namasiswa'] ?>" class="form-control"readonly></td>
	</tr>
<tr>
	<td>Foto</td>
		<td>:</td>
	<td><img src="<?= base_url('assets/images/siswa/'.$getsiswabyId['image']) ?>"class="img img-responsive"width="100px"> </td>
</tr>
<tr>
	<td>Sekolah </td>
		<td></td>
	<td><select name="sekolah_id" id="sekolah_id" class="form-control <?= form_error('sekolah_id') ? 'is-invalid' : '' ?>">
                            <option value="">== Sekolah ==</option>
                            <?php foreach ($sekolah as $dt) : ?>
                                <option value="<?= $dt['id']; ?>"<?= $dt['id'] == $siswa_sekolah ? ' selected="selected"' : ''; ?>><?= $dt['sekolah']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('sekolah_id') ?>
                        </div></td>
</tr>

<tr>
	<td>Tahun PPDB <?php $tahun_ppdb= getdefault('tahun_ppdb_default'); ?></td>
		<td></td>
	<td><select name="tahun_ppdb" id="tahun_ppdb" class="form-control <?= form_error('tahun_ppdb') ? 'is-invalid' : '' ?>">
  <?php $tahunn = (date("Y")+1);
                      for($n=2019; $n<=$tahunn; $n++){ 
                        if ($getsiswabyId['tahun_ppdb'] == $n){
                          echo "<option value='$n' selected>$n</option>";
                        }else{
                          echo "<option value='$n'>$n</option>";
                        }
                      } 
                      ?> 
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('tahun_ppdb') ?>
                        </div></td>
</tr>
<tr>
	<td>Gelombang </td>
		<td></td>
	<td><select name="gelombang_id" id="gelombang_id" class="form-control <?= form_error('gelombang_id') ? 'is-invalid' : '' ?>">
                            <option value="">== Gelombang ==</option>
                            <?php foreach ($gelombang as $dt) : ?>
                                <option value="<?= $dt['gelombang_id']; ?>"<?= $dt['gelombang_id'] == $siswa_gelombang ? ' selected="selected"' : ''; ?>><?= $dt['gelombang']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('gelombang_id') ?>
                        </div></td>
</tr>

<tr>
	<td>Jalur </td>
		<td></td>
	<td><select name="jalur_id" id="jalur_id" class="form-control <?= form_error('jalur_id') ? 'is-invalid' : '' ?>">
                            <option value="">== Jalur ==</option>
                            <?php foreach ($jalur as $dt) : ?>
                                <option value="<?= $dt['jalur_id']; ?>"<?= $dt['jalur_id'] == $siswa_jalur ? ' selected="selected"' : ''; ?>><?= $dt['jalur']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('jalur') ?>
                        </div></td>
</tr>
<tr>
	<td>Keterangan </td>
		<td></td>
	<td><input class="form-control" type="text"  name="keterangan" value="<?= $ket['keterangan'] ?>"/><br>
  * Gunakan keterangan untuk siswa, misal potongan untuk UDP. 
</td>
</tr>
<tr>
	<td>Setting Nominal SPP per Bulan </td>
		<td></td>
	<td><input class="form-control" type="text"  name="nominal" value="<?= $siswaspp['nominal'] ?>"/>
</td>
</tr>
	<tr>
		<td></td>
		<td></td>
		<td>
        <input class="form-control" type="hidden" name="user_id" value="<?= $user['id']; ?>" />
		<input type="submit" value="Simpan" name="submit"class="btn btn-success">&nbsp;
		<a href="<?= base_url('ppdb/siswa_ubahjalur/'.$siswa_id['id']) ?>"><span class="btn btn-warning">Batal</span>&nbsp;
		<a href="<?= base_url('ppdb/siswajalur') ?>"><span class="btn btn-primary">Kembali</span></a>
		</td>
	</tr>
</table>
</form>
            </div>
    
        <!-- /.box-body -->
        <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Rincian Biaya Siswa pada PPDB</h3>
      </div>
      <div class="box-body">

      <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Biaya</th>
              <th scope="col">Nominal</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($siswa_keuangan as $dt) : ?>
            <?php if(($dt['siswa_id']== $siswa_id)and($dt['nominal']>=0)and($dt['jenis']='ppdb')) {  ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $dt['biaya']; ?><br>[<?= $dt['jenis']; ?>]</td>
                <td>
                <input class="form-biayajalur" type="text"  name="nominal" value="<?= $dt['nominal']; ?>"data-id="<?= $dt['id']; ?>"data-siswa="<?= $dt['siswa_id']; ?>"/>     
                </td>
                <td><a href="<?= base_url('ppdb/hapusbiayasiswa/' . $dt['id'].'/'.$siswa_id); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a></td>
              </tr>
              <?php $total += $dt['nominal']; ?>
              <?php $i++; ?>
              <?php } ?>
            <?php endforeach; ?>
            <tr>
              <th scope="col"></th>
              <th scope="col">Total</th>
              <th scope="col"><?= nominal($total); ?></th>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->