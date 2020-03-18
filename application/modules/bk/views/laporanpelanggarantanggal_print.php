<h1> <?= $title; ?></h1>
Data Pelanggaran <?= gettanggalindo($daritanggal); ?>, sampai <?= gettanggalindo($sampaitanggal); ?> 
<table id="tablestd">
    <tr>
      <td>#</td>
      <td>Tanggal</td>
      <td>Nama</td>
      <td>Kelas</td>
      <td>Kategori</td>
      <td>Pelanggaran</td>
      <td>Point</td>
    </tr>
  <?php $no='1'; ?>
  <?php foreach ($datapelanggaransiswa as $dt): ?>
    <tr>
      <td><?= $no ?></td>
      <td><?= date('d M Y',strtotime($dt['tanggal'])) ?></td>
      <td><?= $dt['namasiswa'] ?></td>
      <td><?= $dt['nama_kelas'] ?></td>
      <td><?= $dt['kategori'] ?></td>
      <td><?= $dt['pelanggaran'] ?></td>
      <td><?= $dt['point'] ?></td>
    </tr>
    <?php
    $no++; 
    endforeach; ?>
</table>
<script>window.print();</script>