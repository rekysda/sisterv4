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
?>
<table>
	<tr valign="top">
		<td>

			<table>
				<tr valign="top">
					<td colspan="2"><img src="<?= base_url('assets/images/logoslip/' . $logoslip['image']) ?>" width="70px"></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<h3>SLIP GAJI PEGAWAI</h3>
					</td>
				</tr>
				<tr valign="top">
					<td>NIP</td>
					<td> : <?= $s['nip']; ?></td>
				</tr>
				<tr valign="top">
					<td>Nama</td>
					<td> : <?= $s['nama_guru']; ?></td>
				</tr>
				<tr valign="top">
					<td>Bulan</td>
					<td> : <?= $getslipgaji['bulan']; ?></td>
				</tr>
				<tr valign="top">
					<td>Tahun</td>
					<td> : <?= $getslipgaji['tahun']; ?></td>
				</tr>
				<tr>
					<td><b>GAJI POKOK</b></td>
					<td></td>
				</tr>
				<tr valign="top">
					<td>Gaji Pokok</td>
					<td> : <b><?= nominal($getslipgaji['gajipokok']); ?></b></td>
				</tr>
				<tr>
					<td><b>GAJI MENGAJAR</b></td>
					<td></td>
				</tr>
				<tr valign="top">
					<td>Gaji Perjam</td>
					<td> : <?= nominal($getslipgaji['gajiperjam']); ?></td>
				</tr>
				<tr valign="top">
					<td>Jam Ngajar</td>
					<td> : <?= $getslipgaji['jamngajar']; ?></td>
				</tr>
				<tr valign="top">
					<td>Gaji Mengajar (GajiPerjam x JamNgajar)</td>
					<td> :<b><?= nominal($getslipgaji['gajingajar']); ?></b></td>
				</tr>
			</table>
		</td>
		<td>
			<table>
				<tr valign="top">
					<td><b>TUNJANGAN</b></td>
					<td></td>
				</tr>
				<tr valign="top">
					<td>Gelar</td>
					<td> : <?= nominal($getslipgaji['gelar']); ?></td>
				</tr>
				<tr valign="top">
					<td>Sertifikasi</td>
					<td> : <?= nominal($getslipgaji['sertifikasi']); ?></td>
				</tr>
				<tr valign="top">
					<td>Masa Kerja</td>
					<td> : <?= nominal($getslipgaji['masakerja']); ?></td>
				</tr>
				<tr valign="top">
					<td>Transport</td>
					<td> : <?= nominal($getslipgaji['transport']); ?></td>
				</tr>
				<tr valign="top">
					<td>Laboratorium</td>
					<td> : <?= nominal($getslipgaji['laboratorium']); ?></td>
				</tr>
				<tr valign="top">
					<td>Wali Kelas</td>
					<td> : <?= nominal($getslipgaji['walikelas']); ?></td>
				</tr>
				<?php $totaltunjangan = $getslipgaji['gelar'] + $getslipgaji['sertifikasi'] + $getslipgaji['masakerja'] + $getslipgaji['transport'] + $getslipgaji['laboratorium'] + $getslipgaji['walikelas'] ?>
				<tr valign="top">
					<td><b>Total Tunjangan</b></td>
					<td> :<b><?= nominal($totaltunjangan); ?></b></td>
				</tr>
				<tr>
					<td><b>Potongan</b></td>
					<td></td>
				</tr>
				<tr valign="top">
					<td>Sosial</td>
					<td> : <?= nominal($getslipgaji['sosial']); ?></td>
				</tr>
				<tr valign="top">
					<td>BPJS</td>
					<td> : <?= nominal($getslipgaji['bpjs']); ?></td>
				</tr>
				<?php $totalpotongan = $getslipgaji['sosial'] + $getslipgaji['bpjs'] ?>
				<tr valign="top">
					<td><b>Total Potongan</b></td>
					<td> :<b><?= nominal($totalpotongan); ?></b></td>
				</tr>
				<tr valign="top">
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td><b>GAJI DITERIMA</b></td>
					<td></td>
				</tr>
				<tr valign="top">
					<td>Gaji diTerima</td>
					<td> : <b><?= nominal($getslipgaji['gajiditerima']); ?></b></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table>
				<tr>
					<td>Pegawai</td>
					<td>Surabaya,<?= date('d-m-Y'); ?></td>
				</tr>
				<tr>
					<td><br><br><br><br><br><br></td>
					<td></td>
				</tr>
				<tr>
					<td>(<?= $s['nama_guru']; ?>)</td>
					<td>( Bendahara Sekolah )</td>
				</tr>
				<tr>
					<td colspan="2" class="borderputus"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<!--<script>window.print();</script>