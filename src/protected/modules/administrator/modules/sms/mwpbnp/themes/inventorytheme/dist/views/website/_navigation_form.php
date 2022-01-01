<!-- Main content -->
<section class="content">
    <div class="row"> 
        <div class="col-md-4">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Select</h3>
                </div><!-- /.box-header -->
                
                <div class="box-body">
					<?php
                        foreach(Yii::app()->user->getFlashes() as $key => $message) {
                            echo '<div class="alert alert-' . $key . '">' . $message . "</div>\n";
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
                    ?>
                	<?php //echo '<div class="box-body">'.$form->errorSummary($model).'</div>'; ?>
                
                        <div class="form-group">
                            <label for=""><input type="checkbox" name="select-all-category" value="1"> Category(s)</label><br />
                            <?php foreach($category as $cat) { ?>
                            <input type="checkbox" name="Category[]" value="<?php echo $cat->id; ?>"> <?php echo $cat->name; ?> <br />
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for=""><input type="checkbox" name="select-all-page" value="1"> Page(s)</label><br />
                            <?php foreach($pages as $p) { ?>
                            <input type="checkbox" name="Page[]" value="<?php echo $p->id; ?>"> <?php echo $p->title; ?> <br />
                            <?php } ?>
                        </div>
                        
                <div class="box-footer">
                    <input type="hidden" name="menu_id" value="<?php echo $menu->id; ?>" />
                    <button type="submit" name="cat_page_button" class="btn btn-primary">ADD</button>
                </div>
                <?php $this->endWidget(); ?>
                   </div>
                    
                    
                    <div class="box-footer"></div>
                
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'category-form',
                        'htmlOptions' => array(
                            'enctype' => 'multipart/form-data',
                            'role' => 'form'
                        ),
                    ));
                    ?>
                   <div class="box-header">
                        <h5 class="box-title">Link</h5>
                   </div><!-- /.box-header --> 
                   <div class="box-body">
                        <div class="form-group">
                            <label for="">URL</label><br />
                            <input class="form-control" type="text" name="Navigation[link]" value="http://">                            
                        </div>
                        <div class="form-group">
                            <label for="">Text Label</label><br />
                            <input class="form-control" type="text" name="Navigation[title]" value="">
                        </div>
                        
                        <input type="hidden" name="Navigation[menu_id]" value="<?php echo $menu->id; ?>" />
                        
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="link_button" class="btn btn-primary">ADD</button>
                    </div>
                <?php $this->endWidget(); ?>
            </div><!-- /.box -->

        </div><!--/.col (left) -->
        <div class="col-md-8">
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
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Sub Title</th>
                                        <th>URL</th>
                                        <th>Order</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($navigation as $m) { ?>
                                    <tr>
                                        <td><input name="title_<?php echo $m->id; ?>" type="text" value="<?php echo $m->title; ?>"></td>
                                        <td><input name="sub_title_<?php echo $m->id; ?>" type="text" value="<?php echo $m->sub_title; ?>"></td>
                                        <td><input name="href_<?php echo $m->id; ?>" type="text" value="<?php echo $m->link; ?>"></td>
                                        <td><input style="text-align: center;" size="2" name="order_<?php echo $m->id; ?>" type="text" value="<?php echo $m->order; ?>"></td>
                                        <td>
                                            <input name="menuid[]" type="hidden" value="<?php echo $m->id; ?>">
                                            <a onclick="return confirm('Are you sure?')" href="<?php echo Yii::app()->createUrl('website/navigationMDRemove', array('id'=>$m->id)); ?>"><i class="fa fa-trash-o"></i>Delete</a>
                                            <a href="<?php echo Yii::app()->createUrl('website/navigation', array('id'=>$id, 'sid'=>$m->id)); ?>"><i class="fa fa-plus"></i>Sub Menu</a>
                                        </td>
                                    </tr>
                                    <?php } ?>                                         
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                         <div class="box-footer">
                                <button type="submit" name="menu_button" class="btn btn-primary">Update</button>
                        </div>
                 </div><!-- /.box -->
               
                <?php $this->endWidget(); ?>

        </div><!--/.col (right) -->

    </div>   <!-- /.row -->
</section><!-- /.content -->