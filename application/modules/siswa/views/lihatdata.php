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
                <h3 class="box-title"><?= $title; ?></h3>
            </div>
            <div class="box-body">
            <?= $this->session->flashdata('message') ?>
            <b>catatan : </b><br>
            Apabila terdapat ketidaksesuaian data harap menghubungi TataUsaha untuk dilakukan perbaikan data
<table class="table table-striped table-hover">
<tr>
		<td align="right" colspan="3"><b>Data Siswa</b></td>
	</tr>
<tr>
		<td>No Formulir</td>
		<td>:</td>
		<td><input type="text" name="noformulir" value="<?= $getsiswa['noformulir']; ?>"  
		class="form-control <?php echo form_error('noformulir') ? 'is-invalid' : '' ?>"readonly>
		<div class="invalid-feedback">
		<?= form_error('noformulir') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Nama Siswa*</td>
		<td>:</td>
		<td><input type="text" name="namasiswa" value="<?= set_value('namasiswa', isset($getsiswa['namasiswa']) ?$getsiswa['namasiswa']:'') ?>"  
		class="form-control <?php echo form_error('namasiswa') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('namasiswa') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Panggilan Siswa</td>
		<td>:</td>
		<td><input type="text" name="panggilansiswa"value="<?= set_value('panggilansiswa', isset($getsiswa['panggilansiswa']) ?$getsiswa['panggilansiswa']:'') ?>"  
		class="form-control <?php echo form_error('panggilansiswa') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('panggilansiswa') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Tempat Lahir*</td>
		<td>:</td>
		<td><input type="text" name="tempatlahirsiswa" value="<?= set_value('tempatlahirsiswa', isset($getsiswa['tempatlahirsiswa']) ?$getsiswa['tempatlahirsiswa']:'') ?>"  
		class="form-control <?php echo form_error('tempatlahirsiswa') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('tempatlahirsiswa') ?>
		</div>
		</td>
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
<tr>
		<td>Tinggi Badan CM*</td>
		<td>:</td>
		<td><input type="text" name="tinggisiswa"value="<?= set_value('tinggisiswa', isset($getsiswa['tinggisiswa']) ?$getsiswa['tinggisiswa']:'') ?>"  
		class="form-control <?php echo form_error('tinggisiswa') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('tinggisiswa') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Berat Badan KG*</td>
		<td>:</td>
		<td><input type="text" name="beratsiswa" value="<?= set_value('beratsiswa', isset($getsiswa['beratsiswa']) ?$getsiswa['beratsiswa']:'') ?>"   
		class="form-control <?php echo form_error('beratsiswa') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('beratsiswa') ?>
		</div>
		</td>
	</tr>
