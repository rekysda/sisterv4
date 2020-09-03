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
				<h3 class="box-title">Add Data</h3>
			</div>
			<div class="box-body">
				<?= $this->session->flashdata('message') ?>
				<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

					<b>Data Siswa</b>

					<div class="form-group <?= form_error('tahun_ppdb') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Tahun PPDB / Masuk <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<select name='tahun_ppdb' class='form-control'>
								<option value='' selected>- Tahun -</option>
								<?php
								$tahunn = date("Y")+5;
								for ($n = 2017; $n <= $tahunn; $n++) {
									if ($tahunn == $n) {
										echo "<option value='$n' selected>$n</option>";
									} else {
										echo "<option value='$n'>$n</option>";
									}
								}
								?>
							</select>
							<?= form_error('tahun_ppdb', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('noformulir') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">No Formulir</label>
						<div class="col-sm-10">
							<input type="text" name="noformulir" value="<?= set_value('noformulir'); ?>" class="form-control">
							<?= form_error('noformulir', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('namasiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Nama Siswa <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="namasiswa" value="<?= set_value('namasiswa'); ?>" class="form-control">
							<?= form_error('namasiswa', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('panggilansiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Panggilan Siswa</label>
						<div class="col-sm-10">
							<input type="text" name="panggilansiswa" value="<?= set_value('panggilansiswa'); ?>" class="form-control">
							<?= form_error('panggilansiswa', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('tempatlahirsiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Tempat Lahir <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="tempatlahirsiswa" value="<?= set_value('tempatlahirsiswa'); ?>" class="form-control">
							<?= form_error('tempatlahirsiswa', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('tanggallahirsiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Tanggal Lahir <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="tanggallahirsiswa" id="tanggallahirsiswa" value="<?= set_value('tanggallahirsiswa', date('Y-m-d'), FALSE); ?>" class="form-control">
							<?= form_error('tanggallahirsiswa', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('tinggisiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Tinggi Badan CM <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="tinggisiswa" value="<?= set_value('tinggisiswa'); ?>" class="form-control">
							<?= form_error('tinggisiswa', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('beratsiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Berat Badan KG <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="beratsiswa" value="<?= set_value('beratsiswa'); ?>" class="form-control">
							<?= form_error('beratsiswa', '<span class="help-block">', '</small>') ?>
						</div>

					</div>
					<div class="form-group <?= form_error('kelaminsiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Jenis Kelamin</label>
						<div class="col-sm-10">
							<select name="kelaminsiswa" id="kelaminsiswa" class="form-control">
								<?php foreach ($m_kelamin as $dt) : ?>
								<option value="<?= $dt['nama']; ?>" <?= set_select('kelaminsiswa', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $kelaminsiswa ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('kelaminsiswa', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('agamasiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Agama</label>
						<div class="col-sm-10">
							<select name="agamasiswa" id="agamasiswa" class="form-control">
								<?php foreach ($m_agama as $dt) : ?>
								<option value="<?= $dt['nama']; ?>" <?= set_select('agamasiswa', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $agamasiswa ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('agamasiswa', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('warganegarasiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Kewarganegaraan</label>
						<div class="col-sm-10">
							<input type="text" name="warganegarasiswa" value="<?= set_value('warganegarasiswa'); ?>" class="form-control">
							<?= form_error('warganegarasiswa', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('nisn') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Nomor Induk Siswa Nasional (NISN)</label>
						<div class="col-sm-10">
							<input type="text" name="nisn" value="<?= set_value('nisn'); ?>" class="form-control">
							<?= form_error('nisn', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('nik') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Nomor Induk Kependudukan (NIK) <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="nik" value="<?= set_value('nik'); ?>" class="form-control">
							<?= form_error('nik', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('noakta') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Nomor Akta Lahir</label>
						<div class="col-sm-10">
							<input type="text" name="noakta" value="<?= set_value('noakta'); ?>" class="form-control">
							<?= form_error('noakta', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('emailsiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Email <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="emailsiswa" value="<?= set_value('emailsiswa'); ?>" class="form-control">
							<?= form_error('emailsiswa', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('alamatsiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Alamat Lengkap <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="alamatsiswa" value="<?= set_value('alamatsiswa'); ?>" class="form-control">
							<?= form_error('alamatsiswa', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('propinsisiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Propinsi <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="propinsisiswa" value="<?= set_value('propinsisiswa'); ?>" class="form-control">
							<?= form_error('propinsisiswa', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('kotasiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Kota <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="kotasiswa" value="<?= set_value('kotasiswa'); ?>" class="form-control">
							<?= form_error('kotasiswa', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('kecamatan') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Kecamatan <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="kecamatan" value="<?= set_value('kecamatan'); ?>" class="form-control">
							<?= form_error('kecamatan', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('kelurahan') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Kelurahan <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="kelurahan" value="<?= set_value('kelurahan'); ?>" class="form-control">
							<?= form_error('kelurahan', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('kodepossiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Kode Pos</label>
						<div class="col-sm-10">
							<input type="text" name="kodepossiswa" value="<?= set_value('kodepossiswa'); ?>" class="form-control">
							<?= form_error('kodepossiswa', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('teleponsiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">No. Telp Rumah</label>
						<div class="col-sm-10">
							<input type="text" name="teleponsiswa" value="<?= set_value('teleponsiswa'); ?>" class="form-control">
							<?= form_error('teleponsiswa', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('hpsiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">No. HP <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="hpsiswa" value="<?= set_value('hpsiswa'); ?>" class="form-control">
							<?= form_error('hpsiswa', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('sekolahasal') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Sekolah Asal <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="sekolahasal" value="<?= set_value('sekolahasal'); ?>" class="form-control">
							<?= form_error('sekolahasal', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('alamatsekolahasal') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Alamat Sekolah Asal</label>
						<div class="col-sm-10">
							<input type="text" name="alamatsekolahasal" value="<?= set_value('alamatsekolahasal'); ?>" class="form-control">
							<?= form_error('alamatsekolahasal', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('ijazah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Nomor Ijazah</label>
						<div class="col-sm-10">
							<input type="text" name="ijazah" value="<?= set_value('ijazah'); ?>" class="form-control">
							<?= form_error('ijazah', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('nis') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Nomor SKHUN</label>
						<div class="col-sm-10">
							<input type="text" name="skhun" value="<?= set_value('nis'); ?>" class="form-control">
							<?= form_error('nis', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('nopesertaun') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Nomor Peserta UN</label>
						<div class="col-sm-10">
							<input type="text" name="nopesertaun" value="<?= set_value('nopesertaun'); ?>" class="form-control">
							<?= form_error('nopesertaun', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Status dalam keluarga (Kandung,Tiri,Angkat)</label>
						<div class="col-sm-10">
							<select name="statusanak" id="statusanak" class="form-control <?= form_error('statusanak') ? 'has-error' : '' ?>">
								<?php foreach ($m_statusanak as $dt) : ?>
								<option value="<?= $dt['nama']; ?>" <?= set_select('statusanak', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $statusanak ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('statusanak', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('anakke') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Anak Ke <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="anakke" value="<?= set_value('anakke'); ?>" class="form-control">
							<?= form_error('anakke', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('jumlahsaudara') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Jumlah Saudara (sesuai Kartu Keluarga) <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="jumlahsaudara" value="<?= set_value('jumlahsaudara'); ?>" class="form-control">
							<?= form_error('jumlahsaudara', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('bahasasiswa') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Bahasa Sehari-hari</label>
						<div class="col-sm-10">
							<input type="text" name="bahasasiswa" value="<?= set_value('bahasasiswa'); ?>" class="form-control">
							<?= form_error('bahasasiswa', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('jarak') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Jarak Rumah ke Sekolah (Kilometer)</label>
						<div class="col-sm-10"><input type="text" name="jarak" value="<?= set_value('jarak'); ?>" class="form-control">
							<?= form_error('jarak', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('transportasi') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Alat Transportasi</label>
						<div class="col-sm-10">
							<input type="text" name="transportasi" value="<?= set_value('transportasi'); ?>" class="form-control">
							<?= form_error('transportasi', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('jenistinggal') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Jenis Tinggal (Orangtua,Wali,Kost)</label>
						<div class="col-sm-10">
							<input type="text" name="jenistinggal" value="<?= set_value('jenistinggal'); ?>" class="form-control">
							<?= form_error('jenistinggal', '<span class="help-block">', '</small>') ?>
						</div>
					</div>

					<b>Data Ayah</b>
					<hr>

					<div class="form-group <?= form_error('statusayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Ayah Masih Hidup</label>
						<div class="col-sm-10">
							<select name="statusayah" id="statusayah" class="form-control">
								<?php foreach ($m_statusortu as $dt) : ?>
								<option value="<?= $dt['nama']; ?>" <?= set_select('statusayah', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $statusayah ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('statusayah', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('nikayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">NIK Ayah <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="nikayah" value="<?= set_value('nikayah'); ?>" class="form-control">
							<?= form_error('nikayah', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('namaayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Nama Ayah <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="namaayah" value="<?= set_value('namaayah'); ?>" class="form-control">
							<?= form_error('namaayah', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('tempatlahirayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Tempat Lahir</label>
						<div class="col-sm-10">
							<input type="text" name="tempatlahirayah" value="<?= set_value('tempatlahirayah'); ?>" class="form-control">
							<?= form_error('tempatlahirayah', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Tanggal Lahir</label>
						<div class="col-sm-10">
							<input type="text" name="tanggallahirayah" id="tanggallahirayah" value="<?= set_value('tanggallahirayah', date('Y-m-d'), FALSE); ?>" class="form-control">
							<?= form_error('tanggallahirayah', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('agamaayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Agama</label>
						<div class="col-sm-10">
							<select name="agamaayah" id="agamaayah" class="form-control">
								<?php foreach ($m_agama as $dt) : ?>
								<option value="<?= $dt['nama']; ?>" <?= set_select('agamaayah', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $agamaayah ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('agamaayah', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('alamatayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Alamat Lengkap <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="alamatayah" value="<?= set_value('alamatayah'); ?>" class="form-control">
							<?= form_error('alamatayah', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('propinsiayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Propinsi <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="propinsiayah" value="<?= set_value('propinsiayah'); ?>" class="form-control">
							<?= form_error('propinsiayah', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('kotaayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Kota <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="kotaayah" value="<?= set_value('kotaayah'); ?>" class="form-control">
							<?= form_error('kotaayah', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('teleponayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">No. Telp Rumah</label>
						<div class="col-sm-10">
							<input type="text" name="teleponayah" value="<?= set_value('teleponayah'); ?>" class="form-control">
							<?= form_error('teleponayah', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('hpayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">No. HP <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="hpayah" value="<?= set_value('hpayah'); ?>" class="form-control">
							<?= form_error('hpayah', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Pendidikan Terakhir</label>
						<div class="col-sm-10">
							<select name="pendidikanayah" id="pendidikanayah" class="form-control <?= form_error('pendidikanayah') ? 'has-error' : '' ?>">
								<?php foreach ($m_pendidikan as $dt) : ?>
								<option value="<?= $dt['nama']; ?>" <?= set_select('pendidikanayah', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $pendidikanayah ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('pendidikanayah', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('pekerjaanayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Pekerjaan Ayah <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="pekerjaanayah" value="<?= set_value('pekerjaanayah'); ?>" class="form-control">
							<?= form_error('pekerjaanayah', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('gajiayah') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Penghasilan Ayah (Rata-Rata per Bulan)</label>
						<div class="col-sm-10">
							<input type="text" id="gajiayah" name="gajiayah" value="<?= set_value('gajiayah'); ?>" class="form-control">
							<?= form_error('gajiayah', '<span class="help-block">', '</small>') ?>
						</div>
					</div>

					<b>Data Ibu</b>
					<hr>

					<div class="form-group">
						<label class="col-sm-2 control-label">Ibu Masih Hidup</label>
						<div class="col-sm-10">
							<select name="statusibu" id="statusibu" class="form-control <?= form_error('statusibu') ? 'has-error' : '' ?>">
								<?php foreach ($m_statusortu as $dt) : ?>
								<option value="<?= $dt['nama']; ?>" <?= set_select('statusibu', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $statusibu ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('statusibu', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<div class="form-group <?= form_error('nikibu') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">NIK Ibu <span class="text-red">*</span></label>
						<div class="col-sm-10">
							<input type="text" name="nikibu" value="<?= set_value('nikibu'); ?>" class="form-control">
							<?= form_error('nikibu', '<span class="help-block">', '</small>') ?>
						</div>
					</div>
					<tr class="form-group <?= form_error('namaibu') ? 'has-error' : '' ?>">
						<label class="col-sm-2 control-label">Nama Ibu <span class="text-red">*</span></label>
						<div class="col-sm-10"><input type="text" name="namaibu" value="<?= set_value('namaibu'); ?>" class="form-control">
							<?= form_error('namaibu', '<span class="help-block">', '</small>') ?>
						</div>
						<div class="form-group <?= form_error('tempatlahiribu') ? 'has-error' : '' ?>">
							<label class="col-sm-2 control-label">Tempat Lahir</label>
							<div class="col-sm-10">
								<input type="text" name="tempatlahiribu" value="<?= set_value('tempatlahiribu'); ?>" class="form-control">
								<?= form_error('tempatlahiribu', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tanggal Lahir</label>
							<div class="col-sm-10">
								<input type="text" name="tanggalahiribu" id="tanggalahiribu" value="<?= set_value('tanggalahiribu', date('Y-m-d'), FALSE); ?>" class="form-control">
								<?= form_error('tanggalahiribu', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Agama</label>
							<div class="col-sm-10">
								<select name="agamaibu" id="agamaibu" class="form-control <?= form_error('agamaibu') ? 'has-error' : '' ?>">
									<?php foreach ($m_agama as $dt) : ?>
									<option value="<?= $dt['nama']; ?>" <?= set_select('agamaibu', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $agamaibu ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
									<?php endforeach; ?>
								</select>
								<?= form_error('agamaibu', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('alamatibu') ? 'has-error' : '' ?>">
							<label class="col-sm-2 control-label">Alamat Lengkap <span class="text-red">*</span></label>
							<div class="col-sm-10">
								<input type="text" name="alamatibu" value="<?= set_value('alamatibu'); ?>" class="form-control">
								<?= form_error('alamatibu', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('propinsiibu') ? 'has-error' : '' ?>">
							<label class="col-sm-2 control-label">Propinsi <span class="text-red">*</span></label>
							<div class="col-sm-10">
								<input type="text" name="propinsiibu" value="<?= set_value('propinsiibu'); ?>" class="form-control">
								<?= form_error('propinsiibu', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('kotaibu') ? 'has-error' : '' ?>">
							<label class="col-sm-2 control-label">Kota <span class="text-red">*</span></label>
							<div class="col-sm-10">
								<input type="text" name="kotaibu" value="<?= set_value('kotaibu'); ?>" class="form-control">
								<?= form_error('kotaibu', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('teleponibu') ? 'has-error' : '' ?>">
							<label class="col-sm-2 control-label">No. Telp Rumah</label>
							<div class="col-sm-10">
								<input type="text" name="teleponibu" value="<?= set_value('teleponibu'); ?>" class="form-control">
								<?= form_error('teleponibu', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('hpibu') ? 'has-error' : '' ?>">
							<label class="col-sm-2 control-label">No. HP*</label>
							<div class="col-sm-10">
								<input type="text" name="hpibu" value="<?= set_value('hpibu'); ?>" class="form-control">
								<?= form_error('hpibu', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Pendidikan Terakhir</label>
							<div class="col-sm-10">
								<select name="pendidikanibu" id="pendidikanibu" class="form-control <?= form_error('pendidikanibu') ? 'has-error' : '' ?>">
									<?php foreach ($m_pendidikan as $dt) : ?>
									<option value="<?= $dt['nama']; ?>" <?= set_select('pendidikanibu', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $pendidikanibu ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
									<?php endforeach; ?>
								</select>
								<?= form_error('pendidikanibu', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('pekerjaanibu') ? 'has-error' : '' ?>">
							<label class="col-sm-2 control-label">Pekerjaan Ibu <span class="text-red">*</span></label>
							<div class="col-sm-10">
								<input type="text" name="pekerjaanibu" value="<?= set_value('pekerjaanibu'); ?>" class="form-control">
								<?= form_error('pekerjaanibu', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('gajiibu') ? 'has-error' : '' ?>">
							<label class="col-sm-2 control-label">Penghasilan Ibu (Rata-Rata per Bulan)</label>
							<div class="col-sm-10">
								<input type="text" id="gajiibu" name="gajiibu" value="<?= set_value('gajiibu'); ?>" class="form-control">
								<?= form_error('gajiibu', '<span class="help-block">', '</small>') ?>
							</div>
						</div>

						<b>Data Wali</b>
						<hr>

						<div class="form-group">
							<label class="col-sm-2 control-label">Wali Masih Hidup</label>
							<div class="col-sm-10">
								<select name="statuswali" id="statuswali" class="form-control <?= form_error('statuswali') ? 'has-error' : '' ?>">
									<?php foreach ($m_statusortu as $dt) : ?>
									<option value="<?= $dt['nama']; ?>" <?= set_select('statuswali', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $statuswali ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
									<?php endforeach; ?>
								</select>
								<?= form_error('statuswali', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('namawali') ? 'has-error' : '' ?>">
							<label class="col-sm-2 control-label">Nama Wali</label>
							<div class="col-sm-10">
								<input type="text" name="namawali" value="<?= set_value('namawali'); ?>" class="form-control">
								<?= form_error('namawali', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('tempatlahirwali') ? 'has-error' : '' ?>">
							<label class="col-sm-2 control-label">Tempat Lahir</label>
							<div class="col-sm-10">
								<input type="text" name="tempatlahirwali" value="<?= set_value('tempatlahirwali'); ?>" class="form-control">
								<?= form_error('tempatlahirwali', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tanggal Lahir</label>
							<div class="col-sm-10">
								<input type="text" name="tanggallahirwali" id="tanggallahirwali" value="<?= set_value('tanggallahirwali', date('Y-m-d'), FALSE); ?>" class="form-control">
								<?= form_error('tanggallahirwali', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Agama</label>
							<div class="col-sm-10">
								<select name="agamawali" id="agamawali" class="form-control <?= form_error('agamawali') ? 'has-error' : '' ?>">
									<?php foreach ($m_agama as $dt) : ?>
									<option value="<?= $dt['nama']; ?>" <?= set_select('agamawali', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $agamawali ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
									<?php endforeach; ?>
								</select>
								<?= form_error('agamawali', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('alamatwali') ? 'has-error' : '' ?>">
							<label class="col-sm-2 control-label">Alamat Lengkap</label>
							<div class="col-sm-10">
								<input type="text" name="alamatwali" value="<?= set_value('alamatwali'); ?>" class="form-control">
								<?= form_error('alamatwali', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('propinsiwali') ? 'has-error' : '' ?>">
							<label class="col-sm-2 control-label">Propinsi</label>
							<div class="col-sm-10"><input type="text" name="propinsiwali" value="<?= set_value('propinsiwali'); ?>" class="form-control">
								<?= form_error('propinsiwali', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('kotawali') ? 'has-error' : '' ?>">
							<label class="col-sm-2 control-label">Kota</label>
							<div class="col-sm-10"><input type="text" name="kotawali" value="<?= set_value('kotawali'); ?>" class="form-control">
								<?= form_error('kotawali', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('teleponwali') ? 'has-error' : '' ?>">
							<label class="col-sm-2 control-label">No. Telp Rumah</label>
							<div class="col-sm-10"><input type="text" name="teleponwali" value="<?= set_value('teleponwali'); ?>" class="form-control">
								<?= form_error('teleponwali', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('hpwali') ? 'has-error' : '' ?>">
							<label class="col-sm-2 control-label">No. HP</label>
							<div class="col-sm-10">
								<input type="text" name="hpwali" value="<?= set_value('hpwali'); ?>" class="form-control">
								<?= form_error('hpwali', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('pendidikanwali') ? 'has-error' : '' ?>">
							<label class="col-sm-2 control-label">Pendidikan Terakhir</label>
							<div class="col-sm-10">
								<select name="pendidikanwali" id="pendidikanwali" class="form-control">
									<?php foreach ($m_pendidikan as $dt) : ?>
									<option value="<?= $dt['nama']; ?>" <?= set_select('pendidikanwali', $dt['nama'], FALSE); ?> <?= $dt['nama'] == $pendidikanwali ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
									<?php endforeach; ?>
								</select>
								<?= form_error('pendidikanwali', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('pekerjaanwali') ? 'has-error' : '' ?>">
							<label class="col-sm-2 control-label">Pekerjaan Wali</label>
							<div class="col-sm-10">
								<input type="text" name="pekerjaanwali" value="<?= set_value('pekerjaanwali'); ?>" class="form-control">
								<?= form_error('pekerjaanwali', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group <?= form_error('gajiwali') ? 'has-error' : '' ?>">
							<label class="col-sm-2 control-label">Penghasilan Wali (Rata-Rata per Bulan)</label>
							<div class="col-sm-10">
								<input type="text" id="gajiwali" name="gajiwali" value="<?= set_value('gajiwali'); ?>" class="form-control">
								<?= form_error('gajiwali', '<span class="help-block">', '</small>') ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Foto</label>
							<div class="col-sm-10">
								<input type="file" name="image">
								<p class="help-block">Extensi foto harus JPG</p>
							</div>
						</div>


			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<input type="submit" value="Simpan" name="submit" class="btn btn-primary">
				<a href="<?= base_url('akademik/siswa') ?>"><span class="btn btn-default">Batal</span></a>
			</div>
			</form>

		</div>
		<!-- /.box -->

	</section>
	<!-- /.content -->

</div>
<!-- /.content-wrapper -->