<?php
$this->breadcrumbs=array(
        'User Management'=>array(Yii::app()->params['adminUrl'].'/adminuser'),
        'Resources'=>array('index'),
	'Create',
);

?>

<h1>Create Resources</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>