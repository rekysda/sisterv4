
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
        <h3 class="box-title"><?= $title; ?> Pengetahuan</h3>

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
<form method="post" action="<?= base_url('guru/input_pengetahuan_add/'.$get_datajadwal['id']) ?>" >
<div class='panel-body'>
        <table class='table table-bordered table-striped'>
                    <thead>
                      <tr><td rowspan='2'>No</td>
                        <td  width='170px' rowspan='2'>Nama Siswa</th>
                        <td colspan='6'><center>Harian</center></td>
                        <td colspan='6'><center>Tugas</center></td>
                        <td colspan='2'><center>Ujian</center></td>
                        <td rowspan='2'>Grade</th>
                    </tr>
                      <tr>
                          <th><center>PH1</center></th>
                          <th><center>PH2</center></th>
                          <th><center>PH3</center></th>
                          <th><center>PH4</center></th>
                          <th><center>PH5</center></th>
                          <th><center>PH6</center></th>
                          <th><center>PT1</center></th>
                          <th><center>PT2</center></th>
                          <th><center>PT3</center></th>
                          <th><center>PT4</center></th>
                          <th><center>PT5</center></th>
                          <th><center>PT6</center></th>
                          <th><center>UTS</center></th>
                          <th><center>UAS</center></th>
                      </tr>
                      
                    </thead>
                    <tbody>
            <?php
            $sno = $row + 1;
            if($get_nilai_pengetahuan){
            foreach ($get_nilai_pengetahuan as $dt) : ?>
              <tr><td><?= $sno ?></td>
                              <td><?= $dt['namasiswa']?> </td>
                              <input type='hidden' name='siswa_id[]' value='<?= $dt['siswa_id'] ?>'>
                              <input type='hidden' name='siswa_urut[]' value='<?= $sno++ ?>'>
                              <td><center><input type='number' name='ph1[]' value='<?= $dt['ph1'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='ph2[]' value='<?= $dt['ph2'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='ph3[]' value='<?= $dt['ph3'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='ph4[]' value='<?= $dt['ph4'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='ph5[]' value='<?= $dt['ph5'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='ph6[]' value='<?= $dt['ph6'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='pt1[]' value='<?= $dt['pt1'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='pt2[]' value='<?= $dt['pt2'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='pt3[]' value='<?= $dt['pt3'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='pt4[]' value='<?= $dt['pt4'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='pt5[]' value='<?= $dt['pt5'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='pt6[]' value='<?= $dt['pt6'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='uts[]' value='<?= $dt['uts'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='uas[]' value='<?= $dt['uas'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='text' name='grade[]'readonly value='<?= $dt['grade'] ?>' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                            </tr>
            <?php endforeach; ?>
            <?php }else{ ?>
             <?php foreach ($getlistsiswa as $dt) : ?>
              <tr><td><?= $sno ?></td>
                              <td><?= $dt['namasiswa']?> </td>
                              <input type='hidden' name='siswa_id[]' value='<?= $dt['siswa_id'] ?>'>
                              <input type='hidden' name='siswa_urut[]' value='<?=  $sno++ ?>'>
                              <td><center><input type='number' name='ph1[]' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='ph2[]'  style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='ph3[]' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='ph4[]' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='ph5[]' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='ph6[]' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='pt1[]'  style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='pt2[]'  style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='pt3[]'  style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='pt4[]' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='pt5[]' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='pt6[]' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='uts[]' value='' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
                              <td><center><input type='number' name='uas[]' value='' style='width:50px; text-align:center; padding:0px; color:blue'></center></td>
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
<tbody><tr><td><b>Perhitungan Nilai Sebagai Berikut :</b><br>
 NilaiHarianTugas = 60% Rata2 Nilai Harian + 40% Rata2 Nilai Tugas <br>
 Nilai Akhir = ((2*UTS)+NilaiHarianTugas+UAS)/4</td>
                  </tr>
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