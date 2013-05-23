<?php
class validReferenceNumber extends CValidator
{
    
    protected function validateAttribute($object, $attribute){
        $value=$object->$attribute;
        
        // Archive number without verificaton number
        $cleanNumber = substr($value, 0, -1);

        // Verification numbers
        $verificationNumber = substr($value, -1);
        $verificationValue = $this->getReferenceNumberVerificationNumber($cleanNumber);

        if($verificationNumber != $verificationValue){
            $this->addError($object, $attribute, Yii::t("AccountTransaction","InvalidReferenceNumber"));
        }
    }
    
    /**
     * Function for calculating the verification number for reference number
     * 
     * @access 	public
     * @param	number	$number					Number from which the verification number is calculated
     * @return 	int  	$verificationNumber		Calculated verification number
     */
    private function getReferenceNumberVerificationNumber($number) {
            $number = strval($number);
            $weight = array(7, 3, 1);
            $sum = 0;

            for( $i = strlen($number)-1, $j=0; $i>=0; $i--,$j++){
            $sum += (int) $number[$i] * (int) $weight[$j%3];
            }

            $verificationNumber = (10-($sum%10))%10;
            return $verificationNumber;
    }
}
?>
