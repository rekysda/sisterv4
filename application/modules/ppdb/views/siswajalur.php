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
            <li>PPDB</li>
            <li><?= $title; ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-tools">
        </div>
            </div>
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
      <th>Tahun PPDB</th>
      <th>Gelombang</th>
      <th>Jalur</th>
      <th>Kewajiban</th>
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
      $sekolah = $dt['sekolah'];
      $tahun_ppdb = $dt['tahun_ppdb'];
      $gelombang = $dt['gelombang'];
      $jalur = $dt['jalur'];
      $ppdb_status = $dt['ppdb_status'];
      echo "<tr>";
      echo "<td>".$sno."</td>";
      echo "<td>".$noformulir."</td>";
      echo "<td>".$nis."</td>";
      echo "<td>".$namasiswa."</td>";
      echo "<td>".$tahun_ppdb."</td>";
      echo "<td>".$gelombang."</td>";
      echo "<td>".$jalur."</td>";
      echo "<td>".nominal(getjumlahbiayasiswa($siswa_id,'ppdb'))."</td>";?>
      <td> <a href="<?= base_url('ppdb/siswa_ubahjalur/' . $dt['id']); ?>" class="btn btn-success btn-xs" onclick="return confirm('Anda yakin ? biaya tagihan siswa untuk ppdb akan di reset dengan setting yang baru...');">Ubah Jalur</a>&nbsp;&nbsp;<a href="<?= base_url('ppdb/siswa_hapusjalur/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? tahun_ppdb,gelombang,jalur siswa untuk ppdb akan dihapus.');">Hapus Jalur</a></td>
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