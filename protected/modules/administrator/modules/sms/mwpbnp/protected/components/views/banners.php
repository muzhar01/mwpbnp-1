<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(count($this->getBanners()) > 0){?>

<div class="row">
    <?php 
    
    
    foreach($this->getBanners() as $data): ?>
            <div class="col-lg-12"><?php 
                    echo CHtml::link(CHtml::image('/images/banners/'.$data->banner_url, 'Ads',array('class'=>'img-responsive')), $data->url,array('target'=>'_blank')); ?>
            </div>
    <?php endforeach; ?>
</div>
<?php } ?>
