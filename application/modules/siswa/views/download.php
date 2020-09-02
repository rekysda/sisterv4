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
      <li class="active"><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-lg-6">
        <?= $this->session->flashdata('message'); ?>
      </div>
    </div>

    <div class="row">
    
        <div class="col-md-3">
            <div class="box box-primary">
            <div class="box-body box-profile" align="center">
                <img src="<?= base_url('assets/images/siswa/pdf.png')?>" alt="Download Buku Panduan" height="150">
                <h3 class="profile-username text-center">BUKU PANDUAN</h3>
                <a href="<?= base_url('assets/pdf/bukupanduan.pdf'); ?>" class="btn btn-primary btn-block"target="new"><b>Download</b></a>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="box box-primary">
            <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/images/siswa/') . $user['image']; ?>" alt="User profile picture">
                <h3 class="profile-username text-center">Kartu Peserta</h3>
                <a href="<?= base_url('siswa/kartupeserta'); ?>" class="btn btn-primary btn-block"target="new"><b>Download</b></a>
            </div>
            </div>
        </div>

    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->