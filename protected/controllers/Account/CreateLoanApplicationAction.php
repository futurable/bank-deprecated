<?php
class CreateLoanApplicationAction extends CAction
{
    public function run()
    {
        $controller=$this->getController();
        
        $loanAccount = new Account();
        $loanInfo = new Loan();

        if(isset($_POST['Loan']))
        {
            $loanUser = User::model()->findbyPk( Yii::app()->user->id );
            
            // Account attributes
            $branchCode = '970300'; // TODO: get this from conf
            $bban = BBANComponent::generateFinnishBBANaccount($branchCode);
            $bbanAccountNumber = substr($bban, -6);
            $iban = IBANComponent::generateFinnishIBANaccount($branchCode, $bbanAccountNumber);
            $loanAccount->iban = $iban;
            $loanAccount->name= "Loan account";
            $loanAccount->bank_user_id = $loanUser->id;
            $loanAccount->bank_account_type_id=2;
            $loanAccount->status='disabled';
            
            $transaction = Yii::app()->db->beginTransaction();
            $accountSuccess = $loanAccount->save();
            
            $loanInfo->attributes=$_POST['Loan'];
            $loanInfo->bank_account_id=$loanAccount->id;
            $loanInfo->bank_currency_id = 1; // @TODO: get currency
            $loanInfo->bank_user_id = Yii::app()->user->id;
            
            $loanSuccess = $loanInfo->save();
            
            if($accountSuccess AND $loanSuccess){
                $transaction->commit();
                $controller->redirect(array('viewLoanApplication','id'=>$loanAccount->id));
            }
            else{
                $transaction->rollback();
            };       
        }
        
        $controller->render('createLoanApplication',array(
            'loanInfo'=>$loanInfo,
            'loanAccount'=>$loanAccount,
        ));
    }
}
?>
