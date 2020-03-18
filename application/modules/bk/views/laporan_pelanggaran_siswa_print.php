<h1> <?= $title; ?></h1>
<table id="tablestd">
                  <tr>
                    <td>#</td>
                    <td>NIS</td>
                    <td>Nama</td>
                    <td>Total Point</td>
                    <td>Jml Pelanggaran</td>
                  </tr>
                  <?php $i = 1; ?>
                  <?php foreach ($datasiswapoint as $dt) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['nis']; ?></td>
                      <td><?= $dt['namasiswa']; ?></td>
                      <td><?= $dt['jumlah_point']; ?></td>
                      <td><?= $dt['jumlah_pelanggaran']; ?></td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
              </table>
              
<script>window.print();</script>