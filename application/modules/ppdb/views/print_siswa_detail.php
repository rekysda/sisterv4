<h1>Data Siswa Detail</h1>
<table><tr><td>
<table class="table table-striped table-hover">
	<tr>
		<td colspan="3"><b>Data Siswa</b></td>
	</tr>
	<tr><td>Tahun PPDB / Masuk </td><td>:</td><td><?= $getsiswa['tahun_ppdb']?></td></tr>
<tr>
		<td>No Formulir</td>
		<td>:</td>
		<td><?= $getsiswa['noformulir'] ?>
		</td>
	</tr>
<tr>
		<td>Nama Siswa</td>
		<td>:</td>
		<td><?= $getsiswa['namasiswa'] ?>
		</td>
	</tr>
<tr>
		<td>Panggilan Siswa</td>
		<td>:</td>
		<td><?= $getsiswa['panggilansiswa'] ?>
		</td>
	</tr>
<tr>
		<td>Tempat Lahir</td>
		<td>:</td>
		<td><?= $getsiswa['tempatlahirsiswa'] ?>
		</td>
    </tr>
    <tr>
		<td>Tanggal Lahir</td>
		<td>:</td>
		<td><?= gettanggalindo($getsiswa['tanggallahirsiswa']) ?>
		</td>
	</tr>
<tr>
		<td>Tinggi Badan CM</td>
		<td>:</td>
		<td><?= $getsiswa['tinggisiswa']?>
		</td>
	</tr>
<tr>
		<td>Berat Badan KG</td>
		<td>:</td>
		<td><?= $getsiswa['beratsiswa']?>
		</td>
	</tr>
<tr>
	<td>Jenis Kelamin</td>
		<td>:</td>
	<td><?= $getsiswa['kelaminsiswa'] ?>
		</td>

    </td>
</tr>
<tr>
	<td>Agama</td>
		<td>:</td>
	<td><?= $getsiswa['agamasiswa'] ?>
		</td>
    </td>
</tr>
<tr>
	<td>Kewarganegaraan</td>
		<td>:</td>
	<td><?= $getsiswa['warganegarasiswa'] ?>
		</td>
</tr>
<tr>
		<td>Nomor Induk Siswa Nasional (NISN)</td>
		<td>:</td>
		<td><?= $getsiswa['nisn']?>
		</td>
<tr>
		<td>Nomor Induk Kependudukan (NIK)</td>
		<td>:</td>
		<td><?= $getsiswa['nik']?>
		</td>
	</tr>
<tr>
		<td>Nomor Akta Lahir</td>
		<td>:</td>
		<td><?=$getsiswa['noakta']?>
		</td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?= $getsiswa['emailsiswa']?>
		</td>
	</tr>
<tr>
		<td>Alamat Lengkap</td>
		<td>:</td>
		<td><?= $getsiswa['alamatsiswa']?>
		</td>
	</tr>
<tr>
	<td>Propinsi</td>
		<td>:</td>
	<td><?=$getsiswa['propinsisiswa']?>
		</td>
</tr>
<tr>
	<td>Kota</td>
		<td>:</td>
	<td><?=$getsiswa['kotasiswa']?>
		</td>
</tr>
<tr>
		<td>Kecamatan</td>
		<td>:</td>
		<td><?=$getsiswa['kecamatan']?>
		</td>
	</tr>
<tr>
		<td>Kelurahan</td>
		<td>:</td>
		<td><?=$getsiswa['kelurahan']?>
		</td>
	</tr>
<tr>
		<td>Kode Pos</td>
		<td>:</td>
		<td><?=$getsiswa['kodepossiswa']?>
		</td>
	</tr>
<tr>
		<td>No. Telp Rumah</td>
		<td>:</td>
		<td><?=$getsiswa['teleponsiswa']?>
		</td>
	</tr>
<tr>
		<td>No. HP</td>
		<td>:</td>
		<td><?=$getsiswa['hpsiswa']?>
		</td>
	</tr>
<tr>
		<td>Sekolah Asal</td>
		<td>:</td>
		<td><?=$getsiswa['sekolahasal']?>
		</td>
	</tr>
<tr>
		<td>Alamat Sekolah Asal</td>
		<td>:</td>
		<td><?=$getsiswa['alamatsekolahasal']?>
		</td>
	</tr>
<tr>
		<td>Nomor Ijazah</td>
		<td>:</td>
		<td><?=$getsiswa['ijazah']?>
		</td>
	</tr>
<tr>
		<td>Nomor SKHUN</td>
		<td>:</td>
		<td><?=$getsiswa['skhun']?>
		</td>
	</tr>
<tr>
		<td>Nomor Peserta UN</td>
		<td>:</td>
		<td><?=$getsiswa['nopesertaun']?>
		</td>
	</tr>
<tr>
	<td>Status dalam keluarga (Kandung,Tiri,Angkat)</td>
		<td>:</td>
	<td><?=$getsiswa['statusanak']?>
		</td>
</tr>
<tr>
		<td>Anak Ke</td>
		<td>:</td>
		<td><?=$getsiswa['anakke']?>
		</td>
	</tr>
<tr>
		<td>Jumlah Saudara (sesuai Kartu Keluarga)</td>
		<td>:</td>
		<td><?=$getsiswa['jumlahsaudara']?>
		</td>
	</tr>
<tr>
	<td>Bahasa Sehari-hari</td>
		<td>:</td>
	<td><?=$getsiswa['bahasasiswa']?>
		</td>
</tr>
<tr>
		<td>Jarak Rumah ke Sekolah (Kilometer)</td>
		<td>:</td>
		<td><?=$getsiswa['jarak']?>
		</td>
	</tr>
