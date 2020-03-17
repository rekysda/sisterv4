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
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <div class="box-body">

        <div class="row">
          <div class="col-md-6">
            <form action="<?php base_url('keuangan/siswa_tambahbiaya') ?>" method="post">
              <div class="form-group <?php echo form_error('biaya_id') ? 'has-error' : '' ?>">
                <label for="name">Biaya*</label>
                <select name="biaya_id" id="biaya_id" class="form-control <?= form_error('biaya_id') ? 'is-invalid' : '' ?>">
                            <option value="">== Biaya ==</option>
                            <?php foreach ($biayacategories as $pr) : ?>
                                <option value="<?= $pr['id']; ?>" disabled><?= $pr['nama']; ?></option>
                            
                            <?php foreach ($biaya as $dt) : ?>
                            <?php if($pr['id']==$dt['category_id']) { ?>
                                <option value="<?= $dt['id']; ?>"<?= set_select('biaya_id', $dt['id'], FALSE); ?>> -- <?= $dt['nama']; ?></option>
                            <?php } ?>
                            <?php endforeach; ?>
                            <?php endforeach; ?>
                        </select>
                <?= form_error('biaya_id', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('nominal') ? 'has-error' : '' ?>">
                <label for="nominal">Nominal*</label>
                <input class="form-control" type="text"id="nominal" name="nominal" value="<?= set_value('nominal'); ?>" />
                <?= form_error('nominal', '<span class="help-block">', '</small>'); ?>
              </div>
              <input class="form-control" type="hidden" name="user_id" value="<?= $user['id']; ?>" />
              <input class="form-control" type="hidden" name="siswa_id" value="<?= $getsiswabyId['id']; ?>" />
              <button type="submit" class="btn btn-primary">Tambah</button>
              <a href="<?= base_url('keuangan/siswakeuangan'); ?> " class="btn btn-default">Kembali</a>
            </form>
          </div>
          <div class="col-md-6">
          <div class="form-group">
                <label for="name">Sekolah</label><br>
               <?= getfieldtable('m_sekolah','sekolah',$getsiswabyId['sekolah_id']) ?>
              </div>
          <div class="form-group">
                <label for="name">No.Formulir</label><br>
               <?= $getsiswabyId['noformulir'] ?>
              </div>
              <div class="form-group">
                <label for="name">NIS</label><br>
               <?= $getsiswabyId['nis'] ?>
              </div>         
              <div class="form-group">
                <label for="name">Nama</label><br>
               <?= $getsiswabyId['namasiswa'] ?>
              </div>     
          </div>
        </div>

      </div>
      <!-- /.box-body -->
    </div>
      <!-- /.box-body -->
      <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Rincian Biaya Siswa</h3>
      </div>
      <div class="box-body">
        <table  class='table table-hover' id="example3">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Biaya</th>
              <th scope="col">Nominal</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($siswa_keuangan as $dt) : ?>
            <?php if(($dt['siswa_id']== $siswa_id)and($dt['nominal']>=0)) {  ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $dt['biaya']; ?><br>[<?= $dt['jenis']; ?>]</td>
                <td>
                    <input class="form-control" type="text"  name="nominal" value="<?= $dt['nominal']; ?>"data-id="<?= $dt['id']; ?>"data-siswa="<?= $dt['siswa_id']; ?>"/><br>[<?= $dt['is_paid'] == 1 ? '<font color="green">PAID</font>' : '<font color="red">UNPAID</font>'; ?>]     
                </td>
                <td><a href="<?= base_url('keuangan/hapusbiayasiswa/' . $dt['id'].'/'.$siswa_id); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a></td>
              </tr>
              <?php $total += $dt['nominal']; ?>
              <?php $i++; ?>
              <?php } ?>
            <?php endforeach; ?>
            </tbody>
            <tr>
              <th scope="col"></th>
              <th scope="col">Total</th>
              <th scope="col"><?= nominal($total); ?></th>
            </tr>
          
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->