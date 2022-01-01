
<aside class="asidebar">
    <?php if (!yii::app()->user->isGuest) { ?>
        <?php
        $this->widget('UserMenu');
        } else{
    ?>
    <?php $this->widget('Externallinks', array('name' => 'Intro Links',)); ?>
    <?php }?>

    <h2>Catalogue</h2>
    <a href="https://www.mwpbnp.com/downloads/Catalogue-mwpbnp.com.pdf" download>
        <img style="width: 257px;
            margin-left: -8px;
            margin-top: -23px;
            margin-bottom: 10px;" src="/themes/mwpbnp/images/catalogue_image.png" alt="">
    </a>
    <h2>Intro Video</h2>
   <!--  <iframe width="100%" height="100%" src="https://www.youtube.com/watch?v=ESaIZssjCqw" frameborder="0" allowfullscreen></iframe> -->
    <iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/ESaIZssjCqw?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
 </aside> 
