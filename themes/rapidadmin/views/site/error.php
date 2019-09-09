<?php
$this->logo_url = str_replace('/images/', '', $this->logo_url);
$this->pageTitle=Yii::app()->name . ' - Error';?>
<?php if(isset($code) && !empty($code)){ ?>
    <h2 class="error_header">Error <?php echo $code; ?></h2>
<?php
} ?>
<div class="error error_message">
<?php
if(isset($message) && !empty($message)) {
echo CHtml::encode($message);
} ?>
</div>