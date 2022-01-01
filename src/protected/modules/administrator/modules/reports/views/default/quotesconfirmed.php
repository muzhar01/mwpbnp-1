<?php
/* @var $this BanksController */
/* @var $model Banks */

$pageSize = Yii::app ()->user->getState ('pageSize', 50);
$this->breadcrumbs = array(
                    'Quotes Confirmed' => array('index'),
                    'Manage',
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class="box-title">Quotes Confirmed</h1>
                    </div>
        <div class="box-body">
         <div class="otherArea">
                <a class="btn btn-success" href="exportquotesconfirmed">export</a>
            <a class="btn btn-danger" onClick="printData()">Print List</a>
         </div>
            <table class="table table-bordered table table-striped">
                <thead>
                    <tr>
                        <th id="members-grid_c0">Quote Id</th>
                        <th id="members-grid_c2">Business Name</th>
                        <th id="members-grid_c3">Quote Value</th>
                        <th id="members-grid_c4">Amount Paid</th>
                        <th id="members-grid_c5">Payment Method</th>
                        <th id="members-grid_c6">Remarks</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $date = date('Y-m');
                $data = Quotes::model()->findAll(
                    'created_on like :created_on and status = :quote',
                    [':created_on'=>"%$date%", ':quote'=>'Confirmed']
                );
                $even = true;
                foreach ($data as $key => $value) {
                    $member = Members::model()->findByPk($value->member_id);
                    $payment = CustomerPayments::model()->find(
                        'invoice_no = :invoice_no',
                        [':invoice_no'=>$value['quote_id']]
                    );
                    echo "<tr class='".($even ? 'even' : 'odd')."'>
                        <td>".$value['quote_id']."</td>
                        <td>".$member['lname']."</td>
                        <td>".$value['quote_value']."</td>
                        <td>".(!empty($payment) ? $payment->amount_paid : '0')."</td>
                        <td>".(!empty($payment) ? $payment->payment_method : '-')."</td>
                        <td>".$value['comments']."</td>
                    </tr>";
                    if ($even) 
                        $even = false;
                    else 
                        $even = true;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script type="text/javascript">
    
function printData()
{
    $(".otherArea").css('display','none');
    window.print();
   // var divToPrint=document.getElementById("printTable");
   // newWin= window.open("");
   // newWin.document.write(divToPrint.outerHTML);
}
window.onafterprint = function(){
    $(".otherArea").css('display','block');
}
</script>

