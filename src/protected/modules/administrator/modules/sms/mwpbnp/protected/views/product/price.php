<h2>Current Price</h2>
<?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$model->search(),
        'itemView'=>'_current',
        'template'=>"{items}\n{pager}", // here is the template that confused me!! 
)); ?>