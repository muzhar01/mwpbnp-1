<?php
$this->breadcrumbs = array(
    'User Management' => array(Yii::app()->params['adminUrl'] . '/adminuser'),
    'Users' => array(Yii::app()->params['adminUrl'] . '/adminuser/user'),
    'Create',
);
?>
<section class="content">
    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">Create Admin User </h3>
        </div>
        <div class="box-body">
            <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
        </div>
    </div>
</section>