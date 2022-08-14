
<div class="row">
    <div class="col-lg-12">
        <h1> Products </h1> <br> <br>
        <div class="row">
            <?php foreach ($model as $row){?>
            <div class="col-lg-3">
                <div class="card" style="width: 18rem;">
                    <?php echo
                    (!empty($row->image)) ?  CHtml::image($this->publicPath.'/products/' .$row->image,"image",array('class'=>'card-img-top'))
                        : CHtml::image(Yii::app()->request->baseUrl.'/images/products/no-image.png',"image",array('class'=>'card-img-top'));
                    ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row->name?></h5>
                        <p class="card-text"><?php
                            echo readMoreHelper($row->description);
                            ?></p>
                        <a href="/product/details/<?php echo $row->slug?>" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <?php }?>


        </div>
    </div>
</div>
<?php function readMoreHelper($story_desc, $chars = 200) {
    $story_desc = substr($story_desc,0,$chars);
    $story_desc = substr($story_desc,0,strrpos($story_desc,' '));
    $story_desc = $story_desc."...";
    return $story_desc;
}
?>