<?php
$this->breadcrumbs = array(
    'Website Settings',
);
?>
<section class="content">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h1 class="box-title">Website Settings</h1>
            <?php if (AdminUser::model ()->findByPk (Yii::app ()->user->id)->checkAccess ($this->resource_id, 'add'))
                echo CHtml::link ('<i class="fa fa-plus-square" aria-hidden="true"></i> Company Settings', $this->baseUrl . '/settings', array('class' => 'btn btn-success', 'style' => 'float:right'));
            ?>

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'settings-form',
                'enableAjaxValidation' => false,
                'htmlOptions' => array(
                    'enctype' => 'multipart/form-data',
                ),
            ));
            ?>
            <div class="box-body">
                <div class="row">
                    <?php if (Yii::app()->user->hasFlash('success')): ?>
                        <div class="alert alert-success">
                            <?php echo Yii::app()->user->getFlash('success'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'meta_tag'); ?>
                            <?php echo $form->textField($model, 'meta_tag', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($model, 'meta_tag'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'meta_description'); ?>
                            <?php echo $form->textField($model, 'meta_description', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                            <?php echo $form->error($model, 'meta_description'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'logo'); ?>
                            <?php echo CHtml::activeFileField($model, 'logo', array('class' => 'form-control')); ?>
                            <div class="text-red">Image should be only JPG,PNG and GIF is allowed</div>
                            <?php echo $form->error($model, 'logo'); ?>
                        </div>
                    </div>
                    <?php if (!$model->isNewRecord) { ?>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'cart_settings'); ?> <br>
                                <?php
                                echo $form->radioButtonList($model, 'cart_settings', array('1' => 'Published',
                                    '0' => 'Suspend'), array(
                                        'template' => '{input}{label}',
                                        'separator' => '',
                                        'labelOptions' => array('style' => 'padding: 2px 10px;width: auto;'),
                                        'style' => '',
                                    )
                                );
                                ?>
                                <?php echo $form->error($model, 'cart_settings'); ?>
                            </div>
                            <div class="form-group">
                                <?php
                                echo
                                (!empty($model->logo)) ? CHtml::image($this->publicPath.'/' . $model->logo, "image", array("width" => 200)) : CHtml::image(Yii::app()->request->baseUrl . '/images/products/no-image.png', "image", array("width" => 200));
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="box-footer">
                <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-primary')); ?>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</section>    
