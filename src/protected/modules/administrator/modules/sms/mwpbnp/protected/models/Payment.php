<?php

/**
 * This is the model class for table "videos".
 *
 * The followings are the available columns in table 'videos':
 * @property integer $payment_type
 * @property string $card_name
 * @property string $card_type
 * @property string $card_number
 * @property string $expiry_date
 * @property integer $cvs
 
 */
class Payment extends CFormModel
{
    /**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('card_name,  card_type,  card_number,expiry_date,cvs', 'required'),
			array('card_type, card_number, cvs', 'numerical', 'integerOnly'=>true),
			array('card_number', 'length', 'max'=>14),
			array('cvs', 'length', 'max'=>3),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('card_name, card_type, card_number, expiry_date, cvs, size', 'safe', 'on'=>'search'),
		);
	}
        public function attributeLabels()
	{
		return array(
			
			'cart_name' => 'Your Name On Card',
			'card_type' => 'Card Type',
			'card_number' => 'Card Number',
			'cvs' => 'CVS',
			'expiry_date' => 'Expiry Date',
			
			
		);
	}
        
        public function getCardType(){
            return array('Master'=>'Master','Visa'=>'Visa');
        }
}
