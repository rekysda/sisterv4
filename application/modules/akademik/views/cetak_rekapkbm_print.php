<table id="noborder" width="50%">
  <tr>
    <td scope='row'>Nama Guru</td>
    <td><?= getfieldtable2('nama_guru', 'm_pegawai', 'id', $get_datagurukbm['guru_id']) ?></td>
  </tr>
  <tr>
    <td scope='row'>Mata Pelajaran</td>
    <td><?= $get_datagurukbm['nama_mapel'] ?></td>
  </tr>
  <tr>
    <td scope='row'>Tahun Akademik</td>
    <td><?= getfieldtable2('nama', 'm_tahunakademik', 'id', $get_datagurukbm['tahunakademik_id']) ?></td>
  </tr>
</table>

<?php if ($get_journal) { ?>
<b>Rekap KBM Bulan
  <?php $blnn = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    for ($n = 1; $n <= 12; $n++) {
      if ($bulan == $n) {
        echo "$blnn[$n]";
      }
    }   ?></b>
<table id="tablestd">

  <tr>
    <td>#</td>
    <td>Kelas</td>
    <td>Hari</td>
    <td>Tanggal</td>
    <td>Jam Ke</td>
    <td>Materi</td>
    <td>Keterangan</td>
    <td>H</td>
  <td>S</td>
  <td>I</td>
  <td>A</td>
  </tr>
  <?php $i = 1; ?>
  <?php foreach ($get_journal as $dt) : ?>
  <?php $databulan = date('n', strtotime($dt['tanggal'])); ?>
  <?php if ($databulan == $bulan) { ?>
  <tr>
    <td><?= $i; ?></td>
    <td><?= $dt['nama_kelas']; ?></td>
    <td><?= $dt['hari']; ?></td>
    <td><?= gettanggalindo($dt['tanggal']); ?></td>
    <td><?= $dt['jamke']; ?></td>
    <td><?= $dt['materi']; ?></td>
    <td><?= $dt['keterangan']; ?></td>
    <td><?php 
$datahadir = $this->akademik_model->get_absensiswajournal($dt['id'] ,$dt['tanggal'],"H"); 
$datasakit = $this->akademik_model->get_absensiswajournal($dt['id'] ,$dt['tanggal'],"S");
$dataijin = $this->akademik_model->get_absensiswajournal($dt['id'] ,$dt['tanggal'],"I");
$dataalpha = $this->akademik_model->get_absensiswajournal($dt['id'] ,$dt['tanggal'],"A");
?> 
<?= $datahadir['jumlah']; ?></td>
<td><?= $datasakit['jumlah']; ?></td>
<td><?= $dataijin['jumlah']; ?></td>
<td><?= $dataalpha['jumlah']; ?></td>
  </tr>
  <?php $total = $i ?>
  <?php $i++; ?>
  <?php } ?>
  <?php endforeach; ?>
  <tr>
    <td colspan="6">Total Mengajar</td>
    <td aign='center'><?= $total ?></td>
  </tr>
</table>
<?php } ?>

<script>
  window.print();
</script>