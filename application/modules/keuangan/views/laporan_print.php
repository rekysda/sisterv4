<?php if($petugas!='semua')
{
$petugas= getfieldtable('user','name',$petugas);
}else{
$petugas = 'semua';
} 
?>
<h1> <?= $title; ?></h1>
<br>
Data Pembayaran <?= $daritanggal; ?>, sampai <?= $sampaitanggal; ?> , Cara Pembayaran <?= $carabayar; ?>  , Petugas <?= $petugas ?>
<table id="tablestd">
    <tr>
      <td >#</th>
      <td >Tanggal</th>
      <td >Nomor Nota</th>
      <td >Total</th>
      <td >Bayar</th>
      <td >Cara Pembayaran</th>
      <td >NoFormulir</th>
      <td >NIS</td>
      <td >Siswa</td>
      <td >Petugas</td>
    </tr>
  <?php $no='1'; ?>
  <?php foreach ($siswabayar as $item): ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= date('d M Y',strtotime($item['tanggal'])) ?></td>
      <td><?= $item['nomor_nota'] ?></td>
      <td><?= nominal($item['totalcart']) ?></td>
      <td><?= nominal($item['bayar']) ?></td>
      <td><?= $item['carabayar'] ?></td>
      <td><?= $item['noformulir'] ?></td>
      <td><?= $item['nis'] ?></td>
      <td><?= $item['namasiswa'] ?></td>
      <td><?= $item['name'] ?></td>
    </tr>
    <?php  
    $ttotal +=$item['totalcart'];
    $tbayar +=$item['bayar'];
    $no++; 
    endforeach; ?>  
  <tr>
      <td  align='right' colspan='3'> Total </td>
      <td><?= nominal($ttotal) ?></td>
      <td><?= nominal($tbayar) ?></td>

    </tr>
</table>

<script>window.print();</script>

