
<?php
$sekarang=date("dmY");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
header("content-disposition: attachment;filename=siswappdb_excel_".$sekarang.".xls");
header("Content-Transfer-Encoding: binary ");
?>
<h1> <?= $title; ?></h1>

<table id="tablestd">
  <tr>
    <td>#</td>
    <td>Sekolah</td>
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
    <td><?= $item['sekolah'] ?></td>
    <td><?= $item['tahun_ppdb'] ?></td>
    <td><?= $item['gelombang'] ?></td>
    <td><?= $item['jalur'] ?></td>
    <td><?= $item['ppdb_status'] ?></td>
    <td><?= $item['noformulir'] ?></td>
    <td><?= $item['nis'] ?></td>
    <td><?= $item['namasiswa'] ?></td>
  </tr>
  <?php  
  $no++; 
  endforeach; ?>  
</td>
</table>

