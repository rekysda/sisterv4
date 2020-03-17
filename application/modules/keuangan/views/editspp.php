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

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">All [Status Calon dan Aktif ]</h3>
                <div class="box-tools">
                    <a href="<?= base_url('keuangan/settingspp_global') ?>" class="btn btn-warning">Setting SPP Global</a>
                </div>
            </div>
            <div class="box-body">
                <?= $this->session->flashdata('message') ?>

                <form class="form-horizontal" action="<?php base_url('keuangan/editsppsiswa') ?>" method="post">

                <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Sekolah</label>
                        <div class="col-sm-10">
                        <?= getfieldtable('m_sekolah','sekolah',$getsppsiswa['sekolah_id'])?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">NoFormulir</label>
                        <div class="col-sm-10">
                            <input class="form-control <?php echo form_error('noformulir') ? 'is-invalid' : '' ?>" type="text" id="noformulir" name="noformulir" value="<?= $getsppsiswa['noformulir']; ?>" readonly />
                            <div class="invalid-feedback">
                                <?= form_error('noformulir') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">NIS</label>
                        <div class="col-sm-10">
                            <input class="form-control <?php echo form_error('nis') ? 'is-invalid' : '' ?>" type="text" id="nis" name="nis" value="<?= $getsppsiswa['nis']; ?>" readonly />
                            <div class="invalid-feedback">
                                <?= form_error('nis') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nama Siswa</label>
                        <div class="col-sm-10">
                            <input class="form-control <?php echo form_error('namasiswa') ? 'is-invalid' : '' ?>" type="text" id="namasiswa" name="namasiswa" value="<?= $getsppsiswa['namasiswa']; ?>" readonly />
                            <div class="invalid-feedback">
                                <?= form_error('namasiswa') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group <?= form_error('nominal') ? 'has-error' : '' ?>">
                        <label for="name" class="col-sm-2 control-label">Nominal</label>
                        <div class="col-sm-10">
                            <input class="form-control <?php echo form_error('nominal') ? 'is-invalid' : '' ?>" type="text" id="nominal" name="nominal" value="<?= $getsppsiswa['nominal']; ?>" />
                            <?= form_error('nominal', '<span class="help-block">', '</small>'); ?>
                        </div>
                    </div>
                    <input class="form-control" type="hidden" name="siswa_id" value="<?= $getsppsiswa['siswa_id']; ?>">
                    <input class="form-control" type="hidden" name="user_id" value="<?= $user['id']; ?>">
                    <input class="btn btn-primary" type="submit" name="btn" value="Simpan">
                    <a href="<?= base_url('keuangan/siswaspp'); ?> " class="btn btn-default">Cancel</a>
                </form>
                <hr>

                <!-- Posts List -->
                <table class='table table-hover' id="example1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NoFormulir</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>SPP</th>
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
                            $namatahun = $dt['tahun'];
                            $gelombang = $dt['gelombang'];
                            $jalur = $dt['jalur'];
                            $ppdb_status = $dt['ppdb_status'];
                            $nominalspp = getsettingsppsiswa($siswa_id);
                            echo "<tr>";
                            echo "<td>" . $sno . "</td>";
                            echo "<td>" . $noformulir . "</td>";
                            echo "<td>" . $nis . "</td>";
                            echo "<td>" . $namasiswa . "</td>"; ?>
                            <td><?= nominal($nominalspp); ?>
                            </td>
                            <?php
                            echo "<td>" . $ppdb_status . "</td>"; ?>
                            <td><a href="<?= base_url('keuangan/editspp/' . $siswa_id) ?>" class="btn btn-info btn-xs">Ubah</a></td>
                            </tr>
                            <?php
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