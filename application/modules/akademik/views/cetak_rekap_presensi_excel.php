<?php
$sekarang = date("dmY");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT");
header("content-disposition: attachment;filename=cetak_presensi_excel_" . $sekarang . ".xls");
header("Content-Transfer-Encoding: binary ");
?>
<h4> <?= $title; ?></h4>
Angkatan : <?= $getkelas['tahun'] ?><br>
Nama Kelas : <?= $getkelas['nama_kelas'] ?><br>
Jurusan : <?= $getkelas['jurusan'] ?><br>
Wali Kelas : <?= $getkelas['nama_guru'] ?><br>
Bulan : <?= getbulanindo($bulan) ?> / <?= ($tahun) ?><br>
<table id="tablestd">
  <tr>
    <td>No</td>
    <td>NIS</td>
    <td>Nama Siswa</td>
    <?php foreach ($gettglabsensi as $dthr1) : ?>
    <td><?= date('d', strtotime($dthr1['tanggal'])) ?></td>
    <?php endforeach; ?>
    <td>&nbsp;&nbsp;</td>
    <td>H</td>
    <td>S</td>
    <td>I</td>
    <td>A</td>
  </tr>
  <?php $i = 1; ?>
  <?php if ($getlistsiswa) { ?>
  <?php foreach ($getlistsiswa as $dt3) : ?>
  <tr>
    <td><?= $i ?></td>
    <td><?= $dt3['nis'] ?></td>
    <td><?= $dt3['namasiswa'] ?></td>
    <?php foreach ($getdataabsensi as $dthr2) : ?>
    <?php if ($dt3['id'] == $dthr2['siswa_id']) { ?>
    <td><?= $dthr2['status'] ?></td>
    <?php
            if ($dthr2['status'] == 'H') {
              $th++;
            }
            if ($dthr2['status'] == 'S') {
              $ts++;
            }
            if ($dthr2['status'] == 'I') {
              $ti++;
            }
            if ($dthr2['status'] == 'A') {
              $ta++;
            }
            ?>
    <?php } ?>
    <?php endforeach; ?>
    <td></td>
    <td><?= $th ?></td>
    <td><?= $ts ?></td>
    <td><?= $ti ?></td>
    <td><?= $ta ?></td>
    <?php
        $th = '0';
        $ts = '0';
        $ti = '0';
        $ta = '0';
        ?>
  </tr>
  <?php $i++; ?>
  <?php endforeach; ?>
  <?php } ?>
</table>