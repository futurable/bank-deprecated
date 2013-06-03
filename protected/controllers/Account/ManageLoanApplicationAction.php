<?php
class ManageLoanApplicationAction extends CAction
{
    public function run()
    {
        $controller=$this->getController();

        if(isset($_POST['Loan'])){
            $id = $_POST['Loan']['id'];
            
            $Loan=Loan::model()->findByPk($id);
            
            $transaction = Yii::app()->db->beginTransaction();
            
            // Set loan as granted
            $Loan->status = 'active'; // TODO: change this to granted
            $LoanSuccess = $Loan->save();
            
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
 
            if($LoanSuccess && $TransactionSuccess){
                $transaction->commit();
            }
            else{
                $transaction->rollback();
            }
        }
        
        $loanApplications = Loan::model()->findall();
        
        $controller->render('manageLoanApplication',array(
            'loanApplications' => $loanApplications,
        ));
    }
}

?>
