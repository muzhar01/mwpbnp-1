<?php
$this->breadcrumbs=array(
        'User Management'=>array(Yii::app()->params['adminUrl'].'/adminuser'),
        'Resources'=>array('index'),
	'Update',
);
?>
<section class="content">
    <div class="box box-primary">
      <div class="box-header">
        <h3>Update Resources <?php echo $model->id; ?></h3>
      </div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</section>