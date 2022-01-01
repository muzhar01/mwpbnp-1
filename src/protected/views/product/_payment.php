    <?php $settings= QuotesSettings::model()->find();?>
    <div class="row">
        <div class="col-lg-12">
            <fieldset>
                <legend>Payment method</legend>
                <?php if($cart->getTotalPrice() > $settings->max_cart_limit){
                    $banks=CHtml::listData (Banks::model()->findAll(array('condition' => "published=1 and id = 20")), 'name', 'name');
                    
                    } else{
                    $banks=CHtml::listData (Banks::model()->findAll(array('condition' => "published=1 and id <>20")), 'name', 'name');
                    }
                     ?>
                <?php
                echo $form->radioButtonlist($model,'payment_type', $banks ,array('separator'=>'<br>')); ?>

            </fieldset>
        </div>
       
    </div>
    
    
