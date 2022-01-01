<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo isset($this->pageTitle) ? $this->pageTitle : Yii::app()->name; ?></title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/morris/morris.css" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

<link href="<?php echo Yii::app()->theme->baseUrl; ?>/dist/summernote.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/AdminLTE.css" rel="stylesheet" type="text/css" />

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script>
</head>
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header">
    
    <?php $admin = User::model()->findByPk(Yii::app()->user->admin_user_id); ?>
    
    <?php $this->renderPartial('//layouts/header', array('admin' => $admin)); ?>
    
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            
            <?php $this->renderPartial('//layouts/leftbar', array('admin' => $admin)); ?>
            
        </section>
        <!-- /.sidebar -->
    </aside>
    
    <?php echo $content; ?>
    
</div>

<script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/AdminLTE/app.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/AdminLTE/dashboard.js" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/AdminLTE/demo.js" type="text/javascript"></script>

                        
</body>
</html>
