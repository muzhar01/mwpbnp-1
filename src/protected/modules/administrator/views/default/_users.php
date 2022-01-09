<!--Modified by me-->
<div class="box box-solid box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Customer</h3>
             
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <ul class="users-list clearfix">

              <?php foreach($users as $user) { ?>
                <li> 
                  <img class="img-circle" alt="User Image" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/user2-160x160.jpg">
                    <a href="/administrator/users/user/view/id/<?php echo $user->id; ?>" class="users-list-name">
                       <?php echo $user->fname." ".$user->lname; ?>
                    </a> 
                    <span class="users-list-date">
                        <?php echo date('Y-m-d',strtotime($user->created_date)); ?>
                    </span> 
                </li>
              <?php } ?>

              </ul>
              <!-- /.users-list --> 
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center"> <a class="uppercase" href="/administrator/members">View all customer</a> </div>
            <!-- /.box-footer --> 
          </div>
