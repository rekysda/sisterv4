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
			<li>Akademik</li>
      <li><?= $title; ?></li>
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
				<?php $tahun_ppdb = $getsiswa['tahun_ppdb'] ?>
				<form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="posts">
					<h4>Data Siswa</h4>
					<hr>
					<div class="form-group <?= form_error('tahun_ppdb') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Tahun PPDB / Masuk <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<select name='tahun_ppdb' class='form-control'>
								<option value='' selected>- Tahun -</option>
								<?php $tahunn = date("Y")+5;
								for ($n = 2017; $n <= $tahunn; $n++) : ?>
									<option value="<?= $n ?>" <?= $tahun_ppdb == $n ? 'selected' : '' ?>><?= $n ?></option>
								<?php endfor ?>
							</select>
						</div>
					</div>
					<div class="form-group <?= form_error('noformulir') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">No Formulir</label>
						<div class="col-sm-10">
							<input type="text" name="noformulir" value="<?= set_value('noformulir', isset($getsiswa['noformulir']) ? $getsiswa['noformulir'] : '') ?>" class="form-control <?php echo form_error('noformulir') ? 'is-invalid' : '' ?>">
							<?= form_error('noformulir', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('namasiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Nama Siswa <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="namasiswa" value="<?= set_value('namasiswa', isset($getsiswa['namasiswa']) ? $getsiswa['namasiswa'] : '') ?>" class="form-control <?php echo form_error('namasiswa') ? 'is-invalid' : '' ?>">
							<?= form_error('namasiswa', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('panggilansiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Panggilan Siswa</label>
						<div class="col-sm-10">
							<input type="text" name="panggilansiswa" value="<?= set_value('panggilansiswa', isset($getsiswa['panggilansiswa']) ? $getsiswa['panggilansiswa'] : '') ?>" class="form-control <?php echo form_error('panggilansiswa') ? 'is-invalid' : '' ?>">
							<?= form_error('panggilansiswa', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('tempatlahirsiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Tempat Lahir <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="tempatlahirsiswa" value="<?= set_value('tempatlahirsiswa', isset($getsiswa['tempatlahirsiswa']) ? $getsiswa['tempatlahirsiswa'] : '') ?>" class="form-control">
							<?= form_error('tempatlahirsiswa', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('tanggallahirsiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Tanggal Lahir <span class="text-danger">*</p></label>
						<div class="col-sm-3">
							<input type="text" name="tanggallahirsiswa" value="<?= set_value('tanggallahirsiswa', isset($getsiswa['tanggallahirsiswa']) ? $getsiswa['tanggallahirsiswa'] : '') ?>" class="form-control">
							<?= form_error('tanggallahirsiswa', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('tinggisiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Tinggi Badan CM <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="tinggisiswa" value="<?= set_value('tinggisiswa', isset($getsiswa['tinggisiswa']) ? $getsiswa['tinggisiswa'] : '') ?>" class="form-control <?php echo form_error('tinggisiswa') ? 'is-invalid' : '' ?>">
							<?= form_error('tinggisiswa', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('beratsiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Berat Badan KG <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="beratsiswa" value="<?= set_value('beratsiswa', isset($getsiswa['beratsiswa']) ? $getsiswa['beratsiswa'] : '') ?>" class="form-control <?php echo form_error('beratsiswa') ? 'is-invalid' : '' ?>">
							<?= form_error('beratsiswa', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('kelaminsiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Jenis Kelamin</label>
						<div class="col-sm-10">
							<select name="kelaminsiswa" class="form-control <?= form_error('kelaminsiswa') ? 'is-invalid' : '' ?>">
								<?php foreach ($m_kelamin as $dt) : ?>
									<option value="<?= $dt['nama']; ?>" <?= set_select('kelaminsiswa', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['kelaminsiswa'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('kelaminsiswa', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('agamasiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Agama</label>
						<div class="col-sm-10">
							<select name="agamasiswa" class="form-control <?= form_error('agamasiswa') ? 'is-invalid' : '' ?>">
								<?php foreach ($m_agama as $dt) : ?>
									<option value="<?= $dt['nama']; ?>" <?= set_select('agamasiswa', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['agamasiswa'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('agamasiswa', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('warganegarasiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Kewarganegaraan</label>
						<div class="col-sm-10">
							<input type="text" name="warganegarasiswa" value="<?= set_value('warganegarasiswa', isset($getsiswa['warganegarasiswa']) ? $getsiswa['warganegarasiswa'] : '') ?>" class="form-control <?php echo form_error('warganegarasiswa') ? 'is-invalid' : '' ?>">
							<?= form_error('warganegarasiswa', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('nisn') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Nomor Induk Siswa Nasional (NISN)</label>
						<div class="col-sm-10">
							<input type="text" name="nisn" value="<?= set_value('nisn', isset($getsiswa['nisn']) ? $getsiswa['nisn'] : '') ?>" class="form-control <?php echo form_error('nisn') ? 'is-invalid' : '' ?>">
							<?= form_error('nisn', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('nik') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Nomor Induk Kependudukan (NIK) <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="nik" value="<?= set_value('nik', isset($getsiswa['nik']) ? $getsiswa['nik'] : '') ?>" class="form-control <?php echo form_error('nik') ? 'is-invalid' : '' ?>">
							<?= form_error('nik', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('noakta') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Nomor Akta Lahir</label>
						<div class="col-sm-10">
							<input type="text" name="noakta" value="<?= set_value('noakta', isset($getsiswa['noakta']) ? $getsiswa['noakta'] : '') ?>" class="form-control <?php echo form_error('noakta') ? 'is-invalid' : '' ?>">
							<?= form_error('noakta', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('emailsiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Email <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="emailsiswa" value="<?= set_value('emailsiswa', isset($getsiswa['emailsiswa']) ? $getsiswa['emailsiswa'] : '') ?>" class="form-control <?php echo form_error('emailsiswa') ? 'is-invalid' : '' ?>">
							<?= form_error('emailsiswa', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('alamatsiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Alamat Lengkap <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="alamatsiswa" value="<?= set_value('alamatsiswa', isset($getsiswa['alamatsiswa']) ? $getsiswa['alamatsiswa'] : '') ?>" class="form-control <?php echo form_error('alamatsiswa') ? 'is-invalid' : '' ?>">
							<?= form_error('alamatsiswa', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('propinsisiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Propinsi <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="propinsisiswa" value="<?= set_value('propinsisiswa', isset($getsiswa['propinsisiswa']) ? $getsiswa['propinsisiswa'] : '') ?>" class="form-control <?php echo form_error('propinsisiswa') ? 'is-invalid' : '' ?>">
							<?= form_error('propinsisiswa', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('kotasiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Kota <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="kotasiswa" value="<?= set_value('kotasiswa', isset($getsiswa['kotasiswa']) ? $getsiswa['kotasiswa'] : '') ?>" class="form-control <?php echo form_error('kotasiswa') ? 'is-invalid' : '' ?>">
							<?= form_error('kotasiswa', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('kecamatan') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Kecamatan <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="kecamatan" value="<?= set_value('kecamatan', isset($getsiswa['kecamatan']) ? $getsiswa['kecamatan'] : '') ?>" class="form-control <?php echo form_error('kecamatan') ? 'is-invalid' : '' ?>">
							<?= form_error('kecamatan', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('kelurahan') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Kelurahan <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="kelurahan" value="<?= set_value('kelurahan', isset($getsiswa['kelurahan']) ? $getsiswa['kelurahan'] : '') ?>" class="form-control <?php echo form_error('kelurahan') ? 'is-invalid' : '' ?>">
							<?= form_error('kelurahan', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('kodepossiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Kode Pos</label>
						<div class="col-sm-10">
							<input type="text" name="kodepossiswa" value="<?= set_value('kodepossiswa', isset($getsiswa['kodepossiswa']) ? $getsiswa['kodepossiswa'] : '') ?>" class="form-control <?php echo form_error('kodepossiswa') ? 'is-invalid' : '' ?>">
							<?= form_error('kodepossiswa', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('teleponsiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">No. Telp Rumah</label>
						<div class="col-sm-10">
							<input type="text" name="teleponsiswa" value="<?= set_value('teleponsiswa', isset($getsiswa['teleponsiswa']) ? $getsiswa['teleponsiswa'] : '') ?>" class="form-control <?php echo form_error('teleponsiswa') ? 'is-invalid' : '' ?>">
							<?= form_error('teleponsiswa', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('hpsiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">No. HP <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="hpsiswa" value="<?= set_value('hpsiswa', isset($getsiswa['hpsiswa']) ? $getsiswa['hpsiswa'] : '') ?>" class="form-control <?php echo form_error('hpsiswa') ? 'is-invalid' : '' ?>">
							<?= form_error('hpsiswa', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('sekolahasal') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Sekolah Asal <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="sekolahasal" value="<?= set_value('sekolahasal', isset($getsiswa['sekolahasal']) ? $getsiswa['sekolahasal'] : '') ?>" class="form-control <?php echo form_error('sekolahasal') ? 'is-invalid' : '' ?>">
							<?= form_error('sekolahasal', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('alamatsekolahasal') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Alamat Sekolah Asal</label>
						<div class="col-sm-10">
							<input type="text" name="alamatsekolahasal" value="<?= set_value('alamatsekolahasal', isset($getsiswa['alamatsekolahasal']) ? $getsiswa['alamatsekolahasal'] : '') ?>" class="form-control <?php echo form_error('alamatsekolahasal') ? 'is-invalid' : '' ?>">
							<?= form_error('alamatsekolahasal', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('ijazah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Nomor Ijazah</label>
						<div class="col-sm-10">
							<input type="text" name="ijazah" value="<?= set_value('ijazah', isset($getsiswa['ijazah']) ? $getsiswa['ijazah'] : '') ?>" class="form-control <?php echo form_error('ijazah') ? 'is-invalid' : '' ?>">
							<?= form_error('ijazah', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('skhun') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Nomor SKHUN</label>
						<div class="col-sm-10">
							<input type="text" name="skhun" value="<?= set_value('skhun', isset($getsiswa['skhun']) ? $getsiswa['skhun'] : '') ?>" class="form-control <?php echo form_error('skhun') ? 'is-invalid' : '' ?>">
							<?= form_error('skhun', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('nopesertaun') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Nomor Peserta UN</label>
						<div class="col-sm-10">
							<input type="text" name="nopesertaun" value="<?= set_value('nopesertaun', isset($getsiswa['nopesertaun']) ? $getsiswa['nopesertaun'] : '') ?>" class="form-control <?php echo form_error('nopesertaun') ? 'is-invalid' : '' ?>">
							<?= form_error('nopesertaun', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('statusanak') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Status dalam keluarga (Kandung,Tiri,Angkat)</label>
						<div class="col-sm-10">
							<select name="statusanak" id="statusanak" class="form-control <?= form_error('statusanak') ? 'is-invalid' : '' ?>">
								<?php foreach ($m_statusanak as $dt) : ?>
									<option value="<?= $dt['nama']; ?>" <?= set_select('statusanak', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['statusanak'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('statusanak', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('anakke') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Anak Ke <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="anakke" value="<?= set_value('anakke', isset($getsiswa['anakke']) ? $getsiswa['anakke'] : '') ?>" class="form-control <?php echo form_error('anakke') ? 'is-invalid' : '' ?>">
							<?= form_error('anakke', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('jumlahsaudara') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Jumlah Saudara (sesuai Kartu Keluarga) <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="jumlahsaudara" value="<?= set_value('jumlahsaudara', isset($getsiswa['jumlahsaudara']) ? $getsiswa['jumlahsaudara'] : '') ?>" class="form-control <?php echo form_error('jumlahsaudara') ? 'is-invalid' : '' ?>">
							<?= form_error('jumlahsaudara', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('bahasasiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Bahasa Sehari-hari</label>
						<div class="col-sm-10">
							<input type="text" name="bahasasiswa" value="<?= set_value('bahasasiswa', isset($getsiswa['bahasasiswa']) ? $getsiswa['bahasasiswa'] : '') ?>" class="form-control <?php echo form_error('bahasasiswa') ? 'is-invalid' : '' ?>">
							<?= form_error('bahasasiswa', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('jarak') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Jarak Rumah ke Sekolah (Kilometer)</label>
						<div class="col-sm-10">
							<input type="text" name="jarak" value="<?= set_value('jarak', isset($getsiswa['jarak']) ? $getsiswa['jarak'] : '') ?>" class="form-control <?php echo form_error('jarak') ? 'is-invalid' : '' ?>">
							<?= form_error('jarak', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('transportasi') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Alat Transportasi</label>
						<div class="col-sm-10">
							<input type="text" name="transportasi" value="<?= set_value('transportasi', isset($getsiswa['transportasi']) ? $getsiswa['transportasi'] : '') ?>" class="form-control <?php echo form_error('transportasi') ? 'is-invalid' : '' ?>">
							<?= form_error('transportasi', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('jenistinggal') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Jenis Tinggal (Orangtua,Wali,Kost)</label>
						<div class="col-sm-10">
							<input type="text" name="jenistinggal" value="<?= set_value('jenistinggal', isset($getsiswa['jenistinggal']) ? $getsiswa['jenistinggal'] : '') ?>" class="form-control <?php echo form_error('jenistinggal') ? 'is-invalid' : '' ?>">
							<?= form_error('jenistinggal', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<hr>
					<h4>Data Ayah</h4>
					<hr>
					<div class="form-group <?= form_error('statusayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Ayah Masih Hidup</label>
						<div class="col-sm-10">
							<select name="statusayah" class="form-control <?= form_error('statusayah') ? 'is-invalid' : '' ?>">
								<?php foreach ($m_statusortu as $dt) : ?>
									<option value="<?= $dt['nama']; ?>" <?= set_select('statusayah', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['statusayah'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('statusayah', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('nikayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">NIK Ayah <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="nikayah" value="<?= set_value('nikayah', isset($getsiswa['nikayah']) ? $getsiswa['nikayah'] : '') ?>" class="form-control <?php echo form_error('nikayah') ? 'is-invalid' : '' ?>">
							<?= form_error('nikayah', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('namaayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Nama Ayah <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="namaayah" value="<?= set_value('namaayah', isset($getsiswa['namaayah']) ? $getsiswa['namaayah'] : '') ?>" class="form-control <?php echo form_error('namaayah') ? 'is-invalid' : '' ?>">
							<?= form_error('namaayah', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('tempatlahirayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Tempat Lahir</label>
						<div class="col-sm-10">
							<input type="text" name="tempatlahirayah" value="<?= set_value('tempatlahirayah', isset($getsiswa['tempatlahirayah']) ? $getsiswa['tempatlahirayah'] : '') ?>" class="form-control <?php echo form_error('tempatlahirayah') ? 'is-invalid' : '' ?>">
							<?= form_error('tempatlahirayah', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('tanggallahirayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Tanggal Lahir</label>
						<div class="col-sm-3">
							<input type="text" name="tanggallahirayah" value="<?= set_value('tanggallahirayah', isset($getsiswa['tanggallahirayah']) ? $getsiswa['tanggallahirayah'] : '') ?>" class="form-control">
							<?= form_error('tanggallahirayah', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('agamaayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Agama</label>
						<div class="col-sm-10">
							<select name="agamaayah" class="form-control <?= form_error('agamaayah') ? 'is-invalid' : '' ?>">
								<?php foreach ($m_agama as $dt) : ?>
									<option value="<?= $dt['nama']; ?>" <?= set_select('agamaayah', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['agamaayah'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('agamaayah', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('alamatayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Alamat Lengkap <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="alamatayah" value="<?= set_value('alamatayah', isset($getsiswa['alamatayah']) ? $getsiswa['alamatayah'] : '') ?>" class="form-control <?php echo form_error('alamatayah') ? 'is-invalid' : '' ?>">
							<?= form_error('alamatayah', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('propinsiayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Propinsi <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="propinsiayah" value="<?= set_value('propinsiayah', isset($getsiswa['propinsiayah']) ? $getsiswa['propinsiayah'] : '') ?>" class="form-control <?php echo form_error('propinsiayah') ? 'is-invalid' : '' ?>">
							<?= form_error('propinsiayah', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('kotaayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Kota <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="kotaayah" value="<?= set_value('kotaayah', isset($getsiswa['kotaayah']) ? $getsiswa['propinsiayah'] : '') ?>" class="form-control <?php echo form_error('kotaayah') ? 'is-invalid' : '' ?>">
							<?= form_error('kotaayah', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('teleponayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">No. Telp Rumah</label>
						<div class="col-sm-10">
							<input type="text" name="teleponayah" value="<?= set_value('teleponayah', isset($getsiswa['teleponayah']) ? $getsiswa['teleponayah'] : '') ?>" class="form-control <?php echo form_error('teleponayah') ? 'is-invalid' : '' ?>">
							<?= form_error('teleponayah', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('hpayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">No. HP <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="hpayah" value="<?= set_value('hpayah', isset($getsiswa['hpayah']) ? $getsiswa['hpayah'] : '') ?>" class="form-control <?php echo form_error('hpayah') ? 'is-invalid' : '' ?>">
							<?= form_error('hpayah', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('pendidikanayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Pendidikan Terakhir</label>
						<div class="col-sm-10">
							<select name="pendidikanayah" class="form-control <?= form_error('pendidikanayah') ? 'is-invalid' : '' ?>">
								<?php foreach ($m_pendidikan as $dt) : ?>
									<option value="<?= $dt['nama']; ?>" <?= set_select('pendidikanayah', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['pendidikanayah'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
								<?php endforeach ?>
							</select>
							<?= form_error('pendidikanayah', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('pekerjaanayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Pekerjaan Ayah <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="pekerjaanayah" value="<?= set_value('pekerjaanayah', isset($getsiswa['pekerjaanayah']) ? $getsiswa['pekerjaanayah'] : '') ?>" class="form-control <?php echo form_error('pekerjaanayah') ? 'is-invalid' : '' ?>">
							<?= form_error('pekerjaanayah', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('gajiayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Penghasilan Ayah (Rata-Rata per Bulan)</label>
						<div class="col-sm-10">
							<input type="text" id="gajiayah" name="gajiayah" value="<?= set_value('gajiayah', isset($getsiswa['gajiayah']) ? $getsiswa['gajiayah'] : '') ?>" class="form-control <?php echo form_error('gajiayah') ? 'is-invalid' : '' ?>">
							<?= form_error('gajiayah', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<hr>
					<h4>Data Ibu</h4>
					<hr>
					<div class="form-group <?= form_error('statusibu') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Ibu Masih Hidup</label>
						<div class="col-sm-10">
							<select name="statusibu" class="form-control <?= form_error('statusibu') ? 'is-invalid' : '' ?>">
								<?php foreach ($m_statusortu as $dt) : ?>
									<option value="<?= $dt['nama']; ?>" <?= set_select('statusibu', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['statusibu'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('statusibu', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('nikibu') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">NIK Ibu <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="nikibu" value="<?= set_value('nikibu', isset($getsiswa['nikibu']) ? $getsiswa['nikibu'] : '') ?>" class="form-control <?php echo form_error('nikibu') ? 'is-invalid' : '' ?>">
							<?= form_error('nikibu', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('namaibu') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Nama Ibu <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="namaibu" value="<?= set_value('namaibu', isset($getsiswa['namaibu']) ? $getsiswa['namaibu'] : '') ?>" class="form-control <?php echo form_error('namaibu') ? 'is-invalid' : '' ?>">
							<?= form_error('namaibu', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('tempatlahiribu') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Tempat Lahir</label>
						<div class="col-sm-10">
							<input type="text" name="tempatlahiribu" value="<?= set_value('tempatlahiribu', isset($getsiswa['tempatlahiribu']) ? $getsiswa['tempatlahiribu'] : '') ?>" class="form-control <?php echo form_error('tempatlahiribu') ? 'is-invalid' : '' ?>">
							<?= form_error('tempatlahiribu', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('tanggalahiribu') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Tanggal Lahir</label>
						<div class="col-sm-3">
							<input type="text" name="tanggalahiribu" value="<?= set_value('tanggalahiribu', isset($getsiswa['tanggalahiribu']) ? $getsiswa['tanggalahiribu'] : '') ?>" class="form-control">
							<?= form_error('tanggalahiribu', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('agamaibu') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Agama</label>
						<div class="col-sm-10">
							<select name="agamaibu" class="form-control <?= form_error('agamaibu') ? 'is-invalid' : '' ?>">
								<?php foreach ($m_agama as $dt) : ?>
									<option value="<?= $dt['nama']; ?>" <?= set_select('agamaibu', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['agamaibu'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('agamaibu', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('alamatibu') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Alamat Lengkap <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="alamatibu" value="<?= set_value('alamatibu', isset($getsiswa['alamatibu']) ? $getsiswa['alamatibu'] : '') ?>" class="form-control <?php echo form_error('alamatibu') ? 'is-invalid' : '' ?>">
							<?= form_error('alamatibu', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('propinsiibu') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Propinsi <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="propinsiibu" value="<?= set_value('propinsiibu', isset($getsiswa['propinsiibu']) ? $getsiswa['propinsiibu'] : '') ?>" class="form-control <?php echo form_error('propinsiibu') ? 'is-invalid' : '' ?>">
							<?= form_error('propinsiibu', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('kotaibu') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Kota <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="kotaibu" value="<?= set_value('kotaibu', isset($getsiswa['kotaibu']) ? $getsiswa['kotaibu'] : '') ?>" class="form-control <?php echo form_error('kotaibu') ? 'is-invalid' : '' ?>">
							<?= form_error('kotaibu', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('teleponibu') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">No. Telp Rumah</label>
						<div class="col-sm-10">
							<input type="text" name="teleponibu" value="<?= set_value('teleponibu', isset($getsiswa['teleponibu']) ? $getsiswa['teleponibu'] : '') ?>" class="form-control <?php echo form_error('teleponibu') ? 'is-invalid' : '' ?>">
							<?= form_error('teleponibu', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('hpibu') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">No. HP <span class="text-danger">*</p></label>
						<div class="col-sm-10">
							<input type="text" name="hpibu" value="<?= set_value('hpibu', isset($getsiswa['hpibu']) ? $getsiswa['hpibu'] : '') ?>" class="form-control <?php echo form_error('hpibu') ? 'is-invalid' : '' ?>">
							<?= form_error('hpibu', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('pendidikanibu') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Pendidikan Terakhir</label>
						<div class="col-sm-10">
							<select name="pendidikanibu" class="form-control <?= form_error('pendidikanibu') ? 'is-invalid' : '' ?>">
								<?php foreach ($m_pendidikan as $dt) : ?>
									<option value="<?= $dt['nama']; ?>" <?= set_select('pendidikanibu', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['pendidikanibu'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('pendidikanibu', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('pekerjaanibu') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Pekerjaan Ibu <span class="text-danger">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="pekerjaanibu" value="<?= set_value('pekerjaanibu', isset($getsiswa['pekerjaanibu']) ? $getsiswa['pekerjaanibu'] : '') ?>" class="form-control <?php echo form_error('pekerjaanibu') ? 'is-invalid' : '' ?>">
							<?= form_error('pekerjaanibu', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('gajiibu') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Penghasilan Ibu (Rata-Rata per Bulan)</label>
						<div class="col-sm-10">
							<input type="text" name="gajiibu" value="<?= set_value('gajiibu', isset($getsiswa['gajiibu']) ? $getsiswa['gajiibu'] : '') ?>" class="form-control <?php echo form_error('gajiibu') ? 'is-invalid' : '' ?>">
							<?= form_error('gajiibu', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<hr>
					<h4>Data Wali</h4>
					<hr>
					<div class="form-group <?= form_error('statuswali') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Wali Masih Hidup</label>
						<div class="col-sm-10">
							<select name="statuswali" class="form-control <?= form_error('statuswali') ? 'is-invalid' : '' ?>">
								<?php foreach ($m_statusortu as $dt) : ?>
									<option value="<?= $dt['nama']; ?>" <?= set_select('statuswali', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['statuswali'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('statuswali', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('namawali') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Nama Wali</label>
						<div class="col-sm-10">
							<input type="text" name="namawali" value="<?= set_value('namawali', isset($getsiswa['namawali']) ? $getsiswa['namawali'] : '') ?>" class="form-control <?php echo form_error('namawali') ? 'is-invalid' : '' ?>">
							<?= form_error('namawali', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('tempatlahirwali') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Tempat Lahir</label>
						<div class="col-sm-10">
							<input type="text" name="tempatlahirwali" value="<?= set_value('tempatlahirwali', isset($getsiswa['tempatlahirwali']) ? $getsiswa['tempatlahirwali'] : '') ?>" class="form-control <?php echo form_error('tempatlahirwali') ? 'is-invalid' : '' ?>">
							<?= form_error('tempatlahirwali', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('tanggallahirwali') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Tanggal Lahir</label>
						<div class="col-sm-3">
							<input type="text" name="tanggallahirwali" value="<?= set_value('tanggallahirwali', isset($getsiswa['tanggallahirwali']) ? $getsiswa['tanggallahirwali'] : '') ?>" class="form-control">
							<?= form_error('tanggallahirwali', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('agamawali') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Agama</label>
						<div class="col-sm-10">
							<select name="agamawali" class="form-control <?= form_error('agamawali') ? 'is-invalid' : '' ?>">
								<?php foreach ($m_agama as $dt) : ?>
									<option value="<?= $dt['nama']; ?>" <?= set_select('agamawali', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['agamawali'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
								<?php endforeach ?>
							</select>
							<?= form_error('agamawali', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('alamatwali') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Alamat Lengkap</label>
						<div class="col-sm-10">
							<input type="text" name="alamatwali" value="<?= set_value('alamatwali', isset($getsiswa['alamatwali']) ? $getsiswa['alamatwali'] : '') ?>" class="form-control <?php echo form_error('alamatwali') ? 'is-invalid' : '' ?>">
							<?= form_error('alamatwali', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('propinsiwali') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Propinsi</label>
						<div class="col-sm-10">
							<input type="text" name="propinsiwali" value="<?= set_value('propinsiwali', isset($getsiswa['propinsiwali']) ? $getsiswa['propinsiwali'] : '') ?>" class="form-control <?php echo form_error('propinsiwali') ? 'is-invalid' : '' ?>">
							<?= form_error('propinsiwali', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('kotawali') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Kota</label>
						<div class="col-sm-10">
							<input type="text" name="kotawali" value="<?= set_value('kotawali', isset($getsiswa['kotawali']) ? $getsiswa['kotawali'] : '') ?>" class="form-control <?php echo form_error('kotawali') ? 'is-invalid' : '' ?>">
							<?= form_error('kotawali', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('teleponwali') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">No. Telp Rumah</label>
						<div class="col-sm-10">
							<input type="text" name="teleponwali" value="<?= set_value('teleponwali', isset($getsiswa['teleponwali']) ? $getsiswa['teleponwali'] : '') ?>" class="form-control <?php echo form_error('teleponwali') ? 'is-invalid' : '' ?>">
							<?= form_error('teleponwali', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('hpwali') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">No. HP</label>
						<div class="col-sm-10">
							<input type="text" name="hpwali" value="<?= set_value('hpwali', isset($getsiswa['hpwali']) ? $getsiswa['hpwali'] : '') ?>" class="form-control <?php echo form_error('hpwali') ? 'is-invalid' : '' ?>">
							<?= form_error('hpwali', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('pendidikanwali') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Pendidikan Terakhir</label>
						<div class="col-sm-10">
							<select name="pendidikanwali" class="form-control <?= form_error('pendidikanwali') ? 'is-invalid' : '' ?>">
								<?php foreach ($m_pendidikan as $dt) : ?>
									<option value="<?= $dt['nama']; ?>" <?= set_select('pendidikanwali', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $getsiswa['pendidikanwali'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
								<?php endforeach ?>
							</select>
							<?= form_error('pendidikanwali', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('pekerjaanwali') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Pekerjaan Wali</label>
						<div class="col-sm-10">
							<input type="text" name="pekerjaanwali" value="<?= set_value('pekerjaanwali', isset($getsiswa['pekerjaanwali']) ? $getsiswa['pekerjaanwali'] : '') ?>" class="form-control <?php echo form_error('pekerjaanwali') ? 'is-invalid' : '' ?>">
							<?= form_error('pekerjaanwali', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('gajiwali') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Penghasilan Wali (Rata-Rata per Bulan)</label>
						<div class="col-sm-10">
							<input type="text" name="gajiwali" value="<?= set_value('gajiwali', isset($getsiswa['gajiwali']) ? $getsiswa['gajiwali'] : '') ?>" class="form-control <?php echo form_error('gajiwali') ? 'is-invalid' : '' ?>">
							<?= form_error('gajiwali', '<span class="help-block">', '</span>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('image') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Foto</label>
						<div class="col-sm-10">
							<input type="file" name="image">
							<p class="help-block">Extensi foto harus JPG</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Foto Lama</label>
						<div class="col-sm-10">
							<?= $getsiswa['image'] ?>
							<img width="150px" src="<?= base_url('assets/images/siswa/' . $getsiswa['image']) ?>" class="img-responsive" alt="">
						</div>
					</div>
			</div>

			<div class="box-footer">
				<input type="hidden" name="id" value="<?= $getsiswa['id'] ?>">
				<input type="hidden" name="old_image" value="<?= $getsiswa['image'] ?>">
				<input type="submit" value="Simpan" name="submit" class="btn btn-success">&nbsp;
				<a href="<?= base_url('akademik/siswa') ?>"><span class="btn btn-warning">Batal</span></a>
			</div>
			</form>
		</div>
		<!-- /.box -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->