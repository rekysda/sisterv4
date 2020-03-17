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

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Add Data</h3>
            </div>
            <div class="box-body">
                <?= $this->session->flashdata('message') ?>
                <?php $statusdefault = 'aktif'; ?>
                <form method="post" action="" enctype="multipart/form-data" id="posts">
                    <table class="table table-striped table-hover">
                        <tr>
                            <td>Tahun PPDB / Masuk *</td>
                            <td>:</td>
                            <td><select name='tahun_ppdb' class='form-control'>
                                    <option value='' selected>- Tahun -</option>
                                    <?php $tahunn = date("Y");
                                    for ($n = 2017; $n <= $tahunn; $n++) {
                                        if ($tahunn == $n) {
                                            echo "<option value='$n' selected>$n</option>";
                                        } else {
                                            echo "<option value='$n'>$n</option>";
                                        }
                                    }
                                    ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>
                                <select name="ppdb_status" id="ppdb_status" class="form-control <?= form_error('ppdb_status') ? 'is-invalid' : '' ?>">
                                    <option value="">== Status ==</option>
                                    <?php foreach ($statussiswa as $dt) : ?>
                                    <option value="<?= $dt['nama']; ?>" <?= $dt['nama'] == $statusdefault ? ' selected="selected"' : ''; ?>><?= $dt['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= form_error('ppdb_status') ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td><input type="text" name="nis" value="<?= set_value('nis'); ?>" class="form-control <?php echo form_error('nis') ? 'is-invalid' : '' ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('nis') ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Siswa*</td>
                            <td>:</td>
                            <td><input type="text" name="namasiswa" value="<?= set_value('namasiswa'); ?>" class="form-control <?php echo form_error('namasiswa') ? 'is-invalid' : '' ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('namasiswa') ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td>:</td>
                            <td><input type="file" name="image">
                                <p class="help-block">Extensi foto harus JPG</p>
                            </td>
                        </tr>
                    </table>
            </div>

            <table class="table">
                <tr>
                    <td width="30%"></td>
                    <td></td>
                    <td>
                        <input type="submit" value="Simpan" name="submit" class="btn btn-success">&nbsp;
                        <a href="<?= base_url('akademik/siswa') ?>"><span class="btn btn-warning">Batal</span></a>
                    </td>
                </tr>
            </table>
            </form>
        </div>
        <!-- /.box-body -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->