
<?php
$sekarang=date("dmY");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
header("content-disposition: attachment;filename=mutasi_excel_".$sekarang.".xls");
header("Content-Transfer-Encoding: binary ");
?>
<h1> <?= $title; ?></h1>
Data Mutasi <?= $daritanggal; ?>, sampai <?= $sampaitanggal; ?> 
  <table  id="tablestd">
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