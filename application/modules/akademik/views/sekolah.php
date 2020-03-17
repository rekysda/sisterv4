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
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">


      <div class="box-header with-border">
        <h3 class="box-title">Sekolah</h3>
      </div>
      </div>
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-hover" id='example3'>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Sekolah</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($sekolah as $dt) : ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $dt['sekolah']; ?></td>
                    <td><?= $dt['alamat']; ?><br><?= $dt['kota']; ?></td>
                    <td><?= $dt['telepon']; ?></td>
                    <td>
                      <a href="<?= base_url('akademik/editsekolah/' . $dt['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                        </td>
                  </tr>
                  <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

    </div>
    
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->