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

                        <h3>Post</h3>

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
                                        <span>Post &raquo; View #<?php echo $model->id; ?></span>
                                    </h4>
                                    
                                </div>
                                
                                <div class="content noPad clearfix">                                   
                                <?php 
                                $this->widget('DetailView', array(
                                                'data'=>$model,
                                                'attributes'=>array(
                                                        'id',
                                                        array(
                                                            'name'=>post,
                                                            'type'=>'html'
                                                        ),
                                                        array(
                                                            'label'=>'attachment',
                                                            'type'=>'image',
                                                            'value'=>!empty($model->attachment)?Yii::app()->baseUrl . '/images/' . $model->user_id . '/post/thumb/' . $model->attachment:'',
                                                        ),
                                                        'timestamp',
                                                ),
                                        ));

                                ?>
                                </div>
                                <h2>Comments</h2>
                                <div class="content noPad clearfix">
                                <table cellpadding="0" cellspacing="0" border="0" class="responsive dynamicTable display table table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Comment</th>
                                            <th>Created On</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <?php
                                    $i=1;
                                    $posts = UserPostComments::model()->findAll(array("condition"=>"post_id=$model->id"));
                                    foreach($posts as $post)
                                    {
                                            $tr_class = $i++%2==0 ? 'odd': 'even' ;

                                    ?>
                                    
                                        <tr class="<?php echo $tr_class; ?>">
                                            <td align="left"><?php echo $post->user->username; ?></td>
                                            <td><?php echo $post->post; ?></td>
                                            <td><?php echo $post->timestamp; ?></a></td>
                                            <td>
                                            <div class="controls">
                                                <a href="<?php echo Yii::app()->createUrl("post/comment_remove", array("id"=>$post->id)); ?>" title="Remove Record" class="tip" onclick="return confirm('Are you sure to delete?');"><span class="icon12 icomoon-icon-remove"></span></a>
                                            </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                                

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
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap/bootstrap.js"></script>  
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.mousewheel.js"></script>

    <!-- Charts plugins -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/charts/flot/jquery.flot.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/charts/flot/jquery.flot.grow.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/charts/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/charts/flot/jquery.flot.resize.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/charts/flot/jquery.flot.tooltip_0.4.4.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/charts/flot/jquery.flot.orderBars.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/charts/sparkline/jquery.sparkline.min.js"></script><!-- Sparkline plugin -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/charts/knob/jquery.knob.js"></script><!-- Circular sliders and stats -->

    <!-- Misc plugins -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/misc/fullcalendar/fullcalendar.min.js"></script>
    <!-- Calendar plugin -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/misc/qtip/jquery.qtip.min.js"></script>
    <!-- Custom tooltip plugin -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/misc/totop/jquery.ui.totop.min.js"></script> 
    <!-- Back to top plugin -->
    <!-- Search plugin -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/misc/search/tipuesearch_set.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/misc/search/tipuesearch_data.js"></script>
    <!-- JSON for searched results -->

    <!-- Form plugins -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/forms/watermark/jquery.watermark.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/forms/uniform/jquery.uniform.min.js"></script>
    
    <!-- Fix plugins -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/fix/ios-fix/ios-orientationchange-fix.js"></script>

    <!-- Important Place before main.js  -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/fix/touch-punch/jquery.ui.touch-punch.min.js"></script>
    <!-- Unable touch for JQueryUI -->

    <!-- Init plugins -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script><!-- Core js functions -->
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/dashboard.js"></script><!-- Init plugins only for page -->
    
	