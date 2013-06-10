<?php
class ViewLoansAction extends CAction
{
    public function run()
    {
        $controller=$this->getController();
        
        $userId = Yii::app()->user->id;
        $Accounts=Account::model()->findAll(array(
            'condition'=>"bank_account_type_id=2 
             AND bank_user_id = '$userId'",
        ));
        
        $controller->render('viewLoans',array(
            'Accounts' => $Accounts,
        ));
    }
}
?>
