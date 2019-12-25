<head>
<title></title>
</head>
<body onload="window.print()">
<?php
            echo "<h2><center>Semua Data Siswa Kelas $_GET[kelas] <br>Angkatan $_GET[angkatan]</center></h2>
                <table width='100%' id='tablemodul1'>
                    <thead>
                      <tr><th>No</th>
                        <th>NIPD</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Jurusan</th>";
                      echo "</tr>
                    </thead>
                    <tbody>";


                    echo "<tr>";
                              echo "<td>$no</td>
                              <td></td>
                              <td></td>
                              <td style='font-size:12px'></td>
                              <td></td>
                              <td></td>";
                            echo "</tr>";
                      $no++;
                      }

                  ?>
                    </tbody>
                  </table>
<!--
<table border=0 width=100%>
  <tr>
    <td width="260" align="left">Orang Tua / Wali</td>
    <td width="520"align="center">Mengetahui <br> Kepala SMA Negeri 1 Padang</td>
    <td width="260" align="left">Padang,  <br> Wali Kelas</td>
  </tr>
  <tr>
    <td align="left"><br /><br /><br /><br /><br />
      ................................... <br /><br /></td>

    <td align="center" valign="top"><br /><br /><br /><br /><br />
      <b>DRS. AMRI JUNA, M.Pd<br>
      NIP : 196209051987031007</b>
    </td>

    <td align="left" valign="top"><br /><br /><br /><br /><br />
      <b><br />
      NIP :</b>
    </td>
  </tr>
</table>-->
</body>