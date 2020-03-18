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
            <li>Keuangan</li>
      <li><?= $title; ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Status Alumni,di Tolak,Keluar</h3>
                <div class="col-md-6">
                <div class="box-tools">
                    <a href="<?= base_url('keuangan/tambahbiaya_global') ?>"class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>Biaya Global</a>
                    <a href="<?= base_url('keuangan/tambahbiayaspp_global') ?>"class="btn btn-warning"><i class="fa fa-fw fa-plus"></i>SPP Global</a>
                    <a href="<?= base_url('keuangan/siswakeuangan') ?>"class="btn btn-success">Status Aktif</a>
                </div></div>
            <div class="box-body">
            <?= $this->session->flashdata('message') ?>
   <!-- Posts List -->
   <table class='table table-hover' id="example3">
   <thead>
    <tr>
    <th>#</th>
      <th>NoFormulir</th>
      <th>NIS</th>
      <th>Nama</th>
      <th>PPDB</th>
      <th>SPP</th>
      <th>DaftarUlang</th>
      <th>Lain-Lain</th>
      <th>Total</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php $sno = 1; ?>
    <?php foreach ($siswaresult as $dt) :
      $siswa_id = $dt['id'];
      $noformulir = $dt['noformulir'];
      $nis = $dt['nis'];
      $namasiswa = $dt['namasiswa'];
      $namatahun = $dt['tahun'];
      $gelombang = $dt['gelombang'];
      $jalur = $dt['jalur'];
      $ppdb_status = $dt['ppdb_status'];
      $tppdb=getjumlahbiayasiswa($siswa_id,'PPDB','unpaid');
      $tspp=getjumlahbiayasiswa($siswa_id,'SPP','unpaid');
      $tdaftarulang=getjumlahbiayasiswa($siswa_id,'DAFTARULANG','unpaid');
      $tlainlain=getjumlahbiayasiswa($siswa_id,'LAIN-LAIN','unpaid');
      $total =$tppdb+$tspp+$tdaftarulang+$tlainlain;
      echo "<tr>";
      echo "<td>".$sno."</td>";
      echo "<td>".$noformulir."</td>";
      echo "<td>".$nis."</td>";
      echo "<td>".$namasiswa."</td>";
      echo "<td>".nominal(getjumlahbiayasiswa($siswa_id,'ppdb','unpaid'))."</td>";
      echo "<td>".nominal(getjumlahbiayasiswa($siswa_id,'spp','unpaid'))."</td>";
      echo "<td>".nominal(getjumlahbiayasiswa($siswa_id,'daftarulang','unpaid'))."</td>";
      echo "<td>".nominal(getjumlahbiayasiswa($siswa_id,'lain-lain','unpaid'))."</td>";
      echo "<td>".nominal($total)."</td>";
      echo "<td>".$ppdb_status."</td>";?>
      <td> <a href="<?= base_url('keuangan/siswa_tambahbiaya/' . $dt['id']); ?>" class="btn btn-warning btn-xs" onclick="return confirm('Anda yakin ? akan menambah Biaya untuk siswa yang bersangkutan.');">Tambah Biaya</a></td>
      </tr>
      <?php
      $sno++; ?>
       <?php endforeach; ?>
       <tbody>
   </table>

            </div>
        <!-- /.box-body -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->