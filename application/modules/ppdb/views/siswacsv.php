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
    <?= $this->session->flashdata('message') ?>
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">               
            <h3 class="box-title">Calon - Aktif</h3>
            <div class="box-tools">
          <a href="<?= base_url('ppdb/siswacsv'); ?>" class="btn btn-primary btn-sm">
            Data Siswa
          </a>&nbsp;&nbsp;<a href="<?= base_url('ppdb/siswacsvlogin'); ?>" class="btn btn-success btn-sm">
            Data Login Siswa</a>
        </div>
            <div class="box-body">
            <div class="row">
					<div class="col-md-6">
                    <h3 class="box-title">Export Siswa</h3>
            <form method="post" action="<?= base_url('ppdb/exportsiswacsv'); ?>"class="form-inline">
            <div class="form-group">
                <label for="name">Pilih *</label>
                <select name="datasiswa" id="datasiswa" class="form-control">
                                <option value="semua">Semua Data</option>
                           
                        </select>
                        <input type="submit" name="export" class="btn btn-success" value="Export to CSV" />
                    </div>
                    </form><br>
            <div class="alert alert-light" role="alert">
  <h4 class="alert-heading">Petunjuk Export / Import to CSV</h4>
  <p>
  1. Pilih jenis Data Siswa yang akan di export <br>
  2. Untuk <b>Semua Data</b> Data mencakup Semua data termasuk id siswa.<br>
  3. Bentuk File CSV.<br>
  4. Apabila terdapat perubahan data dan melakukan edit pada csv, lakukan import untuk melakukan import data.<br>
  5. Untuk siswa yang terdapat datanya, <b>Dilarang merubah id</b><br>
  6. Untuk <b>Siswa Baru isian id harus tidak boleh sama jika sama maka akan di anggap gagal </b><br>
  7. <b>Dilarang melakukan perubahan</b> untuk data yang termasuk <b>tahunppdb,gelombang,jalur dan biaya.</b> data tersebut akan diedit secara manual lewat menu yang telah dsediakan.<br>
  8. <b>Penting : </b> untuk tanggal lahir siswa atau orangtua memakai format <b> yyyy-mm-dd </b>. Caranya pada excel pilih cell yang aka diconvert -> pilih "custom" -> pada Type isikan <b> yyyy-mm-dd</b>  
</p>
</div>
</div>
<div class="col-md-6">
<h3 class="box-title">Import Data</h3>
<form method="post" action="<?= base_url('ppdb/importsiswacsv'); ?>" enctype ="multipart/form-data"class="form-inline">
<div class="form-group">
<select name="datasiswa" id="datasiswa" class="form-control">             
                                <option value="semua">Semua Data</option>
                           
                        </select>
<input type="file" name="siswacsv" accept="text/csv" class="form-control"><br>
<input type="submit" name="import" class="btn btn-success" value="Import from CSV" />
</form>
</div>
</div>
    </div>
    </div>
</section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->