<script type='text/javascript'>
    $(function($) {
      $('#nominal').autoNumeric('init', {  lZero: 'deny', aSep: ',', mDec: 0 });    
    });  
  </script>
  <script type="text/javascript" src="<?= base_url('assets/vendors/chained/jquery.chained.min.js') ?>"></script>
  <script language="JavaScript" type="text/javascript">
$(function() {
$("#gelombang").chained("#tahun_ppdb");
$("#jalur").chained("#gelombang");
} );
</script>
<script language="JavaScript" type="text/javascript">
function chunchall(obj){
var checkB=document.getElementsByName('check[]'), i=0, b, c;
b=obj.firstChild.nodeValue=='Check all'?true:false;
while(c=checkB[i++]){c.checked=b;}
obj.firstChild.nodeValue=b?'Uncheck all':'Check all';
}
/*]]>*/
</script>
