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
				<h3 class="box-title"><?= $title; ?></h3>
			</div>
			<div class="box-body">

				<div class="row">
					<div class="col-md-4">
						<form action="<?php base_url('akademik/biaya') ?>" method="post" enctype="multipart/form-data">
							<div class="form-group <?= form_error('nama') ? 'has-error' : '' ?>">
								<label for="name">Nama</label>
								<input class="form-control" type="text" name="nama" value="<?= set_value('nama'); ?>" placeholder="Nama biaya">
								<?= form_error('nama', '<span class="help-block">', '</small>'); ?>
							</div>
							<div class="form-group <?= form_error('category_id') ? 'has-error' : '' ?>">
								<label for="name">Kategori</label>
								<select name="category_id" id="category_id" class="form-control">
									<option value="">== Kategori ==</option>
									<?php foreach ($parent as $pr) : ?>
									<option value="<?= $pr['id']; ?>"><?= $pr['nama']; ?></option>
									<?php endforeach; ?>
								</select>
								<?= form_error('category_id', '<span class="help-block">', '</small>'); ?>
							</div>
							<input class="form-control" type="hidden" name="user_id" value="<?= $user['id']; ?>">
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Simpan</button>
								<a href="<?= base_url('akademik/biaya'); ?> " class="btn btn-default">Cancel</a>
							</div>
						</form>
					</div>
					<div class="col-md-8">
						<div class="table-responsive">
							<table class="table table-hover" id='example3'>
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Kategori</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($biaya as $dt) : ?>
									<tr>
										<td><?= $i; ?></td>
										<td><?= $dt['nama']; ?></td>
										<td><?= $dt['category']; ?></td>
										<td>
											<a href="<?= base_url('akademik/editBiaya/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
											<a href="<?= base_url('akademik/hapusBiaya/' . $dt['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
										</td>
									</tr>
									<?php $i++; ?>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.box-body -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->