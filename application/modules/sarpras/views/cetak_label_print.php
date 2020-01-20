<style type="text/css">
body {
	margin		: 0;
	padding		: 0;
    font-size: 10px; /* 14px/16=0.875em */
font-family: "Times New Roman", Times, serif;
    margin			: 2px 0 5px 0;
}
#boxmodel {
border: 1px solid black;
margin: 5px;
padding: 5px;
width: 150px;
float:left;
height:150px;
align:center;
            }
</style>
<?php while($cetak_awal < $jumlah_cetak){?>
    <div id='boxmodel'>
<img src="<?= base_url('assets/images/qrcode/'.$kode_inv.'.png') ?>"height="120px"><br>
<b><?=$get_inventaris_barang['namabarang']?>/<?= $kode_inv ?>/<?= $tahuninv ?></b>
</div>
<?php    $cetak_awal++;
 } ?>
