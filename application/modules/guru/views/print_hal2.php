<?php 
error_reporting(0);
?>
<html>
<head>
<title>Hal 2 - Raport Siswa</title>
<style type="text/css">
  td { padding:2px; }
</style>
</head>
<body onload="window.print()">
    <h1 align=center>IDENTITAS PESERTA DIDIK</h1><br>

    <table style='font-size:15px' width='100%'>
        <tr><td width='25px'>1.</td>  <td width='190px'>Nama Lengkap Peserta Didik</td>   <td width='10px'> : </td><td> <?=$get_data_siswa['namasiswa'] ?></td></tr>
        <tr><td>2.</td>  <td width='190px'>Nomor Induk/NISN</td>                          <td width='10px'> : </td><td> <?=$get_data_siswa['nis'] / $get_data_siswa['nisn'] ?></td></tr>
        <tr><td>3.</td>  <td width='190px'>Tempat,Tanggal Lahir</td>                      <td width='10px'> : </td><td> <?=$get_data_siswa['tempatlahirsiswa']?>,<?= gettanggalindo2($get_data_siswa['tanggallahirsiswa'])?></td></tr>
        <tr><td>4.</td>  <td width='190px'>Jenis Kelamin</td>                             <td width='10px'> : </td><td> <?=$get_data_siswa['kelaminsiswa'] ?></td></tr>
        <tr><td>5.</td>  <td width='190px'>Agama</td>                                     <td width='10px'> : </td><td> <?=$get_data_siswa['nama_agama'] ?></td></tr>
        <tr><td>6.</td>  <td width='190px'>Status dalam Keluarga</td>                     <td width='10px'> : </td><td> <?=$get_data_siswa['status_anak'] ?></td></tr>
        <tr><td>7.</td>  <td width='190px'>Anak ke</td>                                   <td width='10px'> : </td><td> <?=$get_data_siswa['anakke'] ?></td></tr>
        <tr><td>8.</td>  <td width='190px'>Alamat Peserta Didik</td>                      <td width='10px'> : </td><td> <?=$get_data_siswa['alamatsiswa'] ?></td></tr>
        <tr><td>9.</td>  <td width='190px'>Nomor Telepon Rumah</td>                       <td width='10px'> : </td><td> <?=$get_data_siswa['hpsiswa'] ?></td></tr>
        <tr><td>10.</td> <td width='190px'>Sekolah Asal (SMP/MTs)</td>                    <td width='10px'> : </td><td> <?=$get_data_siswa['sekolahasal'] ?></td></tr>
        <tr><td>11.</td> <td width='190px'>Diterima di sekolah ini</td>                   <td width='10px'> : </td><td> </td></tr>
        <tr><td></td> <td width='190px'>Di Kelas</td>                                     <td width='10px'> : </td><td> <?=$get_data_siswa['masuk_kelas'] ?></td></tr>
        <tr><td></td> <td width='190px'>Pada Tanggal</td>                                 <td width='10px'> : </td><td> <?=gettanggalindo2($get_data_siswa['masuk_tanggal']) ?></td></tr>
        <tr><td>12.</td> <td width='190px'>Orang Tua</td>                                 <td width='10px'> : </td><td></td></tr>
        <tr><td></td> <td width='190px'>a. Nama Ayah</td>                                 <td width='10px'> : </td><td> <?=$get_data_siswa['namaayah'] ?></td></tr>
        <tr><td></td> <td width='190px'>b. Nama Ibu</td>                                  <td width='10px'> : </td><td> <?=$get_data_siswa['namaibu'] ?></td></tr>
        <tr><td></td> <td width='190px'>c. Alamat</td>                                    <td width='10px'> : </td><td> <?=$get_data_siswa['alamatayah'] ?></td></tr>
        <tr><td></td> <td width='190px'>d. Nomor Telepon/HP</td>                          <td width='10px'> : </td><td> <?=$get_data_siswa['hpayah'] ?></td></tr>
        <tr><td>13.</td> <td width='190px'>Pekerjaan Orang Tua</td>                       <td width='10px'> : </td><td></td></tr>
        <tr><td></td> <td width='190px'>a. Ayah</td>                                      <td width='10px'> : </td><td> <?=$get_data_siswa['pekerjaanayah'] ?></td></tr>
        <tr><td></td> <td width='190px'>b. Ibu</td>                                       <td width='10px'> : </td><td> <?=$get_data_siswa['pekerjaanibu'] ?></td></tr>
        <tr><td>14.</td> <td width='190px'>Wali Peserta Didik</td>                        <td width='10px'> : </td><td> </td></tr>
        <tr><td></td> <td width='190px'>a. Nama Wali</td>                                 <td width='10px'> : </td><td> <?=$get_data_siswa['namawali'] ?></td></tr>
        <tr><td></td> <td width='190px'>b. Alamat</td>                             <td width='10px'> : </td><td> <?=$get_data_siswa['alamatwali'] ?></td></tr>
        <tr><td></td> <td width='190px'>c. Nomor Telepon/HP</td>                                    <td width='10px'> : </td><td> <?=$get_data_siswa['hpwali'] ?></td></tr>
        <tr><td></td> <td width='190px'>d. Pekerjaan</td>                                 <td width='10px'> : </td><td> <?=$get_data_siswa['pekerjaanwali'] ?></td></tr>
    </table>
    <br><br><br>
    <table width='40%' style='float:right'>
        <tr><td>Padang, <?=  (date('d')); ?> <?=  getbulanindo(date('n')); ?> <?=  (date('Y')); ?><br>
                Kepala Sekolah,<br><br><br><br>


                <b>Drs.Kepala Sekolah<br>
                NIP : 196209051987031007</b></td></tr>
    </table>
</body>
</html>