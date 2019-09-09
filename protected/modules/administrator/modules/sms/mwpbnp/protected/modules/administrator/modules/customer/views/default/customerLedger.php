<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Sales Management'
);
?>
<style>
table tbody 
{
   overflow: auto;
   
}

</style>
<section class="content">
    <div class="box box-danger">   
        <div class="box-header">
            <div class="row" style="margin-left:15px; margin-right:15px">
              <h3 style="margin-left: 10px">Customer Ledger</h3>
              <form action="<?php echo Yii::app()->getBaseUrl();?>/administrator/customer/default/ledgers" method="post">
                <div class="col-lg-2 col-md-2 col-sm-12">
                    <input class="form-control" size="60" maxlength="100" placeholder="Name" name="name" id="customerName" type="text">
                </div>
                <div class="col-lg-1 col-md-2 col-sm-12">
                  <input class="form-control" size="20" maxlength="10" placeholder="ID" name="id" id="customer_id" type="text">
                </div>
                <div class="col-lg-1 col-md-2 col-sm-12">
                    <input class="btn btn-primary" type="submit" name="searchCust" value="Search"> 
                  </div>
                
              </form>
              </div>
            <div class="box-body">
                <div class="row"> 
                    <div class="col-md-4 col-sm-5 col-xs-12">
                      <div class="table-responsive" >
                        <table class="table table-bordered table-hover cust">
                          <thead style="display: block;">
                            <tr>
                              <th style="width:100%">Company Name</th>
                              <th>Balance</th>
                            </tr>
                          </thead>
                          <tbody style="display: block;height: 66vh;">
                        <?php foreach($customer as $customers){  ?>
                            <tr id="<?= $customers['id'];?>" onclick="javascript:memberDetails(this.id)">
                              <td class="col-xs-12"><?= $customers['lname']; ?></td>
                              <td><?= $customers['current_balance']; ?></td>
                            </tr>
                        <?php } ?>
                          </tbody>
                          <tfoot> 
                          </tfoot>
                        </table>
                      </div>
                    </div><!-- /.col -->
                    <div class="col-md-8 col-sm-6 col-xs-12 " style="border:1px solid #ccc;padding: 15px;">
                        
                        <div class="row">
                            <div class="col-xs-4">
                                <h4>Customer Information</h4>
                            </div>
                            <div class="col-xs-8">
                                <input type="text" name="address" value="Address" id="addr" size="60">
                            </div>
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-hover table-info">
                                      
                                      <tfoot> 
                                      </tfoot>
                                    </table>
                                  </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                        <div class="search-form">

                        </div>
                        <?php

                        $this->widget('zii.widgets.grid.CGridView', array(
                            'id' => 'customer-grid',
                            'dataProvider' => $model->search(),
                            //'enableSorting' => false,
                            'pager' => array('header' => '', 'htmlOptions' => array('class' => 'pagination pagination-sm no-margin pull-right')),
                            'pagerCssClass' => 'box-footer clearfix',
                            'columns' => array(
                                array('name' => 'type', 'value' => 'CHtml::link($data->type, "/administrator/customer/type/".$data->type)', 'type' => 'raw'),
                                array('name' => 'num', 'value' => '$data->num'),
                                array('name' => 'date', 'value' => '$data->date'),
                                array('name' => 'payment_method', 'value' => '$data->payment_method'),
                                array('name' => 'amount', 'value' => '$data->amount'),
                                array('name' => 'netamount', 'value' => '', 'htmlOptions' => array('style' => 'display:none'), 'headerHtmlOptions' => array('style' => 'display:none'),),

                            ),
                        ));
                        ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function memberDetails(id){
        var id = id;
        $.ajax({
            url : '<?php echo Yii::app()->getBaseUrl();?>/administrator/customer/customer/memberz',
            data : {id: id},
            method: 'post',
            success: function(data){
              data = JSON.parse(data);
                $('#addr').val(data.address)
                $('.table-info').empty();
                  $('.table-info').append('<tbody ><tr>'+
                                          '<td>Customer Name</td>'+
                                          '<td>'+data["fname"]+'</td>'+
                                          '<td>Company Name</td>'+
                                          '<td>'+data["lname"]+'</td>'+
                                          '<td>Email</td>'+
                                          '<td>'+data["email"]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                          '<td>Contact Office</td>'+
                                          '<td>'+data["phone_office"]+'</td>'+
                                          '<td>Contact Residance</td>'+
                                          '<td>'+data["phone_res"]+'</td>'+
                                          '<td>Contact Fax</td>'+
                                          '<td>'+data["fax_no"]+'</td>'+
                                        '</tr>'+
                                        '<tr>'+
                                          '<td>Cell One</td>'+
                                          '<td>'+data["cellular"]+'</td>'+
                                          '<td>Cell 2</td>'+
                                          '<td>'+data["cellular2"]+'</td>'+
                                          '<td>Cell 3</td>'+
                                          '<td>'+data["cellular3"]+'</td>'+
                                        '</tr>'+
                                      '</tbody>');
            }
        });


        $.ajax({
            url : '<?php echo Yii::app()->getBaseUrl();?>/administrator/customer/customer/membertrans',
            data : {id: id},
            method: 'post',
            success: function(data){
              
              
              data = JSON.parse(data);
              totalResult = data.length;
              var res = 'Displaying 1-'+totalResult+' of '+ totalResult;
              var netamount;
              $('#customer-grid .summary').html(res);
                $('#customer-grid table tbody').empty();

                $('#customer-grid_c5').css('display', 'table-cell');

                $.each(data, function(index, item){

                  if(item.type == 'Invoice' || item.type == 'Payment Return'){
                    if(index == 0){
                      netamount = parseFloat(item.amount);
                    }else{
                      netamount = parseFloat(item.amount) + parseFloat(netamount);
                    }
                  }
                  if(item.type == 'Payment' || item.type == 'Goods Return'){
                    if(index == 0){
                      netamount = parseFloat(-item.amount);
                    }else{
                      netamount = parseFloat(netamount) - parseFloat(item.amount);
                    }
                  }
                  $('#customer-grid table tbody').append('<tr class="odd"><td><a href="/administrator/customer/type/Invoice">'+item.type+'</a></td><td>'+item.num+'</td><td>'+item.date+'</td><td>'+item.payment_method+'</td><td>'+item.amount+'</td><td>'+netamount.toFixed(2)+'</td></tr>');
                })
            }
        })



    }
</script>