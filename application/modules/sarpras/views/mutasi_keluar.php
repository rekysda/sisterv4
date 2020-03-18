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
            <select id="mutasi_asal" name="mutasi_asal" class="form-control">
              <option value="">== Asal ==</option>
              <?php foreach ($get_ruangan as $dt) : ?>
              <option value="<?= base_url('sarpras/mutasi_asal/'.$dt['id'])?>" <?= set_select('mutasi_asal', $dt['id'], FALSE); ?>> <?= $dt['nama_ruangan'] ?> 
               </option>';
              <?php endforeach; ?>
              </select>
          <?php if ($get_namabarang) { ?>
            <br>
 <b>Ruangan <?= $getruangan['nama_ruangan']; ?>
 <?php if ($getruangan['sekolah']){ ?>[<?= $getruangan['sekolah'] ?>]<?php } ?></b>
 <br>
              <table class="table table-striped">
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
                  <?php if ( $dt['stok']>0) { ?>
                  <tr>
                        <form action="<?= base_url('sarpras/add_to_cart2')?>" method="post">
                      <td><?= $dt['namabarang']; ?></td>
                      <td><img src="<?= base_url('assets/images/sarpras/'.$dt['image']); ?>"height="50px"width="50px">
                      <td><?= $dt['stok']; ?></td>
                      <td><input class="form-control" type="number" name="jumlah" value="<?= set_value('jumlah'); ?>"width="5"/></td>
                      <td>
                      <input class="form-control" type="hidden" name="barang_id" value="<?= $dt['barang_id']; ?>"/>
                      <input class="form-control" type="hidden" name="ruangan_id" value="<?= $dt['ruangan_id']; ?>"/>
                      <input class="form-control" type="hidden" name="nama_barang" value="<?= $dt['namabarang']; ?>"/>           
                      <button type="submit" class="btn btn-primary btn-xs">Tambah</button></td>
                    </form>                      
                    </tr>
                  <?php } ?>
                    <?php $i++; ?>
                 
                  <?php endforeach; ?>
                </tbody>
              </table>

            <?php } else {
              echo "<br><div align='center'><font color='red'>Silahkan Memilih Asal Ruangan terlebih Dahulu...</font></div><br><br><br>";
            } ?>
          </div>
          <div class="col-md-6">
 <b>Ruangan <?= $getruangan['nama_ruangan']; ?></b>
 <br>
          <form action="" method="post">
          <?php if($this->cart->contents()){ ?>
          <table class="table table-striped" id="example3">
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
                        <td><a href="<?= base_url('sarpras/hapus_cart2/'.$items['rowid']) ?>"class="btn btn-danger btn-xs"onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a></a></td>
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
                <input class="form-control" type="text" name="kode" value="<?= set_value('kode', isset($kode) ? $kode : ''); ?>" style="width:50%;"/>
                <?= form_error('kode', '<span class="help-block">', '</small>'); ?>
              </div>
            <div class="form-group <?php echo form_error('tanggal') ? 'has-error' : '' ?>">
                <label for="tanggal">Tanggal</label><br>
                <input class="form-control" type="text" id="tanggal" name="tanggal" value="<?= set_value('tanggal', date('Y-m-d'), FALSE); ?>"style="width:50%;">
                <?= form_error('tanggal', '<span class="help-block">', '</small>'); ?>
              </div>
              <input class="form-control" type="hidden" name="ruangan_id" value="<?=  $getruangan['id']; ?>"/>   
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

