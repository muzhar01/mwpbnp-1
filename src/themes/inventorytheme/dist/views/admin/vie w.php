    <!-- loading animation -->
    <div id="qLoverlay"></div>
    <div id="qLbar"></div>
    
    <?php Header::display(); ?>
    <!-- End #header -->

    <div id="wrapper" class="container">
        <div class="row">

            <!--Sidebar area -->
            <?php Leftbar::showMenu(); ?><!-- End .span4 -->

            <!--content area -->
            <div class="span9">

                <!--Body content-->
                <div id="content" class="clearfix">
                                  
                    <div class="heading">

                        <h3>Admin(s)</h3>                    

                        <ul class="breadcrumb">
                            <li>You are here:</li>
                            <li>
                                <a href="#" class="tip" title="back to dashboard">
                                    <span class="icon16 icomoon-icon-screen-2"></span>
                                </a> 
                                <span class="divider">
                                    <span class="icon16 icomoon-icon-arrow-right-2"></span>
                                </span>
                            </li>
                            <li class="active">Admin(s)</li>
                        </ul>

                    </div><!-- End .heading-->

                    <!-- Build page from here: -->
                   
                    <div class="row-fluid">

                        <div class="span12">
                            
                            <?php
                                foreach(Yii::app()->user->getFlashes() as $key => $message) {
                                        echo '<div class="alert alert-' . $key . '">' . $message . "</div>\n";
                                }
                        ?>

                            <div class="box">

                                <div class="title">

                                    <h4>
                                        <span class="icon16 icomoon-icon-equalizer-2"></span>
                                        <span>Admin &raquo; View</span>
                                    </h4>
                                    
                                </div>
                                
                                   
                                <?php echo $this->renderPartial('_view', array('model'=>$model)); ?>
                                 
                                

                            </div><!-- End .box -->

                        </div><!-- End .span12 -->

                    </div><!-- End .row-fluid -->  

					


                </div>

            </div><!-- End .span9 -->
                
        </div><!-- End #wrapper .row -->

    </div><!-- End .container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Important plugins put in all pages -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap/bootstrap.js"></script>  
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.mousewheel.js"></script>

    <!-- Charts plugins -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/charts/sparkline/jquery.sparkline.min.js"></script><!-- Sparkline plugin -->
   
    <!-- Misc plugins -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/misc/qtip/jquery.qtip.min.js"></script><!-- Custom tooltip plugin -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/misc/totop/jquery.ui.totop.min.js"></script> 

    <!-- Search plugin -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/misc/search/tipuesearch_set.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/misc/search/tipuesearch_data.js"></script><!-- JSON for searched results -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/misc/search/tipuesearch.js"></script>

    <!-- Form plugins -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/forms/watermark/jquery.watermark.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/forms/uniform/jquery.uniform.min.js"></script>
        
    <!-- Fix plugins -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/fix/ios-fix/ios-orientationchange-fix.js"></script>

    <!-- Table plugins -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/tables/dataTables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/tables/responsive-tables/responsive-tables.js"></script><!-- Make tables responsive -->

    <!-- Important Place before main.js  -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/fix/touch-punch/jquery.ui.touch-punch.min.js"></script><!-- Unable touch for JQueryUI -->

    <!-- Init plugins -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script><!-- Core js functions -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/form-validation.js"></script><!-- Init plugins only for page -->