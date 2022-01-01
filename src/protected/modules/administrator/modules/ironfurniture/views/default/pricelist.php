<h2>Current Price</h2>
<style>
    .items{
        font-size: 20px !important;
    }
</style>
<button class="btn btn-success" onCLick="window.print()">Print List</button>

<?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$model->search(),
        'itemView'=>'_current',
        'template'=>"{items}\n{pager}", // here is the template that confused me!! 
)); ?>