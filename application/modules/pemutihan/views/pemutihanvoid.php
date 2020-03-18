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
            <li>Pemutihan</li>
<li><?= $title; ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
            <div class="col-md-12">
                <div class="box-tools">
          <a href="<?= base_url('pemutihan/pemutihanvoid_list'); ?>" class="btn btn-primary btn-sm">
            Tambah Pembatalan
          </a>
        </div>
        </div>
            </div>
            <div class="box-body">
            <?= $this->session->flashdata('message') ?>
<!-- Search form (start) -->


   <!-- Posts List -->
   <table class='table table-hover'id="example3" >
   <thead>
    <tr>
    <th>#</th>
      <th>Tanggal</th>
      <th>No.Nota</th>
      <th>Keterangan Batal</th>
      <th>Petugas Pembatalan</th>
    </tr>
    </thead>
    <tbody>
    <?php 
    $sno = $row+1;
      foreach ($pemutihanbatal as $dt) :
      $nomor_nota = $dt['nomor_nota'];
      $tanggal = $dt['tanggal'];
      $keterangan_batal = $dt['keterangan_batal'];
      $name = $dt['name'];
      echo "<tr>";
      echo "<td>".$sno."</td>";
      echo "<td>".$nomor_nota."</td>";
      echo "<td>".date("dmY",$tanggal)."</td>";
      echo "<td>".$keterangan_batal."</td>";
      echo "<td>".$name."</td>";
    echo "</tr>";
      $sno++;
    ?>
          <?php endforeach; ?>
       <tbody>
   </table>



            </div>
        <!-- /.box-body -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->