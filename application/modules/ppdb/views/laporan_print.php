<h1> <?= $title; ?></h1>

  <table id="tablestd">
    <tr>
      <td>#</td>
      <td>Sekolah</td>
      <td>TahunPPDB</td>
      <td>Gelombang</td>
      <td>Jalur</td>
      <td>NoFormulir</td>
      <td>NIS</td>
      <td>Nama</td>
      <td>Status</td>
    </tr>
  <?php $no='1'; ?>
  <?php foreach ($siswa as $item): ?>
    <tr>
      <td><?= $no ?></td>
      <td><?= $item['sekolah'] ?></td>
      <td><?= $item['tahun_ppdb'] ?></td>
      <td><?= $item['gelombang'] ?></td>
      <td><?= $item['jalur'] ?></td>
      <td><?= $item['noformulir'] ?></td>
      <td><?= $item['nis'] ?></td>
      <td><?= $item['namasiswa'] ?></td>
      <td><?= $item['ppdb_status'] ?></td>
    </tr>
    <?php  
    $no++; 
    endforeach; ?>  
  </td>
</table>

<script>window.print();</script>

