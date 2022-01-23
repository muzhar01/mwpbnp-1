<?php
class MarketpriceNotifyCommand extends CConsoleCommand {
    public function getHelp() {
        echo "Generate Current Price";
    }
    public function run($debug=0) {
        $model= Products::model()->findAll();
                foreach ($model as $row){
                   $last_modify_date = ProductMarketPrice::model()->getMaxCreatedDate($row->id);
                    $modelPrice= ProductMarketPrice::model()->findAll(array('condition'=>"`created_date`='$last_modify_date' AND `product_id`=$row->id"));
                    foreach ($modelPrice as $priceRow){
                        $modelMarket= new ProductMarketPrice();
                        $date= strtotime($priceRow->created_date);
                        $now= date('Y-m-d H:i:s', strtotime('+1 day', $date));
                        $modelMarket->size_id=$priceRow->size_id;
                        $modelMarket->thickness_id=$priceRow->thickness_id;
                        $modelMarket->product_id=$priceRow->product_id;
                        $modelMarket->price=$priceRow->price;
                        $modelMarket->created_date=$now;
                        $modelMarket->last_date=$priceRow->created_date;
                        $modelMarket->save(FALSE);
                    }
                    
                }
                echo 'done.';
    }

    


}

