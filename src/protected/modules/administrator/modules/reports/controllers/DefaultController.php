<?php

class DefaultController extends Controller {
    public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public $resource_id=2;
    public $name='';
    public $number='';
    public function init() {
        Yii::import('application.extensions.phpmailer.JPhpMailer'); // Import php mail class
        if (Yii::app()->user->isGuest) {
            $session = Yii::app()->session;
            $session['referal_url'] = '/administrator/reports';
            $session->open();
            $this->redirect('/administrator', true);
            
        }
    }
    
    
    public function actionIndex() {
        $this->render('reports');
    }

    public function actionPriceList($slug=''){
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(41, 'view')) {
            $model=new Products('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Products'])) {
                $model->attributes=$_GET['Products'];
            }
            if(!empty($slug)) {
                $model->slug=$slug;
            }
            $this->render('pricelist',array('model'=>$model,));        
        }
    }

    public function actionInventoryList($slug=''){
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(42, 'view')) {
            $model=new Products('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Products'])) {
                $model->attributes=$_GET['Products'];
            }
            if(!empty($slug)) {
                $model->slug=$slug;
            }
            $this->render('inventorylist',array('model'=>$model,));        
        }
    }

    // for showing customers list in reports
    public function actionCustomerList()
    {

        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(28, 'view')) { // first we check permission
            $model=new Members('search');    // fetch data

            $this->render('customerlist',array(
                'model'=>$model,
                'pagination' => false

            ));
        } else
            throw new CHttpException(403, Yii::app()->params['access']);
    }

    // for exporting it to csv
    public function actionExportCustomerList($zone="",$area="",$salesOfficer=""){
        $filters = ['is_enable'=>'0'];
        if ($zone != "") {
            $filters['zone'] = $zone;
        }
        if ($area != "") {
            $filters['area'] = $area;
        }
        if ($salesOfficer != "") {
            $filters['sales_officer'] = $salesOfficer;
        }
        // call static method and passes arguments
        CsvExport::export(
            // first contains data
            // in find all by attributes we are providing where conditions
            (Members::model()->findAllByAttributes($filters)), // a CActiveRecord array OR any CModel array
                // columns to be exported
                array(
                    'id'=>array(), 
                    'fname'=>array(),
                    'lname'=>array(),
                    'area'=>array(),
                    'zone'=>array(),
                    'phone_office'=>array(),
                    'cellular'=>array(),
                    'email'=>array(),
                ),
                // not sure,b but i guess for printing header
                true, // boolPrintRows
                // File name
                'CustomerList--'.date('d-m-Y H-i').".csv",
                // saperator
                ",",
                // header labels
                [
                    'id'=>'ID', 
                    'fname'=>'Name', 
                    'lname'=>'Business Name',
                    'area'=>'Area',
                    'zone'=>'Zone',
                    'phone_office'=>'Office Phone',
                    'cellular'=>'Mobile',
                    'email'=>'Email'
                ]
        );
    }



    public function actionCustomerDues()
    {

        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(25, 'view')) {
            // $model=new Members('reportsearch');
            // $model->current_balance = ">0";

            $criteria = new CDbCriteria;
            $criteria->select = '*';
            $criteria->addCondition("current_balance > 0");

            $model    =    Members::model()->findAll($criteria);

            // echo "<pre>";print_r($model);die;


            $this->render('customerdues',array(
                'model'=>$model,
            ));
        } else
            throw new CHttpException(403, Yii::app()->params['access']);
    }
    public function actionExportCustomerDuesList(){
       
        // call static method and passes arguments
        CsvExport::export(
            // first contains data
            // in find all by attributes we are providing where conditions
            (Members::model()->findAll('current_balance > 0')), // a CActiveRecord array OR any CModel array
                // columns to be exported
                array(
                    'id'=>array(), 
                    'fname'=>array(),
                    'lname'=>array(),
                    'area'=>array(),
                    'zone'=>array(),
                 
                    'cellular'=>array(),
                    'current_balance'=>array(),
                ),
                // not sure,b but i guess for printing header
                true, // boolPrintRows
                // File name
                'CustomerDuesList--'.date('d-m-Y H-i').".csv",
                // saperator
                ",",
                // header labels
                [
                    'id'=>'ID', 
                    'fname'=>'Name', 
                    'lname'=>'Business Name',
                    'area'=>'Area',
                    'zone'=>'Zone',
                    'cellular'=>'Mobile',
                    'current_balance'=>'Current Balance'
                ]
        );
    }

    public function actionExportVehicleLedger($from_date="",$to_date="",$vehicle_id=""){
        $endLine = PHP_EOL;
        $returnVal = '';
        $csvFileName = 'VehicleLedger--'.date('d-m-Y H-i').".csv";
        $boolPrintRows = true;
        $header = [
            'payment_date'=>'Pyament Date',   
            'payement'=>'Payment',
            'payment_mode'=>'Payment Method / Remarks',
            'income'=>'Income',
            'expenses'=>'Expense',
            'resigtration_number'=>'Reg. Number', 
            'vehicle_type'=>'Vehicle Type',
        ];
        $separator = ',';
        $coldefs =     array(
            'payment_date'=>array(), 
            'payment'=>array(),
            'payment_mode'=>array(),
            'income'=>array(),
            'expenses'=>array(),
            'vehicle->resigtration_number'=>array(),
            'vehicle->vehicle_type'=>array(),
        );

        if($vehicle_id != ''){
       $criteria = new CDbCriteria;
        $criteria->select = 't.*, vr.* ';
        $criteria->join = ' JOIN `vehicle_registration` AS `vr` ON t.vehicle_id = vr.id';
        $criteria->addCondition("t.vehicle_id = ".$vehicle_id." AND t.payment_date BETWEEN '".$from_date."' AND '".$to_date."'");

        $resultSet    =    VehiclePayments::model()->findAll($criteria);
        }else{
            $criteria = new CDbCriteria;
            $criteria->select = 't.*, vr.* ';
            $criteria->join = ' JOIN `vehicle_registration` AS `vr` ON t.vehicle_id = vr.id';
            $criteria->addCondition("t.payment_date BETWEEN '".$from_date."' AND '".$to_date."'");

            $resultSet    =    VehiclePayments::model()->findAll($criteria);
        }


        if($csvFileName != null)
        {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=".$csvFileName);
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: binary");
        }

        if($boolPrintRows == true){
            $names = '';
            if (!empty($header)) {
                foreach($header as $col=>$config){
                    $names .= $config.$separator;
                }   
            }
            $names = rtrim($names,$separator);
            if($csvFileName != null){
                echo $names.$endLine;
            }else
            $returnVal .= $names.$endLine;
        }
        // print_r($resultSet);exit;
        foreach($resultSet as $row){
            $r = '';
            $returnVal .= trim(rtrim($row->payment_date)) . $separator;
            $returnVal .= trim(rtrim($row->payment)) . $separator;
            $returnVal .= trim(rtrim($row->payment_mode)) . $separator;
            $returnVal .= trim(rtrim($row->income)) . $separator;
            $returnVal .= trim(rtrim($row->expenses)) . $separator;
            $returnVal .= trim(rtrim($row->vehicle->resigtration_number)) . $separator;
            $returnVal .= trim(rtrim($row->vehicle->vehicle_type)) . $separator;
            $returnVal .= PHP_EOL;
            // $item = trim(rtrim($r,$separator)).$endLine;

        }
        echo $returnVal;exit;
        // call static method and passes arguments
       
    }
    
    public function actionLedgers()
    {
        $this->render('Ledgers');
    }

    public function actionPaymentMethods() 
    {
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(27, 'view')) { // before 9
            $model= new Banks("search");//->findAllByAttributes(['published'=>'1']);
            $this->render('paymentmethods',array(
                'model'=>$model
            ));
        } else
            throw new CHttpException(403, Yii::app()->params['access']);
    }

    public function actionExportPaymentMethods()
    {
     
        $endLine = PHP_EOL;
        $returnVal = '';
        $csvFileName = 'PaymentMethods--'.date('d-m-Y H-i').".csv";
        $boolPrintRows = true;
        $header = [
            'id'=>'ID', 
            'name'=>'Name', 
            'account_no'=>'Account Number',
            'account_title'=>'Account Title',
            'primary_name'=>'Primary Name',
            'charges'=>'Charges (% Of Invoice Value)'
          
           
        ];
        $separator = ',';
        $coldefs =     array(
            'id'=>array(), 
            'name'=>array(),
            'account_no'=>array(),
            'account_title'=>array(),
            'primary_name'=>array(),
            'charges'=>array()
        );

        if($csvFileName != null)
        {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=".$csvFileName);
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: binary");
        }

        $resultSet =  Banks::model()->findAllByAttributes(['published'=>'1']);

        if($boolPrintRows == true){
            $names = '';
            if (!empty($header)) {
                foreach($header as $col=>$config){
                    $names .= $config.$separator;
                }   
            }
            $names = rtrim($names,$separator);
            if($csvFileName != null){
                echo $names.$endLine;
            }else
            $returnVal .= $names.$endLine;
        }
        // print_r($resultSet);exit;
        foreach($resultSet as $row){
            $r = '';
            $returnVal .= trim(rtrim(str_replace(',', ' ', $row['id']))) . $separator;
            $returnVal .= trim(rtrim(str_replace(',', ' ', $row['name']))) . $separator;
            $returnVal .= trim(rtrim(str_replace(',', ' ', $row['account_no']))) . $separator;
            $returnVal .= trim(rtrim(str_replace(',', ' ', $row['account_title']))) . $separator;
            $returnVal .= trim(rtrim(str_replace(',', ' ', $row['primary_name']))) . $separator;
            $returnVal .= trim(rtrim(str_replace(',', ' ', $row['charges']))) . $separator;
           
            $returnVal .= PHP_EOL;
            // $item = trim(rtrim($r,$separator)).$endLine;

        }
        echo $returnVal;exit;
    }

    public function actionMobileandemaillist()
    {
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(32, 'view')) {
            $model=new Members('reportsearch');

            // $model->unsetAttributes();  // clear any default values
            // if(isset($_GET['Banks']))
            //     $model->attributes=$_GET['Banks'];
            // if (isset ($_GET['pageSize'])) {
            //         Yii::app ()->user->setState ('pageSize', (int) $_GET['pageSize']);
            //         unset ($_GET['pageSize']);  // would interfere with pager and repetitive page size change
            // }
            $this->render('mobileandemaillist',array(
                'model'=>$model->reportsearch(),
            ));
        } else
            throw new CHttpException(403, Yii::app()->params['access']);
    }

    public function actionExportMobileAndMailList()
    {
        $endLine = PHP_EOL;
        $returnVal = '';
        $csvFileName = 'mobileandemaillist--'.date('d-m-Y H-i').".csv";
        $boolPrintRows = true;
        $header = [
            'id'=>'ID', 
            'fname'=>'Name', 
            'company_name'=>'Company Name',
            'email'=>'Email',
            'cellular'=>'Mobile 1',
            'cellular2'=>'Mobile 2',
            'cellular3'=>'Mobile 3',
           
        ];
        $separator = ',';
        $coldefs =     array(
            'id'=>array(), 
            'fname'=>array(),
            'company_name'=>array(),
            'email'=>array(),
            'cellular'=>array(),
            'cellular2'=>array(),
            'cellular3'=>array(),
        );

       


        if($csvFileName != null)
        {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=".$csvFileName);
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: binary");
        }

        $resultSet = Members::model()->findAll();
        if($boolPrintRows == true){
            $names = '';
            if (!empty($header)) {
                foreach($header as $col=>$config){
                    $names .= $config.$separator;
                }   
            }
            $names = rtrim($names,$separator);
            if($csvFileName != null){
                echo $names.$endLine;
            }else
            $returnVal .= $names.$endLine;
        }
        // print_r($resultSet);exit;
        foreach($resultSet as $row){
            $r = '';
            $returnVal .= trim(rtrim($row->id)) . $separator;
            $returnVal .= trim(rtrim($row->fname)) . $separator;
            $returnVal .= trim(rtrim($row->company_name)) . $separator;
            $returnVal .= trim(rtrim($row->email)) . $separator;
            $returnVal .= trim(rtrim($row->cellular)) . $separator;
            $returnVal .= trim(rtrim($row->cellular2)) . $separator;
            $returnVal .= trim(rtrim($row->cellular3)) . $separator;
            $returnVal .= PHP_EOL;
            // $item = trim(rtrim($r,$separator)).$endLine;

        }
        echo $returnVal;exit;
        
    }

    public function actionVendorpayments()
    {
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(33, 'view')) {
            $model=new Banks('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Banks']))
                $model->attributes=$_GET['Banks'];
            if (isset ($_GET['pageSize'])) {
                    Yii::app ()->user->setState ('pageSize', (int) $_GET['pageSize']);
                    unset ($_GET['pageSize']);  // would interfere with pager and repetitive page size change
            }
            $this->render('paymentmethods',array(
                'model'=>$model,
            ));
        } else
            throw new CHttpException(403, Yii::app()->params['access']);
    }

    public function actionQuotesconfirmed()
    {
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(34, 'view')) {
            $model=Quotes::model();//->findAllByAttributes(['published'=>'1']);
            $model->status = 'Confirmed';
            $this->render('quotesconfirmed',array(
                'model'=>$model
            ));
        } else
            throw new CHttpException(403, Yii::app()->params['access']);
    }

    public function actionExportQuotesconfirmed()
    {
       

        $date = date('Y-m');
        $data = Quotes::model()->findAll(
            'created_on like :created_on and status = :quote',
            [':created_on'=>"%$date%", ':quote'=>'Confirmed']
        );
        $even = true;
        ; 
       

        foreach ($data as $key => $value) {
            $member = Members::model()->findByPk($value->member_id);
            $payment = CustomerPayments::model()->find(
                'invoice_no = :invoice_no',
                [':invoice_no'=>$value['quote_id']]
            );
       
            $arr[] = array("quote_id"=>$value['quote_id'],"lname"=>$member['lname'],"quote_value"=>$value['quote_value'],"amount_paid"=>(!empty($payment) ? $payment->amount_paid : '0'),"payment_method"=>(!empty($payment) ? $payment->payment_method : '-'),"comments"=>$value['comments']);

          
            if ($even) 
                $even = false;
            else 
                $even = true;
        }
       $endLine = PHP_EOL;
        $returnVal = '';
        $csvFileName = 'quotesconfirmedlist--'.date('d-m-Y H-i').".csv";
        $boolPrintRows = true;
        $header = [
            'quote_id'=>'Quote Id', 
            'lname'=>'Business Name', 
            'quote_value'=>'Quote Value',
            'amount_paid'=>'Amount Paid',
            'payment_method'=>'Payment Method',
            'comments'=>'Remarks', 
        ];
        $separator = ',';
        $coldefs =     array(
            'quote_id'=>array(), 
            'lname'=>array(),
            'quote_value'=>array(),
            'amount_paid'=>array(),
            'payment_method'=>array(),
            'comments'=>array(),
        );

       


        if($csvFileName != null)
        {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=".$csvFileName);
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: binary");
        }

        // $resultSet = Members::model()->findAll();
          $date = date('Y-m');
                $data = Quotes::model()->findAll(
                    'created_on like :created_on and status = :quote',
                    [':created_on'=>"%$date%", ':quote'=>'Confirmed']
                );
                //    echo "<pre>";
                // print_r($data);
                // die;

        if($boolPrintRows == true){
            $names = '';
            if (!empty($header)) {
                foreach($header as $col=>$config){
                    $names .= $config.$separator;
                }   
            }
            $names = rtrim($names,$separator);
            if($csvFileName != null){
                echo $names.$endLine;
            }else
            $returnVal .= $names.$endLine;
        }




        foreach($arr as $row){
            $r = '';
            $returnVal .= trim(rtrim($row['quote_id'])) . $separator;
            $returnVal .= trim(rtrim($row['lname'])) . $separator;
            $returnVal .= trim(rtrim($row['quote_value'])) . $separator;
            $returnVal .= trim(rtrim($row['amount_paid'])) . $separator;
            $returnVal .= trim(rtrim($row['payment_method'])) . $separator;
            $returnVal .= trim(rtrim($row['comments'])) . $separator;
           
            $returnVal .= PHP_EOL;
            // $item = trim(rtrim($r,$separator)).$endLine;

        }

       
        echo $returnVal;exit;

    }

    public function actionOrdersinline()
    {
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(36, 'view')) {
            $model=Quotes::model();//->findAllByAttributes(['published'=>'1']);
            $model->status = 'Payment Verified';
            $this->render('ordersinline',array(
                'model'=>$model
            ));
        } else
            throw new CHttpException(403, Yii::app()->params['access']);
    }

    public function actionExportOrdersInline()
    {
       

        $date = date('Y-m');
        $data = Quotes::model()->findAll(
            'created_on like :created_on and status = :quote',
            [':created_on'=>"%$date%", ':quote'=>'Payment Verified']
        );
        $even = true;
        foreach ($data as $key => $value) {
            $member = Members::model()->findByPk($value->member_id);
            $payment = CustomerPayments::model()->find(
                'invoice_no = :invoice_no',
                [':invoice_no'=>$value['quote_id']]
            );
           
    $arr[] = array("quote_id"=>$value['quote_id'],"lname"=>$member['lname'],"quote_value"=>$value['quote_value'],"amount_paid"=>(!empty($payment) ? $payment->amount_paid : '0'),"payment_method"=>(!empty($payment) ? $payment->payment_method : '-'),"comments"=>$value['comments']);
            if ($even) 
                $even = false;
            else 
                $even = true;
        }
                
       $endLine = PHP_EOL;
        $returnVal = '';
        $csvFileName = 'ordersinline--'.date('d-m-Y H-i').".csv";
        $boolPrintRows = true;
        $header = [
            'quote_id'=>'Quote Id', 
            'lname'=>'Business Name', 
            'quote_value'=>'Quote Value',
            'amount_paid'=>'Amount Paid',
            'payment_method'=>'Payment Method',
            'comments'=>'Remarks', 
        ];

        $separator = ',';
        $coldefs =     array(
            'quote_id'=>array(), 
            'lname'=>array(),
            'quote_value'=>array(),
            'amount_paid'=>array(),
            'payment_method'=>array(),
            'comments'=>array(),
        );

       


        if($csvFileName != null)
        {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=".$csvFileName);
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: binary");
        }

        // $resultSet = Members::model()->findAll();
          $date = date('Y-m');
                $data = Quotes::model()->findAll(
                    'created_on like :created_on and status = :quote',
                    [':created_on'=>"%$date%", ':quote'=>'Confirmed']
                );
                //    echo "<pre>";
                // print_r($data);
                // die;

        if($boolPrintRows == true){
            $names = '';
            if (!empty($header)) {
                foreach($header as $col=>$config){
                    $names .= $config.$separator;
                }   
            }
            $names = rtrim($names,$separator);
            if($csvFileName != null){
                echo $names.$endLine;
            }else
            $returnVal .= $names.$endLine;
        }




        foreach($arr as $row){
            $r = '';
            $returnVal .= trim(rtrim($row['quote_id'])) . $separator;
            $returnVal .= trim(rtrim($row['lname'])) . $separator;
            $returnVal .= trim(rtrim($row['quote_value'])) . $separator;
            $returnVal .= trim(rtrim($row['amount_paid'])) . $separator;
            $returnVal .= trim(rtrim($row['payment_method'])) . $separator;
            $returnVal .= trim(rtrim($row['comments'])) . $separator;
           
            $returnVal .= PHP_EOL;
            // $item = trim(rtrim($r,$separator)).$endLine;

        }

       
        echo $returnVal;exit;

    }

    public function actionOrderfordelivery()
    {
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(37, 'view')) {
            $model=Quotes::model();//->findAllByAttributes(['published'=>'1']);
            $model->status = 'Ready for Delivery';
            $this->render('orderfordelivery',array(
                'model'=>$model
            ));
        } else
            throw new CHttpException(403, Yii::app()->params['access']);
    }
    public function actionExportOrderfordelivery()
    {
       

        $date = date('Y-m');
        $data = Quotes::model()->findAll(
            'created_on like :created_on and status = :quote',
            [':created_on'=>"%$date%", ':quote'=>'Ready for Delivery']
        );
        $even = true;
        foreach ($data as $key => $value) {
            $member = Members::model()->findByPk($value->member_id);
            $payment = CustomerPayments::model()->find(
                'invoice_no = :invoice_no',
                [':invoice_no'=>$value['quote_id']]
            );
            $arr[] = array("quote_id"=>$value['quote_id'],"lname"=>$member['lname'],"quote_value"=>$value['quote_value'],"amount_paid"=>(!empty($payment) ? $payment->amount_paid : '0'),"payment_method"=>(!empty($payment) ? $payment->payment_method : '-'),"comments"=>$value['comments']);
            if ($even) 
                $even = false;
            else 
                $even = true;
        }
                
       $endLine = PHP_EOL;
        $returnVal = '';
        $csvFileName = 'orderfordelivery--'.date('d-m-Y H-i').".csv";
        $boolPrintRows = true;
        $header = [
            'quote_id'=>'Quote Id', 
            'lname'=>'Business Name', 
            'quote_value'=>'Quote Value',
            'amount_paid'=>'Amount Paid',
            'payment_method'=>'Payment Method',
            'comments'=>'Remarks', 
        ];

        $separator = ',';
        $coldefs =     array(
            'quote_id'=>array(), 
            'lname'=>array(),
            'quote_value'=>array(),
            'amount_paid'=>array(),
            'payment_method'=>array(),
            'comments'=>array(),
        );

       


        if($csvFileName != null)
        {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=".$csvFileName);
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: binary");
        }

        // $resultSet = Members::model()->findAll();
          $date = date('Y-m');
                $data = Quotes::model()->findAll(
                    'created_on like :created_on and status = :quote',
                    [':created_on'=>"%$date%", ':quote'=>'Confirmed']
                );
                //    echo "<pre>";
                // print_r($data);
                // die;

        if($boolPrintRows == true){
            $names = '';
            if (!empty($header)) {
                foreach($header as $col=>$config){
                    $names .= $config.$separator;
                }   
            }
            $names = rtrim($names,$separator);
            if($csvFileName != null){
                echo $names.$endLine;
            }else
            $returnVal .= $names.$endLine;
        }




        foreach($arr as $row){
            $r = '';
            $returnVal .= trim(rtrim($row['quote_id'])) . $separator;
            $returnVal .= trim(rtrim($row['lname'])) . $separator;
            $returnVal .= trim(rtrim($row['quote_value'])) . $separator;
            $returnVal .= trim(rtrim($row['amount_paid'])) . $separator;
            $returnVal .= trim(rtrim($row['payment_method'])) . $separator;
            $returnVal .= trim(rtrim($row['comments'])) . $separator;
           
            $returnVal .= PHP_EOL;
            // $item = trim(rtrim($r,$separator)).$endLine;

        }

       
        echo $returnVal;exit;

    }

  
    public function actionSalesforce()
    {
        
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(38, 'view')) {
            $model=new AdminUser('reportsearch');
            $model->role_id  = 10;
            $this->render('salesforce',array(
                'model'=>$model,
            ));
        } else
            throw new CHttpException(403, Yii::app()->params['access']);
    }

    public function actionExportSalesforce(){
        // call static method and passes arguments
        CsvExport::export(
            // first contains data
            // in find all by attributes we are providing where conditions 
            (AdminUser::model()->findAllByAttributes(['status'=>'1', 'role_id'=>'10'])), // a CActiveRecord array OR any CModel array
                // columns to be exported
                array(
                    'id'=>array(), 
                    'name'=>array(),
                    'address'=>array(),
                    'city'=>array(),
                    'zipcode'=>array(),
                    'state'=>array(),
                    'email_address'=>array(),
                    'username'=>array(),
                ),
                // not sure,b but i guess for printing header
                true, // boolPrintRows
                // File name
                'SalesOfficersList--'.date('d-m-Y H-i').".csv",
                ",",
                // header labels
                [
                    'id'=>"ID", 
                    'name'=>"NAME",
                    'address'=>"ADDRESS",
                    'city'=>"CITY",
                    'zipcode'=>"ZIPCODE",
                    'state'=>"STATE",
                    'email_address'=>"EMAIL",
                    'username'=>"USERNAME",
                ]
        );

    
    }


    public function actionMarketingsheet()
    {
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(39, 'view')) { // first we check permission
            $model=new Members('search');    // fetch data

            $this->render('customerlist',array(
                'model'=>$model,
            ));
        } else
            throw new CHttpException(403, Yii::app()->params['access']);
    }

    public function actionPayables()
    {
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(40, 'view')) {
            $model = new Vendor('reportsearch');
            $model->current_balance = ">0";
            $this->render('payables',array(
                'model'=>$model,
            ));
        }
    }

    public function actionExportPayables()
    {
        // call static method and passes arguments
        $criteria = new CDbCriteria;
        $criteria->select = '*';
        $criteria->addCondition("current_balance > 0");
        $resultSet    =    Vendor::model()->findAll($criteria);

        CsvExport::export(
            // first contains data
            // in find all by attributes we are providing where conditions

            ($resultSet), // a CActiveRecord array OR any CModel array
                // columns to be exported
                array(
                    'id'=>array(), 
                    'Name'=>array(),
                    'companyName'=>array(),
                    'current_balance'=>array(),
                    'contactOne'=>array(),
                    'contactTwo'=>array(),
                    'email'=>array(),
                   
                ),
                // not sure,b but i guess for printing header
                true, // boolPrintRows
                // File name
                'PayablesList--'.date('d-m-Y H-i').".csv",
                ",",
                // header labels
                [
                    'id'=>"ID", 
                    'Name'=>"NAME",
                    'companyName'=>"COMPANY NAME",
                    'current_balance'=>"CURRENT BALANCE",
                    'contactOne'=>"CONTACT ONE",
                    'contactTwo'=>"CONTACT TWO",
                    'email'=>"EMAIL",
                ]
        );

    }



    public function actionReceivables()
    {
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(30, 'view')) {
            $model=new Banks('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Banks']))
                $model->attributes=$_GET['Banks'];
            if (isset ($_GET['pageSize'])) {
                    Yii::app ()->user->setState ('pageSize', (int) $_GET['pageSize']);
                    unset ($_GET['pageSize']);  // would interfere with pager and repetitive page size change
            }
            $this->render('paymentmethods',array(
                'model'=>$model,
            ));
        } else
            throw new CHttpException(403, Yii::app()->params['access']);
    }

    public function actionCustomerPayments()
    {
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(29, 'view')) {
             $this->render('customerpayments');
        } else
            throw new CHttpException(403, Yii::app()->params['access']);
    }

    public function actionExportCustomerPayments($from_date="",$to_date="")
    {

        $endLine = PHP_EOL;
        $returnVal = '';
        $csvFileName = 'customerpayments--'.date('d-m-Y H-i').".csv";
        $boolPrintRows = true;
        $header = [
            'id'=>'ID', 
            'fname'.' '.'lname'=>'Customer Name', 
            'company_name'=>'Company Name',
            'payment_date'=>'Payment Date',
            'amount_paid'=>'Amount',
            'payment_method'=>'Payment Method',   
        ];
        $separator = ',';
        $coldefs =     array(
            'id'=>array(), 
            'fname'.' '.'lname'=>array(),
            'company_name'=>array(),
           'payment_date'=>array(),
           'amount_paid'=>array(),
            'payment_method'=>array(),
        );

       


        if($csvFileName != null)
        {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=".$csvFileName);
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: binary");
        }

        // $resultSet = Members::model()->findAll();

        $criteria = new CDbCriteria;
        $criteria->select = 't.*, m.* ';
        $criteria->join = ' JOIN `members` AS `m` ON t.mem_id = m.id';
        $criteria->addCondition("t.payment_date BETWEEN '".$from_date."' AND '".$to_date."'");
        $resultSet    =    CustomerPayments::model()->findAll($criteria);
        if($boolPrintRows == true){
            $names = '';
            if (!empty($header)) {
                foreach($header as $col=>$config){
                    $names .= $config.$separator;
                }   
            }
            $names = rtrim($names,$separator);
            if($csvFileName != null){
                echo $names.$endLine;
            }else
            $returnVal .= $names.$endLine;
        }
        // print_r($resultSet);exit;
        foreach($resultSet as $row){
            $r = '';
            $returnVal .= trim(rtrim($row->id)) . $separator;
            $returnVal .= trim(rtrim($row->member->fname." ".$row->member->lname)) . $separator;
            $returnVal .= trim(rtrim($row->member->company_name)) . $separator;
            $returnVal .= trim(rtrim($row->payment_date)) . $separator;
            $returnVal .= trim(rtrim($row->amount_paid)) . $separator;
            $returnVal .= trim(rtrim($row->payment_method)) . $separator;
            $returnVal .= PHP_EOL;
            // $item = trim(rtrim($r,$separator)).$endLine;

        }
        echo $returnVal;exit;
        
    }

    public function actionVendorPaymentList()
    {
        if (AdminUser::model()->findByPk(Yii::app()->user->id)->checkAccess(33, 'view')) {
            $this->render('vendorpaymentlist');
        } else
            throw new CHttpException(403, Yii::app()->params['access']);
    }

     public function actionExportVendorPaymentList($from_date="",$to_date="")
    {

        $endLine = PHP_EOL;
        $returnVal = '';
        $csvFileName = 'vendorpaymentlist--'.date('d-m-Y H-i').".csv";
        $boolPrintRows = true;
        $header = [
            'id'=>'ID', 
            'Name'=>'Vendor Name', 
            'companyName'=>'Company Name',
            'bill_date'=>'Payment Date',
            'amount_paid'=>'Amount',
            // 'payment_method'=>'Payment Method',   
        ];
        $separator = ',';
        $coldefs =     array(
            'id'=>array(), 
            'Name'=>array(),
            'companyName'=>array(),
           'bill_date'=>array(),
           'amount_paid'=>array(),
            // 'payment_method'=>array(),
        );

       


        if($csvFileName != null)
        {
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=".$csvFileName);
            header("Content-Type: application/octet-stream");
            header("Content-Transfer-Encoding: binary");
        }

        // $resultSet = Members::model()->findAll();

        $criteria = new CDbCriteria;
        $criteria->select = 't.*, v.* ';
        $criteria->join = ' JOIN `vendor` AS `v` ON v.id = t.vendor_id';
        $criteria->addCondition("t.bill_date BETWEEN '".$from_date."' AND '".$to_date."'");
        $resultSet    =    Paybill::model()->findAll($criteria);

        if($boolPrintRows == true){
            $names = '';
            if (!empty($header)) {
                foreach($header as $col=>$config){
                    $names .= $config.$separator;
                }   
            }
            $names = rtrim($names,$separator);
            if($csvFileName != null){
                echo $names.$endLine;
            }else
            $returnVal .= $names.$endLine;
        }
        // print_r($resultSet);exit;
        foreach($resultSet as $row){
            $r = '';
            $returnVal .= trim(rtrim($row->id)) . $separator;
            $returnVal .= trim(rtrim($row->vendor->Name)) . $separator;
            $returnVal .= trim(rtrim($row->vendor->companyName)) . $separator;
            $returnVal .= trim(rtrim($row->bill_date)) . $separator;
            $returnVal .= trim(rtrim($row->amount_paid)) . $separator;
            // $returnVal .= trim(rtrim($row->payment_method)) . $separator;
            $returnVal .= PHP_EOL;
            // $item = trim(rtrim($r,$separator)).$endLine;

        }
        echo $returnVal;exit;
        
    }
}
