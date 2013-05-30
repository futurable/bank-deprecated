<?php
class BankSaldo {
    public function getAccountSaldo($iban){
        // Count bank saldo       
        $record = Yii::app()->db->createCommand()
        ->select("sum(if( recipient_iban = '$iban', amount, -amount )) AS saldo")
        ->from('bank_account_transaction')
        ->where("event_date <= now()")
        ->andWhere("status = 'active'")
        ->andWhere("(payer_iban = '$iban' OR recipient_iban  = '$iban')")
        ->queryRow();
        
        if(!empty($record)) return $record['saldo'];
        else return 0;
    } 
}
?>
