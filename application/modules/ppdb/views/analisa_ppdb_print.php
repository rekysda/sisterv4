Analisa PPDB, Sekolah : <b><?= getfieldtable('m_sekolah','sekolah',$sekolah_id)?></b>, <b><?= $tahun_ppdb?></b>, berdasarkan <b>Gelombang</b>
<table id="tablestd">
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
<table id="tablestd">
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
<table id="tablestd">
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
