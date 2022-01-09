<?php

/**
 * This is the model class for table "vehicle_payments".
 *
 * The followings are the available columns in table 'vehicle_payments':
 * @property integer $id
 * @property integer $vehicle_id
 * @property integer $income
 * @property integer $expenses
 * @property integer $payment
 * @property string $payment_date
 * @property string $status
 * @property string $added_on
 * @property integer $added_by
 *
 * The followings are the available model relations:
 * @property VehicleRegistration $vehicle
 */
class VehiclePayments extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    public $from_date, $to_date , $today;

	public function tableName()
	{
		return 'vehicle_payments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vehicle_id, payment_date, added_on, added_by', 'required'),
			array('vehicle_id, income, expenses, payment, added_by', 'numerical', 'integerOnly'=>true),
			array('payment_mode,reference', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, vehicle_id, income, expenses, payment, payment_date, payment_mode, added_on, added_by', 'safe', 'on'=>'search'),
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
			'vehicle' => array(self::BELONGS_TO, 'VehicleRegistration', 'vehicle_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'vehicle_id' => 'Vehicle',
			'income' => 'Income',
			'expenses' => 'Expenses',
			'payment' => 'Payment',
			'payment_date' => 'Date and Time',
			'payment_mode' => 'Payment Mode',
			'reference' => 'Income',
			'added_on' => 'Added On',
			'added_by' => 'Added By',
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
        if(!empty($this->to_date) && !empty($this->from_date)){
		    $criteria->addBetweenCondition('payment_date',$this->from_date,$this->to_date,['AND']);
        } else if(!empty($this->today)) {
           $criteria->addCondition("date_format(payment_date,'%Y-%m-%d') = '".$this->today."'");
        }
		$criteria->compare('id',$this->id);
		$criteria->compare('vehicle_id',$this->vehicle_id);
		$criteria->compare('income',$this->income);
		$criteria->compare('expenses',$this->expenses);
		$criteria->compare('payment',$this->payment);
		$criteria->compare('payment_date',$this->payment_date,true);
		$criteria->compare('reference',$this->reference,true);
		$criteria->compare('payment_mode',$this->payment_mode,true);
		$criteria->compare('added_on',$this->added_on,true);
		$criteria->compare('added_by',$this->added_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort' => array(
                'defaultOrder' => 'payment_date asc',
            ),
            'pagination' => array(
                'pageSize' => Yii::app()->user->getState('pageSize', 50),
            ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VehiclePayments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
