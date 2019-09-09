<!--Modified by me-->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jsapi"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.gvChart-1.0.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/pbs.init.js"></script>   
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom"> 
            <table class="myChart">
                <thead>
                    <tr>
                        <th></th>
                        <?php
                        foreach ($graphs as $data) {
                            echo '<th>' . $data['year'].','.$data['monthname'] . '</th>';
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($GLOBALS['packageid'] > 2) { ?>
                        <tr>
                            <th>Product Sales</th>
                            <?php
                            foreach ($graphs as $sales) {
                                echo '<td>' . $sales['product_sales'] . '</td>';
                            }
                            ?>
                        </tr>
                        <tr>
                            <th>Product Visitors</th>
                            <?php
                            foreach ($graphs as $sales) {
                                echo '<td>' . $sales['product_view'] . '</td>';
                            }
                            ?>
                        </tr>
                        <tr>
                            <th>Custom Pages Visitors</th>
                            <?php
                            foreach ($graphs as $views) {
                                echo '<td>' . $views['pages_view'] . '</td>';
                            }
                            ?>
                        </tr>
                        <tr>
                            <th>Squeeze Page Visitors</th>
                            <?php
                            foreach ($graphs as $views) {
                                echo '<td>' . $views['squeeze_view'] . '</td>';
                            }
                            ?>
                        </tr> 
                        <tr>
                            <th>Blog Visitors</th>
                            <?php
                            foreach ($graphs as $views) {
                                echo '<td>' . $views['blog_view'] . '</td>';
                            }
                            ?>
                        </tr> 
                    <?php } else { ?>
                        <tr>
                            <th>Custom Pages Visitors</th>
                            <?php
                            foreach ($graphs as $views) {
                                echo '<td>' . $views['pages_view'] . '</td>';
                            }
                            ?>
                        </tr>

                        <tr>
                            <th>Blog Visitors</th>
                            <?php
                            foreach ($graphs as $views) {
                                echo '<td>' . $views['blog_view'] . '</td>';
                            }
                            ?>
                        </tr> 
                    <?php } ?>
                </tbody>
            </table>
        </div>
