<?php

/**
 * This is the model class for table "access".
 *
 * The followings are the available columns in table 'access':
 * @property integer $id
 * @property integer $role_id
 * @property integer $resource_id
 * @property integer $add
 * @property integer $edit
 * @property integer $delete
 * @property integer $published
 * @property integer $view
 *
 * The followings are the available model relations:
 * @property Role $role
 * @property Resources $resource
 */
class Access extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Access the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'access';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role_id, resource_id', 'required'),
			array('role_id, resource_id, add, edit, delete, published, view', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, role_id, resource_id, add, edit, delete, published, view', 'safe', 'on'=>'search'),
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
			'role' => array(self::BELONGS_TO, 'Role', 'role_id'),
			'resource' => array(self::BELONGS_TO, 'Resources', 'resource_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'role_id' => 'Role',
			'resource_id' => 'Resource',
			'add' => 'Add',
			'edit' => 'Edit',
			'delete' => 'Delete',
			'published' => 'Published',
			'view' => 'View',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
                //$criteria->addCondition('id > 1');
		$criteria->compare('id',$this->id);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('resource_id',$this->resource_id);
		$criteria->compare('add',$this->add);
		$criteria->compare('edit',$this->edit);
		$criteria->compare('delete',$this->delete);
		$criteria->compare('published',$this->published);
		$criteria->compare('view',$this->view);

		return new CActiveDataProvider($this, array(
                        'pagination'=>array(
                                'pageSize'=>Yii::app()->params['page'],
                                ),
			'criteria'=>$criteria,
                        'sort'=>array(
				'defaultOrder'=>'role_id ASC',
			)
                            
		));
	}
}