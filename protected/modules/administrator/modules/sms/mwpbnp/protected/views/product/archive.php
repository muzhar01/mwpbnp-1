<?php
Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function(){
                $.fn.yiiListView.update( 'listView', {data: $(this).serialize()}
           );
    return true;
    });
");
?>
<div class="well">
    <div class="search-form">
        <p class="">Please select the required previous date to view the archived price of this product </p>
        <?php
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        ?>
    </div>
</div> 
<?php //echo $date;
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $model->search(),
    'itemView' => '_archive',
    'viewData'=>array('date'=>$date),
    'id' => 'listView',
    'template' => "{items}\n{pager}", // here is the template that confused me!! 
));
?>

