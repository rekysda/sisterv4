<?php 
if (!$user['image']){
  $user['image']='default.jpg';
}
?>
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
        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
          
<h3 class="profile-username text-center"><b>1. Profil Peserta Didik</b></h3>
            <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/images/siswa/') . $user['image']; ?>" alt="User profile picture">
           <h3 class="profile-username text-center"><?= $user['namasiswa']; ?></h3>
          <p class="text-muted text-center">
            Sekolah : <?= getfieldtable('m_sekolah','sekolah',$user['sekolah_id']) ?><br>
            Nomor Formulir : <?= $user['noformulir']; ?><br>
            NIS : <?= $user['nis']; ?><br>
            Status : <?= $user['ppdb_status']; ?>
          </p>
          <?php if( $user['ppdb_status']=='calon'){ ?>
            <a href="<?= base_url('siswa/edit'); ?>" class="btn btn-primary btn-block"><b>Edit Profil</b></a>
          <?php } ?>
          <?php if( $user['ppdb_status']=='aktif'){ ?>
            <a href="<?= base_url('siswa/lihatdata'); ?>" class="btn btn-primary btn-block"><b>Lihat Profil</b></a>
          <?php } ?>
          </div>
        </div>
      </div>

<div class="col-md-3">
<div class="box box-primary">
<div class="box-body box-profile">
<h3 class="profile-username text-center"><b>2. Nilai Rapor Asal</b></h3>
<img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/images/siswa/') . $user['image']; ?>" alt="Kartu Peserta Didik">
<?php if( $user['ppdb_status']=='calon'){ ?>
<a href="<?= base_url('siswa/siswa_rapor'); ?>" class="btn btn-primary btn-block"><b>Edit Rapor</b></a>
<?php } ?>
</div>
</div>
</div>
  
<div class="col-md-3">
<!-- Berkas Image -->
<div class="box box-primary">
  <div class="box-body box-profile">
    <h3 class="profile-username text-center"><b>3. Upload Berkas (JPG/JPEG)</b></h3>
  <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/images/siswa/') . $user['image']; ?>" alt="Kartu Peserta Didik">
    <div align="left">
    a.Akte Kelahiran<br>
    b.Kartu Keluarga<br>
    </div>
        
  <?php if( $user['ppdb_status']=='calon'){ ?>
    <a href="<?= base_url('siswa/siswa_berkas_add'); ?>" class="btn btn-primary btn-block"><b>Tambah Berkas</b></a>
  <?php } ?>
  <?php if( $user['ppdb_status']=='aktif'){ ?>
    <a href="<?= base_url('siswa/siswa_berkas'); ?>" class="btn btn-primary btn-block"><b>Lihat Berkas</b></a>
  <?php } ?>
  <h4>List Berkas</h4>
    <?php if($berkas){?>
                  <?php foreach ($berkas as $dt2) : ?>
                  <?php if($dt2['siswa']==$user['id']){ ?>
                    <a href="<?= base_url('assets/images/siswa_berkas/'.$dt2['gambar']) ?>" target="new">
                    <?= $dt2['nama']; ?></a><br>
                    <?php } ?>
                    <?php endforeach; ?>
                <?php } ?>
    </div>
  <!-- /.box-body -->
  </div>
  <!-- /.box -->
    </div>

        <div class="col-md-3">
            <div class="box box-primary">
            <div class="box-body box-profile">
                <h3 class="profile-username text-center"><b>4. Kartu Peserta Didik</b></h3>
            <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/images/siswa/') . $user['image']; ?>" alt="Kartu Peserta Didik">
                <a href="<?= base_url('siswa/kartupeserta'); ?>" class="btn btn-primary btn-block"target="new"><b>Download</b></a>
            </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="box box-primary">
            <div class="box-body box-profile" align="center">
                <h3 class="profile-username text-center">Panduan PPDB</h3>
                <img src="<?= base_url('assets/images/siswa/pdf.png')?>" alt="Download Panduan PPDB" height="150">
                <a href="<?= base_url('assets/pdf/bukupanduan.pdf'); ?>" class="btn btn-primary btn-block"target="new"><b>Download</b></a>
            </div>
            </div>
        </div>
        





    </div>
    <img src="<?= base_url('assets/images/siswa/langkahisian.png')?>"width="100%">
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->