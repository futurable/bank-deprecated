<?php
class ListPaymentsForDueAction extends CAction{
    public function run(){
        $controller=$this->getController();
        
        $Account = new Account();
        $Account->bank_user_id = Yii::app()->user->id;
        $Account->scenario = 'selectAccount';
        $AccountTransactions = null;
        $ibanDropdown = $controller->getIbanDropdown();
             
        if(isset($_POST['Account'])){
            $Account->attributes=$_POST['Account'];
            
            $AccountTransactions=AccountTransaction::model()->findAll(array(
                'condition'=>"status='active' 
                    AND event_date >= now()
                    AND ( payer_iban='$Account->iban' OR recipient_iban='$Account->iban' )",
                'order'=>'event_date'
            ));
        }
 
        $Account->validate();
        
        $controller->render('listPaymentsForDue',array(
            'Account'=>$Account,
            'AccountTransactions'=>$AccountTransactions,
            'ibanDropdown'=>$ibanDropdown,
        ));
    }
}

?>
