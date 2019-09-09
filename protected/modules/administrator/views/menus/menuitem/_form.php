    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'menu-item-form',
        'enableAjaxValidation' => true,
            ));
    ?>

<div class="box-body">

    <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'label'); ?>
        <?php echo $form->textField($model, 'label', array('class' => 'form-control', 'size' => 30, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'label'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'parent_id'); ?>
        <?php
        $listing = Menu::model()->formatArray(Menu::model()->getItemsV2($model->menu_id));
        echo $form->dropDownList($model, 'parent_id', $listing, array('class' => 'form-control','empty' => 'None')); ?>
        <?php echo $form->error($model, 'parent_id'); ?>
    </div>

    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <?php echo $form->labelEx($model, 'menu_type'); ?>
        <?php
        $list = CHtml::listData(Lookup::model()->findAll(array('condition'=>"type='menutype'")), 'code', 'name');
        
        echo $form->dropDownList($model, 'menu_type', $list,array(
                'class' => 'form-control',
                'empty' => 'Select Content',
                'ajax' => array(
                'type'=>'POST', //request type
                'url'=>CController::createUrl('/administrator/menus/menuitem/getContents'), //url to call.
                'update'=>'#content_type', //selector to update
                //'data'=>'js:javascript statement'

                ))); ?>
        <?php echo $form->error($model, 'menu_type'); ?>
                </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12" style="margin-top:24px;" id="content_type">
            <div class="form-group">
                <?php if(!$model->isNewRecord){?>
                <?php
                    echo MenuItem::model()->getModelContents($model->menu_type,$model);
                ?>
                <?php }?>
            </div>
            </div>
        <span id="MenuItem_url"></span>
    </div>

    <div class="form-group" id="access">
        <?php echo $form->labelEx($model, 'access'); $GLOBALS['packageid']?>
        <?php
        $result = explode(",", trim($model->access, ","));
        $checked_permitions = array();
        foreach ($result as $key => $r) {
            $checked_permitions[$r] = 1;
        }
        if($GLOBALS['packageid']=='99999'){
           
            echo CHtml::checkBoxList('MenuItem[access][]',
                array_keys($checked_permitions),
                array('0' => 'Public', '1' => 'Member Area','2' => 'Affiliates','3' => 'JV Partners','4' => 'Products Partners','5' => 'Domain Users'),
                array(
                    'separator'=>'',
                    'template'=>'{input}{label}',
                    'class' => '',
                    'labelOptions'=>array(
                            'style'=> '
                                padding-left: 5px;
                                padding-right: 10px;
                                display: inline;
                                font-weight: normal;
                            '),
                    'style' => 'margin-top: 5px;'
                )
            );
        }else
        {
            
            echo CHtml::checkBoxList('MenuItem[access][]',
                array_keys($checked_permitions),
                array('0' => 'Public', '1' => 'Member Area', '2' => 'Affiliates', '3' => 'JV Partners', '4' => 'Products Partners'),
                array(
                    'separator'=>'',
                    'template'=>'{input}{label}',
                    'class' => '',
                    'labelOptions'=>array(
                            'style'=> '
                                padding-left: 5px;
                                padding-right: 10px;
                                display: inline;
                                font-weight: normal;
                            '),
                    'style' => 'margin-top: 5px;'
                )
            );
        }
        ?>
        <br>

       <?php echo $form->error($model, 'published'); ?>
        <div class="clear"></div>
        <p class="hint">if option is private then this link is only visible in member area</p>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'target'); ?>
        <?php echo $form->dropDownList($model,'target', array(''=>'Open in same window','_blank'=>'Open is new window'),array('class' => 'form-control',)); ?>
        <?php echo $form->error($model, 'target'); ?>
    </div>
   <div class="form-group">
        <?php echo $form->labelEx($model, 'published'); ?>
        <?php
        echo $form->radioButtonList($model, 'published', array('1' => 'Yes',
            '0' => 'No'), array(
            'template' => '{input}{label}',
            'separator' => '',
            'labelOptions' => array('style' => 'float: left;padding: 2px 10px;width: auto;'),
            'style' => 'float:left;',

                )
        );
        ?>
        <?php echo $form->error($model, 'published'); ?>
    </div>

    </div>

    <div class="box-footer">
    <?php echo $form->hiddenField($model, 'menu_id'); ?>
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
    </div>
<?php $this->endWidget(); ?>

<script type="text/javascript">
    $('#MenuItem_access_0').click(function(){

        if($(this).is(':checked')){

            var boxes = $('#MenuItem_access input[type="checkbox"][value!=0]:checked');

            $(boxes).each(function(index, elm){
                boxes[index].checked = false;
                boxes[index].removeAttribute("checked");
            });
        }

    });
    $('#MenuItem_access input[type="checkbox"][value!=0]').click(function(){

        if( $('#MenuItem_access_0').is(':checked') ){
            $('#MenuItem_access_0').attr("checked", false);
        }

    });
</script>

