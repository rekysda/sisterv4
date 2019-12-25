<h1> <?= $title; ?></h1>
<h4>Rekap Ulang Tahun Pegawai Bulan : <?= getbulanindo($bulan) ?></h4>
<table id='tablestd'>
              <tr>
                <td>#</td>
                <td>NIP</td>
                <td>Guru</td>
                <td>JK</td>
                <td>Tanggal Lahir</td>
                <td>Umur</td>
              </tr>
              <?php
              foreach ($list_pegawai as $dt) : ?>
                <?php if ($dt['tanggal_lahir'] <> '0000-00-00') { ?>
                  <?php if ($bulan == date('m', strtotime($dt['tanggal_lahir']))) { ?>
                    <tr>
                      <td><?= $sno++ ?></td>
                      <td><?= $dt['nip'] ?></td>
                      <td><?= $dt['nama_guru'] ?></td>
                      <td><?= ($dt['jeniskelamin']) ?></td>
                      <td><?= gettanggalindo($dt['tanggal_lahir']) ?></td>
                      <td><?= get_umur($dt['tanggal_lahir']) ?></td>
                    </tr>
                  <?php } ?>
                <?php } ?>
              <?php endforeach; ?>
          </table>