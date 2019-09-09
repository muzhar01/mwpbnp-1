<?php
$model = IronFurnitureImages::model()->find(array('condition'=>" pid=$data->id AND published=1"));
?>
<h3><?php echo CHtml::encode($data->name)?></h3>
<div class="row">
    <div class="col-lg-4 col-md-4">
        <?php 
        if($model==NULL){
            echo CHtml::image('/images/no-image.png', $data->name,array('class'=>'img-responsive'));
        }else{
            echo CHtml::image('/images/iron/'.$model->file_url, $data->name,array('class'=>'img-responsive'));
        }
        ?>
    [<?php echo $data->category->name?>]
    </div>
    <div class="col-lg-8 col-md-8">
        <?php echo $data->description?> 
        <span class="btn btn-success"> <?php echo $data->price?></span>
    </div>
</div>
<hr />

