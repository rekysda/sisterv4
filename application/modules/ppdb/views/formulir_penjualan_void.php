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
            <div class="col-md-6">
                <div class="box-tools">
          <a href="<?= base_url('ppdb/formulir_void_tambah'); ?>" class="btn btn-primary btn-sm">
            Tambah Pembatalan
          </a>&nbsp;&nbsp;
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
    <th>Nomor</th>
    <th>Nama</th>
    <th>Tanggal</th>
    </tr>
    </thead>
    <tbody>
    <?php 
    $sno = $row+1;
      foreach ($formulir_penjualan_list as $dt) :
      $no_formulir = $dt['no_formulir'];
      $tanggal = $dt['tanggal'];
      $nama = $dt['nama'];
      $bayar_form = $dt['bayar_form'];
      if($bayar_form=='0'){
      echo "<tr>";
      echo "<td>".$sno."</td>";
      echo "<td>".$no_formulir."</td>";
      echo "<td>".$nama."</td>";
      echo "<td>".date("d-m-Y",strtotime($tanggal))."</td>";
    echo "</tr>";
      $sno++;
      }
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