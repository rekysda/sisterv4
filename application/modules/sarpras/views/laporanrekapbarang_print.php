<h1> <?= $title; ?></h1>
<table  id="tablestd">
                <thead>
                  <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Jumlah</td>
                    <td>Penempatan</td>
                    <td>Tersedia</td>
                    <td>DiMusnahkan</td>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($get_namabarang as $dt) : ?>
                  <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['namabarang']; ?></td>
                      <td><?= get_jumlahinventaris($dt['id'])?></td>                   
                      <td><?= get_jumlahmutasi($dt['id']) ?></td>                   
                      <td><?= get_jumlahinventaris($dt['id'])-get_jumlahmutasi($dt['id']) ?></td>           
                      <td><?= get_jumlahinventaris_rusak($dt['id'])*(-1)?></td>
                      <?php $i++; ?>
                 
                  <?php endforeach; ?>
                </tbody>
              </table>
              
<script>window.print();</script>