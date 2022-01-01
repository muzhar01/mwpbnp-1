<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('page/view'); ?>">Page(s)</a>
            <small>Page Banner</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('page/view'); ?>">Page(s)</a></li>
            <li class="active">Page Banner</li>
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
        <div class="col-md-7">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Page</h3>
                </div><!-- /.box-header -->
                <?php echo $form->errorSummary($setting); ?>
                <div class="box-body">
                
                	<div class="form-group">
                        <?php echo $form->labelEx($setting, 'page_banner_title', array()); ?>
                        <?php echo $form->textField($setting, 'page_banner_title', array('class' => "form-control")); ?>
                    </div>
                    
                    <div class="form-group">
                        <?php echo $form->labelEx($setting, 'page_banner'); ?>
                        <?php echo $form->fileField($setting, 'page_banner', array('class' => "form-control")); ?>
                        <?php if(is_file(Yii::app()->theme->basePath.'/../../upload/page/thumb/'.$setting->page_banner)) { ?>
                        <br>
                        <img class="img-responsive" src="<?php echo Yii::app()->baseUrl.'/upload/page/thumb/'.$setting->page_banner; ?>" />
                        <?php } ?>
                    </div>
                    
                    <div class="form-group">
                        <?php echo $form->labelEx($setting, 'page_banner_content', array()); ?>
                        <?php echo $form->textField($setting, 'page_banner_content', array('class' => "form-control")); ?>
                    </div>
                </div>
                
                <div class="box-footer">
                    <button type="submit" name="page_button" class="btn btn-primary">Submit</button>
                </div>
                
                
            </div><!-- /.box -->

        </div><!--/.col (right) -->
        
        <?php $this->endWidget(); ?>

    </div>   <!-- /.row -->
</section>




</aside><!-- /.right-side -->
