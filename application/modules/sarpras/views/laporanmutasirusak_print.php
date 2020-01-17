<h1> <?= $title; ?></h1>
Data Mutasi Pemusnahan <?= $daritanggal; ?>, sampai <?= $sampaitanggal; ?> 
  <table  id="tablestd">
    <tr>
      <td scope="col">#</td>
      <td scope="col">Tanggal</td>
      <td scope="col">Kode</td>
      <td scope="col">Kode.Inv</td>
      <td scope="col">Barang</td>
      <td scope="col">Jumlah</td>
      <td scope="col">Keterangan</td>
    </tr>
  <?php $no='1'; ?>
  <?php foreach ($mutasibarang as $item): ?>
    <tr>
      <td scope="row"><?= $no ?></td>
      <td><?= date('d M Y',strtotime($item['tanggal'])) ?></td>
      <td><?= $item['kode'] ?></td>
      <td><?= $item['kode_inv'] ?></td>
      <td><?= $item['namabarang'] ?></td>
      <td><?= $item['jumlah'] ?></td>
      <td><?= $item['keterangan'] ?></td>
    </tr>
    <?php
    $no++; 
    endforeach; ?>  
</table>

<script>window.print();</script>