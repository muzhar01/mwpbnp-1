<?php
$this->breadcrumbs = array(
    'My Profile',
);
?>
 <section class="content">
<div class="box box-danger">
            <div class="box-header with-border">
              <h2 class="box-title">My Profile</h2>
              <?php echo CHtml::link('<i class="fa fa-user-md"></i> Edit Profile', '/administrator/profile/edit', array('class' => 'btn btn-primary no-margin pull-right')); ?>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                
                
				<?php if(Yii::app()->user->hasFlash('success')):?>
			         <div class="flash-success">
			            <?php echo Yii::app()->user->getFlash('success'); ?>
			         </div>
			      <?php endif; ?>
			     <?php if(Yii::app()->user->hasFlash('error')):?>
			         <div class="flash-error">
			            <?php echo Yii::app()->user->getFlash('error'); ?>
			         </div>
			      <?php endif; ?>
				<?php
					$this->widget('zii.widgets.CDetailView', array(
					    'data' => $model,
					    'attributes' => array(
					        'name',
					        'address',
					        'city',
					        'state',
					        'zipcode',
					        'phone_number',
					        array('header' => 'Status', 'name' => 'status', 'value' => ($model->status) ? 'Active' : 'Block'),
					        'email_address',
					        'username',
					        array('header' => 'Password', 'type' => 'Raw', 'name' => 'Password', 'value' => '<a href="/administrator/changepassword" class="btn btn-danger"> <i class="fa fa-lock"></i> Change Password</a>'),
					        array('header' => 'Registration Date', 'type' => 'Raw', 'name' => 'create_on', 'value' => date("M, d Y h:i:s a", $model->create_on)),
					        array('header' => 'Last Login Date', 'type' => 'Raw', 'name' => 'lastlogin_on', 'value' => date("M, d Y h:i:s a", $model->lastlogin_on)),
					       // array('header' => 'Affiliate ', 'name' => 'Affiliate_id', 'value' => 'No'),
					    ),
					));
					?>

				</div>
              </div>
             </div>
	</div>
	</section>




