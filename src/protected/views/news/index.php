<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 ?>

<?php 

    $this->widget(
        'ext.feeds.YaSimpleFeed',
        array(
        'feedUrl'=>'https://www.geo.tv/rss/1/'.$id,
        // feedSpeed must be an INT (OPTIONAL, by default is 5)
        'total'=>20,
        // feedDirection must be a string as 'left','right,'up' or 'down' (OPTIONAL, by default is 'left')
        'description'=>true,
        )
    ); 
?>
