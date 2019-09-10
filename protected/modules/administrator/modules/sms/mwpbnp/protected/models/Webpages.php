<?php

/**
 * This is the model class for table "webpages".
 *
 * The followings are the available columns in table 'webpages':
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $seo_title
 * @property string $meta_keyword
 * @property string $meta_description
 * @property integer $category
 * @property string $detailtext
 * @property integer $published
 * @property string $created_date
 */
class Webpages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'webpages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, alias, seo_title, meta_keyword, meta_description,  detailtext, published', 'required'),
			array('category, published', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>250),
			array('alias, seo_title', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, alias, seo_title, meta_keyword, meta_description, category, detailtext, published, created_date', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'alias' => 'Alias',
			'seo_title' => 'Seo Title',
			'meta_keyword' => 'Meta Keyword',
			'meta_description' => 'Meta Description',
			'category' => 'Category',
			'detailtext' => 'Detailtext',
			'published' => 'Published',
			'created_date' => 'Created Date',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('seo_title',$this->seo_title,true);
		$criteria->compare('meta_keyword',$this->meta_keyword,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('category',$this->category);
		$criteria->compare('detailtext',$this->detailtext,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('created_date',$this->created_date,true);

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
                            $this->category=1;
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
	 * @return Webpages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}