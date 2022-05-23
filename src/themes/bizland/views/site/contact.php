<?php

/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */
$this->pageTitle = Yii::app()->name . ' - Contact Us';
$this->breadcrumbs = array(
	'Contact'
);
?>

<h2 >Contact Us</h2>

<?php if (Yii::app()->user->hasFlash('contact')) : ?>
	<div class=" alert alert-success">
		<?php echo Yii::app()->user->getFlash('contact'); ?>
	</div>

<?php else : ?>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<?php

			$form = $this->beginWidget('CActiveForm', array(
				'id' => 'contact-form',
				'htmlOptions'=>array('enctype'=>'multipart/form-data'),
				'enableClientValidation' => true,
				'clientOptions' => array(
					'validateOnSubmit' => true
				)
			));
			?>
			<br>
			<?php echo $form->errorSummary($model); ?>
			<div class="form-group">
                <?php echo $form->labelEx ($model, 'name'); ?> <br>
				<?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 128, 'class' => 'form-control', 'placeholder' => 'Name')); ?>
				<?php echo $form->error($model, 'name'); ?>
			</div>

			<div class="form-group">
                <?php echo $form->labelEx ($model, 'email'); ?> <br>
				<?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 128, 'class' => 'form-control', 'placeholder' => 'Email')); ?>
				<?php echo $form->error($model, 'email'); ?>
			</div>

			<div class="form-group">
                <?php echo $form->labelEx ($model, 'subject'); ?> <br>
				<?php echo $form->textField($model, 'subject', array('size' => 60, 'maxlength' => 128, 'class' => 'form-control', 'placeholder' => 'Subject')); ?>
				<?php echo $form->error($model, 'subject'); ?>
			</div>

			<div class="form-group">
                <?php echo $form->labelEx ($model, 'body'); ?> <br>
				<?php echo $form->textArea($model, 'body', array('rows' => 8, 'cols' => 50, 'class' => 'form-control', 'placeholder' => 'Message')); ?>
				<?php echo $form->error($model, 'body'); ?>
			</div>
			<?php if (CCaptcha::checkRequirements()) : ?>

				<div class="form-group">
					<div class="row pb-25">
						<div class="col-lg-3">
							<?php echo $form->labelEx($model, 'verifyCode', array('class' => 'verification')); ?>
						</div>
						<div class="col-lg-9">
							<div>
								<?php $this->widget('CCaptcha'); ?>
								<?php echo $form->textField($model, 'verifyCode', array('size' => 60, 'maxlength' => 128, 'class' => 'form-control')); ?>
							</div>
							<div class="hint pt-10">
								Please enter the letters as they are shown in the image above.
							</div>
							<?php echo $form->error($model, 'verifyCode'); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<div class="form-group mt-3">
                <?php echo CHtml::submitButton('Send Messages', array('class' => 'btn btn-primary')); ?>
			</div>

			<?php $this->endWidget(); ?>

		</div>
		<!-- form -->

	</div>
<?php endif; ?>