<tr>
	<td>Jenis Kelamin</td>
		<td>:</td>
	<td>
	<select name="kelaminsiswa" id="kelaminsiswa" class="form-control <?= form_error('kelaminsiswa') ? 'is-invalid' : '' ?>">
		<?php foreach ($m_kelamin as $dt) : ?>
			<option value="<?= $dt['nama']; ?>"<?= set_select('kelaminsiswa', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['kelaminsiswa'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
			<?php endforeach; ?>
		</select>
		<div class="invalid-feedback">
		<?= form_error('kelaminsiswa') ?>
		</div>
		</td>

    </td>
</tr>
<tr>
	<td>Agama</td>
		<td>:</td>
	<td>	<select name="agamasiswa" id="agamasiswa" class="form-control <?= form_error('agamasiswa') ? 'is-invalid' : '' ?>">
		<?php foreach ($m_agama as $dt) : ?>
			<option value="<?= $dt['nama']; ?>"<?= set_select('agamasiswa', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['agamasiswa'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
			<?php endforeach; ?>
		</select>
		<div class="invalid-feedback">
		<?= form_error('agamasiswa') ?>
		</div>
		</td>

    </td>
</tr>
<tr>
	<td>Kewarganegaraan</td>
		<td>:</td>
	<td><input type="text" name="warganegarasiswa" value="<?= set_value('warganegarasiswa', isset($getsiswa['warganegarasiswa']) ?$getsiswa['warganegarasiswa']:'') ?>"  
		class="form-control <?php echo form_error('warganegarasiswa') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('warganegarasiswa') ?>
		</div>
		</td>
</tr>	
<tr>
		<td>Nomor Induk Siswa Nasional (NISN)</td>
		<td>:</td>
		<td><input type="text" name="nisn" value="<?= set_value('nisn', isset($getsiswa['nisn']) ?$getsiswa['nisn']:'') ?>" 
		class="form-control <?php echo form_error('nisn') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('nisn') ?>
		</div>
		</td>
<tr>
		<td>Nomor Induk Kependudukan (NIK)*</td>
		<td>:</td>
		<td><input type="text" name="nik" value="<?= set_value('nik', isset($getsiswa['nik']) ?$getsiswa['nik']:'') ?>"  
		class="form-control <?php echo form_error('nik') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('nik') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Nomor Akta Lahir</td>
		<td>:</td>
		<td><input type="text" name="noakta" value="<?= set_value('noakta', isset($getsiswa['noakta']) ?$getsiswa['noakta']:'') ?>"  
		class="form-control <?php echo form_error('noakta') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('noakta') ?>
		</div>
		</td>
	</tr>
	<tr>
		<td>Email*</td>
		<td>:</td>
		<td><input type="text" name="emailsiswa" value="<?= set_value('emailsiswa', isset($getsiswa['emailsiswa']) ?$getsiswa['emailsiswa']:'') ?>"  
		class="form-control <?php echo form_error('emailsiswa') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('emailsiswa') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Alamat Lengkap*</td>
		<td>:</td>
		<td><input type="text" name="alamatsiswa" value="<?= set_value('alamatsiswa', isset($getsiswa['alamatsiswa']) ?$getsiswa['alamatsiswa']:'') ?>"  
		class="form-control <?php echo form_error('alamatsiswa') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('alamatsiswa') ?>
		</div>
		</td>
	</tr>
<tr>
	<td>Propinsi*</td>
		<td>:</td>
	<td><input type="text" name="propinsisiswa" value="<?= set_value('propinsisiswa', isset($getsiswa['propinsisiswa']) ?$getsiswa['propinsisiswa']:'') ?>"  
		class="form-control <?php echo form_error('propinsisiswa') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('propinsisiswa') ?>
		</div>
		</td>
</tr>
<tr>
	<td>Kota*/td>
		<td>:</td>
	<td><input type="text" name="kotasiswa"value="<?= set_value('kotasiswa', isset($getsiswa['kotasiswa']) ?$getsiswa['kotasiswa']:'') ?>"  
		class="form-control <?php echo form_error('kotasiswa') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('kotasiswa') ?>
		</div>
		</td>
</tr>
<tr>
		<td>Kecamatan*</td>
		<td>:</td>
		<td><input type="text" name="kecamatan" value="<?= set_value('kecamatan', isset($getsiswa['kecamatan']) ?$getsiswa['kecamatan']:'') ?>"  
		class="form-control <?php echo form_error('kecamatan') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('kecamatan') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Kelurahan*</td>
		<td>:</td>
		<td><input type="text" name="kelurahan" value="<?= set_value('kelurahan', isset($getsiswa['kelurahan']) ?$getsiswa['kelurahan']:'') ?>"    
		class="form-control <?php echo form_error('kelurahan') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('kelurahan') ?>
		</div>
		</td>
	</tr>	
<tr>
		<td>Kode Pos</td>
		<td>:</td>
		<td><input type="text" name="kodepossiswa" value="<?= set_value('kodepossiswa', isset($getsiswa['kodepossiswa']) ?$getsiswa['kodepossiswa']:'') ?>"  
		class="form-control <?php echo form_error('kodepossiswa') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('kodepossiswa') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>No. Telp Rumah</td>
		<td>:</td>
		<td><input type="text" name="teleponsiswa" value="<?= set_value('teleponsiswa', isset($getsiswa['teleponsiswa']) ?$getsiswa['teleponsiswa']:'') ?>"  
		class="form-control <?php echo form_error('teleponsiswa') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('teleponsiswa') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>No. HP*</td>
		<td>:</td>
		<td><input type="text" name="hpsiswa" value="<?= set_value('hpsiswa', isset($getsiswa['hpsiswa']) ?$getsiswa['hpsiswa']:'') ?>"  
		class="form-control <?php echo form_error('hpsiswa') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('hpsiswa') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Sekolah Asal*</td>
		<td>:</td>
		<td><input type="text" name="sekolahasal" value="<?= set_value('sekolahasal', isset($getsiswa['sekolahasal']) ?$getsiswa['sekolahasal']:'') ?>"  
		class="form-control <?php echo form_error('sekolahasal') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('sekolahasal') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Alamat Sekolah Asal</td>
		<td>:</td>
		<td><input type="text" name="alamatsekolahasal" value="<?= set_value('alamatsekolahasal', isset($getsiswa['alamatsekolahasal']) ?$getsiswa['alamatsekolahasal']:'') ?>"   
		class="form-control <?php echo form_error('alamatsekolahasal') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('alamatsekolahasal') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Nomor Ijazah</td>
		<td>:</td>
		<td><input type="text" name="ijazah" value="<?= set_value('ijazah', isset($getsiswa['ijazah']) ?$getsiswa['ijazah']:'') ?>" 
		class="form-control <?php echo form_error('ijazah') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('ijazah') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Nomor SKHUN</td>
		<td>:</td>
		<td><input type="text" name="skhun"value="<?= set_value('skhun', isset($getsiswa['skhun']) ?$getsiswa['skhun']:'') ?>"  
		class="form-control <?php echo form_error('skhun') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('skhun') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Nomor Peserta UN</td>
		<td>:</td>
		<td><input type="text" name="nopesertaun" value="<?= set_value('nopesertaun', isset($getsiswa['nopesertaun']) ?$getsiswa['nopesertaun']:'') ?>"  
		class="form-control <?php echo form_error('nopesertaun') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('nopesertaun') ?>
		</div>
		</td>
	</tr>		
<tr>
	<td>Status dalam keluarga (Kandung,Tiri,Angkat)</td>
		<td>:</td>
	<td><select name="statusanak" id="statusanak" class="form-control <?= form_error('statusanak') ? 'is-invalid' : '' ?>">
		<?php foreach ($m_statusanak as $dt) : ?>
			<option value="<?= $dt['nama']; ?>"<?= set_select('statusanak', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['statusanak'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
			<?php endforeach; ?>
		</select>
		<div class="invalid-feedback">
		<?= form_error('statusanak') ?>
		</div>
		</td>
</tr>
<tr>
		<td>Anak Ke*</td>
		<td>:</td>
		<td><input type="text" name="anakke" value="<?= set_value('anakke', isset($getsiswa['anakke']) ?$getsiswa['anakke']:'') ?>"  
		class="form-control <?php echo form_error('anakke') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('anakke') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Jumlah Saudara (sesuai Kartu Keluarga)*</td>
		<td>:</td>
		<td><input type="text" name="jumlahsaudara" value="<?= set_value('jumlahsaudara', isset($getsiswa['jumlahsaudara']) ?$getsiswa['jumlahsaudara']:'') ?>"  
		class="form-control <?php echo form_error('jumlahsaudara') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('jumlahsaudara') ?>
		</div>
		</td>
	</tr>
<tr>
	<td>Bahasa Sehari-hari</td>
		<td>:</td>
	<td><input type="text" name="bahasasiswa" value="<?= set_value('bahasasiswa', isset($getsiswa['bahasasiswa']) ?$getsiswa['bahasasiswa']:'') ?>"  
		class="form-control <?php echo form_error('bahasasiswa') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('bahasasiswa') ?>
		</div>
		</td>
</tr>
<tr>
		<td>Jarak Rumah ke Sekolah (Kilometer)</td>
		<td>:</td>
		<td><input type="text" name="jarak" value="<?= set_value('jarak', isset($getsiswa['jarak']) ?$getsiswa['jarak']:'') ?>"  
		class="form-control <?php echo form_error('jarak') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('jarak') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Alat Transportasi</td>
		<td>:</td>
		<td><input type="text" name="transportasi" value="<?= set_value('transportasi', isset($getsiswa['transportasi']) ?$getsiswa['transportasi']:'') ?>"  
		class="form-control <?php echo form_error('transportasi') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('transportasi') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Jenis Tinggal (Orangtua,Wali,Kost)</td>
		<td>:</td>
		<td><input type="text" name="jenistinggal" value="<?= set_value('jenistinggal', isset($getsiswa['jenistinggal']) ?$getsiswa['jenistinggal']:'') ?>"  
		class="form-control <?php echo form_error('jenistinggal') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('jenistinggal') ?>
		</div>
		</td>
	</tr>
	<tr>
		<td align="right" colspan="3"><b>Data Ayah</b></td>
	</tr>
<tr>
	<td width="30%">Ayah Masih Hidup</td>
		<td>:</td>
	<td><select name="statusayah" id="statusayah" class="form-control <?= form_error('statusayah') ? 'is-invalid' : '' ?>">
		<?php foreach ($m_statusortu as $dt) : ?>
			<option value="<?= $dt['nama']; ?>"<?= set_select('statusayah', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['statusayah'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
			<?php endforeach; ?>
		</select>
		<div class="invalid-feedback">
		<?= form_error('statusayah') ?>
		</div>
		</td>
</tr>
<tr>
		<td>NIK Ayah*</td>
		<td>:</td>
		<td><input type="text" name="nikayah" value="<?= set_value('nikayah', isset($getsiswa['nikayah']) ?$getsiswa['nikayah']:'') ?>"  
		class="form-control <?php echo form_error('nikayah') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('nikayah') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Nama Ayah*</td>
		<td>:</td>
		<td><input type="text" name="namaayah" value="<?= set_value('namaayah', isset($getsiswa['namaayah']) ?$getsiswa['namaayah']:'') ?>"  
		class="form-control <?php echo form_error('namaayah') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('namaayah') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Tempat Lahir</td>
		<td>:</td>
		<td><input type="text" name="tempatlahirayah" value="<?= set_value('tempatlahirayah', isset($getsiswa['tempatlahirayah']) ?$getsiswa['tempatlahirayah']:'') ?>"  
		class="form-control <?php echo form_error('tempatlahirayah') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('tempatlahirayah') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Tanggal Lahir</td>
		<td>:</td>
		<td><input type="text" name="tanggallahirayah"  id="tanggallahirayah" value="<?= set_value('tanggallahirayah', isset($getsiswa['tanggallahirayah']) ?$getsiswa['tanggallahirayah']:'') ?>">
		<div class="invalid-feedback">
		<?= form_error('tanggallahirayah') ?>
		</div>
		</td>
	</tr>
<tr>
	<td>Agama</td>
		<td>:</td>
	<td><select name="agamaayah" id="agamaayah" class="form-control <?= form_error('agamaayah') ? 'is-invalid' : '' ?>">
		<?php foreach ($m_agama as $dt) : ?>
			<option value="<?= $dt['nama']; ?>"<?= set_select('agamaayah', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['agamaayah'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
			<?php endforeach; ?>
		</select>
		<div class="invalid-feedback">
		<?= form_error('agamaayah') ?>
		</div>
		</td>
</tr>
<tr>
		<td>Alamat Lengkap*</td>
		<td>:</td>
		<td><input type="text" name="alamatayah" value="<?= set_value('alamatayah', isset($getsiswa['alamatayah']) ?$getsiswa['alamatayah']:'') ?>"  
		class="form-control <?php echo form_error('alamatayah') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('alamatayah') ?>
		</div>
		</td>
	</tr>
<tr>
	<td>Propinsi*</td>
		<td>:</td>
	<td><input type="text" name="propinsiayah" value="<?= set_value('propinsiayah', isset($getsiswa['propinsiayah']) ?$getsiswa['propinsiayah']:'') ?>"  
		class="form-control <?php echo form_error('propinsiayah') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('propinsiayah') ?>
		</div>
		</td>
</tr>
<tr>
	<td>Kota*</td>
		<td>:</td>
	<td><input type="text" name="kotaayah" value="<?= set_value('kotaayah', isset($getsiswa['kotaayah']) ?$getsiswa['propinsiayah']:'') ?>"  
		class="form-control <?php echo form_error('kotaayah') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('kotaayah') ?>
		</div>
		</td>
</tr>
<tr>
		<td>No. Telp Rumah</td>
		<td>:</td>
		<td><input type="text" name="teleponayah" value="<?= set_value('teleponayah', isset($getsiswa['teleponayah']) ?$getsiswa['teleponayah']:'') ?>"  
		class="form-control <?php echo form_error('teleponayah') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('teleponayah') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>No. HP*</td>
		<td>:</td>
		<td><input type="text" name="hpayah" value="<?= set_value('hpayah', isset($getsiswa['hpayah']) ?$getsiswa['hpayah']:'') ?>"  
		class="form-control <?php echo form_error('hpayah') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('hpayah') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Pendidikan Terakhir</td>
		<td>:</td>
		<td><select name="pendidikanayah" id="pendidikanayah" class="form-control <?= form_error('pendidikanayah') ? 'is-invalid' : '' ?>">
		<?php foreach ($m_pendidikan as $dt) : ?>
			<option value="<?= $dt['nama']; ?>"<?= set_select('pendidikanayah', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['pendidikanayah'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
			<?php endforeach; ?>
		</select>
		<div class="invalid-feedback">
		<?= form_error('pendidikanayah') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Pekerjaan Ayah*</td>
		<td>:</td>
		<td><input type="text" name="pekerjaanayah" value="<?= set_value('pekerjaanayah', isset($getsiswa['pekerjaanayah']) ?$getsiswa['pekerjaanayah']:'') ?>"   
		class="form-control <?php echo form_error('pekerjaanayah') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('pekerjaanayah') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Penghasilan Ayah (Rata-Rata per Bulan)</td>
		<td>:</td>
		<td><input type="text" id="gajiayah" name="gajiayah" value="<?= set_value('gajiayah', isset($getsiswa['gajiayah']) ?$getsiswa['gajiayah']:'') ?>"  
		class="form-control <?php echo form_error('gajiayah') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('gajiayah') ?>
		</div>
		</td>
	</tr>
	<tr>
		<td align="right" colspan="3"><b>Data Ibu</b></td>
	</tr>
<tr>
	<td width="30%">Ibu Masih Hidup</td>
		<td>:</td>
	<td><select name="statusibu" id="statusibu" class="form-control <?= form_error('statusibu') ? 'is-invalid' : '' ?>">
		<?php foreach ($m_statusortu as $dt) : ?>
			<option value="<?= $dt['nama']; ?>"<?= set_select('statusibu', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['statusibu'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
			<?php endforeach; ?>
		</select>
		<div class="invalid-feedback">
		<?= form_error('statusibu') ?>
		</div>
		</td>
</tr>
<tr>
		<td>NIK Ibu*</td>
		<td>:</td>
		<td><input type="text" name="nikibu" value="<?= set_value('nikibu', isset($getsiswa['nikibu']) ?$getsiswa['nikibu']:'') ?>" 
		class="form-control <?php echo form_error('nikibu') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('nikibu') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Nama Ibu*</td>
		<td>:</td>
		<td><input type="text" name="namaibu"  value="<?= set_value('namaibu', isset($getsiswa['namaibu']) ?$getsiswa['namaibu']:'') ?>"  
		class="form-control <?php echo form_error('namaibu') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('namaibu') ?>
		</div>
		</td>
<tr>
		<td>Tempat Lahir</td>
		<td>:</td>
		<td><input type="text" name="tempatlahiribu" value="<?= set_value('tempatlahiribu', isset($getsiswa['tempatlahiribu']) ?$getsiswa['tempatlahiribu']:'') ?>"  
		class="form-control <?php echo form_error('tempatlahiribu') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('tempatlahiribu') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Tanggal Lahir</td>
		<td>:</td>
		<td><input type="text" name="tanggalahiribu"  id="tanggalahiribu"  value="<?= set_value('tanggalahiribu', isset($getsiswa['tanggalahiribu']) ?$getsiswa['tanggalahiribu']:'') ?>" >
		<div class="invalid-feedback">
		<?= form_error('tanggalahiribu') ?>
		</div>
		</td>
	</tr>
<tr>
	<td>Agama</td>
		<td>:</td>
	<td><select name="agamaibu" id="agamaibu" class="form-control <?= form_error('agamaibu') ? 'is-invalid' : '' ?>">
		<?php foreach ($m_agama as $dt) : ?>
			<option value="<?= $dt['nama']; ?>"<?= set_select('agamaibu', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['agamaibu'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
			<?php endforeach; ?>
		</select>
		<div class="invalid-feedback">
		<?= form_error('agamaibu') ?>
		</div>
		</td>
</tr>
<tr>
		<td>Alamat Lengkap*</td>
		<td>:</td>
		<td><input type="text" name="alamatibu"   value="<?= set_value('alamatibu', isset($getsiswa['alamatibu']) ?$getsiswa['alamatibu']:'') ?>"  
		class="form-control <?php echo form_error('alamatibu') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('alamatibu') ?>
		</div>
		</td>
	</tr>
<tr>
	<td>Propinsi*</td>
		<td>:</td>
	<td><input type="text" name="propinsiibu"  value="<?= set_value('propinsiibu', isset($getsiswa['propinsiibu']) ?$getsiswa['propinsiibu']:'') ?>"  
		class="form-control <?php echo form_error('propinsiibu') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('propinsiibu') ?>
		</div>
		</td>
</tr>
<tr>
	<td>Kota*</td>
		<td>:</td>
	<td><input type="text" name="kotaibu" value="<?= set_value('kotaibu', isset($getsiswa['kotaibu']) ?$getsiswa['kotaibu']:'') ?>"   
		class="form-control <?php echo form_error('kotaibu') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('kotaibu') ?>
		</div>
		</td>
</tr>
<tr>
		<td>No. Telp Rumah</td>
		<td>:</td>
		<td><input type="text" name="teleponibu" value="<?= set_value('teleponibu', isset($getsiswa['teleponibu']) ?$getsiswa['teleponibu']:'') ?>"  
		class="form-control <?php echo form_error('teleponibu') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('teleponibu') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>No. HP*</td>
		<td>:</td>
		<td><input type="text" name="hpibu" value="<?= set_value('hpibu', isset($getsiswa['hpibu']) ?$getsiswa['hpibu']:'') ?>"  
		class="form-control <?php echo form_error('hpibu') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('hpibu') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Pendidikan Terakhir</td>
		<td>:</td>
		<td><select name="pendidikanibu" id="pendidikanibu" class="form-control <?= form_error('pendidikanibu') ? 'is-invalid' : '' ?>">
		<?php foreach ($m_pendidikan as $dt) : ?>
			<option value="<?= $dt['nama']; ?>"<?= set_select('pendidikanibu', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['pendidikanibu'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
			<?php endforeach; ?>
		</select>
		<div class="invalid-feedback">
		<?= form_error('pendidikanibu') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Pekerjaan Ibu*</td>
		<td>:</td>
		<td><input type="text" name="pekerjaanibu" value="<?= set_value('pekerjaanibu', isset($getsiswa['pekerjaanibu']) ?$getsiswa['pekerjaanibu']:'') ?>"  
		class="form-control <?php echo form_error('pekerjaanibu') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('pekerjaanibu') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Penghasilan Ibu (Rata-Rata per Bulan)</td>
		<td>:</td>
		<td><input type="text" id="gajiibu" name="gajiibu" value="<?= set_value('gajiibu', isset($getsiswa['gajiibu']) ?$getsiswa['gajiibu']:'') ?>"   
		class="form-control <?php echo form_error('gajiibu') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('gajiibu') ?>
		</div>
		</td>
	</tr>
	<tr>
		<td align="right" colspan="3"><b>Data Wali</b></td>
	</tr>
<tr>
	<td width="30%">Wali Masih Hidup</td>
		<td>:</td>
	<td><select name="statuswali" id="statuswali" class="form-control <?= form_error('statuswali') ? 'is-invalid' : '' ?>">
		<?php foreach ($m_statusortu as $dt) : ?>
			<option value="<?= $dt['nama']; ?>"<?= set_select('statuswali', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['statuswali'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
			<?php endforeach; ?>
		</select>
		<div class="invalid-feedback">
		<?= form_error('statuswali') ?>
		</div>
		</td>
</tr>
<tr>
		<td>Nama Wali</td>
		<td>:</td>
		<td><input type="text" name="namawali" value="<?= set_value('namawali', isset($getsiswa['namawali']) ?$getsiswa['namawali']:'') ?>"  
		class="form-control <?php echo form_error('namawali') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('namawali') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Tempat Lahir</td>
		<td>:</td>
		<td><input type="text" name="tempatlahirwali"  value="<?= set_value('tempatlahirwali', isset($getsiswa['tempatlahirwali']) ?$getsiswa['tempatlahirwali']:'') ?>"  
		class="form-control <?php echo form_error('tempatlahirwali') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('tempatlahirwali') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Tanggal Lahir</td>
		<td>:</td>
		<td><input type="text" name="tanggallahirwali"  id="tanggallahirwali"  value="<?= set_value('tanggallahirwali', isset($getsiswa['tanggallahirwali']) ?$getsiswa['tanggallahirwali']:'') ?>">
		<div class="invalid-feedback">
		<?= form_error('tanggallahirwali') ?>
		</div>
		</td>
	</tr>
<tr>
	<td>Agama</td>
		<td>:</td>
	<td><select name="agamawali" id="agamawali" class="form-control <?= form_error('agamawali') ? 'is-invalid' : '' ?>">
		<?php foreach ($m_agama as $dt) : ?>
			<option value="<?= $dt['nama']; ?>"<?= set_select('agamawali', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['agamawali'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
			<?php endforeach; ?>
		</select>
		<div class="invalid-feedback">
		<?= form_error('agamawali') ?>
		</div>
		</td>
</tr>
<tr>
		<td>Alamat Lengkap</td>
		<td>:</td>
		<td><input type="text" name="alamatwali" value="<?= set_value('alamatwali', isset($getsiswa['alamatwali']) ?$getsiswa['alamatwali']:'') ?>"  
		class="form-control <?php echo form_error('alamatwali') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('alamatwali') ?>
		</div>
		</td>
	</tr>
<tr>
	<td>Propinsi</td>
		<td>:</td>
	<td><input type="text" name="propinsiwali" value="<?= set_value('propinsiwali', isset($getsiswa['propinsiwali']) ?$getsiswa['propinsiwali']:'') ?>"  
		class="form-control <?php echo form_error('propinsiwali') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('propinsiwali') ?>
		</div>
		</td>
</tr>
<tr>
	<td>Kota</td>
		<td>:</td>
	<td><input type="text" name="kotawali" value="<?= set_value('kotawali', isset($getsiswa['kotawali']) ?$getsiswa['kotawali']:'') ?>"  
		class="form-control <?php echo form_error('kotawali') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('kotawali') ?>
		</div>
		</td>
</tr>
<tr>
		<td>No. Telp Rumah</td>
		<td>:</td>
		<td><input type="text" name="teleponwali"  value="<?= set_value('teleponwali', isset($getsiswa['teleponwali']) ?$getsiswa['teleponwali']:'') ?>" 
		class="form-control <?php echo form_error('teleponwali') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('teleponwali') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>No. HP</td>
		<td>:</td>
		<td><input type="text" name="hpwali" value="<?= set_value('hpwali', isset($getsiswa['hpwali']) ?$getsiswa['hpwali']:'') ?>"  
		class="form-control <?php echo form_error('hpwali') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('hpwali') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Pendidikan Terakhir</td>
		<td>:</td>
		<td><select name="pendidikanwali" id="pendidikanwali" class="form-control <?= form_error('pendidikanwali') ? 'is-invalid' : '' ?>">
		<?php foreach ($m_pendidikan as $dt) : ?>
			<option value="<?= $dt['nama']; ?>"<?= set_select('pendidikanwali', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['pendidikanwali'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
			<?php endforeach; ?>
		</select>
		<div class="invalid-feedback">
		<?= form_error('pendidikanwali') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Pekerjaan Wali</td>
		<td>:</td>
		<td><input type="text" name="pekerjaanwali" value="<?= set_value('pekerjaanwali', isset($getsiswa['pekerjaanwali']) ?$getsiswa['pekerjaanwali']:'') ?>"  
		class="form-control <?php echo form_error('pekerjaanwali') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('pekerjaanwali') ?>
		</div>
		</td>
	</tr>
<tr>
		<td>Penghasilan Wali (Rata-Rata per Bulan)</td>
		<td>:</td>
		<td><input type="text" id="gajiwali" name="gajiwali"value="<?= set_value('gajiwali', isset($getsiswa['gajiwali']) ?$getsiswa['gajiwali']:'') ?>"  
		class="form-control <?php echo form_error('gajiwali') ? 'is-invalid' : '' ?>">
		<div class="invalid-feedback">
		<?= form_error('gajiwali') ?>
		</div>
		</td>
	</tr>
<tr>
	<td>Foto Lama</td>
		<td>:</td>
	<td><img src="<?= base_url('assets/images/siswa/'.$getsiswa['image']) ?>" class="img-responsive" alt=""></td>
</tr>

	</table></div>

<table class="table">
	<tr>
		<td width="30%"></td>
		<td></td>
		<td>
		<a href="<?= base_url('siswa/cetakprofile/'.$getsiswa['id']) ?>"target="new"><span class="btn btn-primary">Cetak Data</span></a>
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