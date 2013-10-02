<?php
class ManageLoanApplicationAction extends CAction
{
    public function run()
    {
        $controller=$this->getController();

        if(isset($_POST['Loan'])){
            $id = $_POST['Loan']['id'];
            
            $Loan=Loan::model()->findByPk($id);

            if($_POST['Loan']['action'] == 'grant'){
                $Loan->status = 'granted';
            }
            if($_POST['Loan']['action'] == 'deny'){
                $Loan->status = 'denied';
            }

            $LoanSuccess = $Loan->save();
            $controller->redirect(array('manageLoanApplication'));
        }
        
        $grantOrder = "CASE status WHEN 'open' THEN 1 WHEN 'granted' THEN 2 WHEN 'active' THEN 3 WHEN 'denied' THEN 4 ELSE 5 END";
        $loanApplications = Loan::model()->findall(array('order'=>"$grantOrder, create_date DESC"));
        
        $controller->render('manageLoanApplication',array(
            'loanApplications' => $loanApplications,
        ));
    }
}

?>
