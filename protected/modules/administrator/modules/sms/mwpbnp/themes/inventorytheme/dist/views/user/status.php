<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
            <small>Status</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">User</a></li>
            <li class="active">Status</li>
        </ol>
    </section>
    
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

    
                    
                
</aside><!-- /.right-side -->