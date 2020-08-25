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
                <h3 class="box-title">Pengaturan Akademik</h3>
            </div>
            <div class="box-body">

                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Tahun Angkatan Default</label>
                        <div class="col-sm-9">
                            <select name="tahun_default" id="tahun_default" class="form-control <?= form_error('tahun_default') ? 'is-invalid' : '' ?>">
                                <?php
                                $tahunn = (date("Y") + 1);
                                for ($n = 2019; $n <= $tahunn; $n++) {
                                    if ($tahun_default['value'] == $n) {
                                        echo "<option value='$n' selected>$n</option>";
                                    } else {
                                        echo "<option value='$n'>$n</option>";
                                    }
                                }
                                ?>
                            </select>
                            <?= form_error('tahun_default', '<span class="help-block">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Tahun Akademik Default</label>
                        <div class="col-sm-9">
                            <select name="tahun_akademik_default" id="tahun_akademik_default" class="form-control <?= form_error('tahun_akademik_default') ? 'is-invalid' : '' ?>">
                                <?php foreach ($tahunakademik as $dt) : ?>
                                <option value="<?= $dt['id']; ?>" <?= $dt['id'] == $tahun_akademik_default['value'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('tahun_id', '<span class="help-block">', '</small>'); ?>
                        </div>
                    </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <input class="form-control" type="hidden" name="user_id" value="<?= $user['id']; ?>" />
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('akademik/setting'); ?> " class="btn btn-default">Cancel</a>
            </div>
            </form>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->