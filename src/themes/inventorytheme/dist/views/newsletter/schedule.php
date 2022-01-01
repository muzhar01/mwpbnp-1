<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('newsletter/view'); ?>">Newsletter(s)</a>
            <small>Schedule</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('newsletter/view'); ?>">Newsletter(s)</a></li>
            <li class="active">Schedule</li>
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
 
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Schedule</h3>
                </div><!-- /.box-header -->
                <?php
                echo '<div class="box-body">'.$form->errorSummary($setting).'</div>'; 
                ?>
                    <div class="box-body">
                    
                    <?php
                    foreach(Yii::app()->user->getFlashes() as $key => $message) {
                        echo '<div class="alert alert-' . $key . '">' . $message . "</div>\n";
                    }
                	?>
                    <div class="form-group">
                    
					<?php $today = strtotime(date('d-m-Y')); ?>
                    <?php $schedule = strtotime($setting->schedule); ?>
                    <?php if($schedule < $today) {  echo '<div class="alert alert-warning">Warning! Schedule time expired.</div>'; } ?>
					<?php if(!empty($setting->schedule)) {  echo '<div class="alert">Time schedule: '. date('d M, Y',$schedule).'</div>'; } ?>
                    </div>
                       
                        <div class="form-group">
                            <?php echo $form->labelEx($setting, 'schedule'); ?>
                            <?php echo $form->textField($setting, 'schedule', array('class' => "form-control", 'id'=>'reservation', 'placeholder'=>'DD-MM-YYYY', 'value'=>$setting->schedule)); ?>
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
</div><!-- ./wrapper -->
<script type="text/javascript">
$(function () {

	$('#reservation').datepicker({ format: "dd-mm-yyyy"});

});
</script>


