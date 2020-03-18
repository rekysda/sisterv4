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
      <li>Sarpras</li>
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
          <div class="table-responsive">
              <table  class="table table-striped" id='example3_nosearch'>
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($get_namabarang as $dt) : ?>
                  <tr>
                        <form action="<?= base_url('sarpras/add_to_cart_rusak')?>" method="post">
                      <td><?= $dt['kode_inv']; ?></td>
                      <td><?= $dt['namabarang']; ?></td>
                      <td><input class="form-control" type="number" name="jumlah" value="<?= set_value('jumlah'); ?>"/></td>
                      <td>
                      <input class="form-control" type="hidden" name="kode_inv" value="<?= $dt['kode_inv']; ?>"/>
                      <input class="form-control" type="hidden" name="namabarang" value="<?= $dt['namabarang']; ?>"/>    
                      <input class="form-control" type="hidden" name="barang_id" value="<?= $dt['barang_id']; ?>"/>    
                      <input class="form-control" type="hidden" name="kondisi_id" value="<?= $dt['kondisi_id']; ?>"/>   
                      <input class="form-control" type="hidden" name="supplier_id" value="<?= $dt['supplier_id']; ?>"/>   
                      <input class="form-control" type="hidden" name="sumber_id" value="<?= $dt['sumber_id']; ?>"/>   
                      <input class="form-control" type="hidden" name="harga" value="<?= $dt['harga']; ?>"/>   
                      <input class="form-control" type="hidden" name="umur_bulan" value="<?= $dt['umur_bulan']; ?>"/>   
                      <button type="submit"class="btn btn-primary btn-xs">Tambah</button></td>
                    </form>                      
                    </tr>
                    <?php $i++; ?>
                 
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-md-6">
          <form action="" method="post">
          <?php if($this->cart->contents()){ ?>
          <table class="table table-striped">
                <thead>
                    <tr>
                        <th>KodeInv</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($this->cart->contents() as $items): ?>
                <tr>
                        <td><?= $items['id']?></td>
                        <td><?= $items['name']?></td>
                        <td><?= $items['qty']?></td>
                        <td><a href="<?= base_url('sarpras/hapus_cart_rusak/'.$items['rowid']) ?>"class="btn btn-danger btn-xs"onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a></a></td>
                    </tr>

        <?php endforeach; ?>
                </tbody>
            </table>
          <?php }else{
echo "<br><div align='center'><font color='red'>Silahkan Memilih Barang Terlebih dahulu.<br>Pastikan telah melakukan Mutasi Keluar pada barang yang akan dianggap Rusak / Tidak Terpakai / Di Musnahkan</font></div><br><br><br>";
          }?>
            <?php $kode= generatekodeinc('sar_mutasi_rusak','RSK','kode');?>
            <div class="form-group <?php echo form_error('kode') ? 'has-error' : '' ?>">
                <label for="name">Kode</label>
                <input class="form-control" type="text" name="kode" value="<?= set_value('kode', isset($kode) ? $kode : ''); ?>" style="width:50%;"/>
                <?= form_error('kode', '<span class="help-block">', '</small>'); ?>
              </div>
            <div class="form-group <?php echo form_error('tanggal') ? 'has-error' : '' ?>">
                <label for="tanggal">Tanggal</label><br>
                <input class="form-control" type="text" id="tanggal" name="tanggal" value="<?= set_value('tanggal', date('Y-m-d'), FALSE); ?>"style="width:50%;">
                <?= form_error('tanggal', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('keterangan') ? 'has-error' : '' ?>">
                <label for="name">Keterangan</label>
                <input class="form-control" type="text" name="keterangan" value="<?= set_value('keterangan'); ?>" style="width:50%;"/>
                <?= form_error('keterangan', '<span class="help-block">', '</small>'); ?>
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>  
          </div>
        </div>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

