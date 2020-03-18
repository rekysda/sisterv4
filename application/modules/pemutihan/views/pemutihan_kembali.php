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

        <?= $this->session->flashdata('message') ?>

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">   
<h1>Nota : <?= $nomor_nota ?></h1>
<br>
<?= $sentsms; ?>
<a href="<?= base_url('pemutihan/pemutihansiswa') ?>" class="btn btn-success">Ke Halaman Sebelumnya</a>&nbsp;&nbsp;
<a href="<?= base_url('pemutihan/pemutihan_nota/'.$id_nota) ?>" target="new" class="btn btn-warning">Cetak Transaksi</a>&nbsp;&nbsp;
            </div>
            <!-- /.box-body -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->