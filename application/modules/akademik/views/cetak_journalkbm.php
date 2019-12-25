<h4>Jurnal Kegiatan Belajar Mengajar</h4>
<table id="noborder">
  <tr>
    <td>Nama Kelas</td>
    <td>: <?= $get_datajadwal['nama_kelas'] ?> </td>
  </tr>
  <tr>
    <td scope='row'>Nama Guru</td>
    <td>: <?= getfieldtable2('nama_guru', 'm_pegawai', 'id', $get_datajadwal['guru_id']) ?></td>
  </tr>
  <tr>
    <td scope='row'>Mata Pelajaran</td>
    <td>: <?= $get_datajadwal['nama_mapel'] ?></td>
  </tr>
  <tr>
    <td scope='row'>Tahun Akademik</td>
    <td>: <?= getfieldtable2('nama', 'm_tahunakademik', 'id', $get_datajadwal['tahunakademik_id']) ?></td>
  </tr>
</table>
<table id="tablestd">
  <tr>
    <td>#</td>
    <td>Hari</td>
    <td>Tanggal</td>
    <td>Jam Ke</td>
    <td>Materi</td>
    <td>Keterangan</td>
  </tr>
  <?php $i = 1; ?>
  <?php foreach ($get_journal as $dt) : ?>
  <tr>
    <td><?= $i; ?></td>
    <td><?= $dt['hari']; ?></td>
    <td><?= gettanggalindo($dt['tanggal']); ?></td>
    <td><?= $dt['jamke']; ?></td>
    <td><?= $dt['materi']; ?></td>
    <td><?= $dt['keterangan']; ?></td>
  </tr>
  <?php $i++; ?>
  <?php endforeach; ?>
</table>
<script>
  window.print();
</script>