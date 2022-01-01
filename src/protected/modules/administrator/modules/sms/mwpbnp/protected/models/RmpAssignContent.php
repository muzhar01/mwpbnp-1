<?php

/**
 * This is the model class for table "rmp_assign_content".
 *
 * The followings are the available columns in table 'rmp_assign_content':
 * @property integer $id
 * @property string $created_date
 * @property integer $list_id
 * @property integer $newsletter_id
 * @property integer $published
 *
 * The followings are the available model relations:
 * @property RmpNewsletter $newsletter
 * @property RmpList $list
 */
class RmpAssignContent extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rmp_assign_content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('list_id, newsletter_id,published', 'required'),
			array('list_id, newsletter_id, published', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, created_date, list_id, newsletter_id, published', 'safe', 'on'=>'search'),
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
			'newsletter' => array(self::BELONGS_TO, 'RmpNewsletter', 'newsletter_id'),
			'list' => array(self::BELONGS_TO, 'RmpList', 'list_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'created_date' => 'Created date',
			'list_id' => 'List',
			'newsletter_id' => 'Newsletter',
			'published' => 'Published',
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
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('list_id',$this->list_id);
		$criteria->compare('newsletter_id',$this->newsletter_id);
		$criteria->compare('published',$this->published);

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
                            $this->created_date =  date('Y-m-d h:m:s');
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
	 * @return RmpAssignContent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
