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
class Vendor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vendor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contactOne, contactTwo,current_balance', 'numerical', 'integerOnly'=>true),
			array('openingBlance', 'numerical'),
			array('Name, companyName, clientName, email, status, rating', 'length', 'max'=>40),
			array(' Name, companyName, clientName, address, contactOne, contactTwo, status,rating,created','required'),
			array('address', 'length', 'max'=>50),
			array('openingDate,email,current_balance,openingBlance', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Name, companyName, clientName, address, email, openingBlance, openingDate, contactOne, contactTwo, status,current_balance,rating', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Name' => 'Name',
			'companyName' => 'Company Name',
			'clientName' => 'Client Name',
			'address' => 'Address',
			'email' => 'Email',
			'openingBlance' => 'Opening Balance',
			'openingDate' => 'Opening Date',
			'current_balance'=>'Current Balance',
			'contactOne' => 'Contact Number',
			'contactTwo' => 'Contact Two',
			'status' => 'Status',
			'rating' => 'Rating',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('companyName',$this->companyName,true);
		$criteria->compare('clientName',$this->clientName,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('openingBlance',$this->openingBlance);
		$criteria->compare('openingDate',$this->openingDate,true);
		$criteria->compare('contactOne',$this->contactOne);
		$criteria->compare('contactTwo',$this->contactTwo);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('rating',$this->rating,true);
		$criteria->compare('current_balance',$this->current_balance,true);
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
