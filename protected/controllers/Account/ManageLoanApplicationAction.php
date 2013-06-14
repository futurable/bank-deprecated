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
        
        $loanApplications = Loan::model()->findall();
        
        $controller->render('manageLoanApplication',array(
            'loanApplications' => $loanApplications,
        ));
    }
}

?>
