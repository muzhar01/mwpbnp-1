<div class="box box-solid box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Top 5 customers</h3>
    </div>
    <div class="box-body">
         <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Orders</th>
            </tr>

            </thead>
            <tbody>
            <?php
            if(count($customers)){
                foreach ($customers as $customer){?>
                    <tr>
                        <td><?php echo $customer['name'] ?> </td>
                        <td><?php echo $customer['total'] ?> </td>
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
        <a href="/administrator/members" class="uppercase">View All more</a>
    </div>
</div>
