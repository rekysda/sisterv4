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
                  <tr>
                    <th scope='row'>Hari, Tanggal</th>
                    <td><?= $get_datajurnal['hari']?>, <?= $get_datajurnal['tanggal']?></td>
                  </tr>
                  <tr>
                    <th scope='row'>Jam Ke</th>
                    <td><?= $get_datajurnal['jamke']?></td>
                  </tr>
                  <tr>
                    <th scope='row'>Materi</th>
                    <td><?= $get_datajurnal['materi']?></td>
                  </tr>  
                  <tr>
                    <th scope='row'>Keterangan</th>
                    <td><?= $get_datajurnal['keterangan']?></td>
                  </tr>                    
                </tbody>
              </table>

            </div>
          </div>

            <?php if ($listsiswa) { ?>
          <form method='POST' class='form-horizontal' action=<?= base_url('akademik/journal_addpresensi')?> enctype='multipart/form-data'>
            <div class='box-footer'>
              <input class="form-control" type="hidden" name="jadwal_id" value="<?= $get_datajadwal['id']; ?>">
              <input class="form-control" type="hidden" name="tahunakademik_id" value="<?= $get_datajadwal['tahunakademik_id']; ?>">
              <input class="form-control" type="hidden" name="mapel_id" value="<?= $get_datajadwal['mapel_id']; ?>">
              <input class="form-control" type="hidden" name="kelas_id" value="<?= $get_datajadwal['kelas_id']; ?>">
              <input class="form-control" type="hidden" name="guru_id" value="<?= $get_datajadwal['guru_id']; ?>">
              <input class="form-control" type="hidden" name="tanggal" value="<?= $get_datajurnal['tanggal']; ?>">
              <input class="form-control" type="hidden" name="journal_id" value="<?= $journal_id; ?>">
            </div>
            <div class='col-md-12'>
            
                <?php $i = 1; ?>
          
            <h4>Daftar Siswa</h4>
            <div class="table-responsive">
              <form method="post" action="<?= base_url('akademik/kelas_addpresensi') ?>">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (($listabsensijournal) and ($tanggal)) { ?>
                    <?php foreach ($listabsensijournal as $dt3) : ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $dt3['nis'] ?></td>
                      <td><?= $dt3['namasiswa'] ?></td>
                      <td>
                        <input type="hidden" name="siswa_id[]" value="<?= $dt3['siswa_id'] ?>">
                        <select name='status[]' class='form-control'width='100%>
                          <?php $stats = array('','H', 'S', 'I', 'A');
                                for ($n = 0; $n <= 4; $n++) {
                                  if ($dt3['status'] == $stats[$n]) {
                                    echo "<option value='$stats[$n]' selected>$stats[$n]</option>";
                                  } else {
                                    echo "<option value='$stats[$n]'>$stats[$n]</option>";
                                  }
                                }
                                ?>
                        </select>
                      </td> 
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>

                    <?php }  
                          else { ?>
                    <?php foreach ($listsiswa as $dt3) : ?>
                    <tr>
                      <td><?= $i ?></td>
                      <td><?= $dt3['nis'] ?></td>
                      <td><?= $dt3['namasiswa'] ?></td>
                      <td>
                        <input type="hidden" name="siswa_id[]" value="<?= $dt3['siswa_id'] ?>">
                        <select name='status[]' class='form-control'width='100%'>
                          <?php $stats = array('','H', 'S', 'I', 'A');
                                for ($n = 0; $n <= 4; $n++) {
                                  echo "<option value='$stats[$n]'>$stats[$n]</option>";
                                } ?>
                        </select>
                      </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach;
                      } 
                       ?>
              
                      <tr><td colspan="3"></td><td>
                      <button type='submit' name='tambah' class='btn btn-info'>Simpan</button>
              <a href='<?= base_url('akademik/journalkbm_list/' . $jadwal_id.'/'.$journal_id) ?>'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
              </tr>
                    </tbody>
                </table>
            </div>
          </form>
          <?php } ?>
        </div>
      </div>

  </section>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->