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
      <li>PPDB</li>
            <li><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">

      <br>
      <div class="box-body">
        <?= $this->session->flashdata('message') ?>

        <!-- Posts List -->
        <form method="POST" action="" enctype="multipart/form-data" class="form-inline">
          <table class='table table-hover' id='example3'>
            <thead>
              <tr>
                <th>No</th>
                <th>NoFormulir</th>
                <th>Nama</th>
                <th>Rata2</th>
                <th>Semester</th>
                <th>Mapel1</th>
                <th>Mapel2</th>
                <th>Mapel3</th>
                <th>Mapel4</th>
                <th>Mapel5</th>
              </tr>
            </thead>
            <tbody>
              <?php $sno = 1; ?>
              <?php foreach ($ppdb_rapor as $dt) :
                $noformulir = $dt['noformulir'];
                $namasiswa = $dt['namasiswa'];
                $siswa = $dt['siswa'];
                $mapel1 = $dt['mapel1'];
                $mapel2 = $dt['mapel2'];
                $mapel3 = $dt['mapel3'];
                $mapel4 = $dt['mapel4'];
                $mapel5 = $dt['mapel5'];
                $mapel6 = $dt['mapel6'];
                $mapel7 = $dt['mapel7'];
                $mapel8 = $dt['mapel8'];
                $mapel9 = $dt['mapel9'];
                $mapel10 = $dt['mapel10'];
                $mapel11 = $dt['mapel11'];
                $mapel12 = $dt['mapel12'];
                $mapel13 = $dt['mapel13'];
                $mapel14 = $dt['mapel14'];
                $mapel15 = $dt['mapel15'];
                $mapel16 = $dt['mapel16'];
                $mapel17 = $dt['mapel17'];
                $mapel18 = $dt['mapel18'];
                $mapel19 = $dt['mapel19'];
                $mapel20 = $dt['mapel20'];
                $jumlah = $mapel1+$mapel2+$mapel3+$mapel4+$mapel5+$mapel6+$mapel7+$mapel8+$mapel9+$mapel10+$mapel11+$mapel12+$mapel13+$mapel14+$mapel15+$mapel16+$mapel17+$mapel18+$mapel19+$mapel20;
                $rata2=$jumlah/25;
                echo "<tr>";
                echo "<td>" . $sno . "</td>";
                echo "<td>" . $noformulir . "</td>";
                echo "<td>" . $namasiswa . "</td>";
                echo "<td>" . $rata2 . "</td>";
                echo "<td>Semester 1<br>Semester 2<br>Semester 3<br>Semester 4<br></td>";
                echo "<td>" . $mapel1 . "<br>" . $mapel6 . "<br>" . $mapel11 . "<br>" . $mapel16 . "</td>";
                echo "<td>" . $mapel2 . "<br>" . $mapel7 . "<br>" . $mapel12 . "<br>" . $mapel17 . "</td>";
                echo "<td>" . $mapel3 . "<br>" . $mapel8 . "<br>" . $mapel13 . "<br>" . $mapel18 . "</td>";
                echo "<td>" . $mapel4 . "<br>" . $mapel9 . "<br>" . $mapel14 . "<br>" . $mapel19 . "</td>";
                echo "<td>" . $mapel5 . "<br>" . $mapel10 . "<br>" . $mapel15 . "<br>" . $mapel20 . "</td>";
                ?>                
                </tr>
                <?php $sno++; ?>
              <?php endforeach; ?>
            <tbody>
          </table>
        </form>
      </div>
      <!-- /.box-body -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->