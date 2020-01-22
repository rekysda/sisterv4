
<?php
$sekarang=date("dmY");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
header("content-disposition: attachment;filename=laporanbarang_excel_".$sekarang.".xls");
header("Content-Transfer-Encoding: binary ");
?>
<h1> <?= $title; ?></h1>
Gedung : <?= $getruangan['nama_gedung']; ?><br>
 Ruangan : <?= $getruangan['nama_ruangan']; ?><br>
 Sekolah : <?= $getruangan['sekolah']; ?>
 <br>
              <table  id="tablestd">
                <thead>
                  <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Jumlah</td>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($get_namabarang as $dt) : ?>
                  <?php if ( $dt['stok']>0) { ?>
                  <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['namabarang']; ?></td>
                      <td><?= $dt['stok']; ?></td>                   
                    </tr>
                  <?php } ?>
                    <?php $i++; ?>
                 
                  <?php endforeach; ?>
                </tbody>
              </table>