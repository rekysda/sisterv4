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
      <li>Admin</li>
      <li><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">List</h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th scope="col">Sekolah</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($userlist as $r) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $r['username']; ?></td>
                  <td><?= $r['name']; ?></td>
                  <td><?php
                  $listaccessuser=check_access_user($r['id']); ?>
                  <?php foreach ($listaccessuser as $dt) : ?>
                    <?= $dt['sekolah_id']?>
                    <?php endforeach; ?>                  
                  </td>
                  <td>
                    <a href="<?= base_url('admin/usersekolahaccess/') . $r['id']; ?>" class="btn btn-warning btn-xs">Access</a>
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->