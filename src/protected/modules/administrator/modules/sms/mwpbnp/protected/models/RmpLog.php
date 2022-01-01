<?php

/**
 * This is the model class for table "rmp_log".
 *
 * The followings are the available columns in table 'rmp_log':
 * @property integer $id
 * @property integer $subscriber_id
 * @property integer $newsletter_id
 * @property string $deliver_on
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property RmpSubscribers $subscriber
 * @property RmpQueue $newsletter
 */
class RmpLog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rmp_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subscriber_id, newsletter_id,  status', 'required'),
			array('subscriber_id, newsletter_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, subscriber_id, newsletter_id, deliver_on, status', 'safe', 'on'=>'search'),
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
			'subscriber' => array(self::BELONGS_TO, 'RmpSubscribers', 'subscriber_id'),
			'newsletter' => array(self::BELONGS_TO, 'RmpNewsletter', 'newsletter_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'subscriber_id' => 'Subscriber',
			'newsletter_id' => 'Newsletter',
			'deliver_on' => 'Deliver On',
			'status' => 'Status',
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
		$criteria->compare('subscriber_id',$this->subscriber_id);
		$criteria->compare('newsletter_id',$this->newsletter_id);
		$criteria->compare('deliver_on',$this->deliver_on,true);
		$criteria->compare('status',$this->status);

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
                            $this->deliver_on =  date('Y-m-d h:m:s');
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
	 * @return RmpLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
