
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo Yii::app()->name ?>! - Login </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
            <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
     <!--        <script src="<?php //echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui.min.js" type="text/javascript"></script> -->
   
        <link rel="shortcut icon" type="image/png" href='../images/favicon.png' />

        <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,700,600italic,800,400italic' rel='stylesheet' type='text/css'>
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


    <body class="hold-transition login-page">
        <div class="login-box">
          <!-- Content Wrapper. Contains page content -->
            
                <!-- Content Header (Page header) -->
                <!-- Main content -->
                            <?php echo $content; ?>
                <!-- /.content -->
            
            <!-- /.content-wrapper -->
           
        </div>


    </body>
</html>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
              <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/plugins/jQuery/jquery.charcounter.js'); ?>