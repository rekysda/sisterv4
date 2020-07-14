
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
        <h3 class="box-title"><?= $title; ?> Keterampilan</h3>

      </div>
      
      <div class="box-body">
        <div class="row">
       
<!-- -->
<div class='col-md-12'>
<div class='panel-body'>
              <table class='table table-condensed table-hover'>
                  <tbody>
                    <tr><th scope='row'>Nama Kelas</th>               <td><?= $get_datajadwal['nama_kelas'] ?> </td></tr>
                    <tr><th scope='row'>Nama Guru</th>               <td><?= getfieldtable2('nama_guru', 'm_pegawai', 'id', $get_datajadwal['guru_id']) ?> </td></tr>
                    <tr><th scope='row'>Mata Pelajaran</th>           <td><?= $get_datajadwal['nama_mapel'] ?></td></tr>
                    <tr><th scope='row'>Tahun Akademik</th>           <td><?= getfieldtable2('nama', 'm_tahunakademik', 'id', $get_datajadwal['tahunakademik_id']) ?></td></tr>
                  </tbody>
              </table>
</div>
<div class="table-responsive">        
<form method="post" action="<?= base_url('guru/input_keterampilan_add/'.$get_datajadwal['id']) ?>" >
<div class='panel-body'>
        <table class='table table-bordered table-striped'>
                    <thead>
                      <tr><td rowspan='2'>No</td>
                        <td  width='170px' rowspan='2'>Nama Siswa</th>
                        <td colspan='2'><center>Proses</center></td>
                        <td colspan='2'><center>Produk</center></td>
                        <td colspan='2'><center>Proyek</center></td>
                        <td colspan='2'><center>Portfolio</center></td>
                        <td rowspan='2'>Grade</th>
                    </tr>
                      <tr>
                          <th><center>1</center></th>
                          <th><center>2</center></th>
                          <th><center>1</center></th>
                          <th><center>2</center></th>
                          <th><center>1</center></th>
                          <th><center>2</center></th>
                          <th><center>1</center></th>
                          <th><center>2</center></th>
                      </tr>
                      
                    </thead>
                    <tbody>
            <?php
            $sno = $row + 1;
            if($get_nilai_keterampilan){
            foreach ($get_nilai_keterampilan as $dt) : ?>
              <tr><td><?= $sno++ ?></td>
                              <td><?= $dt['namasiswa']?> </td>
                              <input type='hidden' name='siswa_id[]' value='<?= $dt['siswa_id'] ?>'>
                              <input type='hidden' name='siswa_urut[]' value='<?= $dt['siswa_urut'] ?>'>
                              <td><center><input type='number' name='nil1[]' value='<?= $dt['nil1'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='nil2[]' value='<?= $dt['nil2'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='nil3[]' value='<?= $dt['nil3'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='nil4[]' value='<?= $dt['nil4'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='nil5[]' value='<?= $dt['nil5'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='nil6[]' value='<?= $dt['nil6'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='nil7[]' value='<?= $dt['nil7'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='nil8[]' value='<?= $dt['nil8'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                             <td><center><input type='text' name='grade[]' value='<?= $dt['grade'] ?>' readonly style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                            </tr>
            <?php endforeach; ?>
            <?php }else{ ?>
             <?php foreach ($getlistsiswa as $dt) : ?>
              <tr><td><?= $sno++ ?></td>
                              <td><?= $dt['namasiswa']?> </td>
                              <input type='hidden' name='siswa_id[]' value='<?= $dt['siswa_id'] ?>'>
                              <input type='hidden' name='siswa_urut[]' value='<?=  $sno ?>'>
                              <td><center><input type='number' name='nil1[]' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='nil2[]'  style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='nil3[]' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='nil4[]' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='nil5[]' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='nil6[]' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='nil7[]' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='nil8[]' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td></td>
                            </tr>
            <?php endforeach; ?>
            <?php }?>
    </tbody>
        </table>
        <input type='hidden' name='tahunakademik_id' value='<?= $tahunakademik_id ?>'>
        <input type='hidden' name='mapel_id' value='<?= $mapel_id ?>'>
        <input type='hidden' name='kelas_id' value='<?= $kelas_id ?>'>
        <input type='hidden' name='guru_id' value='<?= $guru_id ?>'>
        <div style='clear:both'></div>
              <div class='box-footer'>
                  <button type='submit' name='simpan' class='btn btn-info'>Simpan</button>
                  <button type='reset' class='btn btn-default pull-right'>Cancel</button>
                </div>
              </div>
              
            </form>
            
          </div><br>
          <a href="<?= base_url('guru/input_nilai') ?>"class="btn btn-warning">Kembali</a>
          <!-- table -->
        </div>
      </div>
      </div>
      
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
        <!-- Default box -->
        <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Catatan</h3>
      </div>
      
      <div class="box-body">
<div class='panel-body'>
    <table class='table table-condensed table-hover'>
<tbody>
                  <tr><td><b>KKM</b><br>
A : Nilai > 90 <br>
B : Nilai > 82 <br>
C : Nilai > 74 <br>
D : Nilai < 75 <br>
</td>
                  </tr>
              </table>

        </div>
      </div>
  </section>
  <!-- /.content -->
</div>

<!-- /.content-wrapper -->