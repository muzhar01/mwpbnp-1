<div style="width: 550px">
<h1>Report a bug</h1>
<div id="ajaxstatus"></div>
<p>
If you any kind of bug or problem, please fill out the following form to report a bug form.
</p>
<div class="form" style="width: 95%" id="comment-form">
<?php $form= $this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128,'readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>70,'style'=>'width:94%')); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>
	<div class="row buttons">
		<?php echo  CHtml::ajaxSubmitButton( 'Save',$this->createUrl('/administrator/default/bug'),
                                                                array('type'=>'POST',
                                                                    'success'=>'function(data) {
                                                                                      $("#ajaxstatus").append(data)
                                                                                             .addClass("flash-success")
                                                                                             .fadeToggle(4000, "linear");
                                                                                       $("#comment-form").slideToggle(1500);
                                                                                            
                                                                                   }' //success
                                                                    ),
                                                                array('type'=>'submit')
                                                  );

                ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


</div>