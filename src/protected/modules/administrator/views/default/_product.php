          <!-- PRODUCT LIST -->
          <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Top 5 Selling Products</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Sales/Orders</th>
                        </tr>

                    </thead>
                    <tbody>
                    <?php
                    if(count($products)){
                        foreach ($products as $product){?>
                            <tr>
                                <td><?php echo $product['name'] ?> </td>
                                <td><?php echo $product['total'] ?> </td>
                            </tr>
                        <?php }
                    }
                    else{?>
                        <tr><td colspan="2"> No data found</td></tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="/administrator/products/products" class="uppercase">View All more</a>
            </div>
            <!-- /.box-footer --> 
          </div>
          <!-- /.box --> 
<!--Modified by me-->