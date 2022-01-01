<?php
$this->breadcrumbs=array(
    'Menu Management'=>array(Yii::app()->params['adminUrl'].'/menus/'),  
	'Menu Items'=>array('index'),
	'Create',
);
?>
<section class="content">
<div class="box box-primary">
  
  <div class="box-header">
    <h3>Create Menu Items</h3>
  </div>
<div class="box-body">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>
</section>