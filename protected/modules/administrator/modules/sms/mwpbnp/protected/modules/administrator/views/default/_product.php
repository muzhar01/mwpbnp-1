          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Products</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <?php $this->widget('zii.widgets.CListView', array(
                        'dataProvider'=>$products,
                        'summaryText' => '',
                        'itemsTagName'=>'ul',
                        'itemsCssClass'=>'products-list product-list-in-box',
                        'itemView'=>'_products',   // refers to the partial view named '_post'
                    )); ?>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center"> <a href="/administrator/products/product" class="uppercase">View All Products</a> </div>
            <!-- /.box-footer --> 
          </div>
          <!-- /.box --> 
<!--Modified by me-->