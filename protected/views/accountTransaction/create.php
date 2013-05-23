<h1><?php echo Yii::t('AccountTransaction', 'CreateTransaction'); ?></h1>

<?php
if($accountTransaction->form_step === 1) echo $this->renderPartial('_formStep1', array('accountTransaction'=>$accountTransaction));
elseif($accountTransaction->form_step === 2) echo $this->renderPartial('_formStep2', array('accountTransaction'=>$accountTransaction, 'ibanDropdown'=>$ibanDropdown));
else echo "Error while deciding form step";
?>