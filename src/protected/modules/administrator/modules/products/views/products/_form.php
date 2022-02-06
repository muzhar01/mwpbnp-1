<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>
<?php Yii::import('ext.oEditor.oEditor'); ?>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'products-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
        ),
    ));
    ?>

    <p class="text-red">
        Fields with <span class="required">*</span> are required.
    </p>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'slug'); ?>
        <?php echo $form->textField($model, 'slug', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'slug'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php
        $this->widget('oEditor', array(
            'id' => 'description',
            'model' => $model,
            'value' => $model->isNewRecord ? $model->description : '',
            'attribute' => 'description',
            'custom_tags' => '',
            'oEditor' => 'oEditor1',
            'width' => '750',
            'height' => '330'
        ));
        ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'category_id'); ?>
        <?php
        $listing = ProductCategory::model()->formatArray(ProductCategory::model()->getItems());
        echo $form->dropDownList($model, 'category_id', $listing, array('class' => 'form-control', 'empty' => 'None',
            'ajax' => array(
                'type' => 'GET',
                'url' => CController::createUrl('/administrator/products/products/getproductsize'),
                'update' => '#products_size', //selector to update value
                'beforeSend' => 'function(){
                                                 $("#products_size").html("Please Wait....");}',
                'data' => array('id' => 'js:this.value'),
            )
        ));
        ?>
        <?php echo $form->error($model, 'category_id'); ?>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'image'); ?>
                <?php echo CHtml::activeFileField($model, 'image', array('class' => 'form-control')); ?>
                <div class="text-red">Image should be only JPG,PNG and GIF is allowed</div>
                <?php echo $form->error($model, 'image'); ?>
            </div>
        </div>     
        <?php if (!$model->isNewRecord) { ?>
            <div class="col-lg-6">
                <div class="form-group">
                    <?php
                    echo
                    (!empty($model->image)) ? CHtml::image($this->publicPath.'/products/' . $model->image, "image", array("width" => 200)) : CHtml::image(Yii::app()->request->baseUrl . '/images/products/no-image.png', "image", array("width" => 200));
                    ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'products_size'); ?> <br/>
        <div class="row">
            <div id="products_size">
                <?php
                if (!$model->isNewRecord) {
                    $model->products_size = array_keys(CHtml::listData(ProductsSizesListings::model()->findAll(array('condition' => "product_id=$model->id")), 'size_id', 'size_id'));
                    $criteria = new CDbCriteria();
                    $criteria->compare('category_id', $model->category_id);
                    $list = CHtml::ListData(CategorySizesListings::model()->findAll($criteria), 'size_id', function($post) {
                                return stripslashes($post->size->title);
                            });
                    echo $form->CheckBoxList($model, 'products_size', $list, array(
                        'template' => '<div class="col-lg-2">{input} {label}</div>',
                        'separator' => '',
                            ), 'products_size', 'products_size'
                    );
                }
                ?>
                <?php echo $form->error($model, 'products_size'); ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'products_thickness'); ?> <br/>
        <div class="row">
            <?php
            if (!$model->isNewRecord) {
                $model->products_thickness = array_keys(CHtml::listData(ProductsThicknessListings::model()->findAll(array('condition' => "product_id=$model->id")), 'thickness_id', 'thickness_id'));
            }
            $criteria = new CDbCriteria();
            $list = CHtml::ListData(ProductThickness::model()->findAll($criteria), 'id', function($post) {
                        return stripslashes($post->title);
                    });
            echo $form->CheckBoxList($model, 'products_thickness', $list, array(
                'template' => '<div class="col-lg-2">{input} {label}</div>',
                'separator' => '',
                    ), 'products_thickness', 'products_thickness'
            );
            ?>
            
            <?php echo $form->error($model, 'products_thickness'); ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'published'); ?> <br>
        <?php
        echo $form->radioButtonList($model, 'published', array('1' => 'Published',
            '0' => 'Unpublished'), array(
            'template' => '{input}{label}',
            'separator' => '',
            'labelOptions' => array('style' => 'padding: 2px 10px;width: auto;'),
            'style' => '',
                )
        );
        ?>
        <?php echo $form->error($model, 'published'); ?>
    </div>

    <div class="row">
        <div class="form-group col-lg-4">
            <?php echo $form->labelEx($model, 'gst_tax'); ?>
            <?php echo $form->textField($model, 'gst_tax', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'gst_tax'); ?>
        </div>

        <div class="form-group col-lg-4">
            <?php echo $form->labelEx($model, 'other_tax'); ?>
            <?php echo $form->textField($model, 'other_tax', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'other_tax'); ?>
        </div>

        <div class="form-group col-lg-4">
            <?php echo $form->labelEx($model, 'income_tax'); ?>
            <?php echo $form->textField($model, 'income_tax', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'income_tax'); ?>
        </div>

        <div class="form-group col-lg-4">
            <?php echo $form->labelEx($model, 'sort_position'); ?>
            <?php echo $form->textField($model, 'sort_position', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'sort_position'); ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#Products_name').keyup(function () {
            var page_name = $('#Products_name').val();
            $('#Products_slug').val(page_name);
            page_name = page_name.toLowerCase();
            page_name = page_name.replace(/[^a-z0-9]/gi, '-');
            $('#Products_slug').val(page_name);
        });
    });
</script>
<!-- form -->