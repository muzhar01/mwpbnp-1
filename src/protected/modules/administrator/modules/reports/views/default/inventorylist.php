<?php
$this->breadcrumbs=array(
    'Reports'=>array('index'),
    'Current Inventory',
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Current Inventory</h1>
            <a class="btn btn-success pull-right" onCLick="window.print()"><i class="fa fa-print"></i> Print current inventory</a>
        </div>
        <div class="box-body">
            <?php $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$model->search(),
                'itemView'=>'_currentinventory',
                'template'=>"{items}\n{pager}", // here is the template that confused me!!
            )); ?>

        </div>
    </div>
</section>
