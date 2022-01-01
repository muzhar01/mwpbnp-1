<?php
/* @var $this ProductsController */
/* @var $model Products */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Base Price',
);
$total_size= count($size);
$total_thickness=count($thickness);

?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Base Price of <?php echo CHtml::encode($model->name);  ?></h3>
        </div>
        <div class="box-body">
                            <?php
                    $form = $this->beginWidget ('CActiveForm', array(
                                        'id' => 'baseprice-form',
                                        // Please note: When you enable ajax validation, make sure the corresponding
                                        // controller action is handling ajax validation correctly.
                                        // There is a call to performAjaxValidation() commented in generated controller code.
                                        // See class documentation of CActiveForm for details on this.
                                        'enableAjaxValidation' => false,
                    ));
                    ?>
                <table class="table table-condensed table-bordered">
                    <caption>
                        <tr >
                            <th class="bg-gray"></th>
                            <th class="bg-gray" colspan="<?php echo $total_thickness?>">Thickness</th>
                        </tr>
                    </caption>
                     <tr>
                         <th class="bg-gray" style="white-space: nowrap" >Product Size</th>
                        <?php  foreach ($thickness as $thicknessdata) {?>
                        <th  ><?php echo stripslashes($thicknessdata->Thickness->title)?></th>
                        <?php } ?>
                    </tr>
                    <?php  foreach ($size as $sizedata) {?>
                    <tr>
                        <th class="bg-gray"><?php echo stripslashes($sizedata->size->title)?></th>
                        <?php  foreach ($thickness as $thicknessdata) {
                               $modelbasePrice=  ProductBasePrice::model ()->find (array('condition'=>"product_id=$model->id AND size_id= $sizedata->size_id AND thickness_id = $thicknessdata->thickness_id"));
                               $price = ($modelbasePrice) ? $modelbasePrice->price:0.00;
                               ?>
                        <td ><div class="input-group">
                                <input type="text" class="form-control" name="Products[price][<?php echo $sizedata->size_id?>][<?php echo $thicknessdata->thickness_id?>]" value="<?php echo $price?>" />
                           </div>
                        </td>
                        <?php } ?>
                     </tr>
                     <?php } ?>
                    
                    
                    
            </table>
           <div class="form-group">
        <?php echo CHtml::submitButton ( 'Save Product Base Price', array('class' => 'btn btn-success')); ?>
              </div>

    <?php $this->endWidget (); ?>
        </div>
    </div>
</section>
