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
				<h3 class="box-title">Edit <?= $title; ?></h3>
			</div>
			<div class="box-body">

				<?= $this->session->flashdata('message') ?>

				<form class="form-horizontal" action="<?php base_url('akademik/editgelombang') ?>" method="post">
					<div class="form-group <?= form_error('nama') ? 'has-error' : '' ?>">
						<label for="name" class="col-sm-2 control-label">Gelombang</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="nama" value="<?= $getgelombang['nama']; ?>" placeholder="Gelombang">
							<?= form_error('nama', '<span class="help-block">', '</small>'); ?>
						</div>
					</div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Simpan</button>
				<a href="<?= base_url('akademik/gelombang'); ?> " class="btn btn-default">Cancel</a>
			</div>
			</form>
		</div>
		<!-- /.box -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->