
<div class="container">
		<div class="view list-view">
  <div class="row">
	  	<div class="heading-holder">
	  		<div class="col-lg-3">
	     		<?php echo CHtml::encode($data->getAttributeLabel('Company Name')); ?>
	     	</div>
		      <div class="col-lg-3">
		     	<?php echo CHtml::encode($data->getAttributeLabel('Contact Number')); ?>
		     </div>
	  		<div class="col-lg-3">
	  			<?php echo CHtml::encode($data->getAttributeLabel('Current Blance')); ?>

	  		</div>
	  	</div>
  	</div>
  	<div class="row data">
  	  <div class="data-holder">
  	  	<div class="col-lg-3"><?php echo CHtml::encode($data->companyName); ?></div>
  	 	<div class="col-lg-3"><?php echo CHtml::encode($data->contactOne); ?></div>
  	 	<div class="col-lg-3"><?php echo CHtml::encode($data->current_balance); ?></div>
  	  </div>
  	</div>
</div>
</div>
