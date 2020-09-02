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
                <h3 class="box-title">Pengaturan PPDB</h3>
            </div>
            <div class="box-body">

                <form class="form-horizontal" action="" method="post"enctype ="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Tahun PPDB Default</label>
                        <div class="col-sm-9">
                            <select name="tahun_ppdb_default" id="tahun_ppdb_default" class="form-control <?= form_error('tahun_ppdb_default') ? 'is-invalid' : '' ?>">
                                <?php
                                $tahunn = (date("Y") + 1);
                                for ($n = 2019; $n <= $tahunn; $n++) {
                                    if ($tahun_ppdb_default['value'] == $n) {
                                        echo "<option value='$n' selected>$n</option>";
                                    } else {
                                        echo "<option value='$n'>$n</option>";
                                    }
                                }
                                ?>
                            </select>
                            <?= form_error('tahun_ppdb_default', '<span class="help-block">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" name="is_ppdb_online" id="is_ppdb_online" <?= $is_ppdb_online['value'] == '1' ? 'checked' : ''; ?>> Is_PPDB_Online?
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group <?= form_error('gelombang_ppdb_default') ? 'has-error' : '' ?>">
                        <label for="name" class="col-sm-3 control-label">Gelombang PPDB Default</label>
                        <div class="col-sm-9">
                            <select name="gelombang_ppdb_default" id="gelombang_ppdb_default" class="form-control <?= form_error('gelombang_ppdb_default') ? 'is-invalid' : '' ?>">
                            <option value="">Tanpa Gelombang</option>
                                <?php foreach ($gelombangppdb as $dt) : ?>
                                <option value="<?= $dt['id']; ?>" <?= $dt['id'] == $gelombang_ppdb_default['value'] ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            * Dengan memilih tanpa Gelombang, maka Gelombang ppdb akan di tentukan oleh pihak sekolah 
                            <?= form_error('gelombang_ppdb_default', '<span class="help-block">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group <?= form_error('kartu_peserta') ? 'has-error' : '' ?>">
                        <label for="name" class="col-sm-3 control-label">Kartu Peserta</label>
                        <div class="col-sm-9">
                        <textarea name="kartu_peserta" id="id_textarea"rows="4" cols="50">
                        <?= $kartu_peserta['value']; ?>
                        </textarea>
                            <?= form_error('kartu_peserta', '<span class="help-block">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Buku PPDB/Panduan</label>
                        <div class="col-sm-9">
                        <input type="file" name="image"required><p class="help-block">Extensi harus PDF</p>
                        <a href="<?= base_url('assets/pdf/bukupanduan.pdf'); ?>" class="btn btn-success" target="new"><b>Download</b></a>
                        </div>
                    </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <input class="form-control" type="hidden" name="user_id" value="<?= $user['id']; ?>" />
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('ppdb/setting'); ?> " class="btn btn-default">Cancel</a>
            </div>
            </form>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->