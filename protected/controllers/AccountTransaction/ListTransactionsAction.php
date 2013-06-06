<?php
class ListTransactionsAction extends CAction{
    public function run(){
        $controller=$this->getController();
        
        $Account = new Account();
        $Account->bank_user_id = Yii::app()->user->id;
        $Account->scenario = 'selectAccount';
        $AccountTransactions = null;
        $ibanDropdown = $controller->getIbanDropdown();
        
        $Account->start_date = date('d.m.Y', strtotime('-1 month'));
        $Account->end_date = date('d.m.Y');
        
        if(isset($_POST['Account'])){
            $Account->attributes=$_POST['Account'];
            
            $startDateISO = Format::formatEURODateToISOFormat($Account->start_date);
            $endDateISO= Format::formatEURODateToISOFormat($Account->end_date);
            $AccountTransactions=AccountTransaction::model()->findAll(array(
                'condition'=>"status='active' 
                    AND event_date >= '$startDateISO'
                    AND event_date <= '$endDateISO'
                    AND ( payer_iban='$Account->iban' OR recipient_iban='$Account->iban' )",
                'order'=>'event_date'
            ));
        }
 
        $Account->validate();
        
        $controller->render('listTransactions',array(
            'Account'=>$Account,
            'AccountTransactions'=>$AccountTransactions,
            'ibanDropdown'=>$ibanDropdown,
        ));
    }
}

?>
