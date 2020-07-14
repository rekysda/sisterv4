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

    <?= $this->session->flashdata('message') ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
      </div>

      <div class="box-body">
        <div class="row">

          <!-- -->
          <div class='col-md-12'>
            <div class='panel-body'>
              <table class='table table-condensed table-hover'>
                <tbody>
                  <tr>
                    <th scope='row'>Nama Kelas</th>
                    <td><?= $get_datajadwal['nama_kelas'] ?> </td>
                  </tr>
                  <tr>
                    <th scope='row'>Nama Guru</th>
                    <td><?= getfieldtable2('nama_guru', 'm_pegawai', 'id', $get_datajadwal['guru_id']) ?></td>
                  </tr>
                  <tr>
                    <th scope='row'>Mata Pelajaran</th>
                    <td><?= $get_datajadwal['nama_mapel'] ?></td>
                  </tr>
                  <tr>
                    <th scope='row'>Tahun Akademik</th>
                    <td><?= getfieldtable2('nama', 'm_tahunakademik', 'id', $get_datajadwal['tahunakademik_id']) ?></td>
                  </tr>
                </tbody>
              </table>
              
            </div>
          </div>

              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                  <input type='hidden' name='jdwl' value='36'>
<tr><td scope='row'>Hari</td>  <td>
<select name="hari"class="form-control <?= form_error('hari') ? 'is-invalid' : '' ?>">
<?php $harin = array('', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
for ($n = 1; $n <= 6; $n++) {?>
<?php if ($get_datajurnal['hari'] == $harin[$n]) {?>
<option value='<?= $harin[$n]?>' selected> <?= $harin[$n]?></option>";
<?php  } else { ?>
<option value="<?= $harin[$n]?>" <?= set_select('hari', $harin[$n], FALSE); ?>><?= $harin[$n]?></option>
<?php }?>
<?php }?>
</select>
<div class="invalid-feedback"><?= form_error('hari') ?></div>
 </td></tr>
<tr><td scope='row'>Tanggal</td>  <td><input type='text' style='border-radius:0px; padding-left:12px' class='datepicker form-control' value='<?= $get_datajurnal['tanggal']?>' id='tanggal' name='tanggal'>
<div class="invalid-feedback"><?= form_error('tanggal') ?></div>               
</td></tr>
<tr><td scope='row'>Jam Ke</td>  <td><input type='number' class='form-control' value='<?= $get_datajurnal['jamke']?>' name='jamke'>
<div class="invalid-feedback"><?= form_error('jamke') ?></div> </td></tr>

<tr><td scope='row'>Materi</td>  <td><textarea style='height:80px' class='form-control' name='materi'><?= $get_datajurnal['materi']?></textarea>
<div class="invalid-feedback"><?= form_error('materi') ?></div>
</td></tr>

<tr><td scope='row'>Keterangan</td>  <td><textarea style='height:160px'  class='form-control' name='keterangan'><?= $get_datajurnal['keterangan']?></textarea></td></tr>
                    </td></tr>
                  </tbody>
                  </table>
              </div>
              <div class='box-footer'>
              <input class="form-control" type="hidden" name="jadwal_id" value="<?= $get_datajadwal['id']; ?>">
              <input class="form-control" type="hidden" name="tahunakademik_id" value="<?= $get_datajadwal['tahunakademik_id']; ?>">
              <input class="form-control" type="hidden" name="mapel_id" value="<?= $get_datajadwal['mapel_id']; ?>">
              <input class="form-control" type="hidden" name="kelas_id" value="<?= $get_datajadwal['kelas_id']; ?>">
              <input class="form-control" type="hidden" name="guru_id" value="<?= $get_datajadwal['guru_id']; ?>">
                    <button type='submit' name='tambah' class='btn btn-info'>Simpan</button>
                    <a href='<?= base_url('akademik/journalkbm_list/'.$jadwal_id)?>'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form> 
</div>
      </div>

  </section>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->