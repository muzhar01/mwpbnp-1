
<div class="container">
	<?php include('submenu.php');?>

<div class="container" style="background: #fff">
<div style="display: flex; justify-content:space-between;">
  <div style="margin: auto">
    <h1>List Of Vendors</h1>
  </div>
	<div >
    <button style="margin-top:20px; margin-right:60px;" class="btn btn-danger" id="print">Print this List</button>
  </div>
 </div>                                                                                     
  <div class="table-responsive">          
  <table class="table">
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