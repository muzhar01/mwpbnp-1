
<aside class="">
    <div class="sidebar-iframe">
        <?php if (!yii::app()->user->isGuest) { ?>
            <?php
            $this->widget('UserMenu');
            } else{
        ?>
        <?php $this->widget('Externallinks', array('name' => 'Intro Links')); ?>
        <?php }?>

        <div class="pt-25"></div>
        <a href="https://www.mwpbnp.com/downloads/Catalogue-mwpbnp.com.pdf" download>
            <img style="width: 100%;
                margin-top: -23px;
                margin-bottom: 10px;" src="/themes/mwpbnp/images/catalogue_image.png" alt="Download E - Catalogue" title="Download E - Catalogue">>
        </a>
        <div class="pt-25"></div>
    </div>
    <div class="sidebar-iframe">
    <!--  <iframe width="100%" height="100%" src="https://www.youtube.com/watch?v=uwjzT8lSrMo" frameborder="0" allowfullscreen></iframe> -->
        <iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/uwjzT8lSrMo?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

        <h2>Commercial</h2>
    </div>

    <div class="sidebar-iframe">
    <!--  <iframe width="100%" height="100%" src="https://www.youtube.com/watch?v=MQLo-xRZBKI" frameborder="0" allowfullscreen></iframe> -->
        <iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/MQLo-xRZBKI?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

        <h2>MWP Brief Intro </h2>
    </div>

    <div class="sidebar-iframe">
    <!--  <iframe width="100%" height="100%" src="https://www.youtube.com/watch?v=ETE7u4OHTc8" frameborder="0" allowfullscreen></iframe> -->
        <iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/wG2cL4LM-TY?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>


        <h2>Investment Plan (Urdu) </h2>
    </div>

    <div class="sidebar-iframe">
    <!--  <iframe width="100%" height="100%" src="https://www.youtube.com/watch?v=wG2cL4LM-TY" frameborder="0" allowfullscreen></iframe> -->
        <iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/xJS7kDJYH6g?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>


        <h2>Investment Plan (Chinese) </h2>
    </div>

    <div class="sidebar-iframe">
   <!--  <iframe width="100%" height="100%" src="https://www.youtube.com/watch?v=xJS7kDJYH6g" frameborder="0" allowfullscreen></iframe> -->
    <iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/PES4QieLeDo?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    <h2>Investment Plan (Arabic) </h2>
    </div>

    <div class="sidebar-iframe">
    <!--  <iframe width="100%" height="100%" src="https://www.youtube.com/watch?v=PES4QieLeDo" frameborder="0" allowfullscreen></iframe> -->
        <iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/ETE7u4OHTc8?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> 
        
        <h2>Investment Plan (English) </h2>
     </div>

     <div class="sidebar-iframe">
            <h3>Steel Price Index</h3>
    <!--  <iframe width="100%" height="100%" src="https://www.youtube.com/watch?v=PES4QieLeDo" frameborder="0" allowfullscreen></iframe> -->
        <iframe class="iframe-widget"  height="330" src="/widget/graph/international-steel-price-index?hide_title=yes" scrolling="yes" ></iframe> 
        <iframe class="iframe-widget"  height="302" src="/widget/prices/international-steel-price-index?hide_title=yes" scrolling="yes"></iframe> 
     </div>

     <div class="sidebar-iframe">
        <h3>FOB Prices China</h3>
    <!--  <iframe width="100%" height="100%" src="https://www.youtube.com/watch?v=PES4QieLeDo" frameborder="0" allowfullscreen></iframe> -->
        <iframe class="iframe-widget"  height="330" src="/widget/graph/fob-prices-china?hide_title=yes" scrolling="yes" ></iframe> 
        <iframe class="iframe-widget" height="360" src="/widget/prices/fob-prices-china?hide_title=yes" scrolling="yes"></iframe> 
     </div>

 </aside>
