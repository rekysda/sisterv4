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
          <a href="<?= base_url('ppdb/formulir_penjualan_void'); ?>" class="btn btn-success btn-sm">
            List Pembatalan
          </a>&nbsp;&nbsp;
        </div>
        </div>
            </div>
            <div class="box-body">
            <?= $this->session->flashdata('message') ?>
<!-- Search form (start) -->


   <!-- Posts List -->
   <table class='table table-hover'id="example1" >
   <thead>
    <tr>
    <th>#</th>
      <th>Tanggal</th>
      <th>Nama</th>
      <th>Nomor Formulir</th>
      <th>Jumlah</th>
      <th>Bayar</th>
      <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php 
    $sno = $row+1;
      foreach ($formulir_penjualan_list as $dt) :
      $no_formulir = $dt['no_formulir'];
      $tanggal = $dt['tanggal'];
      $nama = $dt['nama'];
      $jumlah_form = $dt['jumlah_form'];
      $bayar_form = $dt['bayar_form'];
      if($bayar_form>'0'){
      echo "<tr>";
      echo "<td>".$sno."</td>";
      echo "<td>".date("d-m-Y",strtotime($tanggal))."</td>";
      echo "<td>".$nama."</td>";
      echo "<td>".$no_formulir."</td>";
      echo "<td>".$jumlah_form."</td>";
      echo "<td>".nominal($bayar_form)."</td>";?>
<td width="100"> <a href="<?= base_url('ppdb/batalformulir/' . $dt['id_nota']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Batal</a></td>
    <?php echo "</tr>";
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