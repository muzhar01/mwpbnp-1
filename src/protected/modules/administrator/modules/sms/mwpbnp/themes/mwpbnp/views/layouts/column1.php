<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 main-contentarea">
                <div class="maincontent-detail">
                    <?php echo $content; ?>
                </div> 
                <h2>Steel Price Graphs</h2>
                <div class="grap-outer">
                    <h3>International Price Graph</h3>
                    <img class="img-responsive" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/graph1.png" alt="" title="" >
                </div> 
                <div class="grap-outer">
                    <h3>Pakistan Price Graph</h3>
                    <img class="img-responsive" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/graph2.png" alt="" title="" >
                </div>
                <div class="maincontent-list">
                    <h3>OUR PRODUCT RANGE</h3>
                    </br>
                    <ul>
                        <h3>MS Deform Steel Bars</h3>
                        <li>Grade 40 , Grade 60 , 40 Feet Special</li>
                    </ul>
                    <ul>
                        <h3>MS Chowkat / Steel Door Frames</h3>
                        <li>14 Guage (SWG) , 16 Guage (SWG) , 18 Guage (SWG)</li>
                    </ul>
                    <h3>Pipe (Conduit/ Hollow Section/ Rerolled/ Prime Pipe)</h3>
                    <ul>
                        <li>Scaffolding Pipe</li>
                        <li>MS Square Pipe</li>
                        <li>MS Rectangle Pipe</li>
                        <li>MS Round Pipe</li>
                        <li>MS Shaped Pipe (Lsmall, LBig, T, Z)</li>
                    </ul>
                    <h3>Iron</h3>
                    <ul>
                        <li>MS Angle Iron</li>
                        <li>MS Flat/ Patti Iron</li>
                        <li>MS Round Bars/ Square Bars</li>

                        <li>MS Tee Section/ MS Zee Section</li>
                        <li>MS C Channels/ MS U Channels</li>
                    </ul>
                    <h3>Sheets</h3>
                    <ul>
                        <li>MS Sheets / MS Plates</li>
                        <li>GI Sheets</li>
                        <li>CGI Sheets</li>
                        <li>MS Bended Sheets / Golla Dabbi</li>
                    </ul>

                </div>   
            </div>


            


        </div>
    </div>
</section>    

<?php $this->endContent(); ?>