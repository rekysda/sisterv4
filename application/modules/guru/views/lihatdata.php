<
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

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $title; ?></h3>
            </div>
            <div class="box-body">
            <?= $this->session->flashdata('message') ?>
            <b>catatan : </b><br>
            Apabila terdapat ketidaksesuaian data harap menghubungi TataUsaha untuk dilakukan perbaikan data
			<?php
        echo "<table width='100%'><tr><td>
                  <table class='table' border=0>
                    <input type='hidden' name='id' value='$s[nip]'>
                    <tr><td width='120px' scope='row'></td>      <td></td></tr>
                    <tr><td scope='row'>NIP</td>               <td>$s[nip]</td></tr>
                    <tr><td scope='row'>Nama Lengkap</td>           <td>$s[nama_guru]</td></tr>
                    <tr><td scope='row'>Tempat Lahir</td>           <td>$s[tempat_lahir]</td></tr>
                    <tr><td scope='row'>Tanggal Lahir</td>          <td>$s[tanggal_lahir]</td></tr>
                    <tr><td scope='row'>Jenis Kelamin</td>          <td> $s[jeniskelamin]</td></tr>
                    <tr><td scope='row'>Agama</td>                  <td> $s[agama]</td></tr>
                    <tr><td scope='row'>No Hp</td>                  <td>$s[hp]</td></tr>
                    <tr><td scope='row'>No Telpon</td>              <td>$s[telepon]</td></tr>
                    <tr><td scope='row'>Alamat Email</td>           <td>$s[email]</td></tr>
                    <tr><td scope='row'>Alamat</td>                 <td>$s[alamat_jalan]</td></tr>
                    <tr><td scope='row'>RT/RW</td>                  <td>$s[rt]/$s[rw]</td></tr>
                    <tr><td scope='row'>Dusun</td>                  <td>$s[nama_dusun]</td></tr>
                    <tr><td scope='row'>Kelurahan</td>              <td>$s[desa_kelurahan]</td></tr>
                    <tr><td scope='row'>Kecamatan</td>              <td>$s[kecamatan]</td></tr>
                    <tr><td scope='row'>Kode Pos</td>               <td>$s[kode_pos]</td></tr>
                    <tr><td scope='row'>NUPTK</td>                  <td>$s[nuptk]</td></tr>
                    <tr><td scope='row'>Bidang Studi</td>           <td>$s[pengawas_bidang_studi]</td></tr>
                    <tr><td scope='row'>Jenis PTK</td>              <td>$s[jenisptk]</td></tr>
                    <tr><td scope='row'>Tugas Tambahan</td>         <td>$s[tugas_tambahan]</td></tr>
                    <tr><td scope='row'>Status Pegawai</td>         <td>$s[statuspegawai]</td></tr>
                    <tr><td scope='row'>Status Keaktifan</td>       <td>$s[statuskeaktifan]</td></tr>
                    <tr><td scope='row'>Status Nikah</td>           <td>$s[statusnikah]</td></tr>
                    <tr><td scope='row'></td><td>";?>
<?php
echo "
                    </td></tr>
                  </tbody>
                  </table>
</td><td valign='top'>";?>
<img class='img-tdumbnail' style='width:100px' src='<?= base_url('assets/images/pegawai/' . $s['image']);?>'>
<?php
echo "<table>
                  <tbody>
                    <tr><td width='150px' scope='row'>NIK</td>      <td>$s[nik]</td></tr>
                    <tr><td scope='row'>SK CPNS</td>                <td>$s[sk_cpns]</td></tr>
                    <tr><td scope='row'>Tanggal CPNS</td>           <td>$s[tanggal_cpns]</td></tr>
                    <tr><td scope='row'>SK Pengangkat</td>          <td>$s[sk_pengangkatan]</td></tr>
                    <tr><td scope='row'>TMT Pengangkat</td>         <td>$s[tmt_pengangkatan]</td></tr>
                    <tr><td scope='row'>Lemb. Pengangkat</td>       <td>$s[lembaga_pengangkatan]</td></tr>
                    <tr><td scope='row'>Golongan</td>               <td></td></tr>
                    <tr><td scope='row'>Sumber Gaji</td>            <td>$s[sumber_gaji]</td></tr>
                    <tr><td scope='row'>Ahli Laboratorium</td>      <td>$s[keahlian_laboratorium]</td></tr>
                    <tr><td scope='row'>Nama Ibu Kandung</td>       <td>$s[nama_ibu_kandung]</td></tr>
                    <tr><td scope='row'>Nama Suami/Istri</td>       <td>$s[nama_suami_istri]</td></tr>
                    <tr><td scope='row'>Nip Suami/Istri</td>        <td>$s[nip_suami_istri]</td></tr>
                    <tr><td scope='row'>Pekerjaan Suami/Istri</td>  <td>$s[pekerjaan_suami_istri]</td></tr>
                    <tr><td scope='row'>TMT PNS</td>                <td>$s[tmt_pns]</td></tr>
                    <tr><td scope='row'>Lisensi Kepsek</td>         <td>$s[lisensi_kepsek]</td></tr>
                    <tr><td scope='row'>Jml Sekolah Binaan</td>     <td>$s[jumlah_sekolah_binaan]</td></tr>
                    <tr><td scope='row'>Diklat Kepengawasan</td>    <td>$s[diklat_kepengawasan]</td></tr>
                    <tr><td scope='row'>Mampu Handle KK</td>        <td>$s[mampu_handle_kk]</td></tr>
                    <tr><td scope='row'>Keahlian Breile</td>        <td>$s[keahlian_breile]</td></tr>
                    <tr><td scope='row'>Keahlian B.Isyarat</td>     <td>$s[keahlian_bahasa_isyarat]</td></tr>
                    <tr><td scope='row'>Kewarganegaraan</td>        <td>$s[kewarganegaraan]</td></tr>
                    <tr><td scope='row'>NIY NIGK</td>               <td>$s[niy_nigk]</td></tr>
                    <tr><td scope='row'>NPWP</td>                   <td>$s[npwp]</td></tr>
                  </table>
                  </td><td>
                  </table>
					";
					?>




        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->