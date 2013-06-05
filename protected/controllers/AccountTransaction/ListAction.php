<?php
class ListAction extends CAction{
    public function run(){
        $controller=$this->getController();
        
        $Account = new Account();
        $AccountTransactions = null;
        $ibanDropdown = $controller->getIbanDropdown();
        
        if(isset($_POST['Account'])){
            $Account->attributes=$_POST['Account'];
            $AccountTransactions=new CActiveDataProvider('AccountTransaction');
            //$AccountTransactions = $this->getTransactions($Account->iban);
        }

        if(!isset($Account->start_date)) $Account->start_date = date('d.m.Y', strtotime('-1 month'));
        if(!isset($Account->end_date)) $Account->end_date = date('d.m.Y');
 
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
