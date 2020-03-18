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
            <li>Kepegawaian</li>
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
                    <a href="<?= base_url('kepegawaian/pegawai_add'); ?>" class="btn btn-primary btn-sm">
                        Tambah Pegawai
                    </a>
                </div>
                </div>
            </div>
            <div class="box-body">
                <?= $this->session->flashdata('message') ?>

                <table class='table table-hover' id="example3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>HP/WA</th>
                            <th>Status Pegawai</th>
                            <th>Jenis PTK</th>
                            <th>Active?</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sno = 1;
                        foreach ($pegawairesult as $dt) : ?>
                            <tr>
                                <td><?= $sno++ ?></td>
                                <td><?= $dt['nip'] ?></td>
                                <td><?= $dt['nama_guru'] ?></td>
                                <td><?= $dt['jeniskelamin'] ?></td>
                                <td><?= $dt['hp'] ?></td>
                                <td><?= $dt['statuspegawai'] ?></td>
                                <td><?= $dt['jenisptk'] ?></td>
                                <td><?= $dt['statuskeaktifan'] ?></td>
                                <td>
                                    <a href="<?= base_url('kepegawaian/pegawai_edit/' . $dt['id']); ?>" class="btn btn-warning btn-xs">Ubah</a>
                                    <a href="<?= base_url('kepegawaian/hapuspegawai/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Hapus</a>
                                    <a href="<?= base_url('kepegawaian/print_pegawai_detail/' . $dt['id']); ?>" class="btn btn-primary btn-xs"target="new">Cetak</a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    <tbody>
                </table>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <a href="<?php echo site_url('kepegawaian/laporan_pdf'); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>pdf.png"> Export ke PDF</a>
                <a href="<?php echo site_url('kepegawaian/laporan_excel'); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>xls.png"> Export ke Excel</a>
                <a href="<?php echo site_url('kepegawaian/laporan_print'); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>print.jpg" width="15"> Cetak ke Printer</a>
            </div>
            <!-- /.box-footer -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->