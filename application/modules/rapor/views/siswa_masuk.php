
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

    <?= $this->session->flashdata('message') ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
        <div class="box-tools">
        <form class="form-inline" method="post" action="<?= base_url('rapor/siswa_masuk')?>" enctype ="multipart/form-data" id="posts">
    
                        <select name="kelas_id" class="form-control <?= form_error('kelas_id') ? 'is-invalid' : '' ?>">
                            <option value="">== Kelas ==</option>
                            <?php foreach ($kelas as $dt) : ?>
                            <option value="<?= $dt['id']; ?>"<?= set_select('kelas_id', $dt['id'], FALSE); ?>><?= $dt['nama_kelas']; ?> (<?= $dt['tahun']; ?>)</option>
                            <?php endforeach; ?>
                        </select>
        <input type="submit" value="Lihat" name="submit"class="btn btn-success">
    </a>
</form>
        </div>

      </div>
      
      <div class="box-body">
        <div class="row">
       
<!-- -->
<div class="col-md-12">
    <?php if($getlistsiswa){ ?>
      <form class="form-inline" method="post" action="<?= base_url('rapor/tambah_data')?>">
<table class='table table-hover'>
          <thead>
            <tr>
              <th>#</th>
              <th>NIS</th>
              <th>Nama Siswa</th>
              <th>Masuk diKelas</th>
              <th>Tanggal Masuk</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sno = $row + 1;
            foreach ($getlistsiswa as $dt) : ?>
              <tr>
                <td><?= $sno++ ?></td>
                <td><?= $dt['nis'] ?></td>
                <td><?= $dt['namasiswa'] ?></td>
                <td><input type="text" name="masuk_kelas[]"placeholder="X MIPA 1" value="<?= $dt['masuk_kelas']; ?>"
        class="form-control"></td>
        <td><input type="text" name="masuk_tanggal[]" placeholder="yyyy-mm-dd" value="<?= $dt['masuk_tanggal']; ?>"
        class="form-control">
        <input type="hidden" name="siswa_id[]" value="<?= $dt['id']?>"class="form-control">
      
      </td>
              </tr>
            <?php endforeach; ?>
    <tr><td colspan="4"></td><td>
        <input type="submit" value="Simpan" name="submit"class="btn btn-success"></td></tr>
          <tbody>
        </table>
    </form>
    <?php }else{
echo "<br><div align='center'><font color='red'>Silahkan Memilih Kelas Terlebih dahulu...</font></div><br><br><br>";

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