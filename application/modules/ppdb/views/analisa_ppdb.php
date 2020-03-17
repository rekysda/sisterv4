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
      <div class="box-header with-border">
        <div class="box-tools">
        </div>
      </div>
      <div class="box-body">
        <?= $this->session->flashdata('message') ?>
        <!-- Search form (start) -->
        <form method='post' action="" class='form-inline'>
        <select name="sekolah_id" id="sekolah_id" class="form-control <?= form_error('sekolah_id') ? 'is-invalid' : '' ?>">

            <?php foreach ($sekolah as $dt) : ?>
              <option value="<?= $dt['id']; ?>" <?= set_select('sekolah_id', $dt['id'], FALSE); ?> <?= $dt['id'] == $sekolah_id ? ' selected="selected"' : ''; ?>><?= $dt['sekolah']; ?></option>
            <?php endforeach; ?>
          </select>&nbsp;

          <select name="tahun_ppdb" id="tahun_ppdb" class="form-control <?= form_error('tahun_ppdb') ? 'is-invalid' : '' ?>">
            <option value="">== Tahun PPDB ==</option>
            <?php $tahunn = (date("Y") + 1);
            for ($n = 2019; $n <= $tahunn; $n++) {
              if ($tahun_ppdb == $n) {
                echo "<option value='$n' selected>$n</option>";
              } else {
                echo "<option value='$n'>$n</option>";
              }
            }
            ?>
          </select> &nbsp;


          &nbsp;<input class='btn btn-success' type='submit' name='submit' value='Lihat'>
        </form>
        <br>
        <?php if($tahun_ppdb){ ?>
        <div class="row">
  <div class="col-md-8">Analisa PPDB, Sekolah : <b><?= getfieldtable('m_sekolah','sekolah',$sekolah_id)?></b>, <b><?= $tahun_ppdb?></b>, berdasarkan <b>Gelombang</b>
  <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Gelombang</th>
                <th>Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($group_gelombang as $dt) : ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $dt['tahun_ppdb'] ?></td>
                  <td><?= $dt['gelombang'] ?></td>
                  <td><?= $dt['jumlah'] ?></td>
                </tr>
<?php $gelombang[] = $dt['gelombang'];
            $jumlah[] = $dt['jumlah'];
            ?>
              <?php endforeach; ?>
            </tbody>
          </table>
  </div>
  <div class="col-md-4"><canvas id="canvas" width="1000" height="280"></canvas></div>
</div>   

<div class="row">
  <div class="col-md-8">Analisa PPDB, Sekolah : <b><?= getfieldtable('m_sekolah','sekolah',$sekolah_id)?></b>, <b><?= $tahun_ppdb?></b>, berdasarkan <b>JenisKelamin</b>
  <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>JenisKelamin</th>
                <th>Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($group_kelamin as $dt) : ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $dt['tahun_ppdb'] ?></td>
                  <td><?= $dt['kelaminsiswa'] ?></td>
                  <td><?= $dt['jumlah'] ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
  </div>
  <div class="col-md-4"></div>
</div>

<div class="row">
  <div class="col-md-8">Analisa PPDB, Sekolah : <b><?= getfieldtable('m_sekolah','sekolah',$sekolah_id)?></b>, <b><?= $tahun_ppdb?></b>, berdasarkan <b>Asal Sekolah</b>
  <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>AsalSekolah</th>
                <th>Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($asal_sekolah as $dt) : ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $dt['tahun_ppdb'] ?></td>
                  <td><?= $dt['sekolahasal'] ?></td>
                  <td><?= $dt['jumlah'] ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
  </div>
  <div class="col-md-4"></div>
</div>
<?php }else{
echo "<br><div align='center'><font color='red'>Silahkan Memilih Tahun  Terlebih dahulu...</font></div><br><br><br>";

    } ?>
</div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="<?php echo site_url('ppdb/analisa_ppdb_pdf/'. $sekolah_id.'/' . $tahun_ppdb); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>pdf.png"> Export ke PDF</a>
        <a href="<?php echo site_url('ppdb/analisa_ppdb_excel/'. $sekolah_id.'/' . $tahun_ppdb); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>xls.png"> Export ke Excel</a>
        <a href="<?php echo site_url('ppdb/analisa_ppdb_print/'. $sekolah_id.'/' . $tahun_ppdb); ?>" target='blank' class='btn btn-default'><img src="<?= base_url('assets/images/'); ?>print.jpg" width="15"> Cetak ke Printer</a>
      </div>
      <!-- /.box-footer -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript" src="<?= base_url('assets/vendors/chart.js/Chart.min.js')?>"></script>
    <script>
 
            var lineChartData = {
                labels : <?= json_encode($gelombang);?>,
                datasets : [
                     
                    {
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(152,235,239,1)",
                        data : <?= json_encode($jumlah);?>
                    }
 
                ]
                 
            }
 
        var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
         
    </script>