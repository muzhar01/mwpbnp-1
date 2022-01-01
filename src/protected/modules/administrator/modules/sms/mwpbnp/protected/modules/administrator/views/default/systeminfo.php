<?php $this->breadcrumbs=array(
	'Dashboard'=>array('/customer/dashboard'),
	'System Information',	
);
?>
<style type="text/css"><!--

.phpinfo .center {text-align: center;}
.phpinfo .center table { margin-left: auto; margin-right: auto; text-align: left;}

.phpinfo{height: 700px;
    overflow: scroll;}
.phpinfo td, .phpinfo th { border: 1px solid #f4f4f4;font-size:80%}
.phpinfo td{width:200px;float:left}
.phpinfo h1,.phpinfo  h2{padding:5px 5px}
.phpinfo h1,.phpinfo  h2,.phpinfo  a{background-color:#333333;color:#fff;}
.phpinfo img {float:right;display:none;}
/*
.p {text-align: left;}
.e {background-color: #ccccff; font-weight: bold;}
.h {background-color: #9999cc; font-weight: bold;}
.v {background-color: #cccccc;}
*/
</style>
<h1>System Information</h1>
<div class="phpinfo">
<?php echo $data?>
</div>