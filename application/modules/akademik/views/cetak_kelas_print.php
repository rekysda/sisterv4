<h4> <?= $title; ?></h4>
Angkatan : <?= $getkelasasal['tahun'] ?><br>
Nama Kelas : <?= $getkelasasal['nama_kelas'] ?><br>
Jurusan : <?= $getkelasasal['jurusan'] ?><br>
Wali Kelas : <?= $getkelasasal['nama_guru'] ?><br>
<table id="tablestd">
  <tr>
    <td>No</td>
    <td>NIS</td>
    <td>Nama Siswa</td>
    <td>JK</td>
  </tr>
  <?php $i = 1; ?>
  <?php if ($listsiswaasal) { ?>
  <?php foreach ($listsiswaasal as $dt3) : ?>
  <tr>
    <td><?= $i ?></td>
    <td><?= $dt3['nis'] ?></td>
    <td><?= $dt3['namasiswa'] ?></td>
    <td><?= $dt3['kelaminsiswa'] ?></td>
  </tr>
  <?php $i++; ?>
  <?php endforeach; ?>
  <?php } ?>
</table>
<script>
  window.print();
</script>