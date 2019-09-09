<?php
/* @var $this SliderController */
/* @var $model Banner */
/* @var $form CActiveForm */
?>
<?php Yii::import('ext.oEditor.oEditor'); ?>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'banner-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <p class="text-red">
        Fields with <span class="required">*</span> are required.
    </p>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'title'); ?>
                <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 300, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'title'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'banner_url'); ?>
                <?php echo $form->fileField($model, 'banner_url', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'banner_url'); ?>
                <?php if(!$model->isNewRecord){?>
                <div class="img-responsive">
                    <?php echo CHtml::image('/images/banners/'.$model->banner_url, $model->title,array('style'=>'max-width:100%;margin:5px 0px'));?>
                </div>
                <?php }?>
            </div>
        </div>
        <div class="col-lg-6">

            <div class="form-group">
                <?php echo $form->labelEx($model, 'url'); ?>
                <?php echo $form->textField($model, 'url', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control', 'placeholder' => 'http://www.example.com/images/1.png')); ?>
                <?php echo $form->error($model, 'url'); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'published'); ?> <br />
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        echo $form->radioButtonList($model, 'published', array('1' => 'Yes',
                            '0' => 'No'), array(
                            'template' => '{input}{label}',
                            'separator' => '',
                            'labelOptions' => array('style' => 'float: left;padding: 2px 10px;width: auto;'),
                            'style' => 'float:left;',
                                )
                        );
                        ?>
                    </div>
                </div>
                <?php echo $form->error($model, 'published'); ?>

            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

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
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
            </div>
        </div>
        <?php $this->endWidget(); ?>

    </div>
    <!-- form -->