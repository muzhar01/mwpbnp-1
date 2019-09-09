
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
                        <div class="box box-default">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png" alt="" title="MWPBNP" class="img-responsive">
                                    </div> 
                                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-6">
                                        <h4 class="text-center">MWP Business & Presentations (Pvt) Ltd</h4>
                                        <h5 class="text-center">Importer, Exporter, Stockist & Suppliers</h5>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                                        <h5 class="text-center"><?php echo $this->name;?></h5>
                                        <h5 class="text-center"><?php echo $this->number;?></h5>
                                        <h5 class="text-center"><?php echo date('d-m-Y');?></h5>
                                    </div>
                                </div>
                                <hr>
                                <?php echo $content; ?> <br /><br /><br /><br />
                                <p class="text-center">Near Sihala Steel Corporation, Sihala Bagh, Kahutta Road, Near Kak Pul, Islamabad</p>
                                <p class="text-center">Ph.# +92-333-4485999, +92-333-4485888, Web: www.mwpbnp.com, Email: info@mwpbnp.com</p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

    </body>
</html>
