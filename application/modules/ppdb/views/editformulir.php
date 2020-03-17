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

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit</h3>
            </div>
            <div class="box-body">

                <?= $this->session->flashdata('message') ?>
                <?php $tahun_ppdb = $getformulir['tahun_ppdb']; ?>
                <?php $status = $getformulir['status']; ?>

                <form class="form-horizontal" action="<?php base_url('ppdb/editformulir') ?>" method="post">
                    <div class="form-group <?= form_error('tahun_ppdb') ? 'has-error' : '' ?>">
                        <label for="name" class="col-sm-2 control-label">Tahun PPDB</label>
                        <div class="col-sm-10">
                            <select name="tahun_ppdb" id="tahun_ppdb" class="form-control">
                                <option value="">== Tahun ==</option>
                                <?php $tahunn = (date("Y") + 1);
                                for ($n = 2019; $n <= $tahunn; $n++) {
                                    if ($getformulir['tahun_ppdb'] == $n) {
                                        echo "<option value='$n' selected>$n</option>";
                                    } else {
                                        echo "<option value='$n'>$n</option>";
                                    }
                                }
                                ?>
                            </select>
                            <?= form_error('tahun_id', '<span class="help-block">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo form_error('noformulir') ? 'has-error' : '' ?>">
                        <label for="name" class="col-sm-2 control-label">No Formulir</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="noformulir" name="noformulir" value="<?= $getformulir['noformulir']; ?>" />
                            <?= form_error('noformulir', '<span class="help-block">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group <?= form_error('password') ? 'has-error' : '' ?>">
                        <label for="name" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" id="password" name="password" value="<?= $getformulir['password']; ?>" />
                            <?= form_error('password', '<span class="help-block">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group <?php echo form_error('status') ? 'has-error' : '' ?>">
                        <label for="name" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" id="status" class="form-control <?= form_error('status') ? 'has-error' : '' ?>">
                                <?php foreach ($getstatus as $dt) : ?>
                                    <option value="<?= $dt['nama']; ?>" <?= $dt['nama'] == $status ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('status', '<span class="help-block">', '</small>'); ?>
                    </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <input class="form-control" type="hidden" name="user_id" value="<?= $user['id']; ?>">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('ppdb/formulir'); ?> " class="btn btn-default">Cancel</a>
            </div>
            </form>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->