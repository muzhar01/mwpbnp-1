<script src="/contentbuilder/scripts/jquery-ui.min.js" type="text/javascript"></script>
<script src="/contentbuilder/scripts/contentbuilder.js" type="text/javascript"></script>
<?php Yii::app()->clientScript->registerCssFile('/contentbuilder/assets/minimalist/content.css'); ?>

<!--   Checks to load the the css of the front end --------------------------------------->
<link href="/contentbuilder/scripts/contentbuilder.css" rel="stylesheet" type="text/css" />

<!--   Checks to load the the css of the front end --------------------------------------->

<div id="message" class="flash-success" style="display: none"></div>
<div id="contentarea" class="container" style=" margin-bottom: 14em;">
    <?php
        $this->widget('application.extensions.contentBuilder.ContentBuilder', array(
            'theme' => 'simple', 'id' => $model->content
        ));
    ?> 

</div>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("#contentarea").contentbuilder({
            zoom: .95,
            imageselect: '<?php echo Yii::app()->getBaseUrl(true); ?>/images.html',
            fileselect: '<?php echo Yii::app()->getBaseUrl(true); ?>/images.html',
            snippetFile: '<?php echo Yii::app()->getBaseUrl(true); ?>/contentbuilder/assets/minimalist/snippets.html',
            toolbar: 'left'
        });
        $('#errorvalidation').css('display', 'none');
        $('#errorvalidation').html('');
        $('#errorvalidation').removeClass('alert-success');
        $('#errorvalidation').addClass('alert-danger');

    });
</script>       