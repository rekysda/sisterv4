<?php
$sekarang = date("dmY");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT");
header("content-disposition: attachment;filename=cetak_kelas_excel_" . $sekarang . ".xls");
header("Content-Transfer-Encoding: binary ");
?>
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