<?php
$this->breadcrumbs = array(
    'Vendor' => array('index'),
    'Print',
);
?>
<section class="content">
	<div class="box box-info">
        <div class="box-header with-border">
            <h1 class="box-title">Print Vendors</h1>
            <a class="btn btn-danger pull-right" id="print"><i class="fa fa-print"></i> Print</a>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Company Name</th>
                        <th>Contact Number</th>
                        <th>Current Balance</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($vendors as $vendor){ ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $vendor['companyName']; ?></td>
                            <td><?= $vendor['contactOne']; ?></td>
                            <td><?= $vendor['current_balance']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
  $(function(){
    $('#print').on('click', function(){
      $(this).hide();
      window.print();
    })

    $('.cancel').on('click', function(){
      $('#print').show();
    })
  })
</script>