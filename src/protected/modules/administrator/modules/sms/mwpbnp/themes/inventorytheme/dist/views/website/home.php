<aside class="right-side">
    <section class="content-header">
        <h1>Apearance <small>Home</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li>Home</li>
        </ol>
    </section>
    
    <section class="content">
    <div class="row">
		<?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'category-form',
            'htmlOptions' => array(
                'enctype' => 'multipart/form-data',
                'role' => 'form'
            ),
        ));
        ?>
 
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Home</h3>
                </div><!-- /.box-header -->
                
                    <div class="box-body">                       
						
						<?php echo $form->errorSummary($setting); ?>
                        <?php
                            foreach(Yii::app()->user->getFlashes() as $key => $message) {
                                echo '<div class="alert alert-' . $key . '">' . $message . "</div>\n";
                            }
                        ?>

                        <div class="form-group">
                            <?php echo $form->labelEx($setting, 'section_one', array('label'=>'EVERYTHING YOU NEED,
ALL IN ONE PLACE')); ?>
                            <?php echo $form->textArea($setting, 'section_one', array('class' => "form-control")); ?>
                        </div>
                        
                        <div class="form-group">
                            <?php echo $form->labelEx($setting, 'section_two', array('label'=>'HOW IT WORKS')); ?>
                            <?php echo $form->textArea($setting, 'section_two', array('class' => "form-control")); ?>
                        </div>
						
                        <div class="form-group">
                            <?php echo $form->labelEx($setting, 'section_three', array('label'=>'WHAT KIND OF TRADER ARE YOU?')); ?>
                            <?php echo $form->textArea($setting, 'section_three', array('class' => "form-control")); ?>
                        </div>
                        
                        <div class="form-group">
                            <?php echo $form->labelEx($setting, 'section_four', array('label'=>'SO YOU KNOW WHAT IS TRADING?')); ?>
                            <?php echo $form->textArea($setting, 'section_four', array('class' => "form-control")); ?>
                        </div>
                        
                        <div class="form-group">
                            <?php echo $form->labelEx($setting, 'section_five', array('label'=>'Footer Section')); ?>
                            <?php echo $form->textArea($setting, 'section_five', array('class' => "form-control")); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $form->labelEx($setting, 'signup_content', array('label'=>'SIGN UP PAGE CONTENT')); ?>
                            <?php echo $form->textArea($setting, 'signup_content', array('class' => "form-control")); ?>
                        </div>

                        <div class="box-footer">
                            <button type="submit" name="cat_button" class="btn btn-primary">Update</button>
                        </div>       
                    </div><!-- /.box-body -->

            </div><!-- /.box -->

        </div><!--/.col (left) -->
		<?php $this->endWidget(); ?>

    </div>   <!-- /.row -->
</section>          
                
</aside><!-- /.right-side -->

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/summernote.js"></script>
<script type="text/javascript">
$(function() {
  $('textarea').summernote({
	height: 400
  });
});
</script>