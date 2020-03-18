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
<h4> <?= $title; ?></h4>
<div class="box-body">
        <div class="row">
          <div class="col-md-4">
           
          <table id="tablestd"width="100%">
                <tr><td>NIS</label> </td><td> <?= $datadetailsiswa['nis']?></td></tr>
                <tr><td>Nama Siswa</td><td> <?= $datadetailsiswa['namasiswa']?></td></tr>
                <tr><td>Alamat </td><td> <?= $datadetailsiswa['alamatsiswa']?></td></tr>
                <tr><td>Jenis Kelamin </td><td> <?= $datadetailsiswa['kelaminsiswa']?></td></tr>
                <tr><td>Nama Ayah </td><td> <?= $datadetailsiswa['namaayah']?></td></tr>
                <tr><td>HP Ayah </td><td> <?= $datadetailsiswa['hpayah']?></td></tr>
                <tr><td>Nama Ibu </td><td> <?= $datadetailsiswa['namaibu']?></td></tr>
                <tr><td>HP Ibu </td><td> <?= $datadetailsiswa['hpibu']?></td></tr>
                </table>
          </div>
          <div class="col-md-8">
              <h4>Detail Pelanggaran</h4>
            <table id="tablestd"width="100%">
                  <tr>
                    <td>#</td>
                    <td>Tanggal</td>
                    <td>Nama</th>
                    <td>Kelas</td>
                    <td>Pelanggaran</td>
                    <td>Point</td>
                  </tr>
                  <?php $i = 1; ?>
                  <?php foreach ($datapelanggaranbysiswa as $dt) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= gettanggalindo($dt['tanggal']); ?></td>
                      <td><?= $dt['namasiswa']; ?></td>
                      <td><?= $dt['nama_kelas']; ?></td>
                      <td><?= $dt['pelanggaran']; ?></td>
                      <td><?= $dt['point']; ?></td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
              </table>
          </div>
          </div>