
<head>
<title>Raport Siswa</title>
</head>
<!-- <body onload="window.print()"> -->

<body onload="window.print()">
  <div align='center'><h1><b>LAPORAN PENCAPAIAN KOMPETENSI SISWA TENGAH SEMESTER</b></h1></div>
<table width=100%>
        <tr><td width=140px>Nama Sekolah</td> <td> : <?= $get_data_sekolah['sekolah']; ?> </td>       <td width=140px>Kelas</td>   <td>: <?= $get_data_kelas['nama_kelas']; ?> / <?= $siswa_urut; ?></td></tr>
        <tr><td>Alamat</td>                   <td> : <?= $get_data_sekolah['alamat']; ?> <?= $get_data_sekolah['kota']; ?></td>     <td>Semester </td> <td>: <?= $get_tahun_akademik['semester']; ?></td></tr>
        <tr><td>Nama Peserta Didik</td>       <td> : <b> <?= $get_data_siswa['namasiswa']; ?></b> </td>           <td>Tahun Pelajaran </td> <td>:  <?= $get_tahun_akademik['tahun']; ?></td></tr>
        <tr><td>No Induk/NISN</td>            <td> : <?= $get_data_siswa['nis']; ?> / <?= $get_data_siswa['nisn']; ?></td>        <td></td></tr>
      </table><br><table  width=100% border=1>
          <tr>
            <th width='160px' colspan='2' rowspan='3'>&nbsp;&nbsp;Mata Pelajaran</th>
            <th colspan='7' style='text-align:center'>Aspek Penilaian</th>
          </tr>
          <tr>
          <th colspan='7' style='text-align:center'>Pengetahuan</th>
          </tr>
          <tr>
            <th  style='text-align:center'>PH1</th><th style='text-align:center'>PH2</th><th style='text-align:center'>PH3</th>
            <th  style='text-align:center'>PT1</th><th style='text-align:center'>PT2</th><th style='text-align:center'>PT3</th>
            <th  style='text-align:center'>UTS</th>
          </tr>

<?php foreach ($get_kelompok_mapel as $dtk) : ?>
          <tr>
            <td colspan='9'>&nbsp;&nbsp;<b><?= $dtk['nama_kelompok']?></b></td>
          </tr>
          <?php $sno=$row+1; ?>
<?php foreach ($get_nilai_uts as $dt) : ?>
<?php if($dtk['idmapelkat']==$dt['kelompok_id']){ ?>
  
          <tr>
                <td align=center><?= $sno++; ?></td>
                <td>&nbsp;&nbsp;<?= $dt['nama_mapel'] ?></td>
                <td align=center><?= $dt['ph1'] ?></td>
                <td align=center><?= $dt['ph2'] ?></td>
                <td align=center><?= $dt['ph3'] ?></td>
                <td align=center><?= $dt['pt1'] ?></td>
                <td align=center><?= $dt['pt2'] ?></td>
                <td align=center><?= $dt['pt3'] ?></td>
                <td align=center><?= $dt['uts'] ?></td>
            </tr>
<?php } ?>
            <?php endforeach; ?>
            <?php endforeach; ?>
          </table></center><br>
          <b>Presensi Siswa</b><br>
          <table  width=30% border=1>
          <tr><td>
          <table  width=100% border=0>
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