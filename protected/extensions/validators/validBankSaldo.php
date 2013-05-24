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
    
    /**
    * Returns the JavaScript needed for performing client-side validation.
    * @param CModel $object the data object being validated
    * @param string $attribute the name of the attribute to be validated.
    * @return string the client-side validation script.
    * @see CActiveForm::enableClientValidation
    */
    public function clientValidateAttribute($object,$attribute){
        return true; // TODO: fix the saldo checking when account is changed
        $saldo = $object->saldo;
 
        $condition="value>$saldo";
 
        return "
        if(".$condition.") {
            messages.push(".CJSON::encode(Yii::t("AccountTransaction", "InsufficientSaldo")).");
        }
        ";
   }
}

?>
