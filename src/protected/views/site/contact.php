<?php

/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */
$this->pageTitle = Yii::app()->name . ' - Contact Us';
$this->breadcrumbs = array(
	'Contact'
);
?>

<h2 style="color:#0093dd">Contact Us</h2>

<?php if (Yii::app()->user->hasFlash('contact')) : ?>

	<div class=" alert alert-success">
		<?php echo Yii::app()->user->getFlash('contact'); ?>
	</div>

<?php else : ?>

	<p>If you have business inquiries or other queries, please fill out
		the following form to contact us. Thank you.</p>

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
			
			<p class="note pt-25">
				<span class="required">*&nbsp;</span> = Fields Required.
			</p>

			<?php echo $form->errorSummary($model); ?>

			<div class="form-group">

				<?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 128, 'class' => 'form-control', 'placeholder' => 'Name')); ?>
				<?php echo $form->error($model, 'name'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 128, 'class' => 'form-control', 'placeholder' => 'Email')); ?>
				<?php echo $form->error($model, 'email'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->textField($model, 'subject', array('size' => 60, 'maxlength' => 128, 'class' => 'form-control', 'placeholder' => 'Subject')); ?>
				<?php echo $form->error($model, 'subject'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->textArea($model, 'body', array('rows' => 8, 'cols' => 50, 'class' => 'form-control', 'placeholder' => 'Message')); ?>
				<?php echo $form->error($model, 'body'); ?>
			</div>
			

			<div class="form-group">
				<div class="row pb-25">
					<div class="col-lg-3">
						<?php echo $form->labelEx($model, 'Attach File:', array('class' => 'attach-file-label')); ?>
					</div>
					<div class="col-lg-9">
						<div>
						<?php echo $form->filefield($model, 'attachment', array('accept' => '.doc,.docx,.xls,.xlsx,.ppt,.pptx,.pdf,.jpg')); ?>
						<a href="javascript:void(0);" class="btn btn-info" id="select-file">Select file</a>
						</div>
						<div class="hint pt-10">
							Recommended file formats are:<br>DOCS,XLXS,PPT,PDF,JPG
						</div>
						<div class="hint pt-10">
							(Maixmum file size allowed: 10MB)
						</div>
						<?php echo $form->error($model, 'attachment'); ?>
					</div>
				</div>
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

			<div class="form-group">
				<div class="row pt-10">
					<div class="col-lg-3"></div>
					<div class="col-lg-5"><?php echo CHtml::submitButton('Submit', array('class' => 'btn-lg btn-block btn-submit')); ?></div>
					<div class="col-lg-4"></div>

				</div>
			</div>

			<?php $this->endWidget(); ?>

		</div>
		<!-- form -->
		<div class="row">
			<div class="col-lg-12" style="padding: 35px;">
				<h3 style="display: block;margin-bottom: 4px;font-size: 22px;">Islamabad Office:</h3>
				<table class="table table-responsive" style="width: 503px; height: 24px;" border="0">
					<tbody>
						<tr>
							<td>
								<p style="text-align: justify;color: #4c4c4c;">Sihala Steel Corporation, Haji Reyasat Hussain (Late) Market,</p>
								<p style="text-align: justify;color: #4c4c4c;">Sihala Bagh, Near Shell Petrol Pump, Kahutta Road, Islamabad, Pakistan.</p>
							</td>
							<td>&nbsp;</td>
						</tr>
					</tbody>
				</table>
				
				<h3 style="display: block;margin-bottom: 4px;font-size: 22px;">Rawalpindi Office:</h3>
				<table class="table table-responsive" style="width: 503px; height: 24px;" border="0">
					<tbody>
						<tr>
							<td>
								<p style="text-align: justify;color: #4c4c4c;">Office # 25, Mumtaz Market, City Saddar Road,</p>
								<p style="text-align: justify;color: #4c4c4c;">Rawalpindi, Pakistan.</p>
							</td>
							<td>&nbsp;</td>
						</tr>
					</tbody>
				</table>
				
				<h3 style="display: block;margin-bottom: 4px;font-size: 22px;">Contact Numbers:</h3>
				<p style="text-align: justify;color: #4c4c4c;">&nbsp;<span class="skype_c2c_print_container notranslate">+92 (333) 44 85 888,&nbsp;&nbsp;</span> <span class="skype_c2c_print_container notranslate">+92 (333) 44 85 999</span></p>
				<p style="text-align: justify;color: #4c4c4c;">&nbsp;<span class="skype_c2c_print_container notranslate">+92 51 274 81 88, </span><span class="skype_c2c_print_container notranslate">+92 51 44 85 888</span><span id="skype_c2c_container" class="skype_c2c_container notranslate" dir="ltr" onclick="SkypeClick2Call.MenuInjectionHandler.makeCall(this, event)" onmouseover="SkypeClick2Call.MenuInjectionHandler.showMenu(this, event)" onmouseout="SkypeClick2Call.MenuInjectionHandler.hideMenu(this, event)"><span class="skype_c2c_highlighting_inactive_common" dir="ltr"><span id="non_free_num_ui" class="skype_c2c_textarea_span"><img class="skype_c2c_logo_img" src="resource://skype_ff_extension-at-jetpack/skype_ff_extension/data/call_skype_logo.png" alt="" width="0" height="0">, +92 51 44 85 999</span></span></span></p>
				<h3 style="display: block;margin-bottom: 4px;font-size: 22px;">Fax:</h3>
				<p style="text-align: justify;color: #4c4c4c;">&nbsp;+92 51 44 85 888</p>
				<h3 style="display: block;margin-bottom: 4px;font-size: 22px;">Email:</h3>
				<p style="text-align: justify;color: #4c4c4c;">&nbsp;info@mwpbnp.com</p>
				<div id="skype_c2c_menu_container" class="skype_c2c_menu_container notranslate" style="display: none;" onmouseover="SkypeClick2Call.MenuInjectionHandler.showMenu(this, event)" onmouseout="SkypeClick2Call.MenuInjectionHandler.hideMenu(this, event)">
					<div class="skype_c2c_menu_click2call"><a id="skype_c2c_menu_click2call_action" class="skype_c2c_menu_click2call_action" target="_self"></a>Call</div>
					<div class="skype_c2c_menu_click2sms"><a id="skype_c2c_menu_click2sms_action" class="skype_c2c_menu_click2sms_action" target="_self"></a>Send SMS</div>
					<div class="skype_c2c_menu_add2skype"><a id="skype_c2c_menu_add2skype_text" class="skype_c2c_menu_add2skype_text" target="_self"></a>Add to Skype</div>
					<div class="skype_c2c_menu_toll_info"><span class="skype_c2c_menu_toll_callcredit">You'll need Skype Credit</span><span class="skype_c2c_menu_toll_free">Free via Skype</span></div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
