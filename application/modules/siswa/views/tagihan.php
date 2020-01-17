<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $title; ?>
      <small>to manage <?= $title; ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Data Siswa</h3>
      </div>
      <div class="box-body">
      <table class="table">
      <tr><td>Sekolah</td><td>: <?= getfieldtable('m_sekolah','sekolah',$user['sekolah_id']) ?></td></tr>
      <tr><td>Nama Siswa</td><td>: <?= $user['namasiswa'] ?></td></tr>
      <tr><td>No.Formulir</td><td>: <?= $user['noformulir'] ?></td></tr>
      <tr><td>NIS</td><td>: <?= $user['nis'] ?></td></tr>
      </table>
      </div>
      <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Rincian Tagihan Siswa</h3>
      </div>
      <div class="box-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col"width="5%">#</th>
              <th scope="col"width="10%">Jenis</th>
              <th scope="col">Biaya</th>
              <th scope="col"width="10%">Nominal</th>
              <th scope="col"width="10%">Is_Paid?</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php if($siswa_keuangan) { ?>
            <?php foreach ($siswa_keuangan as $dt) : ?>
            <?php if(($dt['siswa_id']== $siswa_id)and($dt['nominal']>=0)and($dt['is_paid']==0)) {  ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $dt['jenis']; ?></td>
                <td><?= $dt['biaya']; ?></td>
                <td><?= nominal($dt['nominal']) ?></td>
                <td><?= $dt['is_paid'] == 1 ? '<font color="green">PAID</font>' : '<font color="red">UNPAID</font>'; ?></td>
              </tr>
              <?php $total += $dt['nominal']; ?>
              <?php $i++; ?>
            <?php } ?>
            <?php endforeach; ?>
            <tr>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col">Total Belum Terbayar</th>
              <th scope="col"><?= nominal($total) ?></th>
              <th scope="col"></th>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- rincian terbayar-->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Rincian Tagihan Terbayar</h3>
      </div>
      <div class="box-body">
        <table class="table table-hover">
          <thead>
            <tr>
            <th scope="col"width="5%">#</th>
              <th scope="col"width="10%">Jenis</th>
              <th scope="col">Biaya</th>
              <th scope="col"width="10%">Nominal</th>
              <th scope="col"width="10%">Is_Paid?</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php if($siswa_keuangan) { ?>
            <?php foreach ($siswa_keuangan as $dt2) : ?>
            <?php if(($dt2['siswa_id']== $siswa_id)and($dt2['nominal']>=0)and($dt2['is_paid']==1)) {  ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $dt2['jenis']; ?></td>
                <td><?= $dt2['biaya']; ?></td>
                <td><?= nominal($dt2['nominal']) ?></td>
                <td><?= $dt2['is_paid'] == 1 ? '<font color="green">PAID</font>' : '<font color="red">UNPAID</font>'; ?></td>
              </tr>
              <?php $total2 += $dt2['nominal']; ?>
              <?php $i++; ?>
            <?php } ?>
            <?php endforeach; ?>
            <tr>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col">Total Terbayar</th>
              <th scope="col"><?= nominal($total2) ?></th>
              <th scope="col"></th>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->