<h4> <?= $title; ?></h4>
NIS : <?= $getdatasiswa['nis'] ?><br>
Nama : <?= $getdatasiswa['namasiswa'] ?><br>
Kelas : <?= getfieldtable("m_kelas", "nama_kelas", $getkelassiswa['kelas_id']) ?><br>
Hadir : <?= $get_siswahadir['jumlah'] ?><br>
Sakit : <?= $get_siswasakit['jumlah'] ?><br>
Ijin : <?= $get_siswaijin['jumlah'] ?><br>
Tanpa Keterangan : <?= $get_siswaalpa['jumlah'] ?><br>

<script>
    window.print();
</script>