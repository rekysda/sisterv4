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
    <?= $this->session->flashdata('message') ?>
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Biaya Siswa via CSV [Status Calon dan Aktif ]</h3>
                <div class="col-md-6">
                <div class="box-tools">
        <a href="<?= base_url('keuangan/siswakeuangan') ?>"class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>Biaya Global</a>
        <a href="<?= base_url('keuangan/tambahbiayaspp_global') ?>"class="btn btn-warning"><i class="fa fa-fw fa-plus"></i>SPP Global</a>
        <a href="<?= base_url('keuangan/siswakeuangan_tidakaktif') ?>"class="btn btn-danger">Tidak Aktif</a>
            </div></div>
            <div class="box-body">
            <div class="row">
					<div class="col-md-6">
            <form method="post" action="<?= base_url('keuangan/exportbiayacsv'); ?>"class="form-inline">
            <div class="form-group">
                <label for="name">Pilih Biaya *</label>
                <select name="biaya_id" class="form-control">
                            <option value="">== Biaya ==</option>
                            <?php foreach ($biayacategories as $pr) : ?>
                            <?php if ($pr['nama']<>'SPP'){ ?>
                                <option value="<?= $pr['id']; ?>" disabled><?= $pr['nama']; ?></option>
                            
                            <?php foreach ($biaya as $dt) : ?>
                            <?php if($pr['id']==$dt['category_id']) { ?>
                                <option value="<?= $dt['id']; ?>"<?= set_select('biaya_id', $dt['id'], FALSE); ?>> -- <?= $dt['nama']; ?></option>
                            <?php } ?>
                            <?php endforeach; ?>
                            <?php } ?>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" name="export" class="btn btn-success" value="Export to CSV" />
                    </div>
                    </form><br>
            <div class="alert alert-light" role="alert">
  <h4 class="alert-heading">Petunjuk Export to CSV</h4>
  <p>
  1. Pilih jenis Biaya yang akan dimasukkan ke biaya siswa yang berstatus aktif ataupun calon siswa.<br>
  2. Lakukan Export to CSV untuk mendownload semua data Siswa.<br>
  3. Edit data dengan Excel dan lakukan simpan data dengan CSV.<br>
  4. hanya diperbolehkan merubah nominal pada file CSV.<br>
  5. Apabila terdapat siswa yang sudah melakukan pembayaran harap melakukan delete row agar data siswa tersebut tidak terupdate dengan yang baru .<br>
  6. Perubahan akan mereplace data yang ada dan terdapat nominal.<br>
  7. Lakukan Import data apabila dirasa data telah lengkap.<br>
  8. Semua data akan ter replace/digantikan dengan data baru dengan posisi biaya belum terbayar/ UnPaid.<br>
  9. Untuk biaya SPP Lakukan pada <b>Tambah Biaya SPP Global</b><br>
  <b>Catatan Penting :</b> Fasilitas  Export dan Import CSV hanya diperuntukan untuk melakukan input data secara Massive pada banyak Siswa disaat bersamaan, dengan berdasarkan satu Biaya  . 
</p>
</div>
</div>
    <div class="col-md-6">
    <div class="table-responsive">
							<table class="table table-hover" id="example1">
								<thead>
									<tr>
										<th>Biaya_id</th>
										<th>Nama</th>
										<th>Jenis</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
                                    <?php foreach ($listbiaya as $dt) : ?>
                                    <?php if ($dt['category']<>'SPP'){ ?>
									<tr>
										<td><?= $dt['id']; ?></td>
										<td><?= $dt['nama']; ?></td>
										<td><?= $dt['category']; ?></td>
									</tr>
                                    <?php $i++; ?>
                                        <?php } ?>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
    </div>
    </div>
</section>

<section class="content">

<?= $this->session->flashdata('messageimport') ?>
<div class="box">
<div class="box-header with-border">
<h3 class="box-title">Import Data</h3>
<div class="box-body">
<form method="post" action="<?= base_url('keuangan/importbiayacsv'); ?>" enctype ="multipart/form-data">
<input type="file" name="siswabiaya" accept="text/csv"><br>
<input type="submit" name="import" class="btn btn-success" value="Import from CSV" />
</form>
</div>
</div>
        <!-- /.box-body -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->