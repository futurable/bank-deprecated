<?php
class IndexLoanApplicationsAction extends CAction{
    public function run()
    {
        $controller=$this->getController();
        
        $loanApplications = Loan::model()->findAll(array(
                'condition'=>'bank_user_id=:bankUser',
                'params'=>array(':bankUser'=>Yii::app()->user->id),
            )
        );
        
        if(isset($_POST['Loan'])){
            $id = $_POST['Loan']['id'];
            
            $Loan=Loan::model()->findByPk($id);
            $action = $_POST['Loan']['action'];
            $transaction = Yii::app()->db->beginTransaction();
            
            if($action == 'cancel'){
                $Loan->status = 'removed';
                $TransactionSuccess = true;
            }
            elseif($action=='decline'){
                $Loan->status = 'declined'; 
                $TransactionSuccess = true;
            }
            if($action == 'accept'){
                $Loan->status = 'active';
                
                // Get account
                $AccountId = Account::model()->find(array(
                    'select'=>'id',
                    'condition'=>'bank_user_id=:bankUser AND bank_account_type_id=1',
                    'params'=>array(':bankUser'=>$Loan->bankAccount->bank_user_id),
                ))->id;
                $Account=Account::model()->findByPk($AccountId);
                
                // Make transaction to account
                $accountTransaction = new AccountTransaction;
                $accountTransaction->recipient_iban = $Account->iban;
                $accountTransaction->recipient_bic = "FUTUFIT0"; // @TODO: get this from IBAN
                $accountTransaction->recipient_name = $Account->bankUser->profile->company;
                $accountTransaction->payer_iban = "FI8297030000002171"; // @TODO: get this from somewhere
                $accountTransaction->payer_bic = "FUTUFIT0"; // @TODO: get this from somewhere
                $accountTransaction->payer_name = "Futural Bank"; // @TODO: get this from somewhere
                $accountTransaction->event_date = date('d.m.Y');
                $accountTransaction->amount = $Loan->amount;
                $accountTransaction->message = "Loan ".$Loan->bankAccount->iban; 

                $TransactionSuccess = $accountTransaction->save();
            }
            
            $LoanSuccess = $Loan->save();
            
            if($LoanSuccess && $TransactionSuccess){
                $transaction->commit();
            }
            else{
                $transaction->rollback();
            }
            
            $controller->redirect(array('indexLoanApplications'));
        }
        $controller->render('indexLoanApplications', array(
            'loanApplications' => $loanApplications,
        ));
    }
}

?>
