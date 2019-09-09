<!--Modified by me-->

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Item</th>
                      <th>Status</th>
                      <th>Created Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$orders,
                        'summaryText' => '',
                        'itemView'=>'_orders',   // refers to the partial view named '_post'
                    )); ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive --> 
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix"> 
                <?php echo CHtml::link( 'View All Orders',$this->createUrl('/administrator/products/orders'),array('class' => 'btn btn-sm btn-default btn-flat pull-right') ); ?>
            </div>
            <!-- /.box-footer --> 
          </div>
          <!-- /.box --> 