<h2><?php echo $this->name;?></h2>
<?php if(count($this->getWeblinks()) > 0){?>
<ul class="asidebar-list">
    <?php 
    foreach($this->getWeblinks() as $data): ?>
            <li><?php  echo CHtml::link($data->title, $data->url,array('target'=>'_blank'));?>
                   </li>
    <?php endforeach; ?>
</ul>
<?php } ?>
