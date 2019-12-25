<h4>Rekap Penggajian, Bulan : <?= $bulan ?>, Tahun : <?= $tahun ?></h4>
<table id="tablestd">
  <tr>
    <td>#</td>
    <td>Nama</td>
    <td>GajiPokok</td>
    <td>Gelar</td>
    <td>Sertifikasi</td>
    <td>MasaKerja</td>
    <td>GajiNgajar</td>
    <td>Transport</td>
    <td>Laboratorium</td>
    <td>WaliKelas</td>
    <td>(Sosial)</td>
    <td>(BPJS)</td>
    <td>GajidiTerima</td>
  </tr>
  <?php $i = 1; ?>
  <?php foreach ($getgajiall as $dt) : ?>
    <tr>
      <td><?= $i; ?></td>
      <td><?= $dt['nama_guru']; ?></td>
      <td><?= nominal($dt['gajipokok']) ?></td>
      <td><?= nominal($dt['gelar']) ?></td>
      <td><?= nominal($dt['sertifikasi']) ?></td>
      <td><?= nominal($dt['masakerja']) ?></td>
      <td><?= nominal($dt['gajingajar']) ?></td>
      <td><?= nominal($dt['transport']) ?></td>
      <td><?= nominal($dt['laboratorium']) ?></td>
      <td><?= nominal($dt['walikelas']) ?></td>
      <td><?= nominal($dt['sosial']) ?></td>
      <td><?= nominal($dt['bpjs']) ?></td>
      <td><?= nominal($dt['gajiditerima']) ?></td>

    </tr>
    <?php $total += $dt['gajiditerima']; ?>
    <?php $i++; ?>
  <?php endforeach; ?>
  <tr>
    <td colspan="12" align="right">Total</td>
    <td><?= nominal($total) ?></td>
  </tr>
</table>

<script>
  window.print();
</script>