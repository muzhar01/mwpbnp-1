<?php

/**
 * This is the model class for table "product_category".
 *
 * The followings are the available columns in table 'product_category':
 * @property integer $id
 * @property integer $parent_id
 * @property string $label
 * @property string $slug
 * @property string $date_added
 * @property string $last_updated
 * @property integer $sort_order
 * @property integer $published
 * @property integer $level
 * @property string $unit
 *
 * The followings are the available model relations:
 * @property ProductCategory $parent
 * @property ProductCategory[] $productCategories
 */
class ProductCategory extends CActiveRecord {
    protected $gridDataArray = array();
    public $product_size;
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'product_category';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('label,unit,slug, sort_order,published,product_size', 'required'),
            array('id, parent_id, sort_order, main_category_id, published, level', 'numerical', 'integerOnly' => true),
            array('label', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, parent_id,unit,slug, label, date_added, last_updated, sort_order, published, level,product_size', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'parent' => array(self::BELONGS_TO, 'ProductCategory', 'parent_id'),
            'productCategories' => array(self::HAS_MANY, 'ProductCategory', 'parent_id'),
            'allchildren' => array(self::HAS_MANY, 'ProductCategory', 'parent_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'parent_id' => 'Parent',
            'slug'=>'Slug',
            'label' => 'Label',
            'date_added' => 'Date Added',
            'last_updated' => 'Last Updated',
            'sort_order' => 'Sort Order',
            'published' => 'Published',
            'level' => 'Level',
            'unit'=>'Unit'
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->compare('label', $this->label, true);
        $criteria->compare('slug', $this->slug);
        $criteria->compare('date_added', $this->date_added, true);
        $criteria->compare('last_updated', $this->last_updated, true);
        $criteria->compare('sort_order', $this->sort_order);
        $criteria->compare('published', $this->published);
        $criteria->compare('level', $this->level);
        $criteria->compare('unit', $this->unit);
        $criteria->compare('main_category_id', $this->main_category_id);

        $gridData = new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'sort_order ASC',
            ),
            'pagination' => array(
                'pageSize' => 20,
            ),
                )
        );
        
        foreach ($gridData->getData() as $gdata) {
            $mainData = $this->getChilds($gdata->id,$parent_id = null);
            if ($mainData)
                $this->print_children($mainData);
        }
        
        
        $dataProvider = new CArrayDataProvider($this->gridDataArray, array('pagination' => array('pageSize' => Yii::app()->user->getState('pageSize',50)),));
        return $dataProvider;
    }
    
    public function getChilds($item_id,$parent_id = null) {
        $results = Yii::app()->getDb()->createCommand();
        $results->select('*')->from('product_category');

        if ($parent_id === null)
            $results->where('id=:itmid AND parent_id IS NULL', array(':itmid' => (int) $item_id));
        else
            $results->where('parent_id=:pid', array(':pid' => $parent_id));

        $results->order('sort_order ASC, label ASC');
        $results = $results->queryAll();

        $items = array();

        if (empty($results))
            return $items;

        foreach ($results AS $result) {
           $childItems = $this->getChilds($item_id, $result['id']);

            $items[] = array(
                'id' => $result['id'],
                'label' => $result['label'],
                'parent_id' => $result['parent_id'],
                'sort_order' => $result['sort_order'],
                'published' => $result['published'],
                'unit' => $result['unit'],
                'level' => $result['level'],
                'items' => $childItems
            );
        }
        return $items;
    }
    protected function createLabels($label, $level) {
        
        $html = '&nbsp;&nbsp;&nbsp;&nbsp;';
        $nHtml = '';
        if (is_numeric($level) && $level != 0) {
            for ($i = 1; $i <= $level; $i++) {
                $nHtml .= $html;
            }
            return $nHtml . '-&raquo; ' . $label;
        } else {
            return $label;
        }
    }
    public function getLevel($parent_id){
        $model= ProductCategory::model()->findByPk($parent_id);
        if($model)
              return $model->level+1;
        else  
               return 1;
        
    }
    protected function print_children($items) {
        if (!empty($items)) {
            foreach ($items as $child) {
                $newArray = array(
                    'id' => $child['id'], 
                    'label' => ($child['level'] != 0 ) ? $this->createLabels($child['label'], $child['level']) : $child['label'],
                    'parent_id' => $child['parent_id'],
                    'sort_order' => $child['sort_order'],
                    'published' => $child['published'],
                    'unit' => $child['unit'],
                    'level' => $child['level']    
                );
                $this->gridDataArray[] = $newArray;
                $this->print_children($child['items']);
            }
        }
        return $this->gridDataArray;
    }

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->date_added = $this->last_updated = date('Y-m-d h:m:s');
            } else
                $this->last_updated = date('Y-m-d h:m:s');
            return true;
        } else
            return false;
    }
    
    public function saveCategorySize($id){
           CategorySizesListings::model()->deleteAll("category_id=$id");
                  foreach($this->product_size as $size){
                         $model= new CategorySizesListings();
                         $model->category_id=$id;
                         $model->size_id=$size;
                         $model->save(false);
      
           }
           return true;
    }
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProductCategory the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function formatArray($Items){
		$mainArray = array();
		foreach($Items as $item){
			$subArray = $this->formatArray($item['items']);
			$mainArray[$item['id']] = ' » ' . $item['label'];
			if($subArray)
				$mainArray[$item['label']] = $subArray;
		}
		return $mainArray;
	}
    public function getItems($parent_id=null)
	{
		$results = Yii::app()->getDb()->createCommand();
		$results->select('id, label')->from('product_category');
		if($parent_id === null)
			$results->where('parent_id IS NULL');
		else
			$results->where('parent_id=:pid', array(':pid'=>$parent_id));

		$results->order('sort_order ASC, label ASC');
                
		$results = $results->queryAll();
                

		$items = array();

		if(empty($results))
			return $items;
               
		foreach($results AS $result)
		{
			$childItems = $this->getItems($result['id']);
			$items[] = array(
				'label'   => $result['label'],
				'id' => $result['id'],
				'items'   => $childItems
			);
		}
		return $items;
                
	}    
    public function getMenus($parent_id=null)
	{
		$access = 1;
		$results = Yii::app()->getDb()->createCommand();
		$results->select('id, label,slug,parent_id')->from('product_category');
		if($parent_id === null)
			$results->where('parent_id IS NULL');
		else
			$results->where('parent_id=:pid', array(':pid'=>$parent_id));

		$results->order('sort_order ASC, label ASC');
		$results = $results->queryAll();
		$items = array();
		if(empty($results))
			return $items;

		$i      = 0;
		$access = 0;
		foreach($results AS $result)
		{
			
			$childItems = $this->getMenus($result['id']);
			$items[] = array(
				'label'          => CHtml::decode($result['label']),
				'url'            => $result['slug'],
                                'linkoptions'    => array('class' => 'dropdown-toggle','data-toggle' => 'dropdown'),
				'encodeLabel'    => true,
				'activateItems'  => true,
				'activeCssClass' => 'active',
				'itemOptions'    => array('class'=>'dropdown','tabindex'=>$i),
				'submenuOptions' => array('class'=>'dropdown-menu multi-level'),
				'items'          => $childItems,
			);
			$i++;
		}

		return $items;
	}
    
}
