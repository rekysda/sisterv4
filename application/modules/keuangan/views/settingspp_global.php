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
    <?= $this->session->flashdata('message') ?>
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Status Calon dan Aktif</h3>
                <div class="col-md-6">
                <div class="box-tools">
<a href="<?= base_url('keuangan/siswaspp') ?>"class="btn btn-success">SPP Manual</a>
<a href="<?= base_url('keuangan/settingspp_global') ?>"class="btn btn-warning">SPP Global</a>
<a href="<?= base_url('keuangan/siswasppdata') ?>"class="btn btn-primary">Lihat SPP</a>
        </div>
            </div>
            </div>
            <div class="box-body">
            <div class="alert alert-light" role="alert">
  <h4 class="alert-heading">Petunjuk Export to CSV</h4>
  <p>
  1. Lakukan Export to CSV untuk mendownload semua data Siswa.<br>
  2. Edit data dengan Excel dan lakukan simpan data dengan CSV.<br>
  3. Jangan merubah ID Siswa pada file CSV.<br>
  4. Lakukan perubahan pada field nominal saja.<br>
  5. Perubahan hanya terjadi Jika nominal diisi.<br>
  6. Jika  ada perubahan pada nilai SPP siswa, maka Nominal akan otomatis terganti dengan data yang baru.<br>
  7. Lakukan Import data apabila dirasa data telah lengkap.
</p>
<form method="post" action="<?= base_url('keuangan/exportsppcsv'); ?>">
<input type="submit" name="export" class="btn btn-success" value="Export to CSV" />
</form>
</div>
</div>
</section>

<section class="content">

<?= $this->session->flashdata('messageimport') ?>
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Import Data</h3>
<div class="box-body">
<form method="post" action="<?= base_url('keuangan/importsppcsv'); ?>" enctype ="multipart/form-data">
<input type="file" name="siswaspp" accept="text/csv"><br>
<input type="submit" name="import" class="btn btn-success" value="Import from CSV" />
</form>
</div>
</div>
        <!-- /.box-body -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->