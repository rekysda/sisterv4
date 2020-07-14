<?php
error_reporting(0);?>
<html>
<head>
<title>Hal 3 - Raport Siswa</title>
<link rel="stylesheet" href="../bootstrap/css/printer.css">
</head>
<body onload="window.print()">
  <div align='center'><h1><b>PENCAPAIAN KOMPETENSI PESERTA DIDIK</b></h1></div>
<table width=100%>
        <tr><td width=140px>Nama Sekolah</td> <td> : <?= $get_data_sekolah['sekolah']; ?> </td>       <td width=140px>Kelas</td>   <td>: <?= $get_data_kelas['nama_kelas']; ?> / <?= $siswa_urut; ?></td></tr>
        <tr><td>Alamat</td>                   <td> : <?= $get_data_sekolah['alamat']; ?> <?= $get_data_sekolah['kota']; ?></td>     <td>Semester </td> <td>: <?= $get_tahun_akademik['semester']; ?></td></tr>
        <tr><td>Nama Peserta Didik</td>       <td> : <b> <?= $get_data_siswa['namasiswa']; ?></b> </td>           <td>Tahun Pelajaran </td> <td>:  <?= $get_tahun_akademik['tahun']; ?></td></tr>
        <tr><td>No Induk/NISN</td>            <td> : <?= $get_data_siswa['nis']; ?> / <?= $get_data_siswa['nisn']; ?></td>        <td></td></tr>
      </table><br>
      <br>
      <b>A. SIKAP</b><br><br>

      <b>1. Sikap Spiritual</b>
      <table id='tablemodul1' width=100% border=1>
          <tr>
            <td width='190px'><b>Predikat</b></td>
            <td><b>Deskripsi</b></th>
          </tr>
          <tr>
            <td><?= $get_nilai_sikap['spiritual_predikat'] ?></td>
            <td><?= $get_nilai_sikap['spiritual_deskripsi'] ?></td>
          </tr>
      </table>


      <b>2. Sikap Sosial</b>
      <table id='tablemodul1' width=100% border=1>
          <tr>
            <td width='190px'><b>Predikat</b></td>
            <td><b>Deskripsi</b></td>
          </tr>
          <tr>
          <td><?= $get_nilai_sikap['sosial_predikat'] ?></td>
            <td><?= $get_nilai_sikap['sosial_deskripsi'] ?></td>
          </tr>
      </table><br/>
      
<b>B. Pengetahuan dan Keterampilan</b><br>
<b>Kriteria ketuntasan Minimal : 75 </b>
<table id='tablemodul1'  width=100% border=1>
          <tr>
            <th width='160px' colspan='3' rowspan='2'>&nbsp;&nbsp;Mata Pelajaran</th>
            <th colspan='3' style='text-align:center'>Pengetahuan</th>
          </tr>
          <tr>
            <th  style='text-align:center'>Angka</th><th style='text-align:center'>Predikat</th><th style='text-align:center'>Deskripsi</th>
          </tr>

<?php foreach ($get_kelompok_mapel as $dtk) : ?>
          <tr>
            <td colspan='6'>&nbsp;&nbsp;<b><?= $dtk['nama_kelompok']?></b></td>
          </tr>
          <?php $sno=$row+1; ?>
<?php foreach ($get_nilai_uts as $dt) : ?>
<?php if($dtk['idmapelkat']==$dt['kelompok_id']){ ?>
  
          <tr>
                <td align=center><?= $sno++; ?></td>
                <td colspan='2'>&nbsp;&nbsp;<?= $dt['nama_mapel'] ?></td>
                <td align=center><?= $dt['rata2'] ?></td>
                <td align=center><?= $dt['grade'] ?></td>
                <td align=left><?= $dt['deskripsi'] ?></td>
            </tr>
<?php } ?>
            <?php endforeach; ?>
            <?php endforeach; ?>
          </table></center>
<b>Kriteria ketuntasan Minimal : 75 </b>
<table id='tablemodul1'  width=100% border=1>
          <tr>
            <th width='160px' colspan='3' rowspan='2'>&nbsp;&nbsp;Mata Pelajaran</th>
            <th colspan='3' style='text-align:center'>Keterampilan</th>
          </tr>
          <tr>
            <th  style='text-align:center'>Angka</th><th style='text-align:center'>Predikat</th><th style='text-align:center'>Deskripsi</th>
          </tr>

