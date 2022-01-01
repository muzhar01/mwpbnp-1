<?php

/**
 * This is the model class for table "item_current".
 *
 * The followings are the available columns in table 'item_current':
 * @property integer $id
 * @property string $created_date
 * @property integer $cate_id
 * @property double $current_Qty
 * @property integer $pro_id
 * @property integer $size_id
 * @property integer $thickness_id
 */
class ItemCurrent extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item_current';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cate_id, pro_id, size_id, thickness_id', 'numerical', 'integerOnly'=>true),
			array('current_Qty', 'numerical'),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, created_date, cate_id, current_Qty, pro_id, size_id, thickness_id', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'created_date' => 'Created Date',
			'cate_id' => 'Cate',
			'current_Qty' => 'Current Qty',
			'pro_id' => 'Pro',
			'size_id' => 'Size',
			'thickness_id' => 'Thickness',
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
		$criteria->compare('cate_id',$this->cate_id);
		$criteria->compare('current_Qty',$this->current_Qty);
		$criteria->compare('pro_id',$this->pro_id);
		$criteria->compare('size_id',$this->size_id);
		$criteria->compare('thickness_id',$this->thickness_id);

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
	 * @return ItemCurrent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
