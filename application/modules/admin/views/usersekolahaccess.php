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
        <h3 class="box-title"><?= $title; ?> : <?= $user['username']; ?>, <?= $user['name']; ?></h3>
      </div>
      <div class="box-body">

        <?= $this->session->flashdata('message') ?>

        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Sekolah</th>
              <th scope="col">Access</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($sekolah as $dt) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $dt['sekolah']; ?></td>
                <td>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" <?= check_access_sekolah($user['id'], $dt['id']); ?> data-user="<?= $user['id']; ?>" data-sekolah="<?= $dt['id']; ?>">
                  </div>
                </td>
              </tr>       
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
        <div class="row">
          <div class="col-lg-4">
            <a href="<?= base_url('admin/usersekolah') ?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali</a>
          </div>
        </div>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->