<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('post/view'); ?>">Post(s)</a>
            <small>Detail</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('post/view'); ?>">Post(s)</a></li>
            <li class="active">Detail</li>
        </ol>
    </section>
    
    <?php 
	$cat = new Category;
    $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'attributes'=>array(
                'id',
				'title',
				array('name'=>'category', 'value'=>$model->cat->name),                        
				array('name'=>'user_id', 'value'=>$model->user->detail->name),                        
				'sub_title',
				'material',
				'vendor',
				'variant_grams',
				array('name'=>'status', 'value'=>$model->status==1?'Active':'Inactive'),                        
                'slug',
                'timestamp',
            ),
        ));
    ?>
    <div class="row">
    <div class="col-md-12">
        <table id="example1" class="table table-bordered table-striped table-userbox">
            <thead>
            <tr>
                <th>Size</th>
                <th>Color</th>
                <th>Variant Price</th>
                <th>Variant Compare At Price</th>
                <th>Body HTML</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($model->detail as $detail) { ?>
            <tr>
                <td><?php echo $detail->size; ?></td>
                <td><?php echo $detail->color; ?></td>
                <td><?php echo CURRENCY; ?><?php echo $detail->special_price; ?></td>
                <td><?php echo CURRENCY; ?><?php echo $detail->original_price; ?></td>
                <td><?php echo $detail->content; ?></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    
    <table id="example1" class="table table-bordered table-striped table-userbox">
		<thead>
            <tr>
                <th>Picture</th>
                <th>Order</th>
            </tr>
        </thead>
        <tbody>
			<?php foreach($model->attachments as $attachment) { ?>
            <tr>
                <td><?php echo $attachment->sPic; ?></td>
                <td><?php echo $attachment->sort_order; ?></td>
            </tr>
            <?php } ?>
    	</tbody>
    </table>    
    </div>
    </div>            
</aside><!-- /.right-side -->