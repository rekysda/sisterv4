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
<b>Laporan Keuangan <?= $daritanggal; ?>, sampai <?= $sampaitanggal; ?> , Cara Pembayaran <?= $carabayar; ?>  , Petugas <?= $petugas ?></b>
<table id="tablestd">
    <tr>
      <td>#</td>
      <td>Tanggal</td>
      <td>Nomor Nota</td>
      <td>Total</td>
      <td>Bayar</td>
      <td>Cara Pembayaran</td>
      <td>NoFormulir</td>
      <td>NIS</td>
      <td>Siswa</td>
      <td>Petugas</td>
    </tr>
  <?php $no='1'; ?>
  <?php foreach ($siswabayar as $item): ?>
    <tr>
      <td><?= $no ?></td>
      <td><?= date('d M Y',strtotime($item['tanggal'])) ?></td>
      <td><?= $item['nomor_nota'] ?></td>
      <td><?= nominal($item['totalcart']) ?></td>
      <td><?= nominal($item['bayar']) ?></td>
      <td><?= $item['carabayar'] ?></td>
      <td><?= $item['noformulir'] ?></td>
      <td><?= $item['nis'] ?></td>
      <td><?= $item['namasiswa'] ?></td>
      <td><?= $item['name'] ?></td>
    </tr>
    <?php  
    $ttotal +=$item['totalcart'];
    $tbayar +=$item['bayar'];
    $no++; 
    endforeach; ?>  
  <tr>
      <td align='right' colspan='3'> Total </td>
      <td><?= nominal($ttotal) ?></td>
      <td><?= nominal($tbayar) ?></td>
    </tr>
</table>