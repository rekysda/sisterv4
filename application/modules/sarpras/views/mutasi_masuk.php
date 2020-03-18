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
              <table  class="table table-bordered table-striped" id="example3">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Image</th>
                    <th>Stok</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($get_namabarang as $dt) : ?>
                  <tr>
                        <form action="<?= base_url('sarpras/add_to_cart')?>" method="post">
                      <td><?= $dt['namabarang']; ?></td>
                      <td><img src="<?= base_url('assets/images/sarpras/'.$dt['image']); ?>"height="50px"width="50px">
                      <td><?= get_jumlahinventaris($dt['id'])-get_jumlahmutasi($dt['id']) ?></td>
                      <td><input class="form-control" type="number" name="jumlah" value="<?= set_value('jumlah'); ?>"width="5"/></td>
                      <td>
                      <input class="form-control" type="hidden" name="barang_id" value="<?= $dt['id']; ?>"/>
                      <input class="form-control" type="hidden" name="nama_barang" value="<?= $dt['namabarang']; ?>"/>    
                      <input class="form-control" type="hidden" name="harga" value="<?= $dt['harga']; ?>"/>    
                      <button type="submit" class="btn btn-primary">Tambah</button></td>
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
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($this->cart->contents() as $items): ?>
                <tr>
                        <td><?= $items['name']?></td>
                        <td><?= $items['qty']?></td>
                        <td><a href="<?= base_url('sarpras/hapus_cart/'.$items['rowid']) ?>"class="btn btn-danger"onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a></a></td>
                    </tr>

        <?php endforeach; ?>
                </tbody>
            </table>
          <?php }else{
echo "<br><div align='center'><font color='red'>Silahkan Memilih Barang Terlebih dahulu...</font></div><br><br><br>";
          }?>
            <?php $kode= generatekodeinc('sar_mutasi_barang','MUT','kode');?>
            <div class="form-group <?php echo form_error('kode') ? 'has-error' : '' ?>">
                <label for="name">Kode</label>
                <input class="form-control" type="text" name="kode" value="<?= set_value('kode', isset($kode) ? $kode : ''); ?>" style="width:100%;"/>
                <?= form_error('kode', '<span class="help-block">', '</small>'); ?>
              </div>
            <div class="form-group <?php echo form_error('tanggal') ? 'has-error' : '' ?>">
                <label for="tanggal">Tanggal</label><br>
                <input class="form-control" type="text" id="tanggal" name="tanggal" value="<?= set_value('tanggal', date('Y-m-d'), FALSE); ?>"style="width:100%;">
                <?= form_error('tanggal', '<span class="help-block">', '</small>'); ?>
              </div>
              <div class="form-group <?php echo form_error('ruangan_id') ? 'has-error' : '' ?>">
                <label for="name">Ruangan</label><br>
                <select class="js-example-basic-single" name="ruangan_id"style="width:100%;">
                <option value=""> Ruangan </option>
                  <?php foreach ($get_ruangan as $dt) : ?>
                    <option value="<?= $dt['id']; ?>"  <?= set_select('ruangan_id', $dt['id'], FALSE); ?>><?= $dt['nama_ruangan']; ?>
                  </option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('ruangan_id', '<span class="help-block">', '</small>'); ?>
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

