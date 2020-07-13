<style>
    
body{font-size: 12px;color: black;}
table#tablestd{
	border-width: 1px;
	border-style: solid;
	border-color: #D8D8D8;
	border-collapse: collapse;
	margin: 10px 0px;
}
table#tablestd td{
	padding: 0.5em; 	color: #000;
	vertical-align: top;
	border-width: 0px;
	padding: 4px;
	border: 1px solid #000;
	
}

table#tablemodul1{
	border-width: 1px;
	border-style: solid;
	border-color: #000;
	border-collapse: collapse;
	margin: 10px 0px;
}
table#tablemodul1 td{
	padding:1px 6px 2px 6px;
	border: 1px solid #000; 
	
}

table#tablemodul1 th{
	padding:1px 6px 2px 6px;
	border: 1px solid #000; 
	
}

h1{
	font-size:24px;
}
</style>
<h1> <?= $title; ?></h1>
Data Prestasi <?= gettanggalindo($daritanggal); ?>, sampai <?= gettanggalindo($sampaitanggal); ?> 
<table id="tablestd">
    <tr>
<td>#</td>
<td>Tanggal</td>
<td>Nama</td>
<td>Kelas</td>
<td>Tingkat</td>
<td>Lomba</td>
<td>Prestasi</td>
    </tr>
  <?php $no='1'; ?>
  <?php foreach ($dataprestasisiswa as $dt): ?>
    <tr>
<td><?= $no ?></td>
<td><?= gettanggalindo($dt['tanggal']); ?></td>
<td><?= $dt['namasiswa']; ?></td>
<td><?= $dt['nama_kelas']; ?></td>
<td><?= $dt['tingkat']; ?></td>
<td><?= $dt['lomba']; ?> - <?= $dt['instansi']; ?></td>
<td><?= $dt['prestasi']; ?></td>
    </tr>
    <?php
    $no++; 
    endforeach; ?>
</table>