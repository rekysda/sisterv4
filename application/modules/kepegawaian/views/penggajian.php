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
                    <a href="<?= base_url('kepegawaian/penggajian_rekap'); ?>" class="btn btn-primary btn-sm">
                        Rekap Penggajian
                    </a>
                </div>
                </div>
            </div>
            <div class="box-body">
                <?= $this->session->flashdata('message') ?>
                <!-- Search form (start) -->

                <!-- Posts List -->
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
                            <th>Is Active?</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sno = 1;
                        foreach ($pegawairesult as $dt) :
                            echo "<tr>";
                            echo "<td>" . $sno . "</td>";
                            echo "<td>" . $dt['nip'] . "</td>";
                            echo "<td>" . $dt['nama_guru'] . "</td>";
                            echo "<td>" . $dt['jeniskelamin'] . "</td>";
                            echo "<td>" . $dt['hp'] . "</td>";
                            echo "<td>" . $dt['statuspegawai'] . "</td>";
                            echo "<td>" . $dt['jenisptk'] . "</td>";
                            echo "<td>" . $dt['statuskeaktifan'] . "</td>";
                            ?>
                            <td><a href="<?= base_url('kepegawaian/penggajian_add/' . $dt['id']); ?>" class="btn btn-success btn-xs"><i class="fa fa-fw fa-user-plus"></i></a>&nbsp;&nbsp;<a href="<?= base_url('kepegawaian/penggajian_list/' . $dt['id']); ?>" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-list-ol"></i></a></td>
                            <?php
                            echo "</tr>";
                            $sno++;
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