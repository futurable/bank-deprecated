<?php
class ManageLoanApplicationAction extends CAction
{
    public function run()
    {
        $controller=$this->getController();
        
        $loanApplications = Loan::model()->findall();
        
        if(isset($_POST)&& $_POST['Loan']){
            $id = $_POST['Loan']['id'];
            
            $Loan=Loan::model()->findByPk($id);
            

        }
        
        $controller->render('manageLoanApplication',array(
            'loanApplications' => $loanApplications,
        ));
    }
}

?>
