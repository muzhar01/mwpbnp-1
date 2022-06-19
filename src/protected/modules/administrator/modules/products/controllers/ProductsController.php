<?php

class ProductsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public $resource_id=2;
        
        public function init() {
            parent::init();
            $this->homeUrl=$this->baseUrl .= '/products/products'; //Backend, I am using for Admin
            if (Yii::app()->user->isGuest) {
                $session = Yii::app()->session;
                $session['referal_url'] = $this->baseUrl;
                $session->open();
                $this->redirect('/administrator/login', true);
            }

        }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'view')) {
                    $this->render('view',array(
                            'model'=>$this->loadModel($id),
                    ));
                }
                else
                    throw new CHttpException(403, Yii::app()->params['access']);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'add')) {
            $model=new Products;
            $model->setScenario('insert');
            if(isset($_POST['Products'])){
                $model->attributes=$_POST['Products'];
                $model->weight='';
                $model->length='';
                if(!empty($_FILES['Products']['name']['image'])){
                            $rnd = rand(0,9999);
                            $uploadedFile=CUploadedFile::getInstance($model,'image');
                            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                            $uploadedFile->saveAs($this->uploadPath.'/'.$fileName);
                            $model->image = $fileName;
                        }
                if($model->save()){
                    $model->saveProductSize($model->id);
                    $model->saveProductThickness($model->id);
                    Yii::app()->user->setFlash('success', "Product is successfully saved!");
                    $this->redirect(array('index'));
                }
            }

            $this->render('create',array(
                'model'=>$model,
            ));
        }
        else
            throw new CHttpException(403, Yii::app()->params['access']);
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'update')) {
                $model=$this->loadModel($id);
                $model->setScenario('update');
            if(isset($_POST['Products']))
            {
                $model->attributes=$_POST['Products'];

                if(!empty($_FILES['Products']['name']['image'])){
                        $rnd = rand(0,9999);
                        $uploadedFile=CUploadedFile::getInstance($model,'image');
                        $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
                        $uploadedFile->saveAs($this->uploadPath.'/'.$fileName);

                        $model->image = $fileName;
                }

                if($model->save()){
                   $model->saveProductSize($model->id);
                   $model->saveProductThickness($model->id);
                   Yii::app()->user->setFlash('success', "Product is successfully saved!");

                   $this->redirect(array('index'));
                                }
            }

            $this->render('update',array(
                'model'=>$model,
            ));
        }
        else
            throw new CHttpException(403, Yii::app()->params['access']);
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
    public function actionGetProductSize($id){
           $criteria = new CDbCriteria();
           $criteria->compare ('category_id', $id);
            $list = CHtml::ListData (CategorySizesListings::model ()->findAll ($criteria), 'size_id', function($post) { return stripslashes($post->size->title); });
            echo CHtml::CheckBoxList ('Products[products_size][]', 'products_size', $list, array(
                                'template' => '<div class="col-lg-2">{input} {label}</div>',
                                'separator' => '',
                    ), 'products_size', 'products_size'
            );
    }
    
    public function actionBasePrice($id){
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'update')) {
                $model=$this->loadModel($id);
                $thickness= ProductsThicknessListings::model()->findAll("product_id=$id");
                $size=  ProductsSizesListings::model()->findAll("product_id=$id");
            if(isset($_POST['Products']))
            {
                          $model->saveBasePrice();
                          Yii::app()->user->setFlash('success', "Product is saved successfully!");
                          $this->redirect(array('index'));
                     }
		$this->render('baseprice',array(
			'model'=>$model,
                        'thickness'=>  $thickness,
                        'size'=>  $size,    
		));
            }
                else
                    throw new CHttpException(403, Yii::app()->params['access']);
    }
    public function actionMarketPrice($id){
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'update')) {
            $model=$this->loadModel($id);
            $thickness= ProductsThicknessListings::model()->findAll("product_id=$id");
            $size=  ProductsSizesListings::model()->findAll("product_id=$id");
    		if(isset($_POST['Products']))
    		{
                $model->saveMarketPrice();
                Yii::app()->user->setFlash('success', "Product is saved successfully!");
                $this->redirect(array('index'));
            }
    		$this->render('marketprice',array(
    			'model'=>$model,
                            'thickness'=>  $thickness,
                            'size'=>  $size,    
    		));
        }
        else
            throw new CHttpException(403, Yii::app()->params['access']);
    }
    public function actionWeight($id){
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'update')) {
                $model=$this->loadModel($id);
                $thickness= ProductsThicknessListings::model()->findAll("product_id=$id");
                $size=  ProductsSizesListings::model()->findAll("product_id=$id");
		if(isset($_POST['Products']))
		{
                     $model->saveWeight();
                Yii::app()->user->setFlash('success', "Product is saved successfully!");
                $this->redirect(array('index'));
              }
		$this->render('weight',array(
			'model'=>$model,
                        'thickness'=>  $thickness,
                        'size'=>  $size,    
		));
            }
                else
                    throw new CHttpException(403, Yii::app()->params['access']);
    }
    public function actionArchive($id){
           if(is_numeric ($id)){
                  Products::model()->saveArchivePrice($id);
                  $this->redirect(array('index'));
           }
    }
    public function actionWidget($id){
           if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'update')) {
                $model=$this->loadModel($id);
                $thickness= ProductsThicknessListings::model()->findAll("product_id=$id");
                $size=  ProductsSizesListings::model()->findAll("product_id=$id");
                $graph = ProductsGraph::model()->getData($id);
               
		if(isset($_POST['Products']))
		{
                     $model->saveWeight();
                      $this->redirect(array('weight','id'=>$id));
              }
		$this->render('widget',array(
			'model'=>$model,
                        'thickness'=>  $thickness,
                        'size'=>  $size,    
                        'graph'=>$graph    
		));
            }
                else
                    throw new CHttpException(403, Yii::app()->params['access']);
    }
	public function actionDelete($id)
	{
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'delete')) {
                $this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
                else
                    throw new CHttpException(403, Yii::app()->params['access']);
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'view')) {
            $model=new Products('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Products']))
                $model->attributes=$_GET['Products'];
            if (isset ($_GET['pageSize'])) {
                Yii::app ()->user->setState ('pageSize', (int) $_GET['pageSize']);
                unset ($_GET['pageSize']);  // would interfere with pager and repetitive page size change
            }

    		$this->render('index',array(
    			'model'=>$model,
    		));
        } else
            throw new CHttpException(403, Yii::app()->params['access']);
	}

	public function actionPublished($id) {
            if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess($this->resource_id, 'published')) {
                $Id = (int) $_GET['id'];
                $model = $this->loadModel($Id);

                if ($model->published == 1)
                    $model->published = 0;
                else
                    $model->published = 1;
                if ($model->save(false))
                    $this->redirect($this->baseUrl . '/index');
             } else
                    throw new CHttpException(403, Yii::app()->params['access']);
        }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Products the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Products::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        
        

	/**
	 * Performs the AJAX validation.
	 * @param Products $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='products-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
