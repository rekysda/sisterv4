<h1> <?= $title; ?></h1>
Gedung : <?= $getruangan['nama_gedung']; ?><br>
 Ruangan : <?= $getruangan['nama_ruangan']; ?><br>
 Sekolah : <?= $getruangan['sekolah']; ?>
 <br>
              <table  id="tablestd">
                <thead>
                  <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Jumlah</td>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($get_namabarang as $dt) : ?>
                  <?php if ( $dt['stok']>0) { ?>
                  <tr>
                      <td><?= $i; ?></td>
                      <td><?= $dt['namabarang']; ?></td>
                      <td><?= $dt['stok']; ?></td>                   
                    </tr>
                  <?php } ?>
                    <?php $i++; ?>
                 
                  <?php endforeach; ?>
                </tbody>
              </table>
              
<script>window.print();</script>