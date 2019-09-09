<div class="row">
    <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Customer Information</h3>
            </div>
            <div class="box-body">    
                <table class="table table-striped">
                    <tfoot>
                        <tr>
                            <td>Full Name.</td>
                            <td ><?php echo $model->member->fname . '  ' . $model->member->lname; ?></td>
                        </tr>
                        <tr>
                            <td>Email Address.</td>
                            <td ><?php echo $model->member->email; ?></td>
                        </tr>
                        <tr>
                            <td>Address.</td>
                            <td ><?php echo $model->member->address . '  ' . $model->member->city . '  (' . $model->member->zipcode . ')' ?></td>
                        </tr>
                        <tr>
                            <td>Phone No.</td>
                            <td ><?php echo $model->member->phone_office; ?></td>
                        </tr>

                        <tr>
                            <td>Mobile No.</td>
                            <td><?php echo $model->member->cellular; ?></td>
                        </tr>
                        <tr>
                            <td>Company.</td>
                            <td><?php echo $model->member->company_name; ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Billing Information</h3>
            </div>
            <div class="box-body">   
                <table class="table table-striped">
                    <tfoot>
                        <tr>
                            <td>Billing Name.</td>
                            <td ><?php echo $model->billing_name; ?></td>
                        </tr>
                        <tr>
                            <td>Address.</td>
                            <td ><?php echo $model->billing_address . '  ' . $model->billing_city . '  (' . $model->billing_zipcode . ')' ?></td>
                        </tr>
                        <tr>
                            <td>Phone No.</td>
                            <td ><?php echo $model->billing_phoneno; ?></td>
                        </tr>

                        <tr>
                            <td>Mobile No.</td>
                            <td><?php echo $model->billing_cellno; ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Shipping Information</h3>
            </div>
            <div class="box-body">   
               
                <table class="table table-striped">
                    <tfoot>
                        <tr>
                            <td>Billing Name.</td>
                            <td ><?php echo $model->shipping_name; ?></td>
                        </tr>
                        <tr>
                            <td>Address.</td>
                            <td ><?php echo $model->shipping_address . '  ' . $model->shipping_city . '  (' . $model->shipping_zipcode . ')' ?></td>
                        </tr>
                        <tr>
                            <td>Phone No.</td>
                            <td ><?php echo $model->shipping_phoneno; ?></td>
                        </tr>

                        <tr>
                            <td>Mobile No.</td>
                            <td><?php echo $model->shipping_cellno; ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
            <div class="col-lg-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Additional Comments</h3>
                </div>
                <div class="box-body">
                <div class="form-group"> 
                        <?php echo CHtml::decode($model->comments); ?>
                </div>
                </div>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Payment Information</h3>
                </div>
                <div class="box-body">   
                    
                    <table class="table table-striped">
                        <tfoot>
                            <tr>
                                <td>Payment Method.</td>
                                <td ><?php echo $model->payment_type; ?> </td>
                            </tr>
                            <tr>
                                <td>Account Title</td>
                                <td><?php echo $bankModel->account_title; ?></td>
                            </tr>
                            <tr>
                                <td>Account No.</td>
                                <td><?php echo $bankModel->account_no; ?></td>
                            </tr>

                            <tr>
                                <td>Service Charges <b><?php echo $bankModel->charges; ?> %</b></td>
                                <td><?php echo number_format($service_charges, 0) ?></td>
                            </tr>
                            <tr>
                                <td>Total Amount.</td>
                                <td  aligin="left"><?php echo number_format($total + $service_charges, 0); ?> PKR</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>