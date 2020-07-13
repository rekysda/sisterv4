<h1> <?= $title; ?></h1>
Data Prestasi <?= gettanggalindo($daritanggal); ?>, sampai <?= gettanggalindo($sampaitanggal); ?> 
<table id="tablestd">
    <tr>
    <td>#</td>
<th>Tanggal</th>
<td>Nama</td>
<td>Kelas</td>
<td>Tingkat</td>
<td>Lomba</td>
<td>Prestasi</td>
    </tr>
  <?php $no='1'; ?>
  <?php foreach ($dataprestasisiswa as $dt): ?>
    <tr>
    <td><?= $no ?></td>
<td><?= gettanggalindo($dt['tanggal']); ?></td>
<td><?= $dt['namasiswa']; ?></td>
<td><?= $dt['nama_kelas']; ?></td>
<td><?= $dt['tingkat']; ?></td>
<td><?= $dt['lomba']; ?> - <?= $dt['instansi']; ?></td>
<td><?= $dt['prestasi']; ?></td>
    </tr>
    <?php
    $no++; 
    endforeach; ?>
</table>
<script>window.print();</script>