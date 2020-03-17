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

  <table id="tablestd">
    <tr>
      <td>#</td>
      <td>TahunPPDB</td>
      <td>Gelombang</td>
      <td>Jalur</td>
      <td>NoFormulir</td>
      <td>NIS</td>
      <td>Nama</td>
      <td>Status</td>
    </tr>
  <?php $no='1'; ?>
  <?php foreach ($siswa as $item): ?>
    <tr>
      <td><?= $no ?></td>
      <td><?= $item['tahun_ppdb'] ?></td>
      <td><?= $item['gelombang'] ?></td>
      <td><?= $item['jalur'] ?></td>
      <td><?= $item['noformulir'] ?></td>
      <td><?= $item['nis'] ?></td>
      <td><?= $item['namasiswa'] ?></td>
      <td><?= $item['ppdb_status'] ?></td>
    </tr>
    <?php  
    $no++; 
    endforeach; ?>  
  </td>
</table>

