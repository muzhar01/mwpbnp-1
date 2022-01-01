<?php
$this->breadcrumbs=array(
        'User Management'=>array(Yii::app()->params['adminUrl'].'/adminuser'),
        'Accesses'=>array('index'),
	
	'Update',
);

$this->menu=array(
	array('label'=>'List Access', 'url'=>array('index')),
	array('label'=>'Create Access', 'url'=>array('create')),
	array('label'=>'View Access', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Access', 'url'=>array('admin')),
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3>Update Access <?php echo $model->id; ?></h3>
        </div>
            <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</section>


