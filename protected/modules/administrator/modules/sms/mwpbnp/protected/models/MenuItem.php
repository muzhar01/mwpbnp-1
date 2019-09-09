<?php

/**
 * This is the model class for table "{{menu_item}}".
 *
 * The followings are the available columns in table '{{menu_item}}':
 * @property integer $item_id
 * @property integer $parent_id
 * @property integer $menu_id
 * @property string $label
 * @property string $url
 * @property string $target
 * @property string $date_added
 * @property string $last_updated
 * @property integer $sort_order
 * @property integer $published
 * @property integer menu_type
 * @property integer access
 * @property integer dafault
 * @property integer content_id
 * The followings are the available model relations:
 * @property Menu $menu
 * @property MenuItem $parent
 * @property MenuItem[] $menuItems
 */
class MenuItem extends CActiveRecord {

    //public $content_id;
    protected $gridDataArray = array();

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'menu_item';
    }

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('menu_id, label, menu_type', 'required'),
            array('menu_id, sort_order, published ,default,level', 'numerical', 'integerOnly' => true),
            array('label,target,url', 'length', 'max' => 255),
            array('access', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('item_id, parent_id, menu_id, label, url, target, date_added, last_updated, sort_order, published, level', 'safe', 'on' => 'search'),
        );
    }

    public function setURL($attribute, $params) {
        if (!$this->getSEF())
            return $this->url = $this->getSEF();
    }

    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'menu' => array(self::BELONGS_TO, 'Menu', 'menu_id'),
            'parent' => array(self::BELONGS_TO, 'MenuItem', 'parent_id'),
            'menuItems' => array(self::HAS_MANY, 'MenuItem', 'parent_id', 'order' => 'sort_order ASC'),
            'allchildren' => array(self::HAS_MANY, 'MenuItem', 'parent_id'),
        );
    }

    public function displayfor($access) {
        $string = '';
        $permition_array = explode(',', $access);
        foreach ($permition_array as $key => $value) {
            switch ($value) {
                case '0':
                    $string .='public <br>';
                    break;
                case '1':
                    $string .='<span style="color:#d616e0">Member</span><br>';
                    break;
                case '2':
                    $string .='<span style="color:#0eb3d1">Affiliate</span><br>';
                    break;
                case '3':
                    $string .='<span style="color:#1eb228">JV Partners</span><br>';
                    break;
                case '4':
                    $string .='<span style="color:#ce1818">Product Partner</span><br>';
                    break;
                case '5':
                    $string .='<span style="color:#2f9cc6">Domain User</span><br>';
                    break;
            }
        }
        return $string;
    }

    public function attributeLabels() {
        return array(
            'item_id' => 'Item',
            'parent_id' => 'Parent',
            'menu_id' => 'Menu',
            'label' => 'Label',
            'url' => 'Url',
            'target' => 'Open in',
            'date_added' => 'Date Added',
            'last_updated' => 'Last Updated',
            'sort_order' => 'Position',
            'published' => 'Published',
            'level' => 'Level',
            'access' => 'Access',
            'default' => 'Default',
            'content_id' => 'Content Id',
            'menu_type' => 'Menu Type',
        );
    }

    public function getItemPostion($item_id) {
        $position = $this->find('item_id=' . $item_id);
        return $position->sort_order;
    }

    public function search($menu_id) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        $criteria = new CDbCriteria;
        $criteria->addCondition('menu_id=' . $menu_id);
        $criteria->addCondition('parent_id IS NULL');
        $criteria->compare('item_id', $this->item_id);
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->compare('menu_id', $this->menu_id);
        $criteria->compare('label', $this->label, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('target', $this->target, true);
        $criteria->compare('date_added', $this->date_added, true);
        $criteria->compare('last_updated', $this->last_updated, true);
        $criteria->compare('sort_order', $this->sort_order);
        $criteria->compare('access', $this->access);
        $criteria->compare('published', $this->published);
        $criteria->compare('default', $this->default);

        $gridData = new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'defaultOrder' => 'sort_order ASC',
            ),
            'pagination' => array(
                'pageSize' => Yii::app()->params['page'],
            ),
                )
        );

        foreach ($gridData->getData() as $gdata) {
            $mainData = $this->getChilds($gdata->item_id, $parent_id = null);
            if ($mainData)
                $this->print_children($mainData);
        }

        $dataProvider = new CArrayDataProvider($this->gridDataArray, array('pagination' => array('pageSize' => 10,),));
        return $dataProvider;
    }

    public function getChilds($item_id, $parent_id = null) {
        $results = Yii::app()->getDb()->createCommand();
        $results->select('*')->from('menu_item');

        if ($parent_id === null)
            $results->where('item_id=:itmid AND parent_id IS NULL', array(':itmid' => (int) $item_id));
        else
            $results->where('parent_id=:pid', array(':pid' => $parent_id));

        $results->order('sort_order ASC, label ASC');
        $results = $results->queryAll();

        $items = array();

        if (empty($results))
            return $items;

        foreach ($results AS $result) {
            $childItems = $this->getChilds($item_id, $result['item_id']);

            $items[] = array(
                'item_id' => $result['item_id'],
                'label' => $result['label'],
                'parent_id' => $result['parent_id'],
                'sort_order' => $result['sort_order'],
                'url' => $result['url'],
                'published' => $result['published'],
                'level' => $result['level'],
                'access' => $this->displayfor($result['access']),
                'menu_type' => $result['menu_type'],
                'default' => $result['default'],
                'items' => $childItems
            );
        }
        return $items;
    }

    public function getSEF() {
        $str = '';
        if (is_numeric($this->menu_type)) {
           
            if ($this->menu_type == 1) {
                if (isset($_POST['MenuItem']))
                    $this->content_id = $_POST['MenuItem']['content_id'];
                $model = Landingpages::model()->findByPk($this->content_id);
                return $this->url = '/page/' . $model->seo_url_name;
            }
            else if ($this->menu_type == 2) {
                if (isset($_POST['MenuItem']))
                    $this->content_id = $_POST['MenuItem']['content_id'];
                $model = Pages::model()->findByPk($this->content_id);
                return $this->url = '/' . $model->seo_url_name;
            }
            else if ($this->menu_type == 3) {
                if (isset($_POST['MenuItem']))
                    $this->content_id = $_POST['MenuItem']['content_id'];
                $model = BlogCategories::model()->findByPk($this->content_id);
                return $this->url = '/blog/' . $model->seo_name;
            }
            else if ($this->menu_type == 4) {
                if (isset($_POST['MenuItem']))
                    $this->content_id = $_POST['MenuItem']['content_id'];
                $model = Products::model()->findByPk($this->content_id);
                return $this->url = '/products/' . $model->seo_url;
            }
            else if ($this->menu_type == 5)
                return $this->url;
            else if ($this->menu_type == 6) {
                return $this->url = $_POST['MenuItem']['content_id'];
             }
        }
       
    }

    public function getModelContents($content_type, $model = NULL) {
        $form = new CActiveForm;
        $str = "";
        switch ($content_type) {
            case 1: // Landing Pages
                    $str = $form->dropDownList($model, 'content_id', CHtml::listData(Landingpages::model()->findAll('published=1 AND trash=0'), 'id', 'name'), array('class' => 'form-control','empty' => 'Select Landing'));
                break;
            case 2: // Content Pages
                $str = $form->dropDownList($model, 'content_id', CHtml::listData(Pages::model()->findAll('published=1 AND trash=0'), 'id', 'name'), array('class' => 'form-control','empty' => 'Select Content Pages'));
                break;

            case 3: // Blog Categories
                $str = $form->dropDownList($model, 'content_id', CHtml::listData(BlogCategories::model()->findAll('published=1'), 'id', 'name'), array('class' => 'form-control','empty' => 'Select Blog Categories'));
                break;
            case 4: // Products
                $str = $form->dropDownList($model, 'content_id', CHtml::listData(Products::model()->findAll('published=1'), 'id', 'product_name'), array('class' => 'form-control','empty' => 'Select Products'));
                break;

            case 5: // Custom Links
                $str = $form->textField($model, 'url', array('class' => 'form-control','size' => 50, 'maxlength' => 55,
                    'onkeyup' => 'getContent(this.value,"custom")',));
                $str .="<p class='hint'>only (a-z0-9 .+_-/?#%&:@) in custom URL</p>";
                break;

            case 6: // General
                $items = array(
                    '/'=>'Home Page',
                    '/knowledgebase'=>'Knowledge Base',
                    '/marketplace'=>'Marketplace (Outside)',
                    '/signup/affiliate'=>'Affiliate Signup Page',
                    '/member/marketplace'=>'Marketplace (Member)',
                    '/member'=>'Member Area Home Page',
                    '/member/my-profile' => 'My Profile',
                    '/member/change-password' => 'Change Password',
                    '/member/report/orders' => 'My Order Histroy',
                    '/signup/affiliate' => 'Affiliate',
                    '/member/my-download' => 'My Download',
                    '/member/login' => 'Login',
                    '/member/logout' => 'Logout',
                    
                    
                );
                $str = $form->dropDownList($model, 'content_id', $items, array(
                    'class' => 'form-control',
                    'empty' => 'Select Items',
                    'options'=>array($model->url=>array('selected'=>'selected')),
                    'onchange' => 'getContent(this.value,"general");',
                        )
                );

                break;
        }
        return $str;
    }

    public function getContents($content_type) {

        $str = "";
        switch ($content_type) {
            case 1: // Landing Pages
                $str = CHtml::dropDownList('MenuItem[content_id]', 'content_id', CHtml::listData(Landingpages::model()->findAll('published=1 AND trash=0'), 'id', 'name'), array(
                            'empty' => 'Select Landing Pages','class' => 'form-control',
                ));
                break;
            case 2: // Content Pages
                $str = CHtml::dropDownList('MenuItem[content_id]', 'content_id', CHtml::listData(Pages::model()->findAll('published=1 AND trash=0'), 'id', 'name'), array(
                            'empty' => 'Select Content Pages','class' => 'form-control',
                ));
                break;

            case 3: // Blog Categories
                $str = CHtml::dropDownList('MenuItem[content_id]', 'content_id', CHtml::listData(BlogCategories::model()->findAll('published=1'), 'id', 'name'), array(
                            'empty' => 'Select Blog Categories','class' => 'form-control',
                        ));
                break;
            case 4: // Products
                $str = CHtml::dropDownList('MenuItem[content_id]', 'content_id', CHtml::listData(Products::model()->findAll('published=1'), 'id', 'product_name'), array(
                            'empty' => 'Select Products','class' => 'form-control',
                        ));
                break;

            case 5: // Custom Links
                $str = CHtml::textField('MenuItem[url]', '', array('class' => 'form-control','size' => 50, 'maxlength' => 55,
                ));
                $str .="<p class='hint'>only (a-z0-9 .+_-/?#%&:@) in custom URL</p>";
                break;

            case 6: // General
                $items = array(
                    'login' => 'Login',
                    'member/logout' => 'Logout',
                    'member/my-profile' => 'My Profile',
                    'member/change-password' => 'Change Password',
                    'member/report/orders' => 'My Order Histroy',
                    'member/report/orders/sales' => 'My Sales',
                    'member/my-download' => 'My Download',
                    'member/marketplace' => 'MarketPlace in Member Area',
                    'marketplace' => 'MarketPlace',
                    '/signup/affiliate' => 'Affiliate',
                );
                $str = CHtml::dropDownList('MenuItem[content_id]', 'content_id', $items, array(
                            'empty' => 'Select Items','class' => 'form-control',
                            'onchange' => 'getContent(this.value,"general");',
                                )
                );
                break;
        }
        return $str;
    }

    protected function createLabels($label, $level) {
        $html = '&nbsp;&nbsp;&nbsp;&nbsp;';
        $nHtml = '';
        if (is_numeric($level) && $level != 0) {
            for ($i = 1; $i <= $level; $i++) {
                $nHtml .= $html;
            }
            return $nHtml . '&raquo;' . $label;
        } else {
            return $label;
        }
    }

    protected function print_children($items) {
        if (!empty($items)) {
            foreach ($items as $child) {
                $newArray = array('id' => $child['item_id'], 'label' => ($child['level'] != 0 ) ? $this->createLabels($child['label'], $child['level']) : $child['label'],
                    'parent_id' => $child['parent_id'],
                    'sort_order' => $child['sort_order'],
                    'access' => $child['access'],
                    'url' => $child['url'],
                    'published' => $child['published'],
                    'default' => $child['default'],
                    'menu_type' => $child['menu_type']
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
                $this->sort_order = $this->sort_order + 1;
                $this->default = 0;
                $this->date_added = $this->last_updated = time();
                if ($this->menu_type == 5 || $this->menu_type == 6)
                    $this->content_id = 0;
            }
            else {
                $this->date_added = $this->last_updated = time();
                if ($this->menu_type == 5 || $this->menu_type == 6)
                    $this->content_id = 0;
            }
            $this->url = $this->getSEF();
            return true;
        } else
            return false;
    }

    /* private function getContentId($content_type,$seo_url){
      return $id;
      } */

    public function getDefault($url) {
        if ($this->count(array('condition' => "url='$url' AND `published`=1 AND `default`=1")))
            return true;
        else
            return false;
    }

}
