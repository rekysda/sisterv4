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
    <?php $tahun_ppdb=getdefault('tahun_ppdb_default');?>
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">All Tahun PPDB Aktif <?=$tahun_ppdb ?></h3>
                <div class="box-tools">
        
        </div>
            </div>
            <div class="box-body">
            <?= $this->session->flashdata('message') ?>
   <!-- Posts List -->
   <table class='table table-hover' id="example1">
   <thead>
    <tr>
    <th>#</th>
    <th>NIS</th>
      <th>Nama</th>
      <th>Tahun</th>
      <th>Sekolah</th>
      <th>NoFormulir</th>
      <th>Gelombang</th>
      <th>Jalur</th>
      <th>Kewajiban</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php $sno = 1; ?>
    <?php foreach ($siswaresult as $dt) :
      $siswa_id = $dt['id'];
      $nis = $dt['nis'];
      $namasiswa = $dt['namasiswa'];
      
      $siswa_jalur_id = ppdb_siswa_jalur($siswa_id,$tahun_ppdb);

      $ppdb_status = $dt['ppdb_status'];
      echo "<tr>";
      echo "<td>".$sno."</td>";
      echo "<td>".$nis."</td>";
      echo "<td>".$namasiswa."</td>";
      echo "<td>".$siswa_jalur_id."</td>";
      echo "<td>$siswa_id</td>";
      echo "<td>$tahun_ppdb</td>";
      echo "<td></td>";
      echo "<td></td>";
      echo "<td>".nominal(getjumlahbiayasiswa($siswa_id,'ppdb'))."</td>";
      echo "<td>".$ppdb_status."</td>";?>
      <td> <a href="<?= base_url('ppdb/siswa_ubahjalur/' . $dt['id']); ?>" class="btn btn-success btn-xs" onclick="return confirm('Anda yakin ? biaya tagihan siswa untuk ppdb akan di tambah dengan setting yang baru...');">Ubah Jalur</a>&nbsp;&nbsp;<a href="<?= base_url('ppdb/siswa_hapusjalur/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? tahun_ppdb,gelombang,jalur siswa untuk ppdb akan dihapus. Penghapusan Jalur tidak akan menghapus Biaya PPDB, harap melakukan Penghapusan Biaya secara manual.');">Hapus Jalur</a></td>
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