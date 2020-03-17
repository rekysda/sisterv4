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
            <div class="col-md-6">
                <div class="box-tools">
          <a href="<?= base_url('ppdb/formulir_add'); ?>" class="btn btn-primary btn-sm">
            Add New Data
          </a>&nbsp;
          <a href="<?= base_url('ppdb/formulir_export_csv'); ?>" class="btn btn-success btn-sm">
            Export CSV
          </a>
        </div>
</div>
            </div>
            <div class="box-body">
            <?= $this->session->flashdata('message') ?>
<form action="<?php base_url('ppdb/formulir_export_csv') ?>" method="post" enctype="multipart/form-data"class="form-inline">
                    <div class="form-group">
                        <label for="name">No Formulir Awal*</label>
                        <input class="form-control <?php echo form_error('formulirawal') ? 'is-invalid' : '' ?>" type="number" id="formulirawal" name="formulirawal" value="<?= set_value('formulirawal'); ?>" />
                        <div class="invalid-feedback">
                            <?= form_error('formulirawal') ?>
                        </div>
                  </div>
                    <div class="form-group">
                        <label for="name">No Formulir Akhir*</label>
                        <input class="form-control <?php echo form_error('formulirakhir') ? 'is-invalid' : '' ?>" type="number" id="formulirakhir" name="formulirakhir" value="<?= set_value('formulirakhir'); ?>" />
                        <div class="invalid-feedback">
                            <?= form_error('formulirakhir') ?>
                        </div>
                  </div>

                    <input class="form-control" type="hidden" name="user_id" value="<?= $user['id']; ?>" />
                    <input class="btn btn-success" type="submit" name="btn" value="Export CSV" />&nbsp; <a href="<?= base_url('ppdb/formulir'); ?> " class="btn btn-primary">Back</a>
                </form>
                </div>
        <!-- /.box-body -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->