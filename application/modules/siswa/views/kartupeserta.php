<style>
.headertext{
	font-size		: 14px;
	line-height		: 1.4em;
	color			: #363334;
}
.infoppdb{
	font-size		: 14px;
	line-height		: 1.4em;
}
.pengumumantext{
	font-size		: 12px;
	line-height		: 1.4em;
}
</style>
<img src="assets/images/siswa/headerppdb.jpg" width="100%">
<h2 align="center">KARTU PESERTA DIDIK BARU<h2>
<table class="infoppdb">
  <tr>
	<td>
	&nbsp;&nbsp;&nbsp;Tahun PPDB<br>
	&nbsp;&nbsp;&nbsp;No Pendaftaran<br>
	&nbsp;&nbsp;&nbsp;Nama<br>
	&nbsp;&nbsp;&nbsp;Asal Sekolah
	</td>
	<td>
	: <?= $user['tahun_ppdb']?><br>
	: <?= $user['noformulir']?><br>
	: <?= $user['namasiswa']?><br>
	: <?= $user['sekolahasal']?>
	</td>
  </tr>
<tr>
<td colspan="4">
<?= $pengumuman ?>
</td>
</tr>
</table>

<table style="margin-right:50px;" align="right"class="pengumumantext">
<tr><td></td><td align="center">Surabaya, <?= date('d/m/Y'); ?>
<br>Panitia PPDB<br><br><br><br>__________________
</td></tr>
</table>