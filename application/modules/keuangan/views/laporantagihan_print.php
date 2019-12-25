<h4>Laporan Tagihan siswa, Hanya menampilkan yang berstatus Calon,Aktif dan yang memiliki Tagihan saja</h4>

<table id="tablestd">
    <tr>
    <td>#</td>
      <td>NoFormulir</td>
      <td>NIS</td>
      <td>Nama</td>
      <td>PPDB</td>
      <td>SPP</td>
      <td>DaftarUlang</td>
      <td>Lain-Lain</td>
      <td>Total</td>
      <td>Status</td>
    </tr>
    <?php $sno = 1; ?>
    <?php foreach ($siswaresult as $dt) :
      $siswa_id = $dt['id'];
      $noformulir = $dt['noformulir'];
      $nis = $dt['nis'];
      $namasiswa = $dt['namasiswa'];
      $namatahun = $dt['tahun'];
      $gelombang = $dt['gelombang'];
      $jalur = $dt['jalur'];
      $ppdb_status = $dt['ppdb_status'];
      $tppdb=getjumlahbiayasiswa($siswa_id,'PPDB','unpaid');
      $tspp=getjumlahbiayasiswa($siswa_id,'SPP','unpaid');
      $tdaftarulang=getjumlahbiayasiswa($siswa_id,'DAFTARULANG','unpaid');
      $tlainlain=getjumlahbiayasiswa($siswa_id,'LAIN-LAIN','unpaid');
      $total =$tppdb+$tspp+$tdaftarulang+$tlainlain;
      if( $total >'0'){
      echo "<tr>";
      echo "<td>".$sno."</td>";
      echo "<td>".$noformulir."</td>";
      echo "<td>".$nis."</td>";
      echo "<td>".$namasiswa."</td>";
      echo "<td>".nominal(getjumlahbiayasiswa($siswa_id,'ppdb','unpaid'))."</td>";
      echo "<td>".nominal(getjumlahbiayasiswa($siswa_id,'spp','unpaid'))."</td>";
      echo "<td>".nominal(getjumlahbiayasiswa($siswa_id,'daftarulang','unpaid'))."</td>";
      echo "<td>".nominal(getjumlahbiayasiswa($siswa_id,'lain-lain','unpaid'))."</td>";
      echo "<td>".nominal($total)."</td>";
      echo "<td>".$ppdb_status."</td>";?>
      </tr>
      <?php
      $sno++; 
      }
      ?>
       <?php endforeach; ?>
   </table>
   
<script>window.print();</script>