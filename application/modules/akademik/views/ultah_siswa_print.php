<h1> <?= $title; ?></h1>
<h4>Rekap Ulang Tahun Siswa Bulan : <?= getbulanindo($bulan) ?></h4>
                <table id='tablestd'>
              <tr>
                <td>#</td>
                <td>NIS</td>
                <td>Nama</td>
                <td>Kelas</td>
                <td>Tanggal Lahir</td>
                <td>Umur</td>
              </tr>
              <?php
              $sno = $row + 1;
              foreach ($list_siswa as $dt) : ?>
                <?php if ($dt['tanggallahirsiswa'] <> '0000-00-00') { ?>
                  <?php if ($bulan == date('m', strtotime($dt['tanggallahirsiswa']))) { ?>
                    <tr>
                      <td><?= $sno++ ?></td>
                      <td><?= $dt['nis'] ?></td>
                      <td><?= $dt['namasiswa'] ?></td>
                      <td><?= get_namakelas($dt['kelas_id']) ?></td>
                      <td><?= gettanggalindo($dt['tanggallahirsiswa']) ?></td>
                      <td><?= get_umur($dt['tanggallahirsiswa']) ?></td>
                    </tr>
                  <?php } ?>
                <?php } ?>
              <?php endforeach; ?>
          </table>