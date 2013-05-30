<?php
class CreateLoanApplicationAction extends CAction
{
    public function run()
    {
        $controller=$this->getController();
        
        $loanAccount = new Account();
        $controller->render('createLoanApplication',array(
            'loanAccount'=>$loanAccount,
        ));
    }
}
?>
