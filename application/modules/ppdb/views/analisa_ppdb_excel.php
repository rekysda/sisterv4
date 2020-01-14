

<?php
$sekarang=date("dmY");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
header("content-disposition: attachment;filename=analisa_ppdb_".$tahun_ppdb.".xls");
header("Content-Transfer-Encoding: binary ");
?>
<style>
    
    body{font-size: 12px;color: black;}
    table#tablestd{
        border-width: 1px;
        border-style: solid;
        border-color: #D8D8D8;
        border-collapse: collapse;
        margin: 10px 0px;
    }
    table#tablestd td{
        padding: 0.5em; 	color: #000;
        vertical-align: top;
        border-width: 0px;
        padding: 4px;
        border: 1px solid #000;
        
    }
    
    table#tablemodul1{
        border-width: 1px;
        border-style: solid;
        border-color: #000;
        border-collapse: collapse;
        margin: 10px 0px;
    }
    table#tablemodul1 td{
        padding:1px 6px 2px 6px;
        border: 1px solid #000; 
        
    }
    
    table#tablemodul1 th{
        padding:1px 6px 2px 6px;
        border: 1px solid #000; 
        
    }
    
    h1{
        font-size:24px;
    }
    </style>
Analisa PPDB, Sekolah : <b><?= getfieldtable('m_sekolah','sekolah',$sekolah_id)?></b>, <b><?= $tahun_ppdb?></b>, berdasarkan <b>Gelombang</b>
<table border=1>
              <tr>
                <td>No</td>
                <td>Tahun</td>
                <td>Gelombang</td>
                <td>Jumlah</td>
              </tr>
              <?php $i = 1; ?>
              <?php foreach ($group_gelombang as $dt) : ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $dt['tahun_ppdb'] ?></td>
                  <td><?= $dt['gelombang'] ?></td>
                  <td><?= $dt['jumlah'] ?></td>
                </tr>
<?php $gelombang[] = $dt['gelombang'];
            $jumlah[] = $dt['jumlah'];
            ?>
              <?php endforeach; ?>
          </table>  
          Analisa PPDB, Sekolah : <b><?= getfieldtable('m_sekolah','sekolah',$sekolah_id)?></b>, <b><?= $tahun_ppdb?></b>, berdasarkan <b>JenisKelamin</b>
<table  border=1>
              <tr>
                <td>No</td>
                <td>Tahun</td>
                <td>JenisKelamin</td>
                <td>Jumlah</td>
              </tr>
              <?php $i = 1; ?>
              <?php foreach ($group_kelamin as $dt) : ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $dt['tahun_ppdb'] ?></td>
                  <td><?= $dt['kelaminsiswa'] ?></td>
                  <td><?= $dt['jumlah'] ?></td>
                </tr>
              <?php endforeach; ?>
          </table>
          Analisa PPDB, Sekolah : <b><?= getfieldtable('m_sekolah','sekolah',$sekolah_id)?></b>, <b><?= $tahun_ppdb?></b>, berdasarkan <b>Asal Sekolah</b>
<table border=1>
              <tr>
                <td>No</td>
                <td>Tahun</td>
                <td>AsalSekolah</th>
                <td>Jumlah</td>
              </tr>
              <?php $i = 1; ?>
              <?php foreach ($asal_sekolah as $dt) : ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $dt['tahun_ppdb'] ?></td>
                  <td><?= $dt['sekolahasal'] ?></td>
                  <td><?= $dt['jumlah'] ?></td>
                </tr>
              <?php endforeach; ?>
          </table>
