<style>
	body {
		font-size: 12px;
		color: black;
	}

	table#tablestd {
		border-width: 1px;
		border-style: solid;
		border-color: #D8D8D8;
		border-collapse: collapse;
		margin: 10px 0px;
	}

	table#tablestd td {
		padding: 0.5em;
		color: #000;
		vertical-align: top;
		border-width: 0px;
		padding: 4px;
		border: 1px solid #000;

	}

	table#tablemodul1 {
		border-width: 1px;
		border-style: solid;
		border-color: #000;
		border-collapse: collapse;
		margin: 10px 0px;
	}

	table#tablemodul1 td {
		padding: 1px 6px 2px 6px;
		border: 1px solid #000;

	}

	table#tablemodul1 th {
		padding: 1px 6px 2px 6px;
		border: 1px solid #000;

	}

	h1 {
		font-size: 24px;
	}
</style>
NIS : <?= $getdatasiswa['nis'] ?><br>
Nama : <?= $getdatasiswa['namasiswa'] ?><br>
Kelas : <?= getfieldtable("m_kelas", "nama_kelas", $getkelassiswa['kelas_id']) ?><br>
Tahun Akademik : <?= getfieldtable("m_tahunakademik", "nama", $tahun_akademik_default['value']) ?><br>
Hadir : <?= $get_siswahadir['jumlah'] ?><br>
Sakit : <?= $get_siswasakit['jumlah'] ?><br>
Ijin : <?= $get_siswaijin['jumlah'] ?><br>
Tanpa Keterangan : <?= $get_siswaalpa['jumlah'] ?><br>