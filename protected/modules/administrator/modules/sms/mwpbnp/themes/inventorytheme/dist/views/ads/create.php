<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Ads
                        <small>Add New</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Ads</a></li>
                        <li class="active">Add New</li>
                    </ol>
                </section>
                
                <?php echo $this->renderPartial('_form', array('model'=>$model, 'adlist' => $adlist,)); ?>

                
                                
                            
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/AdminLTE/app.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/AdminLTE/demo.js" type="text/javascript"></script>   

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script type="text/javascript">
    
    $(function() {

        "use strict";

        //When unchecking the checkbox
        $("#Ads_type_0").on('ifChecked', function(event) {
            $('#google_content').show(0);
            $('#banner_content').hide(0);
        });
        //When checking the radio
        $("#Ads_type_1").on('ifChecked', function(event) {            
            $('#google_content').hide(0);
            $('#banner_content').show(0);
        });
        
    });
</script>