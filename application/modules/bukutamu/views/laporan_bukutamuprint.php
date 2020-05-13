<h1> <?= $title; ?></h1>
<h4>Data Buku Tamu <?= gettanggalindo($daritanggal); ?>, sampai <?= gettanggalindo($sampaitanggal); ?></h4> 
  <table id="tablestd">
    <tr>
<td scope="col">#</td>
<td>Nomor</td>
<td>Tanggal</td>
<td>Nama</td>
<td>Jabatan</td>
<td>HP</td>
<td>Maksud</td>
<td>Diterima</td>
<td>Yang Dituju</td>
    </tr>
  <?php $no='1'; ?>
  <?php foreach ($bukutamu as $dt): ?>
    <tr>
    <td><?= $no; ?></td>
                      <td><?= $dt['nomor']; ?></td>
                      <td><?= gettanggalindo($dt['tanggal']); ?></td>
                      <td><?= $dt['nama']; ?></td>
                      <td><?= $dt['jabatan']; ?></td>
                      <td><?= $dt['hp']; ?></td>
                      <td><?= $dt['maksud']; ?></td>
                      <td><?= $dt['nama_guru']; ?></td>
                      <td><?= $dt['catatan']; ?></td>
    </tr>
    <?php
    $no++; 
    endforeach; ?>  
</table>