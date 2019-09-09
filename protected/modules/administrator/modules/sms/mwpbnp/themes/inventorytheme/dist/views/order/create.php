<aside class="right-side">
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('order/view'); ?>">Order(s)</a>
            <small>Add New</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('order/view'); ?>">Order(s)</a></li>
            <li class="active">Add New</li>
        </ol>
    </section>

    <?php echo $this->renderPartial('_form_order', 
				array(
					'model'=>$model, 
					'order' => $order,
					'products' => $products,
					'users' => $users,
				)); ?>

</aside><!-- /.right-side -->