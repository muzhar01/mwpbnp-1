<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(count($this->getCategory()) > 0){?>
<h6><?php echo $this->name?></h6>
<ul>
    <?php 
    
    
    foreach($this->getCategory() as $category): ?>
	<li><?php 
            echo CHtml::link(CHtml::encode($category->label), '/product/listings'); ?></li>
	<?php endforeach; ?>
</ul>
<?php } ?>
