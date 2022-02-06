<?php

/**
 * This is the model class for table "mwp_payments".
 *
 * The followings are the available columns in table 'mwp_payments':
 * @property integer $id
 * @property integer $payment_type
 * @property string $transection_id
 * @property string $payment_date
 * @property integer $created_by
 * @property string $bank_info
 * @property string $notes
 * @property string $scan_image
 * @property integer $domain_id
 * @property integer $customer_id
 */
class MwpPayments extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mwp_payments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('payment_type, created_by,transection_id,scan_image,bank_info,notes,payment_date, domain_id, customer_id,transection_status', 'required'),
			array('payment_type, created_by, domain_id, customer_id,transection_status', 'numerical', 'integerOnly'=>true),
			array('transection_id, bank_info, scan_image', 'length', 'max'=>100),
			array('payment_date, notes', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, payment_type, transection_id, payment_date, created_by, bank_info, notes, scan_image, domain_id, customer_id,transection_status', 'safe', 'on'=>'search'),
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
            'customer' => array(self::BELONGS_TO, 'MwpCustomer', 'customer_id'),
            'created' => array(self::BELONGS_TO, 'AdminUser', 'created_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'payment_type' => 'Payment Type',
			'transection_id' => 'Transection',
			'payment_date' => 'Payment Date',
			'created_by' => 'Created By',
			'bank_info' => 'Bank Info',
			'notes' => 'Notes',
			'scan_image' => 'Scan Image',
			'domain_id' => 'Domain',
			'customer_id' => 'Customer',
			'transection_status' => 'Transection Status',
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
		$criteria->compare('payment_type',$this->payment_type);
		$criteria->compare('transection_id',$this->transection_id,true);
		$criteria->compare('payment_date',$this->payment_date,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('bank_info',$this->bank_info,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('scan_image',$this->scan_image,true);
		$criteria->compare('domain_id',$this->domain_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('transection_status',$this->transection_status);

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
	 * @return MwpPayments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getPaymentType(){
        switch ($this->payment_type){
            case 1:
                $type ='Cash';
                break;
            case 2:
                $type ='Cheque';
                break;
            case 3:
                $type ='Online Transfer';
                break;
        }
        return $type;
    }

    public function getTransectionStatus(){
        $type ='';
        switch ($this->transection_status){
            case 1:
                $type ='Received';
                break;
            case 2:
                $type ='Verified';
                break;
            case 3:
                $type ='Approved';
                break;
            default:
                $type ='Pending';
                break;
        }
        return $type;
    }
}
