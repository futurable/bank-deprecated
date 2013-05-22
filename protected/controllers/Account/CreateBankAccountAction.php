<?php
class CreateBankAccountAction extends CAction
{
    public function run()
    {
        $controller=$this->getController();
        $Account=new Account;

        // Create predefined values
        $branchCode = '970300'; // TODO: get this from conf
        $accountNumber = 1;
        $bban = BBANComponent::generateFinnishBBANaccount($branchCode, $accountNumber);
        $bbanAccountNumber = substr($bban, -6);
        $iban = IBANComponent::generateFinnishIBANaccount($branchCode, $bbanAccountNumber);
        $Account->iban = $iban;
        
        if(isset($_POST['Account']))
        {
            $Account->attributes=$_POST['Account'];
            //if($Account->save())
                //$this->redirect(array('view','id'=>$Account->id));
        }

        $controller->render('createBankAccount',array(
            'Account'=>$Account,
        ));
    }
}
?>
