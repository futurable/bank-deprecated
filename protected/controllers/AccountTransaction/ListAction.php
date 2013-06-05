<?php
class ListAction extends CAction{
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
                'condition'=>"status='active' AND event_date >= '$startDateISO' AND event_date <= '$endDateISO'",
            ));
        }
 
        $Account->validate();
        
        $controller->render('list',array(
            'Account'=>$Account,
            'AccountTransactions'=>$AccountTransactions,
            'ibanDropdown'=>$ibanDropdown,
        ));
    }
    
    private function getTransactions($iban){
            $record=AccountTransaction::model()->findAll(array(
                'select'=>'recipient_iban, recipient_name, amount, reference_number, message, currency',
                'condition'=>'payer_iban=:iban OR recipient_iban=:iban',
                'params'=>array(':iban'=>$iban),
            ));
            
            return $record;
    }
}

?>
