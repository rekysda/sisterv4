<body onload="window.print();">
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <img src="<?= base_url('assets/images/logoslip/' . $logoslip['image']) ?>" width="100px">
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="col-xs-12 table-responsive">
        <table class="table-borderless">
          <tr>
            <td>Kepada Yth Bapak/Ibu/Wali dari</td>
            <td>: <?= $getsiswabyId['namasiswa']; ?></td>
          </tr>
          <tr>
            <td>Nomor Formulir</td>
            <td>: <?= $getsiswabyId['noformulir']; ?></td>
          </tr>
          <tr>
            <td>NIS</td>
            <td>: <?= $getsiswabyId['nis']; ?></td>
          </tr>
          <tr>
            <td>Hal</td>
            <td>: <b>Tagihan Siswa</b></td>
          </tr>
          <tr>
            <td colspan="2"> Berikut kami sampaikan rincian kekurangan pembayaran dari siswa tersebut :</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
          </tr>
        </table>
      </div>
      <!-- /.col -->
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Jenis</th>
                <th>Pembayaran</th>
                <th>Nominal</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = '1'; ?>
              <?php $siswa_id = $getsiswabyId['id']; ?>
              <?php foreach ($siswa_keuangan as $dt) : ?>
                <?php if (($dt['siswa_id'] == $siswa_id) and ($dt['is_paid'] == 0)) {  ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $dt['jenis']; ?></td>
                    <td><?= $dt['biaya']; ?></td>
                    <td>Rp. <?= nominal($dt['nominal']) ?></td>
                  </tr>
                  <?php
                  $ttagihan += $dt['nominal'];
                  $no++;
                } ?>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">


          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Mohon kiranya segera dapat dilunasi pembayarannya demi kelancaran proses belajar dan mengajar di sekolah yang kita cintai bersama
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Total : Rp. <?= nominal($ttagihan); ?></p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Terbilang: <?= terbilang($ttagihan, $style = 3); ?> Rupiah</th>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- ./wrapper -->
</body>