<?php foreach ($get_kelompok_mapelket as $dtk) : ?>
          <tr>
            <td colspan='6'>&nbsp;&nbsp;<b><?= $dtk['nama_kelompok']?></b></td>
          </tr>
          <?php $sno=$row+1; ?>
<?php foreach ($get_nilai_keterampilan as $dt) : ?>
<?php if($dtk['idmapelkat']==$dt['kelompok_id']){ ?>
  
          <tr>
                <td align=center><?= $sno++; ?></td>
                <td colspan='2'>&nbsp;&nbsp;<?= $dt['nama_mapel'] ?></td>
                <td align=center><?= $dt['rata2'] ?></td>
                <td align=center><?= $dt['grade'] ?></td>
                <td align=left><?= $dt['deskripsi'] ?></td>
            </tr>
<?php } ?>
            <?php endforeach; ?>
            <?php endforeach; ?>
          </table></center> <br>
<b>C. Ekstrakurikuler</b><br>
<table id='tablemodul1' width=100% border=1>
    <tr>
      <td width='190px'><b>Kegiatan</b></td>
      <td><b>Keterangan</b></th>
    </tr>

    <?php foreach ($get_nilai_extrakulikuler as $dt) : ?>
    <tr>
      <td><?= $dt['kegiatan'] ?></td>
      <td><?= $dt['deskripsi'] ?></td>
    </tr>

    <?php endforeach; ?>
</table><br>
          <b>D. Ketidakhadiran</b><br>
          <table id='tablemodul1'  width=30% border=1>
          <tr><td>
          <table id='noborder' width=100% border=0>
          <tr>
            <td>&nbsp;&nbsp;Sakit </td><td><?= $get_siswasakit['jumlah'] ?> &nbsp;&nbsp; Hari</td>
          </tr>
          <tr>
            <td>&nbsp;&nbsp;Ijin</td><td><?= $get_siswaijin['jumlah'] ?>&nbsp;&nbsp; Hari</td>
          </tr>
          <tr>
            <td>&nbsp;&nbsp;Tanpa Keterangan</td><td><?= $get_siswaalpa['jumlah'] ?>&nbsp;&nbsp; Hari</td>
          </tr>
          </table>
          </td>
          </tr>
          </table>
            <br>
            <b>E. Catatan Wali Kelas</b><br>
<table id='tablemodul1' width='100%'><tr style='height:30px;'><td>
<?= $get_catatan_walikelas['deskripsi'] ?>
</td></tr></table>
<br>
<b>F. Tanggapan Orang Tua / Wali Murid</b><br>
<table id='tablemodul1' width='100%'><tr style='height:30px;'><td></td></tr></table>
<?php if($get_tahun_akademik['semester']=='2'){ ?>
<br>
<table  width='80%'><tr style='height:20px;'><td>
<b>Keputusan:</b><br>
Berdasarkan pencapaian kompetisi pada semester ke-1 dan ke-2, peserta didik<br>
ditetapkan*):<br>
naik ke kelas ........... (......................)<br>
tinggal ke kelas ........ (......................)<br><br>
*) Coret yang tidak perlu.
</td></tr></table>
<?php }?>         
          <table border=0 width=100%>
  <tr>
    <td width="260" align="left">Orang Tua / Wali</td>
    <td width="520"align="center">Mengetahui <br> Kepala <?= $get_data_sekolah['sekolah']; ?></td>
    <td width="260" align="left"><?= $get_data_sekolah['kota']; ?>, <?= date('d') ?> <?= getbulanindo(date('n')) ?> <?= date('Y') ?> <br> Wali Kelas</td>
  </tr>
  <tr>
    <td align="left"><br /><br /><br /><br /><br />
      ................................... <br /><br /></td>

    <td align="center" valign="top"><br /><br /><br /><br /><br />
      DRS. Kepala Sekolah, M.Pd
    </td>

    <td align="left" valign="top"><br /><br /><br /><br /><br />
      <?= $get_data_kelas['nama_guru']; ?>
    </td>
  </tr>
</table> 
</body>
</body>
</html>