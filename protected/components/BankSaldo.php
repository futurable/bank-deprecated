<?php
class BankSaldo {
    public function getAccountSaldo($iban){
        // Count bank saldo       
        $record =
        Yii::app()->db->createCommand()
        ->select("sum(if( recipient_iban = '$iban', amount, -amount )) AS saldo")
        ->from('bank_account_transaction')
        ->where("payer_iban = '$iban'")
        ->orWhere("recipient_iban  = '$iban'")
        ->queryRow();
        
        return $record->saldo;
    } 
}
?>
