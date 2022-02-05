<?php
/* @var $this CustomerController */
/* @var $model MwpCustomer */

$this->breadcrumbs=array(
    'Domains'=>array('/administrator/domains'),
    'Customers'=>array('index'),
	 $model->id,
);
?>
<section class="content">
    <div class="row">
        <div class="col-lg-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Customer #<?php echo $model->id; ?></h3>
                </div>
                <div class="box-body">
                     <?php $this->widget('zii.widgets.CDetailView', array(
                         'data'=>$model,
                         'attributes'=>array(
                             'full_name',
                             'address',
                             'city',
                             'phone_no',
                             'email',
                             'created_at',
                         ),
                     )); ?>
                 </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Payments History</h3>
                </div>
                <div class="box-body">
                    <?php $this->widget('zii.widgets.CDetailView', array(
                        'data'=>$model,
                        'attributes'=>array(
                            'full_name',
                            'address',
                            'city',
                            'phone_no',
                            'email',
                            'created_at',
                        ),
                    )); ?>
                </div>
        </div>
    </div>
</section>