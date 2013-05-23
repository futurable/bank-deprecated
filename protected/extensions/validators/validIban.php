<?php
class validIban extends CValidator
{
    /**
     * Validates IBAN account 
     * 
     * @param type $object
     * @param type $attribute
     */
    protected function validateAttribute($object, $attribute){
        $value=$object->$attribute;
        $validator = new IBANComponent();
        
        if(!$validator::verify_iban($value))
        {
            $this->addError($object, $attribute, Yii::t("AccountTransaction", "InvalidIBANAccount"));
            return false;
        }
        else return true;
    }
}