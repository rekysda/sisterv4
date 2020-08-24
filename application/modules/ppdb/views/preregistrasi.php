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

      </div>
</div>
      <br>
      <div class="box-body">
        <?= $this->session->flashdata('message') ?>

        <!-- Posts List -->
        <form method="POST" action="<?= base_url('ppdb/hapuspreregistrasi') ?>" enctype="multipart/form-data" class="form-inline">
          <table class='table table-hover' id='example3'>
            <thead>
              <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>HP</th>
                <th>AsalSekolah</th>
                <th>BuktiBayar</th>
                <th>Email</th>
                <th>NoFormulir</th>
                <th>Password</th>
                <th width="200">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $sno = 1; ?>
              <?php foreach ($preregistrasi as $dt) :
                $idpreregistrasi = $dt['id'];
                $tanggal = $dt['tanggal'];
                $nama = $dt['nama'];
                $hp = $dt['hp'];
                $asalsekolah = $dt['asalsekolah'];
                $email = $dt['email'];
                $noformulir = $dt['noformulir'];
                $password = $dt['password'];
                $buktibayar = $dt['buktibayar'];
                echo "<tr>";
                echo "<td><input name='check[]' type='checkbox' value='" . $idpreregistrasi . "'></td>";
                echo "<td>" . $tanggal . "</td>";
                echo "<td>" . $nama . "</td>";
                echo "<td>" . $hp . "</td>";
                echo "<td>" . $asalsekolah . "</td>";
                echo "<td> <a href='../assets/images/siswa/$buktibayar'target='new'>$buktibayar</a></td>";
                echo "<td>" . $email . "</td>";
                echo "<td>" . $noformulir . "</td>";
                echo "<td>" . $password . "</td>";
                ?>
                <td width="100">
                <?php if($email && $noformulir) {?>
                <a href="<?= base_url('ppdb/kirimnotifemail/' . $dt['id']); ?>" class="btn btn-success btn-xs">KirimNotif</a> <?php } ?>            
                <a href="<?= base_url('ppdb/editpreregistrasi/' . $dt['id']); ?>" class="btn btn-warning btn-xs">Ubah</a>             
                </td> 
                </tr>
                <?php $sno++; ?>
              <?php endforeach; ?>
            <tbody>
              <?php
              echo "<tr>
    <td colspan='5' align='right'>";
              echo '<a href="#" onclick="chunchall(this);return false"class="btn btn-warning">Check all</a>&nbsp;with selected &nbsp; <input class="btn btn-primary" type="submit" onclick="return confirm(Anda yakin ? data tidak dapat dikembalikan lagi...)" name="btn" value="Delete"></td></tr></form>';

              ?>
          </table>
        </form>
        <a href="<?= base_url('preregistrasi')?>"target="new"class="btn btn-warning">Link Isi PPDB</a><br><br>
      </div>
      <!-- /.box-body -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->