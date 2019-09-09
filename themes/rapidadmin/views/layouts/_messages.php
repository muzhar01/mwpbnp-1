<?php
$Notification_counter=0;
$comments = count(Comment::model()->findAll(array('condition' => "content_type_id='5' AND `read` = 0 AND `posted_by` = 'M'")));
$blog_comments = count(Comment::model()->findAll(array('condition' => "content_type_id='2' AND `status` = 1")));
$content_comments = count(Comment::model()->findAll(array('condition' => "content_type_id='1' AND `status` = 1")));
$ask_question = count(Coachingboard::model()->findAll(array('condition' => "`read` = 0 AND `posted_by` = 'M'")));

if($comments>0){
    $Notification_counter++;
}
if($ask_question>0){
    $Notification_counter++;
}
if($blog_comments>0){
    $Notification_counter++;
}
if($content_comments>0){
    $Notification_counter++;
}

?>
<li class="dropdown notifications-menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i><span class="label label-warning"><?php echo $Notification_counter; ?></span></a>
    <ul class="dropdown-menu">
        <li class="header">
            <?php echo 'You have '. $Notification_counter .' notifications';
            ?>
        </li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <li><a href="/administrator/products/product"><i class="fa fa-comment-o"></i><?php if($comments){echo $comments;}else{echo $ask_question;}  ?> new comments on Coaching Board </a></li>
                <li><a href="/administrator/webpages/blog/comment"><i class="fa fa-comment-o"></i><?php echo $blog_comments;  ?> new comments on Blog </a></li>
                <li><a href="/administrator/webpages/comment"><i class="fa fa-comment-o"></i><?php echo $content_comments;  ?> new comments on Content </a></li>
            </ul>
        </li>

    </ul>
</li>