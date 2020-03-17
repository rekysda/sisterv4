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
                <h3 class="box-title">Add New</h3>
            </div>
            <div class="box-body">

                <?= $this->session->flashdata('message') ?>
                * Akan generate noformulir beserta password dari nomor awal s/d akhir dengan status formulir tersedia
                <form action="<?php base_url('ppdb/biaya') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Tahun PPDB*</label>
                        <select name="tahun_ppdb" id="tahun_ppdb" class="form-control <?= form_error('tahun_ppdb') ? 'is-invalid' : '' ?>">
                            <option value="">== Tahun ==</option>
<?php                       $tahunn = (date("Y")+1);
                      for($n=2019; $n<=$tahunn; $n++){ 
                        if ($tahun_ppdb_default == $n){
                          echo "<option value='$n' selected>$n</option>";
                        }else{
                          echo "<option value='$n'>$n</option>";
                        }
                      } 
                      ?> 
                        </select>
                        <div class="invalid-feedback">
                            <?= form_error('tahun_ppdb') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">No Formulir Awal (Angka minimal 5 Digit, misal 19001*</label>
                        <input class="form-control <?php echo form_error('formulirawal') ? 'is-invalid' : '' ?>" type="text" id="formulirawal" name="formulirawal" value="<?= set_value('formulirawal'); ?>" />
                        <div class="invalid-feedback">
                            <?= form_error('formulirawal') ?>
                        </div>
                  </div>
                    <div class="form-group">
                        <label for="name">No Formulir Akhir (Angka minimal 5 Digit, misal 19001*</label>
                        <input class="form-control <?php echo form_error('formulirakhir') ? 'is-invalid' : '' ?>" type="text" id="formulirakhir" name="formulirakhir" value="<?= set_value('formulirakhir'); ?>" />
                        <div class="invalid-feedback">
                            <?= form_error('formulirakhir') ?>
                        </div>
                  </div>

                    <input class="form-control" type="hidden" name="user_id" value="<?= $user['id']; ?>" />
                    <input class="btn btn-success" type="submit" name="btn" value="Save" />&nbsp; <a href="<?= base_url('ppdb/formulir_add'); ?> " class="btn btn-warning">Cancel</a>&nbsp; <a href="<?= base_url('ppdb/formulir'); ?> " class="btn btn-primary">Back</a>
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        </div>
        <!-- /.box-body -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->