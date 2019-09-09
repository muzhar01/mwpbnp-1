<?php
$this->breadcrumbs=array(
    'User Management'=>array(Yii::app()->params['adminUrl'].'/adminuser'),
    'Role'=>array(Yii::app()->params['adminUrl'].'/adminuser/role'),
	'Create',
);
?>

<h1>Create Role</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>