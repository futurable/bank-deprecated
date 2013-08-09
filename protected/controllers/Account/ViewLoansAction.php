<?php
class ViewLoansAction extends CAction
{
    public function run()
    {
        $controller=$this->getController();
        $userId = Yii::app()->user->id;
        
        // Show details
        if(isset($_POST['Details']) && !empty($_POST['Details'])){
            $Loan=Loan::model()->find(array(
                'condition'=>"id={$_POST['Details']}
                 AND bank_user_id = '$userId'",
            ));
           
            $controller->render('viewLoanDetails',array(
                'Loan' => $Loan,
            ));
        }
        elseif(isset($_POST['PaymentPlan']) && !empty($_POST['PaymentPlan'])){
            $Loan=Loan::model()->find(array(
                'condition'=>"id={$_POST['Details']}
                 AND bank_user_id = '$userId'",
            ));
            
            $controller->render('viewLoans',array(
                'Accounts' => $Accounts,
            ));
            /*
            $controller->render('viewLoanPaymentPlan',array(
                'Loan' => $Loan,
            )); */
        }
        else {
            $Accounts=Account::model()->findAll(array(
                'condition'=>"bank_account_type_id=2 
                 AND bank_user_id = '$userId'",
            ));

            $controller->render('viewLoans',array(
                'Accounts' => $Accounts,
            ));
        }
    }
}
?>
