<?php $GetActionName = Yii::app()->controller->action->id;?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo Yii::app()->name ?>! - Dashboard </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
            <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <link href="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
   
            <script src="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
            <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/plugins/jQuery/jquery.charcounter.js'); ?>
        <link rel="shortcut icon" type="image/png" href='../images/favicon.png' />
        <!--Bootstrap-->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!--FontAwesome-->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!--Theme style-->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/Adminsheet.css" rel="stylesheet" type="text/css" />
        <!--AdminLTE Skins. Choose a skin from the css/skins 
                 folder instead of downloading all of them to reduce the load.-->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
        <!--Morris chart-->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        

    <body class="sidebar-mini skin-red">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->

                <a href="/administrator/dashboard" class="logo">
                    <?php echo Yii::app()->name ?> 
                </a>
                
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    
                    <a href="javascript:void(0)" class="sidebar-toggle" data-toggle="offcanvas" role="button"><span class="sr-only">Toggle navigation</span></a>
                    
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                           
                            <!-- Messages: style can be found in dropdown.less-->

                            <?php //include('_helppages.php') ?>

                            <?php //include('_messages.php') ?>

                            <!-- Notifications: style can be found in dropdown.less -->
                            <?php //include('_notifications.php') ?>

                            <!-- Tasks: style can be found in dropdown.less -->

                            <?php //include('_tasks.php') ?>

                            <!-- User Account: style can be found in dropdown.less -->

                            <?php include('_profile.php') ?>

                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->

            <?php if($GetActionName != 'createquotesfordesktop'){
                include('_leftsidebar.php');
                 }else{?>
<style type="text/css">
    .content-wrapper{margin: 0px !important;}
    .main-footer{ margin: 0px !important; }
</style>
                 <?php }  
            ?>


            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="min-height: 918px;" >
                <!-- Content Header (Page header) -->
                <section class="content-header">

                    <?php if (isset($this->breadcrumbs)): ?>
                        <?php
                        $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links' => $this->breadcrumbs,
                            'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                            'inactiveLinkTemplate' => '<li class="active">{label}</li>',
                            'homeLink' => '<li><a href="/administrator"><i class="fa fa-dashboard"></i>Home</a></li>',
                            'tagName' => 'ol',
                            'htmlOptions' => array('class' => 'breadcrumb'),
                        ));
                        ?>
                        <?php endif; ?>
                        <?php if (Yii::app()->user->hasFlash('error')): ?>
                        <div class="alert alert-danger">
                        <?php echo Yii::app()->user->getFlash('error'); ?>
                        </div>
                            <?php endif; ?>
                </section>
                <!-- Main content -->
                            <?php echo $content; ?>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs"><b>Version</b> 2.0 </div>
                <strong>Copyright &copy; <?php echo date('Y'); ?> <?php echo Yii::app()->name ?>.</strong> All rights reserved. </footer>
        </div>


    </body>
</html>