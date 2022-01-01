<!-- Main content -->
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
                    <h3 class="box-title">Signal</h3>
                </div><!-- /.box-header -->
				<?php echo $form->errorSummary($model); ?>
                <div class="box-body">
                    <div class="tab-content">
                    	
                        <?php
						foreach(Yii::app()->user->getFlashes() as $key => $message) {
							echo '<div class="alert alert-' . $key . '">' . $message . "</div>\n";
						}
						?>
        
                        <div class="tab-pane fade active in" id="general">
                            <div class="row">
                            <div class="col-md-6">
                                                
                            <div class="form-group">
                            	<?php echo $form->labelEx($model, 'market_id', array()); ?>
                            	<?php echo CHtml::dropDownList('Posts[market_id]', $model->market_id, $market, array('empty' => 'Select...', 'class' => "form-control")); ?>
                        	</div>
                            
                            <div class="form-group">
                            	<?php echo $form->labelEx($model, 'section_id', array()); ?>
                            	<?php echo CHtml::dropDownList('Posts[section_id]', $model->section_id, $section, array('empty' => 'Select...', 'class' => "form-control")); ?>
                        	</div>
                            
                            <div class="form-group">
                            	<?php echo $form->labelEx($model, 'buy_sell', array()); ?>
                            	<?php echo CHtml::dropDownList('Posts[buy_sell]', $model->buy_sell, array('Buy'=>'Buy','Sell'=>'Sell'), array('empty' => 'Select...', 'class' => "form-control")); ?>
                        	</div>
                        
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'entry_level', array()); ?>
                                <?php echo $form->textField($model, 'entry_level', array('class' => "form-control", "placeholder" => "Enter sell")); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'stop_loss', array()); ?>
                                <?php echo $form->textField($model, 'stop_loss', array('class' => "form-control", "placeholder" => "Enter sell")); ?>
                            </div>
                            </div>
                            <div class="col-md-6">
                            
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'take_profit1', array()); ?>
                                <?php echo $form->textField($model, 'take_profit1', array('class' => "form-control", "placeholder" => "Enter sell")); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'take_profit2', array()); ?>
                                <?php echo $form->textField($model, 'take_profit2', array('class' => "form-control", "placeholder" => "Enter sell")); ?>
                            </div>
                            
                            <?php if(!$model->isNewRecord) { ?>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'profit_in_pips', array()); ?>
                                <?php echo $form->textField($model, 'profit_in_pips', array('class' => "form-control", "placeholder" => "Enter sell")); ?>
                            </div>
                            <?php } ?>
                            
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'remarks', array()); ?>
                                <?php echo $form->textArea($model, 'remarks', array('class' => "form-control", "placeholder" => "Enter remarks")); ?>
                            </div>

                                <div class="form-group">
                                <?php echo $form->labelEx($model, 'closing_hours', array()); ?>
                                <?php echo $form->dropDownList($model,'closing_hours',array(""=>"Please Select",1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10), array('class' => "form-control", "placeholder" => "Enter remarks")); ?>
                            </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($model, 'expired', array()); ?>
                                    <?php echo $form->checkbox($model, 'expired', array('class' => "form-control", "placeholder" => "Enter remarks")); ?>
                                </div>
                            
                            <div class="form-group">
                                <button type="submit" name="post_button" class="btn btn-primary">Publish</button>
                                <button type="reset" name="post_button" class="btn btn-danger">Reset</button>
                            </div>
                            
                            </div>
                            </div>
                    	</div>
                    </div>  
                    <br clear="all" />  
                </div><!-- /.box-body -->                    
            </div><!-- /.box -->

        </div><!--/.col (left) -->
        
        <?php $this->endWidget(); ?>

    </div>   <!-- /.row -->
</section><!-- /.content -->
<script>
$(function(){
	var url = document.location.toString();
	if (url.match('#')) {
		$('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
	}
	
	$("ul.nav-tabs a").click(function (e) {
	  e.preventDefault();  
		$(this).tab('show');
	});
	
	<?php if( $model->isNewRecord ) { ?>
	$('.nav-tabs a').on('shown.bs.tab', function (e) {
		window.location.hash = e.target.hash;
		var h = '<?php echo Yii::app()->createUrl('post/create'); ?>'+e.target.hash;
		$('#category-form').attr('action', h );
	})
	<?php } else { ?>
	$('.nav-tabs a').on('shown.bs.tab', function (e) {
		window.location.hash = e.target.hash;
		var h = '<?php echo Yii::app()->createUrl('post/update', array('id'=>$model->id)); ?>'+e.target.hash;
		$('#category-form').attr('action', h );
	})
	<?php } ?>

	var counter = 0;
	
	$('#addDetailTr').click(function(){
		
		var tr = 'image-row'+ counter++;
		$('#myDetailTr').append('<tr id="'+tr+'"><td><input type="text" name="PostDetail[size][]" class="form-control" /></td><td><input type="text" name="PostDetail[color][]" class="form-control" /></td><td><span class="input-group" style="width:120px"><span class="input-group-addon"><?php echo CURRENCY; ?></span><input type="text" name="PostDetail[special_price][]" class="form-control" /></span></td><td><span class="input-group" style="width:120px"><span class="input-group-addon"><?php echo CURRENCY; ?></span><input type="text" name="PostDetail[original_price][]" class="form-control" /></span></td><td><textarea name="PostDetail[content][]" class="form-control"></textarea></td><td><img class="imghover" onClick="$(\'#'+tr+'\').remove();" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/minus.png" width="30" /></td></tr>');
	});
	
	$('#addImgTr').click(function(){
		
		var tr = 'image-row'+ counter++;
		$('#myImgTr').append('<tr id="'+tr+'"><td><input type="file" name="PostAttachment[attachment][]" class="form-control"></td> <td><input min="1"  value="1" type="number" name="PostAttachment[sort_order][]" class="form-control" required="required" style="width:90px;"></td><td><img class="imghover" onClick="$(\'#'+tr+'\').remove();" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/minus.png" width="30" /></td></tr>');
	});
});
</script>