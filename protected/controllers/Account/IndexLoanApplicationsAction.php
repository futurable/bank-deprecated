<?php
class IndexLoanApplicationsAction extends CAction{
    public function run()
    {
        $controller=$this->getController();
        
        $loanApplications = Loan::model()->findAll(array(
                'condition'=>'bank_user_id=:bankUser',
                'params'=>array(':bankUser'=>Yii::app()->user->id),
            )
        );
        
        $controller->render('indexLoanApplications', array(
            'loanApplications' => $loanApplications,
        ));
    }
}

?>
