<?php 
session_start();
error_reporting(0);
?>
<html>
<head>
<title>Hal 1 - Raport Siswa</title>
<link rel="stylesheet" href="../bootstrap/css/printer.css">
<style type="text/css">
  td { padding:9px; }
</style>
</head>
<body onload="window.print()">
    <h1 align=center>RAPORT <br>SEKOLAH MENENGAH ATAS <br> (SMA)</h1><br>

    <table style='font-size:23px' width='100%'>
        <tr><td width='180px'>Nama Sekolah</td>   <td width='10px'> : </td><td> <?=  "$get_data_sekolah[sekolah]"; ?></td></tr>
        <tr><td width='180px'>NPSN/NSS</td>       <td width='10px'> : </td><td> <?=  "$get_data_sekolah[npsn]"; ?></td></tr>
        <tr><td width='180px'>NSS</td>            <td width='10px'> : </td><td> <?=  "$get_data_sekolah[nss]"; ?></td></tr>
        <tr><td width='180px'>Alamat Sekolah</td> <td width='10px'> : </td><td> <?=  "$get_data_sekolah[alamat]"; ?></td></tr>
        <tr><td width='180px'></td>               <td width='10px'>   </td><td> <?=  "Kode Pos $get_data_sekolah[kode_pos], Telp. $get_data_sekolah[telepon]"; ?></td></tr>
        <tr><td width='180px'>Kelurahan</td>      <td width='10px'> : </td><td> <?=  "$get_data_sekolah[kelurahan]"; ?></td></tr>
        <tr><td width='180px'>Kecamatan</td>      <td width='10px'> : </td><td> <?=  "$get_data_sekolah[kecamatan]"; ?></td></tr>
        <tr><td width='180px'>Kabupaten/Kota</td> <td width='10px'> : </td><td> <?=  "$get_data_sekolah[kota]"; ?></td></tr>
        <tr><td width='180px'>Provinsi</td>       <td width='10px'> : </td><td> <?=  "$get_data_sekolah[provinsi]"; ?></td></tr>
        <tr><td width='180px'>Website</td>        <td width='10px'> : </td><td> <?=  "$get_data_sekolah[website]"; ?></td></tr>
        <tr><td width='180px'>E-Mail</td>         <td width='10px'> : </td><td> <?=  "$get_data_sekolah[email]"; ?></td></tr>
    </table>
</body>
</html>