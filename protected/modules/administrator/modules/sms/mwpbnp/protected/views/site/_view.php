<?php /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ ?>
<div class="row">

    <div class="col-lg-6"><h3>
        <?php echo CHtml::encode($data->title)?></h3>
        <p><?php echo CHtml::encode($data->description);?></p>
    </div>
    <div class="col-lg-6"><?php echo $data->file_url;?></div>
    
</div>

