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
<table id="tablestd"width="100%">
                  <tr>
                    <td>#</td>
                    <td>NIS</td>
                    <td>Nama</td>
                    <td>Total Point</td>
                    <td>Jml Pelanggaran</td>
                  </tr>
                  <?php $i = 1; ?>
                  <?php foreach ($datasiswapoint as $dt) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['nis']; ?></td>
                      <td><?= $dt['namasiswa']; ?></td>
                      <td><?= $dt['jumlah_point']; ?></td>
                      <td><?= $dt['jumlah_pelanggaran']; ?></td>

                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
              </table>