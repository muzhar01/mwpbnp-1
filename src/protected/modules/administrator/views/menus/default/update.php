<?php
$this->breadcrumbs=array(
	'Menus'=>array('index'),
	'Update',
);



?>

<h1>Update Menus <?php echo $model->menu_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>