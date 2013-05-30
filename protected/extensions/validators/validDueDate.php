<?php
class validDueDate extends CValidator {
    protected function validateAttribute($object, $attribute){
        $value=$object->$attribute;
        
        $date = strtotime( Format::formatEURODateToISOFormat($value) );
        $now = strtotime(date('Y-m-d'));
        
        if($date < $now){
            $this->addError($object, $attribute, Yii::t("AccountTransaction", "InvalidDueDate"));
            return false;
        }
        else return true;
    }
}

?>
