<script>
$(document).ready(function() {
    $('.sidebar-menu').tree()
  })

  $('.form-check-input').on('click', function() {
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({
      url: "<?= base_url('admin/changeaccess'); ?>",
      type: 'post',
      data: {
        menuId: menuId,
        roleId: roleId
      },
      success: function() {
        document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
      }
    })
  })
  </script>
  <script>
  $('.form-check-inputsub').on('click', function() {
    const submenuid = $(this).data('submenu');
    const roleId = $(this).data('role');

    $.ajax({
      url: "<?= base_url('admin/changeAccesssub'); ?>",
      type: 'post',
      data: {
        submenuid: submenuid,
        roleId: roleId
      },
      success: function() {
        document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
      }
    })
  })
  </script>
  <script>
  $('.form-check-input2').on('click', function() {
    const name = $(this).data('name');
    const is_active = $(this).data('is_active');

    $.ajax({
      url: "<?= base_url('admin/changeWebsetting'); ?>",
      type: 'post',
      data: {
        name: name,
        is_active: is_active
      },
      success: function() {
        document.location.href = "<?= base_url('admin/websetting'); ?>";
      }
    })
  })
  </script>
  <script>
  $('.form-controlweb').on('change', function() {
    const id = $(this).data('id');
    const value = $(this).val();

    $.ajax({
      url: "<?= base_url('admin/changeoptions'); ?>",
      type: 'post',
      data: {
        id: id,
        value: value
      },
      success: function() {
        document.location.href = "<?= base_url('admin/websetting'); ?>";
      }
    })
  })
  </script>
  <script>
  $('.form-biayajalur').on('change', function() {
    const id = $(this).data('id');
    const nominal = $(this).val();
    $siswa_id= $(this).data('siswa');
    $.ajax({
      url: "<?= base_url('ppdb/siswa_ubahjalurbiaya'); ?>",
      type: 'post',
      data: {
        id: id,
        nominal: nominal
      },
      success: function() {
        document.location.href = "<?= base_url('ppdb/siswa_ubahjalur/'.$siswa_id); ?>";
      }
    })
  })
</script>
<script>
  $('.form-keubiayajalur').on('change', function() {
    const id = $(this).data('id');
    const nominal = $(this).val();
    $siswa_id= $(this).data('siswa');
    $.ajax({
      url: "<?= base_url('keuangan/siswa_ubahjalurbiaya'); ?>",
      type: 'post',
      data: {
        id: id,
        nominal: nominal
      },
      success: function() {
        document.location.href = "<?= base_url('keuangan/siswa_tambahbiaya/'.$siswa_id); ?>";
      }
    })
  })
</script>
<script src="<?= base_url('assets/vendors/autoNumeric/autoNumeric-1.9.18.js')?>"></script>
<script>
var bayar = document.getElementById("bayar");
 $( document ).on( 'keydown', function ( e ) {
      if ( e.keyCode === 119 ) { //F8 key code
        bayar.focus();      
      }
      if ( e.keyCode === 120 ) { //F9 key code
        simpan_transaksi.focus();
      }

    });
function calculatebayar() {
var Cash = $("#bayar").val().replace(/,/g, '');
var TotalBayar = $("#TotalBayar").val();
$('#bayar2').val(Cash);
if(parseInt(Cash) >= parseInt(TotalBayar)){
		var Selisih = parseInt(Cash) - parseInt(TotalBayar);
		$('#UangKembali').val(Selisih);
	} else {
		$('#UangKembali').val('');
	}
}

$(document).ready(function(){
  $("#bayar").each(function() {
    $(this).keyup(function(){
      calculatebayar();
});
});
});

$(document).ready(function(){
$("#nomor_nota").each(function() {
var nomor_nota = $("#nomor_nota").val();
$('#nomor_nota2').val(nomor_nota);
});
});

$(document).ready(function(){
  $("#tanggal").each(function() {
var tanggal = $("#tanggal").val();
$('#tanggal2').val(tanggal);
});
});

function goBack() {
  window.history.back();
}

</script>
<script type='text/javascript'>
    $(function($) {
      $('#bayar').autoNumeric('init', {  lZero: 'deny', aSep: ',', mDec: 0 });    
       $('#UangKembali').autoNumeric('init', {  lZero: 'deny', aSep: ',', mDec: 0 });   
    });  
  </script>

<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
$("#gajipokok").each(function() {
$(this).keyup(function(){
  calculategajingajar();
calculatetunjangan();
calculatepotongan();
calculategajiditerima();
});
});
});

$(document).ready(function(){
$("#gajiperjam").each(function() {
$(this).keyup(function(){
  calculategajingajar();
calculatetunjangan();
calculatepotongan();
calculategajiditerima();
});
});
});

