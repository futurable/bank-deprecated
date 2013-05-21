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
            if(isset($_POST['AccountTransaction'])){
                $accountTransaction->attributes=$_POST['AccountTransaction'];
            }
            $accountTransaction->form_step = $this->getFormStep();

            // Step 1 (give IBAN)
            if($accountTransaction->form_step === 1){
                if(isset($accountTransaction->recipient_iban)){
                    $accountTransaction->scenario = 'validIban';
                    if($accountTransaction->validate() AND $accountTransaction->form_step===1){
                        $controller->redirect(array('create','recipient_iban'=>$accountTransaction->recipient_iban));
                    }
                }
            }
            elseif($accountTransaction->form_step === 2){            
                // Uncomment the following line if AJAX validation is needed
                //$controller->performAjaxValidation($accountTransaction);

                //if($model->save())
                //$this->redirect(array('view','id'=>$model->id));
            }

            $controller->render('create',array(
                    'accountTransaction'=>$accountTransaction,
            ));
    }
    
    /**
     * Gets the current form step
     */
    private function getFormStep(){
        $form_step = 1;
        
        if(isset($_GET['recipient_iban'])) $form_step=2;
        else $form_step=1;
     
        return $form_step;
    }
}
?>
