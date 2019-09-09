<h2>Products</h2>
<?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$model->search(),
        'itemView'=>'_view',
        'template'=>"{items}\n{pager}", // here is the template that confused me!! 
)); ?>