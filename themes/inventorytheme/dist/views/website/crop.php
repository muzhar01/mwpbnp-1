<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Apearance
            <small>Header/Footer 
            <strong>
            Crop
            </strong>
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Crop</li>
        </ol>
    </section>

    
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.simpleimagecrop.css" rel="stylesheet" />                
<?php
$baseUrl = Yii::app()->theme->baseUrl; 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/jquery.simpleimagecrop.js', CClientScript::POS_END);
$cs->registerScript('simpleimagecrop', "$(window).load(function() {
        $('#crop_container').simpleImageCrop({
            //maxPreviewImageWidth: 200,
            maxPreviewImageHeight: 200,
            newImageHeight: 120,
            newImageWidth: 180,
            phpScriptLocation: '".Yii::app()->createUrl('post/imageCrop')."',
            redirectLocation: '".Yii::app()->createUrl('website/crop&id=1')."',
            successMessage: 'The image has been cropped!',
            warningMessage: ''
        })          
    });", CClientScript::POS_END);


$cs->registerCssFile($baseUrl.'/css/jquery.simpleimagecrop.css',CClientScript::POS_HEAD);
?>
    <!-- Main content -->
    <section class="content">
        <div class="row"> 
        
        <div class="col-md-6 col-lg-6 col-xs-12">
        <noscript>Please enable Java Script to use the Simple Image Crop plugin.</noscript>
        <div id="crop_container" class="hidden">
            <div id="crop_box">
                <div id="resize_icon"></div>
            </div>
            <div id="crop_message"></div>
            <img id="image_to_crop" src="<?php echo $setting->site_url.$model->BigSrc; ?>" alt="">    
            <div id="crop_button">
                <input type="hidden" id="destinationPath" value="<?php echo "upload/".$model->footer_image; ?>">
                <input type="button" class="btn btn-success" value="Click To Crop" />
            </div>
        </div>
        <div class="clear"></div> 
        </div>
        <div class="col-md-6 col-lg-6 col-xs-12">
        <!-- div below can be put apart from the crop container -->
        <div id="crop_preview" class="hidden">
            <div id="preview_message">Preview</div>
            <img id="image_preview" alt="Crop Preview">   
        </div>
        
        </div>
        
        </div>
    </section>



</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/AdminLTE/app.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/AdminLTE/demo.js" type="text/javascript"></script>        