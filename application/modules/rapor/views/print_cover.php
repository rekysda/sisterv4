<?php 
error_reporting(0);

?>
<html>
<head>
<title>Cover Raport Siswa</title>
</head>
<body onload="window.print()">
    <h1 align=center>RAPORT SISWA <br>SEKOLAH MENENGAH ATAS <br> (SMA)</h1>
    <center>
        <img width='170px' src='<?= base_url('assets/images/') ?>logo.png'><br><br><br><br><br><br><br><br>
        Nama Siswa :<br>
        <h3 style='border:1px solid #000; width:82%; padding:6px'><?= $get_data_siswa['namasiswa']; ?></h3><br><br>

        NIS / NISN<br>
        <h3 style='border:1px solid #000; width:82%; padding:3px'><?= $get_data_siswa['nis']; ?> / <?= $get_data_siswa['nisn']; ?></h3><br><br><br><br><br><br>

        <p style='font-size:22px'>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN <br>REPUBLIK INDONESIA</p>
    </center>
</body>
</html>