
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $title; ?>
      <small>to manage <?= $title; ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li>Rapor</li>
<li><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <?= $this->session->flashdata('message') ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
        <div class="box-tools">
    </a>
</form>
        </div>

      </div>
      
      <div class="box-body">
        <div class="row">
       
<!-- -->
<div class="col-md-12">
    <?php if($getlistsiswa){ ?>
      <table class="table" id='example3'>
          <thead>
            <tr>
              <th>#</th>
              <th>NoFormulir</th>
              <th>NIS</th>
              <th>Nama Siswa</th>
              <th>Berkas</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sno = $row + 1;
            foreach ($getlistsiswa as $dt) : ?>
              <tr>
                <td><?= $sno++ ?></td>
                <td><?= $dt['noformulir'] ?></td>
                <td><?= $dt['nis'] ?></td>
                <td><?= $dt['namasiswa'] ?></td>
                <td>
                <?php if($berkas){?>
                  <?php foreach ($berkas as $dt2) : ?>
                  <?php if($dt2['siswa']==$dt['id']){ ?>
                    <a href="<?= base_url('assets/images/siswa_berkas/'.$dt2['gambar']) ?>" target="new">
                    <?= $dt2['nama']; ?></a><br>
                    <?php } ?>
                    <?php endforeach; ?>
                <?php } ?>
                </td>
                <td><a href="<?= base_url('ppdb/siswa_berkas_add/'.$dt['id']) ?>"><span class="btn btn-default">LihatBerkas</span></a></td>
              </tr>
            <?php endforeach; ?>
          <tbody>
        </table>
    <?php }else{
echo "<br><div align='center'><font color='red'>Data tidak Ada...</font></div><br><br><br>";

    } ?>
          </div>

          <!-- table -->
        </div>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->