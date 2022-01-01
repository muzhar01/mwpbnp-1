<div class="row" style="margin-right:50px; margin-left:10px;">
	<div class="col-lg-12">
		<div class"sub_menu_vedor">
			<nav class="navbar navbar-default">
				  <div class="container-fluid">
				    <ul class="nav navbar-nav" id="lnk-nav">
				      <li id="lnk-vendor"><?php echo CHtml::link('Vendors',array('index')); ?></li>
				      <li id="lnk-vendor-admin"><?php echo CHtml::link('Vendor Center',array('vendor/Admin')); ?></li>
				      <li id="lnk-vendor-enterbill"><?php echo CHtml::link('Enter Bill',array('vendor/enterbill')); ?></li>
				      <li id="lnk-vendor-paybill"><?php echo CHtml::link('Pay Bill',array('vendor/paybill')); ?></li>
				      <li id="lnk-vendor-purchasereturn"><?php echo CHtml::link('Purchase Return',array('vendor/purchasereturn')); ?></li>
				      
				    </ul>
				  </div>
			</nav>
		</div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
		var url = $(location).attr('href');
		var parts = url.split("/");
		var last_part = parts[parts.length-1];

		if(last_part == "Admin"){
			$("#lnk-vendor-admin").addClass("btn-info");
		}else if(last_part == "enterbill"){
			$("#lnk-vendor-enterbill").addClass("btn-info");
		}else if(last_part == "paybill"){
			$("#lnk-vendor-paybill").addClass("btn-info");
		}else if(last_part == "purchasereturn"){
			$("#lnk-vendor-purchasereturn").addClass("btn-info");
		}else{
			$("#lnk-vendor").addClass("btn-info");
		}


	});
</script>


