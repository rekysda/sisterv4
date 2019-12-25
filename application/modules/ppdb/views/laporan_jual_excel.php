<?php
$sekarang=date("dmY");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
header("content-disposition: attachment;filename=laporanjualformulir_excel_".$sekarang.".xls");
header("Content-Transfer-Encoding: binary ");
?>
<h1> <?= $title; ?></h1>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Nama</th>
      <th scope="col">AsalSekolah</th>
      <th scope="col">Alamat</th>
      <th scope="col">NoHandphone</th>
      <th scope="col">Jumlah</th>
      <th scope="col">NoFormulir</th>
      <th scope="col">Bayar</th>
    </tr>
  </thead>
  <tbody>
  <?php $no='1'; ?>
  <?php foreach ($penjualanresult as $item): ?>
  <?php if($item['bayar_form']>'0'){?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= date('d M Y',strtotime($item['tanggal'])) ?></td>
      <td><?= $item['nama'] ?></td>
      <td><?= $item['asalsekolah'] ?></td>
      <td><?= $item['alamat'] ?></td>
      <td><?= $item['hp'] ?></td>
      <td><?= $item['jumlah_form'] ?></td>
      <td><?= $item['no_formulir'] ?></td>
      <td><?= nominal($item['bayar_form']) ?></td>
    </tr>
    <?php 
    $tbayar +=$item['bayar_form'];
    $no++; 
     } 
    endforeach; ?>  
  </tbody>
  <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <th> Total </th>
      <td><?= nominal($tbayar) ?></td>
    </tr>
</table>