<aside class="asidebar">

    <?php
    $created_by = isset(Yii::app()->request->cookies['cart']) ? Yii::app()->request->cookies['cart']->value : '';
    //&& (Yii::app()->user->role == 2)
    if ($created_by != '' && (!Yii::app()->user->isGuest)) { ?>
        <h2>Cart Product</h2>
        <?php $this->widget('CartData'); ?>
    <?php } else { ?>
        <div class="button4">

        </div>
        <h2>Featured Prices</h2>
        <div class="accordion-outer">
            <div class="panel-group" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">

                    <div class="panel-collapse collapse in" role="tabpanel">
                        <div class="panel-body table-responsive">
                            <?php
                            $product_id = 28;
                            $SQL = 'SELECT id FROM `product_market_price` WHERE `product_id` = ' . $product_id . '  and size_id in(56,10,3) '
                                . 'and thickness_id =19 ORDER BY created_date DESC LIMIT 3';
                            $data = Yii::app()->db->createCommand($SQL)->queryAll();
                            $product = Products::model()->findByPk($product_id);
                            ?>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <th width="33%" height="23"><?php echo $product->name ?></th>
                                    <th width="36%">SWG/Thick</th>
                                    <th width="31%">Rs/Kg/Feet</th>
                                </tr>
                                <?php foreach ($data as $row) {
                                    $market_price = ProductMarketPrice::model()->findByPk($row['id']);
                                ?>
                                    <tr>
                                        <td><?php echo stripcslashes($market_price->thickness->title); ?></td>
                                        <td><?php echo stripcslashes($market_price->size->title); ?></td>
                                        <td><?php echo $market_price->getTodayPrice($market_price->product_id, $market_price->size_id, $market_price->thickness_id); ?></td>
                                    </tr>
                                <?php } ?>
                            </table>


                            <?php
                            $product_id = 15;
                            $SQL = 'SELECT id FROM `product_market_price` WHERE `product_id` = ' . $product_id . '  and size_id in(58,61,62) '
                                . 'and thickness_id =30 ORDER BY created_date DESC LIMIT 3';
                            $data = Yii::app()->db->createCommand($SQL)->queryAll();
                            $product = Products::model()->findByPk($product_id);
                            ?>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <th width="33%" height="23"><?php echo $product->name ?></th>
                                    <th width="36%">SWG/Thick</th>
                                    <th width="31%">Rs/Kg/Feet</th>
                                </tr>
                                <?php foreach ($data as $row) {
                                    $market_price = ProductMarketPrice::model()->findByPk($row['id']);
                                ?>
                                    <tr>
                                        <td><?php echo stripcslashes($market_price->thickness->title); ?></td>
                                        <td><?php echo stripcslashes($market_price->size->title); ?></td>
                                        <td><?php echo $market_price->getTodayPrice($market_price->product_id, $market_price->size_id, $market_price->thickness_id); ?></td>
                                    </tr>
                                <?php } ?>
                            </table>


                            <?php
                            $product_id = 6;
                            $SQL = 'SELECT id FROM `product_market_price` WHERE `product_id` = ' . $product_id . '  and size_id in(11,9,14) '
                                . 'and thickness_id =11 ORDER BY created_date DESC LIMIT 3';
                            $data = Yii::app()->db->createCommand($SQL)->queryAll();
                            $product = Products::model()->findByPk($product_id);
                            ?>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <th width="33%" height="23"><?php echo $product->name ?></th>
                                    <th width="36%">SWG/Thick</th>
                                    <th width="31%">Rs/Kg/Feet</th>
                                </tr>
                                <?php foreach ($data as $row) {
                                    $market_price = ProductMarketPrice::model()->findByPk($row['id']);
                                ?>
                                    <tr>
                                        <td><?php echo stripcslashes($market_price->thickness->title); ?></td>
                                        <td><?php echo stripcslashes($market_price->size->title); ?></td>
                                        <td><?php echo $market_price->getTodayPrice($market_price->product_id, $market_price->size_id, $market_price->thickness_id); ?></td>
                                    </tr>
                                <?php } ?>
                            </table>


                            <?php
                            $product_id = 7;
                            $SQL = 'SELECT id FROM `product_market_price` WHERE `product_id` = ' . $product_id . '  and size_id in(11,9,3) '
                                . 'and thickness_id =10 ORDER BY created_date DESC LIMIT 3';
                            $data = Yii::app()->db->createCommand($SQL)->queryAll();
                            $product = Products::model()->findByPk($product_id);
                            ?>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <th width="33%" height="23"><?php echo $product->name ?></th>
                                    <th width="36%">SWG/Thick</th>
                                    <th width="31%">Rs/Kg/Feet</th>
                                </tr>
                                <?php foreach ($data as $row) {
                                    $market_price = ProductMarketPrice::model()->findByPk($row['id']);
                                ?>
                                    <tr>
                                        <td><?php echo stripcslashes($market_price->thickness->title); ?></td>
                                        <td><?php echo stripcslashes($market_price->size->title); ?></td>
                                        <td><?php echo $market_price->getTodayPrice($market_price->product_id, $market_price->size_id, $market_price->thickness_id); ?></td>
                                    </tr>
                                <?php } ?>
                            </table>

                            <?php
                            $product_id = 18;
                            $SQL = 'SELECT id FROM `product_market_price` WHERE `product_id` = ' . $product_id . '  and size_id in(76,74,77) '
                                . 'and thickness_id =6 ORDER BY created_date DESC LIMIT 3';
                            $data = Yii::app()->db->createCommand($SQL)->queryAll();
                            $product = Products::model()->findByPk($product_id);
                            ?>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <th width="33%" height="23"><?php echo $product->name ?></th>
                                    <th width="36%">SWG/Thick</th>
                                    <th width="31%">Rs/Kg/Feet</th>
                                </tr>
                                <?php foreach ($data as $row) {
                                    $market_price = ProductMarketPrice::model()->findByPk($row['id']);
                                ?>
                                    <tr>
                                        <td><?php echo stripcslashes($market_price->thickness->title); ?></td>
                                        <td><?php echo stripcslashes($market_price->size->title); ?></td>
                                        <td><?php echo $market_price->getTodayPrice($market_price->product_id, $market_price->size_id, $market_price->thickness_id); ?></td>
                                    </tr>
                                <?php } ?>
                            </table>

                            <?php
                            $product_id = 4;
                            $SQL = 'SELECT id FROM `product_market_price` WHERE `product_id` = ' . $product_id . '  and size_id in(31,19,24,37) '
                                . 'and thickness_id =6 ORDER BY created_date DESC LIMIT 4';
                            $data = Yii::app()->db->createCommand($SQL)->queryAll();
                            $product = Products::model()->findByPk($product_id);
                            ?>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <th width="33%" height="23"><?php echo $product->name ?></th>
                                    <th width="36%">SWG/Thick</th>
                                    <th width="31%">Rs/Kg/Feet</th>
                                </tr>
                                <?php foreach ($data as $row) {
                                    $market_price = ProductMarketPrice::model()->findByPk($row['id']);
                                ?>
                                    <tr>
                                        <td><?php echo stripcslashes($market_price->thickness->title); ?></td>
                                        <td><?php echo stripcslashes($market_price->size->title); ?></td>
                                        <td><?php echo $market_price->getTodayPrice($market_price->product_id, $market_price->size_id, $market_price->thickness_id); ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <div class="button4">
                                <a href="/product/current-rate" class="hvr-shutter-out-vertical">FULL PRICE LIST</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php  }
    ?>


    <h2>Today's Prices</h2>
    <?php $this->widget('TodaysRate'); ?>
    <div class="button2">
        <a href="/product" class="hvr-shutter-out-vertical"><span></span>Express Purchase</a>
    </div>
    <div class="button3">
        <a href="/contact-us" class="hvr-shutter-out-vertical">Get Quotation</a>
    </div>
    <div class="button4">
        <a href="/member/chowkat-tool" class="hvr-shutter-out-vertical">Door Frame Tool</a>
    </div>
    <div class="button1">
        <a class="hvr-shutter-out-vertical" href="/iron-furniture">Ready Made Products</a>
    </div>
</aside>

<div class="add-section">
    <?php $this->widget('Banners', array('name' => 'Ads', 'position' => 'right')); ?>
</div>