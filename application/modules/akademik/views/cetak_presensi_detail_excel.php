<?php
$sekarang = date("dmY");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT");
header("content-disposition: attachment;filename=cetak_presensidetail_" . $getdatasiswa['id'] . ".xls");
header("Content-Transfer-Encoding: binary ");
?>
<h4> <?= $title; ?></h4>
<div class="row">
  <div class="col-sm-4">No Formulir</div>
  <div class="col-sm-8"><?= $getdatasiswa['noformulir'] ?></div>
</div>
<div class="row">
  <div class="col-sm-4">NIS</div>
  <div class="col-sm-8"><?= $getdatasiswa['nis'] ?></div>
</div>
<div class="row">
  <div class="col-sm-4">Nama</div>
  <div class="col-sm-8"><?= $getdatasiswa['namasiswa'] ?></div>
</div>
<div class="row">
  <div class="col-sm-4">Kelas</div>
  <div class="col-sm-8"><?= getfieldtable("m_kelas", "nama_kelas", $getkelassiswa['kelas_id']) ?></div>
</div>
<div class="row">
  <div class="col-sm-4">Tahun Akademik</div>
  <div class="col-sm-8"><?= getfieldtable("m_tahunakademik", "nama", $tahun_akademik_default['value']) ?></div>
</div>
<div class="row">
  <div class="col-sm-4">Hadir</div>
  <div class="col-sm-8"><?= $get_siswaijin['jumlah'] ?></div>
</div>
<div class="row">
  <div class="col-sm-4">Sakit</div>
  <div class="col-sm-8"><?= $get_siswaijin['jumlah'] ?></div>
</div>
<div class="row">
  <div class="col-sm-4">Ijin</div>
  <div class="col-sm-8"><?= $get_siswaijin['jumlah'] ?></div>
</div>
<div class="row">
  <div class="col-sm-4">Tanpa Keterangan</div>
  <div class="col-sm-8"><?= $get_siswaijin['jumlah'] ?></div>
</div>