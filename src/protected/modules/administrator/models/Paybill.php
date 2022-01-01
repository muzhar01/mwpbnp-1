<?php

/**
 * This is the model class for table "vendor".
 *
 * The followings are the available columns in table 'vendor':
 * @property integer $id
 * @property string $Name
 * @property string $companyName
 * @property string $clientName
 * @property string $address
 * @property string $email
 * @property double $openingBlance
 * @property string $openingDate
 * @property integer $contactOne
 * @property integer $contactTwo
 * @property string $status
 * @property string $rating
 */
class Paybill extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pay_bill';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'vendor' => array(self::BELONGS_TO, 'Vendor', 'vendor_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(

		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id, false);
		$criteria->compare('bill_date',$this->bill_date,false);
		$criteria->compare('vendor_id',$this->vendor_id,false);
		$criteria->compare('bill_id',$this->refno,false);
		$criteria->compare('discount',$this->discount,true);
		$criteria->compare('amount_paid',$this->amount_pay);
		$criteria->compare('amount_due',$this->totalamount, true);
		$criteria->compare('amount_balance',$this->remaining_balance,true);
		$criteria->compare('bill_paid',$this->bill_paid,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vendor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
