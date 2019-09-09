<?php
/* @var $this CategoryController */
/* @var $model ProductCategory */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget ('CActiveForm', array(
                        'id' => 'product-category-form',
                        // Please note: When you enable ajax validation, make sure the corresponding
                        // controller action is handling ajax validation correctly.
                        // There is a call to performAjaxValidation() commented in generated controller code.
                        // See class documentation of CActiveForm for details on this.
                        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="text-red">
        Fields with <span class="required">*</span> are required.
    </p>

    <?php echo $form->errorSummary ($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx ($model, 'parent_id'); ?>
        <?php
        $listing = ProductCategory::model ()->formatArray (ProductCategory::model ()->getItems ());
        echo $form->dropDownList ($model, 'parent_id', $listing, array('class' => 'form-control', 'empty' => 'None',));
        ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx ($model, 'label'); ?>
        <?php echo $form->textField ($model, 'label', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error ($model, 'label'); ?>
    </div>
    <div class="form-group"> 
        <?php echo $form->labelEx ($model, 'slug'); ?>
        <?php echo $form->textField ($model, 'slug', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error ($model, 'slug'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx ($model, 'sort_order'); ?>
        <?php echo $form->textField ($model, 'sort_order', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error ($model, 'sort_order'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx ($model, 'unit'); ?>
        <?php echo $form->textField ($model, 'unit', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error ($model, 'unit'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx ($model, 'published'); ?> <br>
        <?php
        echo $form->radioButtonList ($model, 'published', array('1' => 'Published',
                            '0' => 'Unpublished'), array(
                            'template' => '{input}{label}',
                            'separator' => '',
                            'labelOptions' => array('style' => 'padding: 2px 10px;width: auto;'),
                            'style' => '',
                )
        );
        ?>
        <?php echo $form->error ($model, 'published'); ?>

    </div>
    <div class="form-group">
        <?php echo $form->labelEx ($model, 'size'); ?> <br/>
        <div class="row">
            <?php
            if($model->isNewRecord)
                $model->product_size=array();
            else
            $model->product_size = array_keys (CHtml::listData (CategorySizesListings::model ()->findAll (array('condition' => "category_id=$model->id")), 'size_id', 'size_id'));
            $criteria = new CDbCriteria();
            $criteria->compare ('published', '1');
            $criteria->order='id ASC';
            $list = CHtml::ListData (ProductSize::model ()->findAll ($criteria), 'id', function($post) { return stripslashes($post->title); });
            echo $form->CheckBoxList ($model, 'product_size', $list, array(
                                'template' => '<div class="col-lg-3">{input} {label}</div>',
                                'separator' => '',
                    ), 'size', 'size'
            );
            ?>
            <?php echo $form->error ($model, 'size'); ?>
        </div>
    </div>


    <div class="form-group ">
        <?php echo CHtml::submitButton ($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget (); ?>

</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#ProductCategory_label').keyup(function(){
            var page_name = $('#ProductCategory_label').val();
            $('#ProductCategory_slug').val(page_name);
            page_name = page_name.toLowerCase();
            page_name = page_name.replace(/[^a-z0-9]/gi, '-');
            $('#ProductCategory_slug').val(page_name);
        });
    });
    </script>
<!-- form -->