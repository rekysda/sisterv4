<
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
            <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/images/pegawai/') . $user['image']; ?>" alt="User profile picture">

            <h3 class="profile-username text-center"><?= $user['nama_guru']; ?></h3>

            <p class="text-muted text-center">
            Nama : <?= $user['nama_guru']; ?><br>
            nip : <?= $user['nip']; ?><br>
            # : <?= round(microtime(true) * 1000).$this->session->userdata('guru_id'); ?>
          </p>
            <a href="<?= base_url('guru/lihatdata'); ?>" class="btn btn-primary btn-block"><b>Lihat Profile</b></a>
          </div>
          <!-- /.box-body -->
        </div>
        </div>
        <!-- /.box -->
        <!-- Setting -->
          <div class="col-md-3">
        <div class="box box-primary">
          <div class="box-body box-profile">

            <h3 class="profile-username text-center">SETTING</h3>

            <p class="text-muted text-center">
            Tahun Akademik Aktif : <?= $tahunakademik['namaakademik_aktif']; ?><br>
           Semester Aktif : <?= $tahunakademik['semester_aktif']; ?><br>
          </div>
          <!-- /.box-body -->
        </div>


      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->