<?php
class validBankSaldo extends CValidator{
    /**
     * Validates account saldo 
     * 
     * @param type $object
     * @param type $attribute
     */
    protected function validateAttribute($object, $attribute){
        $value=$object->$attribute;
        $iban = $object->payer_iban;
        $saldo = BankSaldo::getAccountSaldo($iban);
        if($saldo<$value){
            $this->addError($object, $attribute, Yii::t("AccountTransaction", "InsufficientSaldo"));
            return false;
        }
        else return true;
    }
}

?>
