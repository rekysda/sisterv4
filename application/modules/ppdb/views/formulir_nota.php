<?php 
echo '<style type="text/css">
.border {
	border			: 1px solid black;
	padding			: 2px;
    margin			: 2px 0 5px 0;
}
.borderbawah {
border-bottom:1px solid black;
	padding			: 2px;
    margin			: 2px 0 5px 0;
}
.borderputus {
border-bottom:1px dashed black;
	padding			: 2px;
    margin			: 2px 0 5px 0;
}
	th,td {
    padding: 2px;
	font		: 12px Arial, Helvetica, sans-serif;
	}
img {
    max-width: 300px;
    height: auto;
}	
.tabel {
    float: left;
    margin: 0 0 5px 5px;
    padding: 5px;
    text-align: center;
}
</style>'; 

/****************************/
echo '<div class="row">';
for ($x = 0; $x <= 1; $x++) {
	if($x==0){
echo '<div class="tabel" style="border-right:1px dashed black;">';
	}else{
echo '<div class="tabel">';		
    }
?>
<table class="table">
<tr>
	<td colspan="2"><img src="<?= base_url('assets/images/logoslip/'.$logoslip['image']) ?>" width="100px"></td>
</tr>
<tr>
	<td colspan="2" align="center"><h3>BUKTI PEMBELIAN FORMULIR</h3></td>
</tr>
<tr  valign="top">
	<td>Tanggal Transaksi</td>
	<td> : <?= date('d m Y',strtotime($datajualformulir['tanggal'])) ?></td>
</tr>
<tr  valign="top">
	<td>Nama</td>
	<td> : <?= $datajualformulir['nama']; ?></td>
</tr>
<tr>	
	<td>Asal Sekolah</td>
	<td> : <?= $datajualformulir['asalsekolah']; ?></td>
</tr>
<tr>	
	<td>Alamat</td>
	<td> : <?= $datajualformulir['alamat']; ?></td>
</tr>
<tr>	
	<td>HP</td>
	<td> : <?= $datajualformulir['hp']; ?></td>
</tr>
<tr>	
	<td>Jumlah Formulir</td>
	<td> : <?= $datajualformulir['jumlah_form']; ?></td>
</tr>
<tr>	
	<td>Bayar</td>
	<td> : Rp. <?= nominal($datajualformulir['bayar_form'])?></td>
</tr>
<tr>	
	<td>Nomor Formulir</td>
	<td> : <?= $datajualformulir['no_formulir']; ?></td>
</tr>
<tr>	
	<td><br><br></td>
	<td></td>
</tr>
<tr>	
	<td>Orang Tua/Wali</td>
	<td>Surabaya,<?= date('d m Y') ?></td>
</tr>
<tr>	
	<td><br><br><br><br><br><br></td>
	<td></td>
</tr>
<tr>	
	<td>(...................)</td>
	<td>( Petugas Sekolah )</td>
</tr>
<tr>
	<td colspan="2"class="borderputus"></td>
</tr>
</table>

</div>
</div>
<?php 
}
?>
</div>

<!--<script>window.print();</script>