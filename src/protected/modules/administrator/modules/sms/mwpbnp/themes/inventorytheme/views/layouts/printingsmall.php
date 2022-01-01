
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo Yii::app()->name ?>! - Login </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/plugins/jQuery/jquery.charcounter.js'); ?>
        <link rel="shortcut icon" type="image/png" href='images/favicon.png' />
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


    <body class="layout-top-nav">
        <div class="wrapper">
            <div class="content-wrapper" style="min-height: 677px;">
                <!-- Content Header (Page header) -->
                <div class="container">
                    <section class="content">
                        <div class="col-md-6">
                        <div class="box box-default">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h4 class="text-center">MWP Business & Presentations (Pvt) Ltd</h4>
                                        <h5 class="text-center">Importer, Exporter, Stockist & Suppliers</h5>
                                    </div>
                                    
                                </div>
                                <hr>
                                <?php echo $content; ?> <br /><br /><br /><br />
                                <p class="text-center">Near Sihala Steel Corporation, Sihala Bagh, Kahutta Road, Near Kak Pul, Islamabad</p>
                                <p class="text-center">Ph.# +92-333-4485999, +92-333-4485888, Web: www.mwpbnp.com, Email: info@mwpbnp.com</p>
                            </div>
                        </div>
                            </div>
                    </section>
                </div>
            </div>
        </div>

    </body>
</html>

<script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="/themes/backend/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- datepicker -->
<script src="/themes/backend/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/themes/backend/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="/themes/backend/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="/themes/backend/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="/themes/backend/js/AdminLTE/app.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/themes/backend/js/AdminLTE/dashboard.js" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="/themes/backend/js/AdminLTE/demo.js" type="text/javascript"></script>

