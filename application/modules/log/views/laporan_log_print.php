
<h1> <?= $title; ?></h1>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Waktu</th>
      <th scope="col">User</th>
      <th scope="col">Aksi</th>
      <th scope="col">Item</th>
    </tr>
  </thead>
  <tbody>
  <?php $no='1'; ?>
  <?php foreach ($logresult as $item): ?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= date('d M Y',strtotime($item['tanggal'])) ?></td>
      <td><?= date('H:i:s',strtotime($item['tanggal'])) ?></td>
      <td><?= $item['user'] ?></td>
      <td><?= $item['aksi'] ?></td>
      <td><?= $item['item'] ?></td>
    </tr>
    <?php 
    $no++;
    endforeach; ?>  
  </tbody>
</table>

<script>window.print();</script>