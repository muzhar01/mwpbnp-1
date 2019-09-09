<li class="dropdown user user-menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/user2-160x160.jpg" class="user-image" alt="User Image"/><span class="hidden-xs"><?php echo ucfirst( Yii::app()->user->name ); ?></span></a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/user2-160x160.jpg" class="img-circle" alt="User Image" />
                <p> <?php echo ucfirst( Yii::app()->user->name ); ?> - Administrator</p>
                 <p class="time"><?php echo  date('Y-m-d H:i:s');?></p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left"><a href="<?php echo Yii::app()->getBaseUrl() ?>/inventory/profile" class="btn btn-default btn-flat">Profile</a></div>
                <div class="pull-right"><a href="<?php echo Yii::app()->getBaseUrl() ?>/inventory/logout" class="btn btn-default btn-flat">Sign out</a></div>
              </li>
            </ul>
          </li>