<?php
class CreateLoanApplicationAction extends CAction
{
    public function run()
    {
        $controller=$this->getController();
        
        $loanAccount = new Account();
        $loanInfo = new Loan();
        $controller->render('createLoanApplication',array(
            'loanInfo'=>$loanInfo,
            'loanAccount'=>$loanAccount,
        ));
    }
}
?>
