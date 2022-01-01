<!-- Main content -->
<section class="content">
    <div class="row">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'template-form',
            'htmlOptions' => array(
                'enctype' => 'multipart/form-data',
                'role' => 'form'
            ),
        )); 
        ?>
        <div class="col-md-5">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Ads</h3>
                </div><!-- /.box-header -->
                    <?php echo '<div class="box-body">'.$form->errorSummary($model).'</div>'; ?>
                    <div class="box-body">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'ad_id', array()); ?>
                            <?php //echo CHtml::dropDownList('Ads[ad_id]', $model->ad_id, $list, array('class' => "form-control"));  ?>
                            <select class="form-control" name="Ads[ad_id]" id="Ads_ad_id">
                            <?php foreach ($adlist as $ad) { ?>
                                <option <?php if($ad->id==$model->ad_id) echo 'selected="selected"' ?> value="<?php echo $ad->id; ?>"><?php echo $ad->name; ?> (<?php echo $ad->width; ?>x<?php echo $ad->height; ?>)</option>
                            <?php } ?>    
                            </select>
                            
                            
                            
                            
                        </div>                        
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'type'); ?>
                            <?php echo RBLHtml::enumRadioButtonList($model, 'type', array( 'labelOptions'=>array('style'=>'display:inline;'), 'template'=>"{input} {label}", 'separator'=>'&nbsp;&nbsp;&nbsp;')); ?>
                        </div>
                        <div class="form-group" id="google_content">
                            <?php echo $form->labelEx($model, 'content', array()); ?>
                            <?php echo $form->textArea($model, 'content', array('class' => "form-control", "placeholder" => "Enter content")); ?>
                        </div>
                        <div class="form-group" id="banner_content" style="display: none">
                            <?php echo $form->labelEx($model, 'banner', array()); ?>
                            <?php echo $form->fileField($model, 'banner', array('class' => "form-control")); ?>
                            <br />
                            <?php echo $form->labelEx($model, 'link', array()); ?>
                            <?php echo $form->textField($model, 'link', array('class' => "form-control")); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'status', array()); ?>
                            <div class="">
                                <select class="form-control error" name="Ads[status]" id="Category_cat_status">
                                    <option value="0">Select...</option>
                                    <option value="1" <?php if ($model->status == 1) echo 'selected'; ?>>Active</option>
                                    <option value="0" <?php if ($model->status == 0) echo 'selected'; ?>>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="ads_button" class="btn btn-primary">Submit</button>
                        </div>
                        
                    </div><!-- /.box-body -->                    
                
            </div><!-- /.box -->

        </div><!--/.col (left) -->
        
        <?php $this->endWidget(); ?>

    </div>   <!-- /.row -->
</section><!-- /.content -->  