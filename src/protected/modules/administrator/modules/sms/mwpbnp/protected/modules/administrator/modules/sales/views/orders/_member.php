<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fname',
		'lname',
		'address',
		'city',
		'phone_office',
		'fax_no',
		'phone_res',
		'email',
		'cellular',
	
	),
)); ?>