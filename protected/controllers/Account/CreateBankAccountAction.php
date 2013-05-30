<?php
class CreateBankAccountAction extends CAction
{
    public function run()
    {
        $controller=$this->getController();
        $Account=new Account;

        // Create predefined values
        
        // IBAN
        $branchCode = '970300'; // TODO: get this from conf
        $accountNumber = Account::model()->count(array('select'=>'id'));
        $bban = BBANComponent::generateFinnishBBANaccount($branchCode, $accountNumber);
        $bbanAccountNumber = substr($bban, -6);
        $iban = IBANComponent::generateFinnishIBANaccount($branchCode, $bbanAccountNumber);
        $Account->iban = $iban;
        
        // BIC
        $bic = Bic::model()->find(array('select'=>'id, bic',
            'condition'=>'branch_code=:branch_code',
            'params'=>array(':branch_code'=>$branchCode),
        ))->id;
        $Account->bank_bic_id = $bic;
        
        if(isset($_POST['Account']))
        {
            $Account->attributes=$_POST['Account'];
            if($Account->save()) $controller->redirect(array('view','id'=>$Account->id));
        }

        $controller->render('createBankAccount',array(
            'Account'=>$Account,
        ));
    }
}
?>
