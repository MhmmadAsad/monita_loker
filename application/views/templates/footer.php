	
</div>
<!-- Tutup Content  -->

<!-- Footer -->
<div class="footer float-right">
  Copyright &copy; <?= date('Y'); ?> <font color="#4a69bb"><b>Daun Biru Engineering</b></font>. All rights reservered	
</div>
<script src="<?= base_url('assets/js/jquery-3.4.1.slim.min.js') ?>" ></script>
<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js');?>"></script>

<script type="text/javascript" src="<?= base_url('assets/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js');?>"></script>


<script type="text/javascript">

 $('.form_date').datetimepicker({

        language:  'id',

        weekStart: 1,

        todayBtn:  1,

  		autoclose: 1,

  		todayHighlight: 1,

  		startView: 2,

  		minView: 2,

  		forceParse: 0

    });

</script>
	<script>
		$(function() {
			$('#nav a[href~="' + location.href + '"]').parents('li').addClass('active');
		});
	</script>

</body>
</html>