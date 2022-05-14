<?php

/**
 * This is the model class for table "vehicle_registration".
 *
 * The followings are the available columns in table 'vehicle_registration':
 * @property integer $id
 * @property string $resigtration_number
 * @property string $date_of_registration
 * @property string $vehicle_type
 * @property string $maker_name
 * @property string $manufacturer_year
 * @property string $registered_loading_weight
 * @property string $loading_capacity_weight
 * @property string $loading_capacity_length
 * @property string $owner_name
 * @property string $owner_cnic
 * @property string $owner_contact_number
 * @property string $owner_address
 * @property string $status
 * @property integer $driver_id
 * @property string $added_on
 * @property integer $added_by
 * @property integer $updated_by
 * @property string $updated_on
 *
 * The followings are the available model relations:
 * @property VehiclePayments[] $vehiclePayments
 */
class VehicleRegistration extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vehicle_registration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('resigtration_number, date_of_registration, vehicle_type, maker_name, manufacturer_year, registered_loading_weight, loading_capacity_weight, loading_capacity_length, owner_name, owner_cnic, owner_contact_number, driver_id, added_on, added_by', 'required'),
			array('driver_id, added_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('resigtration_number, date_of_registration, vehicle_type, maker_name, registered_loading_weight, loading_capacity_weight, loading_capacity_length, owner_name, owner_cnic, owner_contact_number, owner_address, status', 'length', 'max'=>255),
			array('manufacturer_year', 'length', 'max'=>4),
			array('updated_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, resigtration_number, date_of_registration, vehicle_type, maker_name, manufacturer_year, registered_loading_weight, loading_capacity_weight, loading_capacity_length, owner_name, owner_cnic, owner_contact_number, owner_address, status, driver_id, added_on, added_by, updated_by, updated_on', 'safe', 'on'=>'search'),
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
			'vehiclePayments' => array(self::HAS_MANY, 'VehiclePayments', 'vehicle_id'),
			'driver' => array(self::BELONGS_TO, 'VehicleDrivers', 'driver_id'),
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
			'resigtration_number' => 'Registration Number',
			'date_of_registration' => 'Date Of Registration',
			'vehicle_type' => 'Vehicle Type',
			'maker_name' => 'Maker Name',
			'manufacturer_year' => 'Manufacturer Year',
			'registered_loading_weight' => 'Registered Loading Weight',
			'loading_capacity_weight' => 'Loading Capacity Weight',
			'loading_capacity_length' => 'Loading Capacity Length',
			'owner_name' => 'Owner Name',
			'owner_cnic' => 'Owner CNIC',
			'owner_contact_number' => 'Owner Contact Number',
			'owner_address' => 'Owner Address',
			'status' => 'Status',
			'driver_id' => 'Driver',
			'added_on' => 'Added On',
			'added_by' => 'Added By',
			'updated_by' => 'Updated By',
			'updated_on' => 'Updated On',
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
		$criteria->condition = 'status="Active"';
		$criteria->compare('id',$this->id);
		$criteria->compare('resigtration_number',$this->resigtration_number,true);
		$criteria->compare('date_of_registration',$this->date_of_registration,true);
		$criteria->compare('vehicle_type',$this->vehicle_type,true);
		$criteria->compare('maker_name',$this->maker_name,true);
		$criteria->compare('manufacturer_year',$this->manufacturer_year,true);
		$criteria->compare('registered_loading_weight',$this->registered_loading_weight,true);
		$criteria->compare('loading_capacity_weight',$this->loading_capacity_weight,true);
		$criteria->compare('loading_capacity_length',$this->loading_capacity_length,true);
		$criteria->compare('owner_name',$this->owner_name,true);
		$criteria->compare('owner_cnic',$this->owner_cnic,true);
		$criteria->compare('owner_contact_number',$this->owner_contact_number,true);
		$criteria->compare('owner_address',$this->owner_address,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('driver_id',$this->driver_id);
		$criteria->compare('added_on',$this->added_on,true);
		$criteria->compare('added_by',$this->added_by);
		$criteria->compare('updated_by',$this->updated_by);
		$criteria->compare('updated_on',$this->updated_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VehicleRegistration the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