<tr>
		<td>Alat Transportasi</td>
		<td>:</td>
		<td><?=$getsiswa['transportasi']?>
		</td>
	</tr>
<tr>
		<td>Jenis Tinggal (Orangtua,Wali,Kost)</td>
		<td>:</td>
		<td><?=$getsiswa['jenistinggal']?>
		</td>
    </tr>
</table>
</td>
<!--Data Ayah -->
<td valign='top'>
<table>
	<tr>
		<td colspan="3"><b>Data Ayah</b></td>
	</tr>
<tr>
		<td>NIK Ayah</td>
		<td>:</td>
		<td><?=$getsiswa['nikayah']?>
		</td>
	</tr>
<tr>
		<td>Nama Ayah</td>
		<td>:</td>
		<td><?=$getsiswa['namaayah']?>
		</td>
	</tr>
<tr>
		<td>Tempat Lahir</td>
		<td>:</td>
		<td><?=$getsiswa['tempatlahirayah']?>
		</td>
	</tr>
<tr>
		<td>Tanggal Lahir</td>
		<td>:</td>
		<td><?= gettanggalindo($getsiswa['tanggallahirayah'])?>
		</td>
	</tr>
<tr>
		<td>Alamat Lengkap</td>
		<td>:</td>
		<td><?=$getsiswa['alamatayah']?>
		</td>
	</tr>
<tr>
	<td>Propinsi</td>
		<td>:</td>
	<td><?=$getsiswa['propinsiayah']?>
		</td>
</tr>
<tr>
	<td>Kota</td>
		<td>:</td>
	<td><?= $getsiswa['kotaayah']?>
		</td>
</tr>
<tr>
		<td>No. HP</td>
		<td>:</td>
		<td><?= $getsiswa['hpayah']?>
		</td>
	</tr>
<tr>
		<td>Pekerjaan Ayah</td>
		<td>:</td>
		<td><?= $getsiswa['pekerjaanayah']?>
		</td>
	</tr>
<tr>
		<td>Penghasilan Ayah (Rata-Rata per Bulan)</td>
		<td>:</td>
		<td><?= nominal($getsiswa['gajiayah'])?>
		</td>
	</tr>
	<tr>
		<td colspan="3"><b>Data Ibu</b></td>
	</tr>
<tr>
		<td>NIK Ibu</td>
		<td>:</td>
		<td><?= $getsiswa['nikibu']?>
		</td>
	</tr>
<tr>
		<td>Nama Ibu</td>
		<td>:</td>
		<td><?= $getsiswa['namaibu']?>
		</td>
<tr>
		<td>Tempat Lahir</td>
		<td>:</td>
		<td><?=$getsiswa['tempatlahiribu']?>
		</td>
	</tr>
<tr>
		<td>Tanggal Lahir</td>
		<td>:</td>
		<td><?= gettanggalindo($getsiswa['tanggalahiribu'])?>
		</td>
	</tr>
<tr>
		<td>Alamat Lengkap</td>
		<td>:</td>
		<td><?= $getsiswa['alamatibu']?>
		</td>
	</tr>
<tr>
	<td>Propinsi</td>
		<td>:</td>
	<td><?= $getsiswa['propinsiibu']?>
		</td>
</tr>
<tr>
	<td>Kota*</td>
		<td>:</td>
	<td><?= $getsiswa['kotaibu']?>
		</td>
</tr>

<tr>
		<td>No. HP</td>
		<td>:</td>
		<td><?= $getsiswa['hpibu']?>
		</td>
	</tr>
<tr>
		<td>Pekerjaan Ibu</td>
		<td>:</td>
		<td><?= $getsiswa['pekerjaanibu']?>
		</td>
	</tr>
<tr>
		<td>Penghasilan Ibu (Rata-Rata per Bulan)</td>
		<td>:</td>
		<td><?= nominal($getsiswa['gajiibu'])?>
		</td>
	</tr>
	<tr>
		<td colspan="3"><b>Data Wali</b></td>
	</tr>
<tr>
		<td>Nama Wali</td>
		<td>:</td>
		<td><?= $getsiswa['namawali']?>
		</td>
	</tr>
<tr>
		<td>Tempat Lahir</td>
		<td>:</td>
		<td><?=$getsiswa['tempatlahirwali']?>
		</td>
	</tr>
<tr>
		<td>Tanggal Lahir</td>
		<td>:</td>
		<td><?= gettanggalindo($getsiswa['tanggallahirwali'])?>
		</td>
	</tr>
<tr>
		<td>Alamat Lengkap</td>
		<td>:</td>
		<td><?=$getsiswa['alamatwali']?>
		</td>
	</tr>
<tr>
	<td>Propinsi</td>
		<td>:</td>
	<td><?=$getsiswa['propinsiwali']?>
		</td>
</tr>
<tr>
	<td>Kota</td>
		<td>:</td>
	<td><?=$getsiswa['kotawali']?>
		</td>
</tr>
<tr>
		<td>No. HP</td>
		<td>:</td>
		<td><?=$getsiswa['hpwali']?>
		</td>
	</tr>
<tr>
		<td>Pekerjaan Wali</td>
		<td>:</td>
		<td><?=$getsiswa['pekerjaanwali']?>
		</td>
	</tr>
<tr>
		<td>Penghasilan Wali (Rata-Rata per Bulan)</td>
		<td>:</td>
		<td><?= nominal($getsiswa['gajiwali'])?>
		</td>
    </tr>
    <tr>
		<td colspan="3"><img width="100px"src="<?= base_url('assets/images/siswa/'.$getsiswa['image']) ?>" class="img-responsive" alt=""></td>
	</tr>
    </table>
    </td></tr></table>
