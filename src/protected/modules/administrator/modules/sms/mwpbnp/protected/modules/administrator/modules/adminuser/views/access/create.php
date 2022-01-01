<?php
$this->breadcrumbs=array(
        'User Management'=>array(Yii::app()->params['adminUrl'].'/adminuser'),
        'Accesses'=>array('index'),
		'Create',
);


?>

<h1>Create Access</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>