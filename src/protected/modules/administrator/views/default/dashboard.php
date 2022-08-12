<?php
/* $this->widget('ext.runactions.components.ERunActions', array(
  'interval' => 1,
  'logOutput' => true,
  )
  ); */
 // echo 11; die;
?>
<section class="content">

    <div class="box box-success">
        <div class="box-header">
            <h3>Welcome to <?php echo Yii::app()->name?></h3>
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo RmpSubscribers::model()->count(); ?></h3>
                            <p>Subscribers</p>
                        </div>
                        <div class="icon"><i class="fa fa-archive"></i></div>
                        <a href="/administrator/marketing/default/members" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a></div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo Products::model()->count(); ?></h3>
                            <p>Products</p>
                        </div>
                        <div class="icon"><i class="fa fa-bar-chart"></i></div>
                        <a href="/administrator/products/products" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a></div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo Members::model()->count(); ?></h3>
                            <p>User Registrations</p>
                        </div>
                        <div class="icon"><i class="fa fa-user"></i></div>
                        <a href="/administrator/members" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a></div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3 id="unique_visitors"><?php echo Quotes::model()->count(); ?></h3>
                            <p>Total Quotes</p>
                        </div>
                        <div class="icon"><i class="fa fa-pie-chart"></i></div>
                        <a href="/administrator/orders" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a></div>
                </div>
                <!-- ./col -->
            </div></div>
        <!-- /.row -->
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?php $this->renderPartial('_saleschart',array('salesorders'=>$salesorders));?>
        </div>
        <div class="col-lg-6">
            <?php $this->renderPartial('_topcustomer',array('customers'=>$customers));?>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-6 connectedSortable">
            <div id="users"></div>
        </div>
        <div class="col-lg-6">
            <?php $this->renderPartial('_product',array('products'=>$products));?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?php if(Yii::app()->user->role == 1) {?>
                <div class="box box-solid box-success">
                    <div class="box-header with-border">
                        <i class="fa fa-map-marker"></i>
                        <h3 class="box-title">Cart Settings</h3>
                    </div>
                    <div class="box-body">
                        <div class="form">
                            <?php
                            $model= Settings::model()->findByPk(1);
                            $form = $this->beginWidget ('CActiveForm', array(
                                'id' => 'settings',
                                'enableAjaxValidation' => false,
                            ));
                            ?>
                            <div class="message"></div>
                            <div class="form-group ">
                                <?php echo $form->labelEx ($model, 'cart_settings'); ?> <br>
                                <?php
                                echo $form->radioButtonList ($model, 'cart_settings', array('1' => 'Active',
                                    '0' => 'Suspend'), array(
                                        'template' => '{input}{label}',
                                        'separator' => '',
                                        'labelOptions' => array('style' => 'padding: 2px 10px;width: auto;'),
                                        'style' => '',
                                    )
                                );
                                ?>
                                <?php echo $form->error ($model, 'cart_settings'); ?>
                            </div>
                            <div class="form-group ">
                                <?php
                                echo CHtml::ajaxSubmitButton('Update Settings',Yii::app()->createUrl('/administrator/default/settings'),
                                    array(
                                        'type'=>'POST',
                                        'success'=>'js:function(string){
                                        $(".message").html(string);
                                        }'
                                    ),array('class'=>'btn btn-success',));?>
                            </div>

                            <?php $this->endWidget (); ?>
                        </div>

                    </div>
                </div>
            <?php }?>
        </div>
    </div>


</section>
<style type="text/css">
    .users-list > li{
        width:16%;
    }
</style>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/chartjs/chart.min.js"></script>

<!-- Morris.js charts -->
<script type="text/javascript">
    $(function () {
        <?php
         echo (CHtml::ajax(array (
            'url'=>array('/administrator/default/ajaxgetusers'),
            'update'=>'#users',
            ))
         );
    ?>
       // show_sales_chart();
    });

</script>
