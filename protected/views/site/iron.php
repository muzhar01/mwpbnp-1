<?php
Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function(){
                $.fn.yiiListView.update( 'listView', {data: $(this).serialize()}
           );
    return false;
    });
");
?>
<div class="well">
    <div class="search-form">
        <p class="text-danger">Select your product category</p>
        <?php
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        ?>
    </div>
</div>
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $model->search(),
    'itemView' => '_product',
    'id' => 'listView',
    'pager' => array(
        'htmlOptions' => array(
            'class' => 'pagination pagination-sm no-margin pull-right',
        ),
    ),
    'template' => "{items}\n{pager}", // here is the template that confused me!! 
));
?>