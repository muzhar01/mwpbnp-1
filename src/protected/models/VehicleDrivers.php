<?php

/**
 * This is the model class for table "vehicle_drivers".
 *
 * The followings are the available columns in table 'vehicle_drivers':
 * @property integer $id
 * @property string $cnic
 * @property string $FullName
 * @property string $FatherName
 * @property string $current_salary
 * @property integer $salary_last_increament
 * @property string $last_increament_date
 * @property string $salary_leave_terms
 * @property string $performance_remarks
 * @property string $appointment_terms
 * @property string $appointment_date
 * @property string $contact_number
 * @property string $address
 * @property integer $added_on
 *
 * The followings are the available model relations:
 * @property VehicleRegistration[] $vehicleRegistrations
 */
class VehicleDrivers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vehicle_drivers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cnic, FullName, FatherName, current_salary, last_increament_date, salary_leave_terms, performance_remarks, appointment_terms, appointment_date, contact_number, address, added_on', 'required'),
			array('salary_last_increament, added_on', 'numerical', 'integerOnly'=>true),
			array('cnic, FullName, FatherName, current_salary, contact_number', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cnic, FullName, FatherName, current_salary, salary_last_increament, last_increament_date, salary_leave_terms, performance_remarks, appointment_terms, appointment_date, contact_number, address, added_on', 'safe', 'on'=>'search'),
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
			'vehicleRegistrations' => array(self::HAS_MANY, 'VehicleRegistration', 'driver_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cnic' => 'Cnic',
			'FullName' => 'Full Name',
			'FatherName' => 'Father Name',
			'current_salary' => 'Current Salary',
			'salary_last_increament' => 'Salary Last Increament',
			'last_increament_date' => 'Last Increament Date',
			'salary_leave_terms' => 'Salary Leave Terms',
			'performance_remarks' => 'Performance Remarks',
			'appointment_terms' => 'Appointment Terms',
			'appointment_date' => 'Appointment Date',
			'contact_number' => 'Contact Number',
			'address' => 'Address',
			'added_on' => 'Added On',
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
		$criteria->compare('cnic',$this->cnic,true);
		$criteria->compare('FullName',$this->FullName,true);
		$criteria->compare('FatherName',$this->FatherName,true);
		$criteria->compare('current_salary',$this->current_salary,true);
		$criteria->compare('salary_last_increament',$this->salary_last_increament);
		$criteria->compare('last_increament_date',$this->last_increament_date,true);
		$criteria->compare('salary_leave_terms',$this->salary_leave_terms,true);
		$criteria->compare('performance_remarks',$this->performance_remarks,true);
		$criteria->compare('appointment_terms',$this->appointment_terms,true);
		$criteria->compare('appointment_date',$this->appointment_date,true);
		$criteria->compare('contact_number',$this->contact_number,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('added_on',$this->added_on);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VehicleDrivers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
