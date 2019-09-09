<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('website/navigation'); ?>">Navigation</a>
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('website/navigation'); ?>">Navigation</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('website/navigation_create'); ?>">Create new</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row"> 
            <div class="col-md-6">
                <!-- general form elements -->
                    <?php 
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'category-form',
                        'htmlOptions' => array(
                            'enctype' => 'multipart/form-data',
                            'role' => 'form'
                        ),
                    ));
                    ?>
                    
                     <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Menu Structure</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                            <?php
                                foreach(Yii::app()->user->getFlashes() as $key => $message) {
                                    echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
                                }
                            ?>
                            <?php echo $form->errorSummary($menu); ?>
                                <div class="form-group">
                                    <?php echo $form->labelEx($menu, 'name'); ?>
                                    <?php echo $form->textField($menu,'name',array('class'=>"form-control", "placeholder"=>"Enter the navigation name")); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($menu, 'status'); ?>
                                    <div class="">
                                        <select class="form-control error" name="Menu[status]" id="Menu_status">
                                            <option value="1" <?php if ($menu->status == 1) echo 'selected'; ?>>Active</option>
                                            <option value="0" <?php if ($menu->status == 0) echo 'selected'; ?>>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" name="menu_button" class="btn btn-primary">Submit</button>
                                </div>
                            </div><!-- /.box-body -->
                     </div><!-- /.box -->
                                
                   
                    <?php $this->endWidget(); ?>
    
            </div><!--/.col (right) -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Select</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($menues as $m) { ?>
                                        <tr>
                                            <td><a href="<?php echo Yii::app()->createUrl('website/navigation', array('id'=>$m->id)); ?>"><?php echo $m->name; ?></a></td>
                                            <td><?php echo($m->status == 1) ? 'Active':'Inactive' ?></td>
                                            <td><a onclick="return confirm('Are you sure?')" href="<?php echo Yii::app()->createUrl('website/navigationMRemove', array('id'=>$m->id)); ?>"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                        <?php } ?>                                         
                                    </tbody>
                                </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
    
            </div><!--/.col (left) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
                            
</aside><!-- /.right-side -->