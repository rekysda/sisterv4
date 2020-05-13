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
<h4>Data Buku Tamu <?= gettanggalindo($daritanggal); ?>, sampai <?= gettanggalindo($sampaitanggal); ?></h4> 
  <table id="tablestd">
    <tr>
<td scope="col">#</td>
<td>Nomor</td>
<td>Tanggal</td>
<td>Nama</td>
<td>Jabatan</td>
<td>HP</td>
<td>Maksud</td>
<td>Yang Dituju</td>
<td>Catatan</td>
    </tr>
  <?php $no='1'; ?>
  <?php foreach ($bukutamu as $dt): ?>
    <tr>
    <td><?= $no; ?></td>
                      <td><?= $dt['nomor']; ?></td>
                      <td><?= gettanggalindo($dt['tanggal']); ?></td>
                      <td><?= $dt['nama']; ?></td>
                      <td><?= $dt['jabatan']; ?></td>
                      <td><?= $dt['hp']; ?></td>
                      <td><?= $dt['maksud']; ?></td>
                      <td><?= $dt['nama_guru']; ?></td>
                      <td><?= $dt['catatan']; ?></td>
    </tr>
    <?php
    $no++; 
    endforeach; ?>  
</table>