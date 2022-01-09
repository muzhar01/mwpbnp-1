<?php

/**
 * This is the model class for table "rmp_subscribers".
 *
 * The followings are the available columns in table 'rmp_subscribers':
 * @property integer $id
 * @property string $name
 * @property string $email_address
 * @property string $subscription_key
 * @property string $subscription_date
 * @property string $unsubscription_date
 * @property integer $status
 * @property integer $list_id 
 * The followings are the available model relations:
 * @property RmpLog[] $rmpLogs
 * @property RmpSubscribersList[] $rmpSubscribersLists
 */
class RmpSubscribers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    public $list_id;


    public function tableName()
	{
		return 'rmp_subscribers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email_address,list_id', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('name, email_address', 'length', 'max'=>100),
			array('subscription_key', 'length', 'max'=>50),
			array('subscription_date, unsubscription_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, email_address, subscription_key, subscription_date, unsubscription_date, status', 'safe', 'on'=>'search'),
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
			'rmpLogs' => array(self::HAS_MANY, 'RmpLog', 'subscriber_id'),
            'rmpSubscribersLists' => array(self::HAS_MANY, 'RmpSubscribersList', 'subscriber_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
       public function getLists(){
              $data='';
              foreach($this->rmpSubscribersLists as $lists){
                    $data.='<span class="label" style="background-color:'.$lists->list->color.'"><i class="fa fa-list-alt"></i></span> '.$lists->list->title.'<br />';
              }
              return   $data;     
       }
       public function getListString(){ 
              // This function is used for Checkbox listing to check existing values.
              $data='';
              foreach($this->rmpSubscribersLists as $lists){
                    $data.=$lists->list_id.',';
              }
              return   $data;     
              
       }
       
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'email_address' => 'Email Address',
			'subscription_key' => 'Subscription Key',
			'subscription_date' => 'Subscription Date',
			'unsubscription_date' => 'Unsubscription Date',
			'status' => 'Status',
            'list_id'=>'Lists',
		);
	}
    public function beforeFind () {
           if(parent::beforeFind ()){
                  $this->list_id=1;
                  return true;
           }
           else 
                  return False;
    }
    public function beforeSave () {
           if(parent::beforeSave ()){
                  if($this->isNewRecord){
                         $this->subscription_date=date('Y-m-d h:m:s');
                         $this->subscription_key=md5(time().uniqid());
                         $this->status=0;                        
                  } else{
                             RmpSubscribersList::model()->deleteAll(array('condition'=>'subscriber_id='.$this->id));
                  }
                  return true;
           }
           else return false;
    }
    public function afterSave () {
         if(parent::beforeSave ()){
                foreach($_POST['RmpSubscribers']['list_id'] as $list)
                             $this->saveInList($list);
              return true;     
         }else
                return false;
    }

    public function saveInList($list){
              $model = new RmpSubscribersList();
              $model->subscriber_id=$this->id;
              $model->list_id=$list;
              $model->published=1;
              $model->save(false);
              
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
                 $criteria->with = array('rmpSubscribersLists');    
		$criteria->compare('t.id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email_address',$this->email_address,true);
		$criteria->compare('subscription_key',$this->subscription_key,true);
		$criteria->compare('subscription_date',$this->subscription_date,true);
		$criteria->compare('unsubscription_date',$this->unsubscription_date,true);
		$criteria->compare('status',$this->status);
                $criteria->compare ('rmpSubscribersLists.list_id', $this->list_id);     
                $criteria->together=true;
		return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 't.id DESC',
            ),
            'pagination' => array(
                        'pageSize' => Yii::app()->user->getState('pageSize',50),
                    ),
        ));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RmpSubscribers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
