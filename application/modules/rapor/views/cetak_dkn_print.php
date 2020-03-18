
<head>
<title>Raport Siswa</title>
</head>
<!-- <body onload="window.print()"> -->

<body onload="window.print()">
<div align='center'><h1><b>DAFTAR KUMPULAN NILAI PESERTA DIDIK</b></h1></div>
<table width=100%>
        <tr><td width=140px>Nama Sekolah</td> <td> : <?= $get_data_sekolah['sekolah']; ?> </td>       <td width=140px>Kelas</td>   <td>: <?= $get_data_kelas['nama_kelas']; ?></td></tr>
        <tr><td>Alamat</td>                   <td> : <?= $get_data_sekolah['alamat']; ?> <?= $get_data_sekolah['kota']; ?></td>     </tr>
      </table><br>
    <?php if($getlistsiswa){ ?>
      <?php if($nilaipengetahuan_ganjil){?>
        <table id='tablemodul1' width=100% border=1>
                    <thead>
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
           
                    </thead>
                    <tbody>
                    <?php
            $sno = $row + 1;
            foreach ($getlistsiswa as $dt) : ?>
              
              <?php if($nilaipengetahuan_genap){?>
                <tr><td  rowspan="8"><?= $sno++ ?></td>
                <td  rowspan="8"><?= $dt['nis']?></td>
                <td rowspan="8"><?= $dt['namasiswa']?> </td>  
                <?php }else{ ?>
                  <tr><td  rowspan="4"><?= $sno++ ?></td>
                <td  rowspan="4"><?= $dt['nis']?></td>
                              <td rowspan="4"><?= $dt['namasiswa']?> </td>  
              <?php }       ?>
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
                            <td>Predikat</td>                             
                            <?php foreach ($nilaiketerampilan_ganjil as $dtn) : ?>
                              <?php if( $dt['siswa_id']==$dtn['siswa_id']) { ?>
                        <td><?= $dtn['grade']?></td>    
                              <?php } ?>              
                        <?php endforeach; ?> 
                            </tr>
                            <?php if($nilaipengetahuan_genap){?>
                            <td rowspan="4">SMT2</td>                             
                              <td>Pengetahuan</td>                             
                              <?php foreach ($nilaipengetahuan_genap as $dtn) : ?>
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
                        <?php foreach ($jumlahxtra_genap as $dtj) : ?>
                              <?php if( $dt['siswa_id']==$dtj['siswa_id']) { ?>
                                <?php foreach ($nilaixtra_genap as $dtx) : ?>
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
                        <?php foreach ($jumlahsakit_genap as $dts) : ?>
                        <?php if( $dt['siswa_id']==$dts['siswa_id']) { ?>
                        <?php $jumlahsakit = $dts['jumlah']?>   
                        <?php }?>
                        <?php endforeach; ?> 
                        <?php foreach ($jumlahijin_genap as $dts) : ?>
                        <?php if( $dt['siswa_id']==$dts['siswa_id']) { ?>
                        <?php $jumlahijin = $dts['jumlah']?>   
                        <?php }?>
                        <?php endforeach; ?> 
                        <?php foreach ($jumlahalpha_genap as $dts) : ?>
                        <?php if( $dt['siswa_id']==$dts['siswa_id']) { ?>
                        <?php $jumlahalpha = $dts['jumlah']?>   
                        <?php }?>
                        <?php endforeach; ?> 
                        <td  rowspan="4"><?= $jumlahsakit; ?></td> 
                        <td  rowspan="4"><?= $jumlahijin; ?></td> 
                        <td  rowspan="4"><?= $jumlahalpha; ?></td> 
                          <!-- end presensi -->
                            </tr> 
                            </tr>
                            <tr>
                            <td>Predikat</td>                             
                            <?php foreach ($nilaipengetahuan_genap as $dtn) : ?>
                              <?php if( $dt['siswa_id']==$dtn['siswa_id']) { ?>
                        <td><?= $dtn['grade']?></td>    
                              <?php } ?>              
                        <?php endforeach; ?> 
                            </tr>
                            <tr>
                              <td>Keterampilan</td>                             
                              <?php foreach ($nilaiketerampilan_genap as $dtn) : ?>
                              <?php if( $dt['siswa_id']==$dtn['siswa_id']) { ?>
                        <td><?= $dtn['rata2']?></td>    
                              <?php } ?>              
                        <?php endforeach; ?> 
                            </tr>
                            <tr>
                            <td>Predikat</td>                             
                            <?php foreach ($nilaiketerampilan_genap as $dtn) : ?>
                              <?php if( $dt['siswa_id']==$dtn['siswa_id']) { ?>
                        <td><?= $dtn['rata2']?></td>    
                              <?php } ?>              
                              <?php endforeach; ?> 
                            </tr>
                              <?php }?>
            <?php endforeach; ?>
    </tbody>
        </table>
           <?php }else{
echo "<br><div align='center'><font color='red'>Data DKN untuk semester 1 dan 2 Belum ada...</font></div><br><br><br>";

    } }else{
echo "<br><div align='center'><font color='red'>Silahkan Memilih Tahun akademik dan Kelas Terlebih dahulu...</font></div><br><br><br>";

    } ?>
</body>
