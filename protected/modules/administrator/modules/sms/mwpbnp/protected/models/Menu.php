<?php

/**
 * This is the model class for table "{{menu}}".
 *
 * The followings are the available columns in table '{{menu}}':
 * @property integer $menu_id
 * @property string $name
 * @property string $place_holder
 * @property string $module_name
 * @property string $date_added
 * @property string $last_updated
 * @property integer $published
 *
 * The followings are the available model relations:
 * @property MenuItem[] $menuItems
 */
class Menu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Menu the static model class
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
		return 'menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, place_holder, date_added, last_updated', 'required'),
			array('published', 'numerical', 'integerOnly'=>true),
			array('name, place_holder', 'length', 'max'=>255),
			array('module_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('menu_id, name, place_holder, module_name, date_added, last_updated, published', 'safe', 'on'=>'search'),
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
			'menuItems' => array(self::HAS_MANY, 'MenuItem', 'menu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'menu_id'      => 'Menu',
			'name'         => 'Name',
			'place_holder' => 'Place Holder',
			'module_name'  => 'Module Name',
			'date_added'   => 'Date Added',
			'last_updated' => 'Last Updated',
			'published'    => 'Published',
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
		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('place_holder',$this->place_holder,true);
		$criteria->compare('module_name',$this->module_name,true);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('last_updated',$this->last_updated,true);
		$criteria->compare('published',$this->published);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/* Get Items For Front End */

	public function getItems($menu_id, $parent_id=null)
	{
		$access = 1;
		$results = Yii::app()->getDb()->createCommand();
		$results->select('item_id, label, url, target,access')->from('menu_item');
		if($parent_id === null){
			$results->where('menu_id=:mid AND published =1 AND parent_id IS NULL', array(':mid'=>(int) $menu_id));
			//$linkoptions = array('class' => 'dropdown-toggle','data-toggle' => 'dropdown');
		}
		else{
			$results->where('menu_id=:mid AND published =1 AND parent_id=:pid', array(':mid'=>(int) $menu_id, ':pid'=>$parent_id));
			$linkoptions = array();
		}

		$results->order('sort_order ASC, label ASC');
		$results = $results->queryAll();
		$items = array();
		if(empty($results))
			return $items;

		$i      = 0;
		$access = 0;
		foreach($results AS $result)
		{
			if(!empty($result['target']))
			{
				$linkoptions = array('class' => 'dropdown-toggle','data-toggle' => 'dropdown','target'=>'_blank');
			}
			$access = $this->getAccess($result['access']);
			$childItems = $this->getItems($menu_id, $result['item_id']);
			$items[] = array(
				'label'          => CHtml::decode($result['label']),
				'url'            => $result['url'],
				//'linkOptions'    => $linkoptions,
				'encodeLabel'    => true,
				'activateItems'  => true,
				'activeCssClass' => 'active',
				'visible'        => $access,
				'itemOptions'    => array('class'=>'items','tabindex'=>$i,'target'=>'_blank'),
				'submenuOptions' => array('class'=>'dropdown-menu'),
				'items'          => $childItems,
			);
			$i++;
		}

		return $items;
	}

	private function getAccess( $access ){
		// if($access==0)
		// 	return '1';
		// else {
		// 	if(!Yii::app()->user->isGuest){
		// 		if($access==Yii::app()->user->role)
		// 			return '1';
		// 		else
		// 			return '0';
		// 	}
		// 	else
		// 		return '0';
		// }

		$permition_array = explode(',', $access);
		foreach ($permition_array as $key => $value) {
			if( $value == '0' ){
				return '1';
			}else{
				if( !Yii::app()->user->isGuest ){
					if( $value == Yii::app()->user->role ){
						return '1';
					}
				}
			}
		}
		return '0';
	}

	/**
	* Return Menu Items Parents and Childs Array Form
	*/
	public function getItemsV2($menu_id, $parent_id=null)
	{
		$results = Yii::app()->getDb()->createCommand();
		$results->select('item_id, label')->from('menu_item');
		if($parent_id === null)
			$results->where('menu_id=:mid AND parent_id IS NULL', array(':mid'=>(int)$menu_id));
		else
			$results->where('menu_id=:mid AND parent_id=:pid', array(':mid'=>(int)$menu_id, ':pid'=>$parent_id));

		$results->order('sort_order ASC, label ASC');
		$results = $results->queryAll();

		$items = array();

		if(empty($results))
			return $items;

		foreach($results AS $result)
		{
			$childItems = $this->getItemsV2($menu_id, $result['item_id']);
			$items[] = array(
				'label'   => $result['label'],
				'item_id' => $result['item_id'],
				'items'   => $childItems
			);
		}
		return $items;
	}

	/**
	* Re Format Array For Group Drop Down
	*/
	public function formatArray($menuItems)
	{
		$mainArray = array();
		foreach($menuItems as $menu)
		{
			$subArray = $this->formatArray($menu['items']);
			$mainArray[$menu['item_id']] = $menu['label'];
			if($subArray)
				$mainArray[$menu['label']] = $subArray;
		}
		return $mainArray;
	}
	public function getItemsByPosition($menu_id, $parent_id=null)
	{
		$results = Yii::app()->getDb()->createCommand();
		$results->select('item_id, label,sort_order')->from('menu_item');

		if($parent_id === null)
			$results->where('menu_id=:mid AND parent_id IS NULL', array(':mid'=>(int)$menu_id));
		else
			$results->where('menu_id=:mid AND parent_id=:pid', array(':mid'=>(int)$menu_id, ':pid'=>$parent_id));

		$results->order('sort_order ASC, label ASC');
		$results = $results->queryAll();

		$items = array();

		if(empty($results))
			return $items;

		foreach($results AS $result)
		{
			$childItems = $this->getItemsByPosition($menu_id, $result['item_id']);

			$items[] = array(
				'label'      => $result['label'],
				'sort_order' => $result['sort_order'],
				'items'      => $childItems
			);
		}
		return $items;

	}
	public function formatArrayByPosition($menuItems)
	{
		$mainArray = array();
		foreach($menuItems as $menu)
		{
			$subArray = $this->formatArrayByPosition($menu['items']);
			$mainArray[$menu['sort_order']] = $menu['label'];
			if($subArray)
				$mainArray[$menu['label']] = $subArray;
		}
		return $mainArray;
	}
}