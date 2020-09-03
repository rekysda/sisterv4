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
  </script><script>
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
  </script><script>
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
  </script><script>
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
  </script><script>
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
</script>
