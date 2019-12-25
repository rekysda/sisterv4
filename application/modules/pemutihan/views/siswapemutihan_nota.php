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
	if ($x == 0) {
		echo '<div class="tabel" style="border-right:1px dashed black;">';
	} else {
		echo '<div class="tabel">';
	}
	?>
	<table class="table">
		<tr>
			<td colspan="2"><img src="<?= base_url('assets/images/logoslip/' . $logoslip['image']) ?>" width="100px"></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<h3>BUKTI PEMUTIHAN SISWA</h3>
			</td>
		</tr>
		<tr valign="top">
			<td>Nomor Nota</td>
			<td> : <?= $siswapemutihanmaster['nomor_nota']; ?></td>
		</tr>
		<tr valign="top">
			<td>Tanggal Transaksi</td>
			<td> : <?= date('d m Y', strtotime($siswapemutihanmaster['tanggal'])) ?></td>
		</tr>
		<tr valign="top">
			<td>Nama</td>
			<td> : <?= $siswapemutihanmaster['namasiswa']; ?></td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td> : <?= $siswapemutihanmaster['keterangan']; ?></td>
		</tr>
		<tr>
			<td>Penanggung Jawab</td>
			<td> : <?= $siswapemutihanmaster['penanggungjawab']; ?></td>
		</tr>
		<tr>
			<td><b>RINCIAN</b></td>
			<td></td>
		</tr>

		<tr>
			<td>BIAYA</td>
			<td>NOMINAL</td>
		</tr>
		<?php foreach ($siswapemutihandetail as $dt) : ?>
			<?php if ($dt['id_master'] == $siswapemutihanmaster['id_master']) { ?>
				<tr>
					<td><?= $dt['biaya'] ?></td>
					<td><?= nominal($dt['nominal']) ?></td>
				</tr>
			<?php } ?>
		<?php endforeach; ?>
		<tr>
			<td><b>TOTAL</b></td>
			<td>Rp. <?= nominal($siswapemutihanmaster['totalcart']) ?></td>
		</tr>
		<tr>
			<td><br><br></td>
			<td></td>
		</tr>
		<tr>
			<td>Orang Tua/Wali</td>
			<td>Surabaya,<?= date('d m Y'); ?></td>
		</tr>
		<tr>
			<td><br><br><br><br><br><br></td>
			<td></td>
		</tr>
		<tr>
			<td>(...................)</td>
			<td>( Bendahara Sekolah )</td>
		</tr>
		<tr>
			<td colspan="2" class="borderputus"></td>
		</tr>
	</table>

	</div>
	</div>
<?php
}
?>
</div>

<script>
	window.print();
</script>