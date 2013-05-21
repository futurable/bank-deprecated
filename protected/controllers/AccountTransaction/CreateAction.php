<?php
/**
 * Creates a new model.
 * If creation is successful, the browser will be redirected to the 'view' page.
 */
class CreateAction extends CAction
{
    public function run()
    {
            $controller=$this->getController();
            
            $accountTransaction=new AccountTransaction;
            $accountTransaction->scenario = 'validIban';
            $accountTransaction->validate();
            
            // IBAN validation (step 1)
            if(isset($accountTransaction->recipient_iban)){
                $accountTransaction->attributes=$_POST['AccountTransaction'];
                $accountTransaction->scenario = 'validIban';
                
                $controller->redirect(array('create','iban'=>$accountTransaction->recipient_iban));
            }             

            // Uncomment the following line if AJAX validation is needed
            //$controller->performAjaxValidation($accountTransaction);

            if(isset($_POST['AccountTransaction']))
            {
                    $accountTransaction->attributes=$_POST['AccountTransaction'];
                    //if($model->save())
                    //$this->redirect(array('view','id'=>$model->id));
            }

            $controller->render('create',array(
                    'model'=>$accountTransaction,
            ));
    }
}
?>
