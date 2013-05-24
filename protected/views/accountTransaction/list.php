<h1><?php echo Yii::t('AccountTransaction', 'Transactions'); ?></h1>

<?php echo $this->renderPartial('_listAccounts', array('account'=>$account, 'ibanDropdown'=>$ibanDropdown)) ?>
