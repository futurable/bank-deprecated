<?php

class AccountTransactionController extends Controller
{
        public function actions()
        {
            return array(
                'create'=>'application.controllers.AccountTransaction.CreateAction',
                'listTransactions'=>'application.controllers.AccountTransaction.ListTransactionsAction',
                'listPaymentsForDue'=>'application.controllers.AccountTransaction.ListPaymentsForDueAction',
            );
        }
    
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create', 'listTransactions','listPaymentsForDue'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('update','list','admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
            
            $record=Account::model()->findAll(array(
                'select'=>'iban, name',
                'condition'=>'bank_user_id=:id',
                'params'=>array(':id'=>$this->WebUser->id),
            ));
            
            $accounts = array();
            foreach($record as $account){                
                $accounts[$account['iban']] = $account['name'];
            }
            
            $iban = AccountTransaction::model()->find(array(
                'select'=>'payer_iban',
                'condition'=>'id=:id',
                'params'=>array(':id'=>$id),
            ))->payer_iban;
            
            if(array_key_exists($iban, $accounts)){
                $this->render('view',array(
                        'model'=>$this->loadModel($id),
                ));
            }
            else echo "Unauthorized access";
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AccountTransaction']))
		{
			$model->attributes=$_POST['AccountTransaction'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('AccountTransaction');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AccountTransaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AccountTransaction']))
			$model->attributes=$_GET['AccountTransaction'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AccountTransaction the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AccountTransaction::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AccountTransaction $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='account-transaction-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
    public function getIbanDropdown(){
        $id = $this->WebUser->id;
        $record=Account::model()->findAll(array(
           'select'=>'iban, name',
           'condition'=>'bank_user_id=:id AND status="enabled" AND bank_account_type_id=1',
           'params'=>array(':id'=>$id),
        ));

        $ibanDropdown = array();
        foreach($record as $account){
            $saldo = BankSaldo::getAccountSaldo($account['iban']);
            $ibanDropdown[$account->iban] = $account->iban." ($saldo EUR), $account->name";
        }
        return $ibanDropdown;
    }
}
