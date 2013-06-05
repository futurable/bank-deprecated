<h1><?php echo Yii::t('AccountTransaction', 'Transactions'); ?></h1>

<?php echo $this->renderPartial('_listAccounts', array('Account'=>$Account, 'ibanDropdown'=>$ibanDropdown)); ?>
<?php if(is_array($AccountTransactions)) echo $this->renderPartial('_listTransactions', array('Account'=>$Account, 'AccountTransactions'=>$AccountTransactions)); ?>