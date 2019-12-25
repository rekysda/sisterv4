<style>
  body {
    font-size: 12px;
    color: black;
  }

  table#tablestd {
    border-width: 1px;
    border-style: solid;
    border-color: #D8D8D8;
    border-collapse: collapse;
    margin: 10px 0px;
  }

  table#tablestd td {
    padding: 0.5em;
    color: #000;
    vertical-align: top;
    border-width: 0px;
    padding: 4px;
    border: 1px solid #000;

  }

  table#tablemodul1 {
    border-width: 1px;
    border-style: solid;
    border-color: #000;
    border-collapse: collapse;
    margin: 10px 0px;
  }

  table#tablemodul1 td {
    padding: 1px 6px 2px 6px;
    border: 1px solid #000;

  }

  table#tablemodul1 th {
    padding: 1px 6px 2px 6px;
    border: 1px solid #000;

  }

  h1 {
    font-size: 24px;
  }
</style>
<h1> <?= $title; ?></h1>
<table id="tablestd">
  <tr>
    <td>#</td>
    <td>NIP</td>
    <td>Nama Lengkap</td>
    <td>Jenis Kelamin</td>
    <td>HP/WA</td>
    <td>Status Pegawai</td>
    <td>Jenis PTK</td>
    <td>Is Active?</td>
    <td>Status Nikah</td>
    <td>NIK</td>
    <td>Golongan</td>
    <td>NPWP</td>
  </tr>
  <?php
  $sno = 1;
  foreach ($pegawairesult as $dt) :
    echo "<tr>";
    echo "<td>" . $sno . "</td>";
    echo "<td>" . $dt['nip'] . "</td>";
    echo "<td>" . $dt['nama_guru'] . "</td>";
    echo "<td>" . $dt['jeniskelamin'] . "</td>";
    echo "<td>" . $dt['hp'] . "</td>";
    echo "<td>" . $dt['statuspegawai'] . "</td>";
    echo "<td>" . $dt['jenisptk'] . "</td>";
    echo "<td>" . $dt['statuskeaktifan'] . "</td>";
    echo "<td>" . $dt['statusnikah'] . "</td>";
    echo "<td>" . $dt['nik'] . "</td>";
    echo "<td>" . $dt['golongan'] . "</td>";
    echo "<td>" . $dt['npwp'] . "</td>";
    ?>
    <?php
    echo "</tr>";
    $sno++;
    ?>
  <?php endforeach; ?>
</table>