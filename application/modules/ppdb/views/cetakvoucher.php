<?php
echo '<style type="text/css">
.border {
	border			: 1px solid black;
	padding			: 2px;
    margin			: 2px 0 5px 0;
    font		: 12px Arial, Helvetica, sans-serif;
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
?>
<head>
<title>Cetak Voucher PPDB</title>
</head>
<body onload="window.print()">

<table class="border">
<tr><td colspan="2">VOUCHER PPDB</td></tr>
<tr><td>Tahun PPDB</td><td> : <?= $voucher['tahun_ppdb'] ?></td></tr>
<tr><td>Voucher</td><td> : <?= $voucher['noformulir'] ?></td></tr>
<tr><td>Password</td><td> : <?= $voucher['password'] ?></td></tr>
</table>
</body>