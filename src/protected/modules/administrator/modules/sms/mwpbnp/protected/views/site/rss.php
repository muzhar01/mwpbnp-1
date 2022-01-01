<h1>Rss Feeds</h1>
<div class="shop-detail">
    
        <?php foreach ($model as $row){?>
    <div class="row grey-border-bottom">
        <div class="col-lg-6">
            <?php echo $row->name?>
        </div>
        <div class="col-lg-3"><a href="/widget/prices/<?php echo $row->slug?>" target="_blank">Current Price Table</a></div>
        <div class="col-lg-3"><a href="/widget/graph/<?php echo $row->slug?>"  target="_blank">Last 30 Days Graph</a></div>
    </div>
       
        <?php }?>
</div>