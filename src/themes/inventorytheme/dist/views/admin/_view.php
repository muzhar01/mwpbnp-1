
<div class="content">
 <?php 
$this->widget('DetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'display_name',
		'email',
		array(
			"name" => 'status',
			"value"  => $model->status==1?"Active":"Inactive",
		),
		'updated',
	),
)); 
?>  
</div>