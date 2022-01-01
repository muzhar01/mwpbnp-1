<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */
<?php
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Manage',
);\n";
?>
$pageSize = Yii::app()->user->getState('pageSize', 50);
Yii::app()->clientScript->registerScript('search', "
    $('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
        });
        $('.search-form form').submit(function(){
        $('#<?php echo $this->class2id($this->modelClass); ?>-grid').yiiGridView('update', {
        data: $(this).serialize()
        });
    return false;
    });
");
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Manage <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h1>
            <?php echo "<?php"; ?>
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add'))
                echo CHtml::link('<i class="fa fa-plus-square" aria-hidden="true"></i> Create <?php echo $this->modelClass; ?>' , $this->baseUrl . '/create', array('class' => 'btn btn-success', 'style' => 'float:right'));
            <?php echo "?>"; ?>
        </div>
        <div class="box-body">
            <?php if (Yii::app()->user->hasFlash('success')): ?>
                <div class="alert alert-success">
                    <?php echo Yii::app()->user->getFlash('success'); ?>
                </div>
            <?php endif; ?>
            <div class="search-form" style="display: none">
                <?php
                echo "<?php \$this->renderPartial('_search',array(
                'model'=>\$model,
                )); ?>\n";
                ?>
            </div>
            <?php echo "<?php"; ?> $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
             'pagerCssClass' => 'box-footer clearfix',
            'columns'=>array(
            <?php
            $count = 0;
            foreach ($this->tableSchema->columns as $column) {
                if (++$count == 7)
                    echo "\t\t/*\n";
                echo "\t\t'" . $column->name . "',\n";
            }
            if ($count >= 7)
                echo "\t\t*/\n";
            ?>
         array(
                        'class' => 'CButtonColumn',
                        'header' => "Show Records " . CHtml::dropDownList('pageSize', $pageSize, array(20 => 20, 50 => 50, 100 => 100, 200 => 200), array(
                            'onchange' => "$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid',{ data:{pageSize: $(this).val() }})",
                        )),
                        'template' => '{published}{update}{view}{delete}',
                        'buttons' => array(
                            'published' => array(
                                'label' => 'Published',
                                'imageUrl' => Yii::app()->request->baseUrl . "/images/tick.png" ,
                                'url' => 'Yii::app()->createUrl("/administrator/<?php echo $this->modelClass?>/published", array("id"=>$data->id))',
                                'visible' => '( Yii::app()->user->role == 1) || AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25,"published")',
                            ),
                            'update' => array(
                                'visible' => '( Yii::app()->user->role == 1) && AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25,"edit")',
                            ),
                            'view' => array(
                                'visible' => '( Yii::app()->user->role == 1) || AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25,"view")',
                            ),
                            'delete' => array(
                               'visible' => '( Yii::app()->user->role == 1) || AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25,"delete")',
                            ),
                        ),
                    ),
            ),
            )); ?>
</div>
</div>
</section>