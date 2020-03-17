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
            <li>Akademik</li>
      <li><?= $title; ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <?= $this->session->flashdata('message') ?>

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Tahun Akademik <?= getfieldtable("m_tahunakademik", "nama", $tahun_akademik_default['value']) ?></h3>
                <div class="box-tools">
                </div>
            </div>
            <div class="box-body">

                <!-- Posts List -->
                <table class='table table-hover' id="example3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NoFormulir</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sno = 1; ?>
                        <?php foreach ($siswaresult as $dt) :
                            $siswa_id = $dt['id'];
                            $noformulir = $dt['noformulir'];
                            $nis = $dt['nis'];
                            $namasiswa = $dt['namasiswa'];
                            $kelas_id = $dt['kelas_id'];
                            $ppdb_status = $dt['ppdb_status'];
                            if ($tahun_akademik_default['value'] == $dt['tahunakademik_id']) {
                                echo "<tr>";
                                echo "<td>" . $sno . "</td>";
                                echo "<td>" . $noformulir . "</td>";
                                echo "<td>" . $nis . "</td>";
                                echo "<td>" . $namasiswa . "</td>";
                                echo "<td>" . getfieldtable("m_kelas", "nama_kelas", $kelas_id) . "</td>";
                                ?>
                        <?php
                                echo "<td>" . $ppdb_status . "</td>"; ?>
                        <td><a href="<?= base_url('akademik/presensi_detail/' . $siswa_id) ?>" class="btn btn-info btn-xs">Detail</a></td>
                        </tr>
                        <?php
                            }
                            $sno++; ?>
                        <?php endforeach; ?>
                    <tbody>
                </table>

            </div>
            <!-- /.box-body -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->