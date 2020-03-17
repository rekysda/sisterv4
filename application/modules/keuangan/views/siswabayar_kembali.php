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
<h1>Kembali : <?= nominal($kembali) ?></h1><br>
<h4><i>Terbilang : <?= terbilang($kembali) ?></i></h4>
<br>
<?= $sentsms; ?>
<a href="<?= base_url('keuangan/siswabayar') ?>" class="btn btn-success">Ke Halaman Transaksi</a>&nbsp;&nbsp;
<a href="<?= base_url('keuangan/siswabayar_nota') ?>" target="new" class="btn btn-warning">Cetak Transaksi</a>&nbsp;&nbsp;
<?php if(apisms('sent_notif_paid') == 1){ ?>
<a href="<?= base_url('keuangan/api_kirimsms') ?>" target="new" class="btn btn-primary">Sent SMS</a>
<?php } ?>
<?php if(apiemail('sent_notif_paid') == 1){ ?>
<a href="<?= base_url('keuangan/api_kirimemail') ?>" class="btn btn-success">Sent Email</a>
<?php } ?>
            </div>
            <!-- /.box-body -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->