$(document).ready(function(){
$("#jamngajar").each(function() {
$(this).keyup(function(){
  calculategajingajar();
calculatetunjangan();
calculatepotongan();
calculategajiditerima();
});
});
});
$(document).ready(function(){
$("#ba").each(function() {
$(this).keyup(function(){
  calculategajingajar();
calculatetunjangan();
calculatepotongan();
calculategajiditerima();
});
});
});
$(document).ready(function(){
$("#bb").each(function() {
$(this).keyup(function(){
calculategajingajar();
calculatetunjangan();
calculatepotongan();
calculategajiditerima();
});
});
});
$(document).ready(function(){
$("#ab").each(function() {
$(this).keyup(function(){
calculategajingajar();
calculatetunjangan();
calculatepotongan();
calculategajiditerima();
});
});
});
$(document).ready(function(){
$("#ac").each(function() {
$(this).keyup(function(){
calculategajingajar();
calculatetunjangan();
calculatepotongan();
calculategajiditerima();
});
});
});
$(document).ready(function(){
$("#ad").each(function() {
$(this).keyup(function(){
calculategajingajar();
calculatetunjangan();
calculatepotongan();
calculategajiditerima();
});
});
});
$(document).ready(function(){
$("#ah").each(function() {
$(this).keyup(function(){
calculategajingajar();
calculatetunjangan();
calculatepotongan();
calculategajiditerima();
});
});
});
$(document).ready(function(){
$("#ai").each(function() {
$(this).keyup(function(){
calculategajingajar();
calculatetunjangan();
calculatepotongan();
calculategajiditerima();
});
});
});
$(document).ready(function(){
$("#aj").each(function() {
$(this).keyup(function(){
calculategajingajar();
calculatetunjangan();
calculatepotongan();
calculategajiditerima();
});
});
});
function calculategajingajar() {
var a = $("#gajiperjam").val();
var b = $("#jamngajar").val();
gajingajar = a * b; //a kali b
$("#gajingajar").val(gajingajar);
}
function calculatetunjangan() {
var a = $("#ab").val();
var b = $("#ac").val();
var c = $("#ad").val();
var d = $("#ah").val();
var e = $("#ai").val();
var f = $("#aj").val();
tunjangan = parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d) + parseInt(e) + parseInt(f); //a kali b
$("#tunjangan").val(tunjangan);
}
function calculatepotongan() {
var a = $("#ba").val();
var b = $("#bb").val();
potongan = parseInt(a) + parseInt(b); //a kali b
$("#potongan").val(potongan);
}
function calculategajiditerima() {
var a = $("#gajipokok").val();	
var b = $("#gajingajar").val();	
var c = $("#tunjangan").val();
var d = $("#potongan").val();
gajiditerima = parseInt(a)+parseInt(b)+parseInt(c)-parseInt(d); //a kali b
$("#gajiditerima").val(gajiditerima);
}
//////////////////// jual formulir
$(document).ready(function(){
$("#jumlah_form").each(function() {
$(this).keyup(function(){
calculatebayar_form();
});
});
});
$(document).ready(function(){
$("#harga_form").each(function() {
$(this).keyup(function(){
calculatebayar_form();
});
});
});
function calculatebayar_form() {
var a = $("#jumlah_form").val();	
var b = $("#harga_form").val();	
bayar_form = parseInt(a)*parseInt(b); //a kali b
$("#bayar_form").val(bayar_form);
}

    $(function(){
      // bind change event to select
      $('#kelas_id').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
    $(function(){
      // bind change event to select
      $('#kelas_asal').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
    $(function(){
      // bind change event to select
      $('#kelas_tujuan').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
    $(function(){
      // bind change event to select
      $('#kelas_asalnaik').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
    $(function(){
      // bind change event to select
      $('#kelas_tujuannaik').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
    $(function(){
      // bind change event to select
      $('#kelas_asalcetak').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
    $(function(){
      // bind change event to select
      $('#status_tujuan').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
    $(function(){
     // bind change event to select
     $('#mutasi_asal').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
    $(function(){
         // bind change event to select
         $('#mutasi_tujuan').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
//sibling
    $(function(){
      // bind change event to select
      $('#niksibling').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
    $(function(){
         // bind change event to select
         $('#biaya_id').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
</script>

<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendors/datetimepicker/jquery.datetimepicker.css')?>"/>
<script src="<?= base_url('assets/vendors/datetimepicker/jquery.datetimepicker.js')?>"></script>
<script>
$('#tanggal').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'Y-m-d'
});
$('#daritanggal').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'Y-m-d'
});
$('#sampaitanggal').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'Y-m-d'
});
$('#tanggallahirsiswa').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'Y-m-d'
});
$('#tanggallahirayah').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'Y-m-d'
});
$('#tanggallahiribu').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'Y-m-d'
});
$('#tanggalahiribu').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'Y-m-d'
});
$('#tanggallahirwali').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'Y-m-d'
});
$('#tanggalcetak').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'Y-m-d'
});
$('#tanggalpresensi').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'Y-m-d'
});
$('#tanggalawal').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'Y-m-d'
});
$('#tanggalakhir').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'Y-m-d'
});
$('#tanggal_awal').datetimepicker({
	lang:'en',
	timepicker:true,
	format:'Y-m-d H:i:s'
});
$('#tanggal_akhir').datetimepicker({
	lang:'en',
	timepicker:true,
	format:'Y-m-d H:i:s'
});
$('#tanggal_masuk').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'Y-m-d'
});
$('#tanggal_keluar').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'Y-m-d'
});
$('#tgl_diterima').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'Y-m-d'
});
</script>
