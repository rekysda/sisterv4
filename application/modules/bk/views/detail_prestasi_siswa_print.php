<h1> <?= $title; ?></h1>
<div class="box-body">
        <div class="row">
          <div class="col-md-4">
           
                 <table class="table table-bordered table-striped">
                <tr><td>NIS</label> </td><td> <?= $datadetailsiswa['nis']?></td></tr>
                <tr><td>Nama Siswa</td><td> <?= $datadetailsiswa['namasiswa']?></td></tr>
                <tr><td>Alamat </td><td> <?= $datadetailsiswa['alamatsiswa']?></td></tr>
                <tr><td>Jenis Kelamin </td><td> <?= $datadetailsiswa['kelaminsiswa']?></td></tr>
                <tr><td>Nama Ayah </td><td> <?= $datadetailsiswa['namaayah']?></td></tr>
                <tr><td>HP Ayah </td><td> <?= $datadetailsiswa['hpayah']?></td></tr>
                <tr><td>Nama Ibu </td><td> <?= $datadetailsiswa['namaibu']?></td></tr>
                <tr><td>HP Ibu </td><td> <?= $datadetailsiswa['hpibu']?></td></tr>
                </table>
          </div>
          <div class="col-md-12">
                <h4>Detail Prestasi</h4>
            <div class="table-responsive">
              <table  class="table table-bordered table-striped" id="example1">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Tingkat</th>
                    <th>Lomba</th>
                    <th>Prestasi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($dataprestasibysiswa as $dt) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= gettanggalindo($dt['tanggal']); ?></td>
                      <td><?= $dt['namasiswa']; ?></td>
                      <td><?= $dt['nama_kelas']; ?></td>
                      <td><?= $dt['tingkat']; ?></td>
                      <td><?= $dt['lomba']; ?> - <?= $dt['instansi']; ?></td>
                      <td><?= $dt['prestasi']; ?></td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>