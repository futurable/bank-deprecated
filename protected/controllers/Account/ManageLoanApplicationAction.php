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
            
            $transaction = Yii::app()->db->beginTransaction();
            
            // Set loan as granted
            $Loan->status = 'active'; // TODO: change this to granted
            $LoanSuccess = $Loan->save();

            // Put money to the account
            $Account = Account::model()->find(array(
                'select'=>'id,iban',
                'condition'=>'bank_user_id=:bankUser',
                'params'=>array(':bankUser'=>$Loan->bankAccount->bank_user_id),
            ));
        }
        
        $controller->render('manageLoanApplication',array(
            'loanApplications' => $loanApplications,
        ));
    }
}

?>
