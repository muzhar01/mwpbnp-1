<?php

/**
 * This is the model class for table "rmp_list".
 *
 * The followings are the available columns in table 'rmp_list':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $welcome_message
 * @property string $unsubscription_message
 * @property string $created_date
 * @property integer $created_by
 * @property string $color
 * @property integer $published
 *
 * The followings are the available model relations:
 * @property RmpQueue[] $rmpQueues
 * @property RmpSubscribersList[] $rmpSubscribersLists
 */
class RmpList extends CActiveRecord {

       /**
        * @return string the associated database table name
        */
       public $subscriber;

       public function tableName () {
              return 'rmp_list';
       }

       /**
        * @return array validation rules for model attributes.
        */
       public function rules () {
              // NOTE: you should only define rules for those attributes that
              // will receive user inputs.
              return array(
                                  array('created_by, published', 'numerical', 'integerOnly' => true),
                                  array('title', 'length', 'max' => 255),
                                  array('color', 'length', 'max' => 10),
                                  array('description, welcome_message, unsubscription_message, created_date', 'safe'),
                                  // The following rule is used by search().
                                  // @todo Please remove those attributes that should not be searched.
                                  array('id, title,subscriber, description, welcome_message, unsubscription_message, created_date, created_by, color, published', 'safe', 'on' => 'search'),
              );
       }

       /**
        * @return array relational rules.
        */
       public function relations () {
              // NOTE: you may need to adjust the relation name and the related
              // class name for the relations automatically generated below.
              return array(
                                  'rmpQueues' => array(self::HAS_MANY, 'RmpQueue', 'list_id'),
                                  'rmpSubscribersLists' => array(self::HAS_MANY, 'RmpSubscribersList', 'list_id'),
                                  'SubscriberConfirmed' => array(self::STAT, 'RmpSubscribersList', 'list_id','condition'=>'status=1'),
                                  'SubscriberPending' => array(self::STAT, 'RmpSubscribersList', 'list_id','condition'=>'status=0'),
                                  'UnSubscriber' => array(self::STAT, 'RmpSubscribersList', 'list_id','condition'=>'status=-1'),
              );
       }

       /**
        * @return array customized attribute labels (name=>label)
        */
       public function attributeLabels () {
              return array(
                                  'id' => 'ID',
                                  'title' => 'Title',
                                  'description' => 'Description',
                                  'welcome_message' => 'Welcome Message',
                                  'unsubscription_message' => 'Unsubscription Message',
                                  'created_date' => 'Created Date',
                                  'created_by' => 'Created By',
                                  'color' => 'Color',
                                  'published' => 'Published',
                                  'subscriber' => 'Subscriber',
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
       public function search () {
              // @todo Please modify the following code to remove attributes that should not be searched.

              $criteria = new CDbCriteria;
              
              $criteria->compare ('id', $this->id);
              $criteria->compare ('title', $this->title, true);
              $criteria->compare ('description', $this->description, true);
              $criteria->compare ('welcome_message', $this->welcome_message, true);
              $criteria->compare ('unsubscription_message', $this->unsubscription_message, true);
              $criteria->compare ('created_date', $this->created_date, true);
              $criteria->compare ('created_by', $this->created_by);
              $criteria->compare ('color', $this->color, true);
              $criteria->compare ('published', $this->published);
              return new CActiveDataProvider ($this, array(
                                  'criteria' => $criteria,
                                  'sort' => array(
                                                      'defaultOrder' => 'id DESC',
                                  ),
                                  'pagination' => array(
                                                      'pageSize' => Yii::app ()->user->getState ('pageSize', 50),
                                  ),
              ));
       }

       protected function beforeSave () {
              if (parent::beforeSave ()) {
                     if ($this->isNewRecord) {
                            $this->created_date = date ('Y-m-d h:m:s');
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
        * @return RmpList the static model class
        */
       public static function model ($className = __CLASS__) {
              return parent::model ($className);
       }

}
