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
            <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/images/profile/') . $user['image']; ?>" alt="User profile picture">

            <h3 class="profile-username text-center"><?= $user['name']; ?></h3>

            <p class="text-muted text-center">Member since <?= date('d F Y', $user['date_created']); ?></p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Email</b> <a class="pull-right"><?= $user['email']; ?></a>
              </li>
            </ul>

            <a href="<?= base_url('user/edit'); ?>" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->