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
<div align='center'><h1><b>DAFTAR KUMPULAN NILAI PESERTA DIDIK</b></h1></div>
<table width=100% >
        <tr><td width=140px>Nama Sekolah</td> <td> : <?= $get_data_sekolah['sekolah']; ?> </td>       <td width=140px>Kelas</td>   <td>: <?= $get_data_kelas['nama_kelas']; ?></td></tr>
        <tr><td>Alamat</td>                   <td> : <?= $get_data_sekolah['alamat']; ?> <?= $get_data_sekolah['kota']; ?></td>     </tr>
      </table><br>
        <table  id="tablestd" width=100% border=1>
                      <tr><th  rowspan="2">No</th>
                        <th rowspan="2">NIS</th>
                        <th rowspan="2">Nama Siswa</th>                  
                        <th rowspan="2">SMT</th>                  
                        <th rowspan="2">Aspek</th>                  
                        <?php foreach ($mapel as $dt) : ?>
                        <th rowspan="2"><?= $dt['sk_mapel']?></th>                  
                        <?php endforeach; ?>
                        <th colspan="3">Extrakurikuler</th>
                        <th colspan="3">Ketidakhadiran</th>
  </tr>
  <tr>
      <th>Extra1</th>                  
      <th>Extra2</th>                  
      <th>Extra3</th>   
    <th>Sakit</th>
    <th>Ijin</th>
    <th>Absen</th>
  </tr>    
  <?php
            $sno = $row + 1;
            foreach ($getlistsiswa as $dt) : ?>

<tr><td  rowspan="8"><?= $sno++ ?></td>
                <td  rowspan="8"><?= $dt['nis']?></td>
                <td rowspan="8"><?= $dt['namasiswa']?> </td>  
                <td rowspan="4">SMT1</td>                             
                              <td>Pengetahuan</td>                             
                              <?php foreach ($nilaipengetahuan_ganjil as $dtn) : ?>
                              <?php if( $dt['siswa_id']==$dtn['siswa_id']) { ?>
                        <td><?= $dtn['rata2']?></td>    
                              <?php } ?>              
                        <?php endforeach; ?> 
                         <!-- extra-->
                         <?php $tambahan_kolom = '
                        <td  rowspan="4">-</td> 
                        <td  rowspan="4">-</td> 
                        <td  rowspan="4">-</td>';
                        ?>
                        <?php foreach ($jumlahxtra_ganjil as $dtj) : ?>
                              <?php if( $dt['siswa_id']==$dtj['siswa_id']) { ?>
                                <?php foreach ($nilaixtra_ganjil as $dtx) : ?>
                                <?php if( $dt['siswa_id']==$dtx['siswa_id']) { ?>
                        <td rowspan="4"><?= $dtx['nilai']?></td>    
                                  <?php } ?>              
                                  <?php endforeach; ?>   
                        <?php if($dtj['jumlah']=='1'){
                         $tambahan_kolom = '
                         <td  rowspan="4">-</td> 
                        <td  rowspan="4">-</td>';
                        } ?>
                         <?php if($dtj['jumlah']=='2'){ 
                       $tambahan_kolom = '<td  rowspan="4">-</td>'; 
                        }?> 
                        <?php if($dtj['jumlah']=='3'){ 
                       $tambahan_kolom = ''; 
                        }?>
                        <?php }?>                      
                        
                        <?php endforeach; ?>      
                        <?= $tambahan_kolom;?>
                         <!-- end extra-->
                         <!-- presensi-->
                        <?php $jumlahsakit='-'; ?>
                        <?php $jumlahijin='-'; ?>
                        <?php $jumlahalpha='-'; ?>
                        <?php foreach ($jumlahsakit_ganjil as $dts) : ?>
                        <?php if( $dt['siswa_id']==$dts['siswa_id']) { ?>
                        <?php $jumlahsakit = $dts['jumlah']?>   
                        <?php }?>
                        <?php endforeach; ?> 
                        <?php foreach ($jumlahijin_ganjil as $dts) : ?>
                        <?php if( $dt['siswa_id']==$dts['siswa_id']) { ?>
                        <?php $jumlahijin = $dts['jumlah']?>   
                        <?php }?>
                        <?php endforeach; ?> 
                        <?php foreach ($jumlahalpha_ganjil as $dts) : ?>
                        <?php if( $dt['siswa_id']==$dts['siswa_id']) { ?>
                        <?php $jumlahalpha = $dts['jumlah']?>   
                        <?php }?>
                        <?php endforeach; ?> 
                        <td  rowspan="4"><?= $jumlahsakit; ?></td> 
                        <td  rowspan="4"><?= $jumlahijin; ?></td> 
                        <td  rowspan="4"><?= $jumlahalpha; ?></td> 
                        <!-- end presensi -->
                            </tr>

                            <tr>
                            <td>Predikat</td>                             
                            <?php foreach ($nilaipengetahuan_ganjil as $dtn) : ?>
                              <?php if( $dt['siswa_id']==$dtn['siswa_id']) { ?>
                        <td><?= $dtn['grade']?></td>    
                              <?php } ?>              
                        <?php endforeach; ?> 
                            </tr>
                            <tr>
                              <td>Keterampilan</td>                             
                              <?php foreach ($nilaiketerampilan_ganjil as $dtn) : ?>
                              <?php if( $dt['siswa_id']==$dtn['siswa_id']) { ?>
                        <td><?= $dtn['rata2']?></td>    
                              <?php } ?>              
                        <?php endforeach; ?> 
                            </tr>
<tr>
                              <td>Keterampilan</td>                             
                              <?php foreach ($nilaiketerampilan_ganjil as $dtn) : ?>
                              <?php if( $dt['siswa_id']==$dtn['siswa_id']) { ?>
                        <td><?= $dtn['rata2']?></td>    
                              <?php } ?>              
                        <?php endforeach; ?> 
                            </tr>

                </tr>
                <?php endforeach; ?>
        </table>

        </table>
         