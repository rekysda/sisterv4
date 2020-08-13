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
				<h3>BUKTI PEMBAYARAN SISWA</h3>
			</td>
		</tr>
		<tr valign="top">
			<td>Nomor Nota</td>
			<td> : <?= $siswabayarmaster['nomor_nota']; ?></td>
		</tr>
		<tr valign="top">
			<td>Tanggal Transaksi</td>
			<td> : <?= date('d m Y', strtotime($siswabayarmaster['tanggal'])) ?></td>
		</tr>
		<tr valign="top">
			<td>Nama</td>
			<td> : <?= $siswabayarmaster['namasiswa']; ?></td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td> : <?= $siswabayarmaster['keterangan']; ?></td>
		</tr>
		<tr>
			<td>Cara Pembayaran</td>
			<td> : <?= $siswabayarmaster['carabayar']; ?></td>
		</tr>
		<tr>
			<td><b>RINCIAN</b></td>
			<td></td>
		</tr>

		<tr>
			<td>BIAYA</td>
			<td>NOMINAL</td>
		</tr>
		<?php foreach ($siswabayardetail as $dt) : ?>
			<?php if ($dt['id_master'] == $siswabayarmaster['id_master']) { ?>
				<tr>
					<td><?= $dt['biaya'] ?></td>
					<td><?= nominal($dt['nominal']) ?></td>
				</tr>
			<?php } ?>
		<?php endforeach; ?>
		<tr>
			<td><b>TOTAL</b></td>
			<td>Rp. <?= nominal($siswabayarmaster['totalcart']) ?></td>
		</tr>
		<tr>
			<td>Bayar</td>
			<td>Rp. <?= nominal($siswabayarmaster['bayar']) ?></td>
		</tr>

		<tr>
			<td>Kembali</td>
			<td>Rp. <?= nominal(($siswabayarmaster['bayar'] - $siswabayarmaster['totalcart'])) ?></td>
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