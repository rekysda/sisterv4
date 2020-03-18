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
Data Mutasi <?= $daritanggal; ?>, sampai <?= $sampaitanggal; ?> 
  <table id="tablestd">
  <thead>
    <tr>
      <td scope="col">#</td>
      <td scope="col">Tanggal</td>
      <td scope="col">Kode</td>
      <td scope="col">Ruangan</td>
      <td scope="col">Barang</td>
      <td scope="col">Jumlah</td>
      <td scope="col">Keterangan</td>
    </tr>
  </thead>
  <tbody>
  <?php $no='1'; ?>
  <?php foreach ($mutasibarang as $item): ?>
  <?php
    if($item['jumlah'] > 0 ? $jumlah=$item['jumlah'] : $jumlah='('.$item['jumlah'].')');
    if($item['jumlah'] > 0 ? $keterangan='MASUK' : $keterangan='KELUAR');
  ?>
    <tr>
      <td scope="row"><?= $no ?></td>
      <td><?= date('d M Y',strtotime($item['tanggal'])) ?></td>
      <td><?= $item['kode'] ?></td>
      <td><?= $item['nama_ruangan'] ?></td>      
      <td><?= $item['namabarang'] ?></td>
      <td><?= $jumlah ?></td>
      <td><?= $keterangan ?></td>
    </tr>
    <?php
    $no++; 
    endforeach; ?>  
  </tbody>
</table>