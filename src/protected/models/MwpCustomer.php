<?php

/**
 * This is the model class for table "mwp_customer".
 *
 * The followings are the available columns in table 'mwp_customer':
 * @property integer $id
 * @property string $full_name
 * @property string $address
 * @property string $city
 * @property string $phone_no
 * @property string $email
 * @property string $profile_image
 * @property string $created_at
 *
 * The followings are the available model relations:
 * @property MwpDomains[] $mwpDomains
 */
class MwpCustomer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mwp_customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('full_name ,address , email, city, phone_no', 'required'),
			array('email', 'email'),
			array('full_name, email', 'length', 'max'=>100),
			array('address', 'length', 'max'=>200),
			array('city, phone_no', 'length', 'max'=>50),
			array('profile_image', 'length', 'max'=>250),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, full_name, address, city, phone_no, email, pofile_image, created_at', 'safe', 'on'=>'search'),
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
			'mwpDomains' => array(self::HAS_MANY, 'MwpDomains', 'customer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'full_name' => 'Full Name',
			'address' => 'Address',
			'city' => 'City',
			'phone_no' => 'Phone No',
			'email' => 'Email',
			'profile_image' => 'Profile Image',
			'created_at' => 'Created At',
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
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('phone_no',$this->phone_no,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('profile_image',$this->profile_image,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'id DESC',
            ),
            'pagination' => array(
                        'pageSize' => Yii::app()->user->getState('pageSize',50),
                    ),
        ));
	}
    protected function beforeSave () {
              if (parent::beforeSave ()) {
                     if ($this->isNewRecord) {
                            $this->created_at =  date('Y-m-d h:m:s');
                     }
                    
                     return true;
              }
              else
                     return false;
       }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MwpCustomer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
