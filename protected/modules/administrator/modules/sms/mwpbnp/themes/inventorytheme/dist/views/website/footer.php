<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Apearance
            <small>Footer</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li>Footer</li>
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
                    <h3 class="box-title">Footer</h3>
                </div><!-- /.box-header -->
                    <div class="box-body">
						<?php echo $form->errorSummary($setting); ?>
                        <?php
                            foreach(Yii::app()->user->getFlashes() as $key => $message) {
                                echo '<div class="alert alert-' . $key . '">' . $message . "</div>\n";
                            }
                        ?>
                       
                        <div class="form-group">
                            <?php echo $form->labelEx($setting, 'footer_col_one', array()); ?>
                            <?php echo $form->textArea($setting, 'footer_col_one', array('class' => "form-control")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($setting, 'footer_col_two', array()); ?>
                            <?php echo $form->textArea($setting, 'footer_col_two', array('class' => "form-control")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($setting, 'footer_col_three', array()); ?>
                            <?php echo $form->textArea($setting, 'footer_col_three', array('class' => "form-control")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($setting, 'footer_col_four', array()); ?>
                            <?php echo $form->textArea($setting, 'footer_col_four', array('class' => "form-control")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($setting, 'footer_col_five', array()); ?>
                            <?php echo $form->textArea($setting, 'footer_col_five', array('class' => "form-control")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($setting, 'footer_copyright', array()); ?>
                            <?php echo $form->textArea($setting, 'footer_copyright',array('class' => "form-control")); ?>
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

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/summernote.js"></script>
<script type="text/javascript">
$(function() {
  $('textarea').summernote({
	height: 200
  });
});
</script>