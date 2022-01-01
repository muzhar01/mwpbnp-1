<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>
<?php Yii::import('ext.oEditor.oEditor');?>
<div class="form">
    <?php
    $form = $this->beginWidget ('CActiveForm', array(
                        'id' => 'news-form',
                        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="text-red">
        Fields with <span class="required">*</span> are required.
    </p>

    <?php echo $form->errorSummary ($model); ?>
    <div class="form-group">
        <?php echo $form->labelEx ($model, 'cat_id'); ?>
        <?php
        $criteria = new CDbCriteria();
        $criteria->compare ('published', '1');
        $list = CHtml::ListData (ArticleCategory::model ()->findAll ($criteria), 'id', 'name');
        echo $form->dropDownList ($model, 'cat_id', $list, array('empty' => 'Select category', 'class' => 'form-control',));
        ?>
        <?php echo $form->error ($model, 'cat_id'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx ($model, 'title'); ?>
        <?php echo $form->textField ($model, 'title', array('class' => 'form-control', 'size' => 60, 'maxlength' => 300)); ?>
        <?php echo $form->error ($model, 'title'); ?>
    </div>
    <div class="form-group">
      	<?php echo $form->labelEx($model,'intro_text'); ?>
		<?php
                    $this->widget('oEditor', array(
                        'id' => 'intro_text',
                        'model' => $model,
                        'value' => $model->isNewRecord ? $model->intro_text : '',
                        'attribute' => 'intro_text',
                        'custom_tags' => '',
                        'oEditor' => 'oEditor1',
                        'width' => '750',
                        'height' => '330'
                    ));
                ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

    <div class="form-group">
      	<?php echo $form->labelEx($model,'desc'); ?>
		<?php
                    $this->widget('oEditor', array(
                        'id' => 'desc',
                        'model' => $model,
                        'value' => $model->isNewRecord ? $model->desc : '',
                        'attribute' => 'desc',
                        'custom_tags' => '',
                        'oEditor' => 'oEditor2',
                        'width' => '750',
                        'height' => '330'
                    ));
                ?>
		<?php echo $form->error($model,'description'); ?>
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
        <?php echo CHtml::submitButton ($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget (); ?>

</div>
<!-- form -->