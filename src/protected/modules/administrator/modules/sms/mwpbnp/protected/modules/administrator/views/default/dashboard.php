<?php
/* $this->widget('ext.runactions.components.ERunActions', array(
  'interval' => 1,
  'logOutput' => true,
  )
  ); */
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
                        <a href="/administrator/newsletter/rmpsubscribers" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a></div>
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
                        <a href="/administrator/products/orders" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a></div>
                </div>
                <!-- ./col -->
            </div></div>
        <!-- /.row -->
    </div>


    <div class="row">

        <section class="col-lg-7 connectedSortable">
            <div id="sales_map">
                <?php
                $graph = ProductsGraph::model()->getDaily();
                ?>
                <div class="nav-tabs-custom no">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right">
                        <li class="active"><a href="#revenue-chart" data-toggle="tab">Sales Graph</a></li>
                    </ul>

                    <div class="tab-content no-padding" style="text-align: center">

                    </div>

                </div>
                </div>

            <div id="users">
               <h1><i class="fa fa-spinner fa-pulse"></i></h1>
			</div>
            <?php if(Yii::app()->user->role == 1) {?>
                <div class="box box-solid">

                    <div class="box-header">
                        <!-- tools box -->

                        <!-- /. tools -->
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
                  <?php }?>
                    <div class="col-md-4">
                        <?php //include('_product.php'); ?>
                    </div>
        </section>
        <div id="worldmap">
           <!--  <section class="col-lg-5 connectedSortable">
           
           
               /.box
               Calendar
               <div class="box box-primary">
                <div class="box-header"><i class="fa fa-th"></i>
                               <h3 class="box-title">Weather Forcast</h3>
                               
                           </div>
                           <div class="box-body border-radius-none">
           
           
                                   <a href="https://www.accuweather.com/en/pk/islamabad/258278/current-weather/258278" class="aw-widget-legal">
                                       By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at https://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at https://www.accuweather.com/en/privacy.
                                   </a><div id="awtd1488637256603" class="aw-widget-36hour"  data-locationkey="" data-unit="f" data-language="en-us" data-useip="true" data-uid="awtd1488637256603" data-editlocation="true"></div><script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>
           
           
                           </div>
                           /.box-body
                           </div>
           
           </section> -->
            </div>

    </div>



</section>
<style type="text/css">
    .users-list > li{
        width:16%;
    }
</style>

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



    });

</script>
