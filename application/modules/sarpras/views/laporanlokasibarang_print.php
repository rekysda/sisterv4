<h1> <?= $title; ?></h1>
<table id="tablestd">
                <thead>
                  <tr>
                    <td>No</td>
                    <td>Ruangan</td>
                    <td>Sekolah</td>
                    <td>Nama</td>
                    <td>Jumlah</td>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($get_namabarang as $dt) : ?>
                  <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['nama_ruangan']; ?></td>
                      <td><?php if($dt['sekolah']){?><?= $dt['sekolah'] ?><?php } ?></td>
                      <td><?= $dt['namabarang']; ?></td>                
                      <td><?= ($dt['stok']) ?></td>                                      
                      <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>


              <script>window.print();</script>