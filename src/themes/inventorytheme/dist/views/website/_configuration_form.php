<!-- Main content -->
<section class="content">
    <div class="row"> 
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Site Configuration</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php
                    foreach(Yii::app()->user->getFlashes() as $key => $message) {
                        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
                    }
                ?>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'category-form',
                    'htmlOptions' => array(
                        'enctype' => 'multipart/form-data',
                        'role' => 'form'
                    ),
                ));
                
                echo '<div class="box-body">'.$form->errorSummary($model).'</div>'; 
                ?>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'title', array()); ?>
                            <?php echo $form->textField($model,'title',array('class'=>"form-control", "placeholder"=>"Enter the site title")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'keyword', array()); ?>
                            <?php echo $form->textField($model,'keyword',array('class'=>"form-control", "placeholder"=>"Enter the site keyword")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'description', array()); ?>
                            <?php echo $form->textArea($model,'description',array('class'=>"form-control", "placeholder"=>"Enter the site description")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'analytics_code', array()); ?>
                            <?php echo $form->textArea($model,'analytics_code',array('class'=>"form-control", "placeholder"=>"Enter the analytics code")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'site_url', array()); ?>
                            <?php echo $form->textField($model,'site_url',array('class'=>"form-control", "placeholder"=>"Enter the site url")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'from_name', array()); ?>
                            <?php echo $form->textField($model,'from_name',array('class'=>"form-control", "placeholder"=>"Enter the emial from name")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'from_email', array()); ?>
                            <?php echo $form->textField($model,'from_email',array('class'=>"form-control", "placeholder"=>"Enter the emial from email")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'front_theme', array()); ?>
                            <?php echo $form->textField($model,'front_theme',array('class'=>"form-control", "placeholder"=>"Enter the front theme")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'back_theme', array()); ?>
                            <?php echo $form->textField($model,'back_theme',array('class'=>"form-control", "placeholder"=>"Enter the back theme")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'logo', array()); ?>
                            <?php echo $form->fileField($model,'logo',array('class'=>"form-control")); ?>
                            <?php if(is_file(Yii::app()->theme->basePath.'/../../upload/logo/'.$model->logo)) { ?>
                            <br>
                            <img src="<?php echo Yii::app()->baseUrl.'/upload/logo/'.$model->logo; ?>" />
                            <?php } ?>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="setting_button" class="btn btn-primary">Submit</button>
                    </div>
                <?php $this->endWidget(); ?>
            </div><!-- /.box -->

        </div><!--/.col (left) -->

    </div>   <!-- /.row -->
</section><!-- /.content -->