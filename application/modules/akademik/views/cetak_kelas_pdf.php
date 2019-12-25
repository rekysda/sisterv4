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
<h4> <?= $title; ?></h4>
Angkatan : <?= $getkelasasal['tahun'] ?><br>
Nama Kelas : <?= $getkelasasal['nama_kelas'] ?><br>
Jurusan : <?= $getkelasasal['jurusan'] ?><br>
Wali Kelas : <?= $getkelasasal['nama_guru'] ?><br>
<table id="tablestd">
	<tr>
		<td>No</td>
		<td>NIS</td>
		<td>Nama Siswa</td>
		<td>JK</td>
	</tr>
	<?php $i = 1; ?>
	<?php if ($listsiswaasal) { ?>
	<?php foreach ($listsiswaasal as $dt3) : ?>
	<tr>
		<td><?= $i ?></td>
		<td><?= $dt3['nis'] ?></td>
		<td><?= $dt3['namasiswa'] ?></td>
		<td><?= $dt3['kelaminsiswa'] ?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
	<?php } ?>
</table>