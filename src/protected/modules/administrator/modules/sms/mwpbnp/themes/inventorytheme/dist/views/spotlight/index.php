<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="<?php echo Yii::app()->createUrl('post/view'); ?>">Spotlight(s)</a>
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::app()->createUrl('admin/dashboard'); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::app()->createUrl('post/view'); ?>">Spotlight(s)</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Spotlights</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->

