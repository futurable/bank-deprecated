<h1><?php echo Yii::t('Loan', 'CreateLoanApplication'); ?></h1>

<?php echo $this->renderPartial('_createLoanApplication', array('loanInfo'=>$loanInfo, 'loanAccount'=>$loanAccount)); ?>
<?php echo $this->renderPartial('_loanCounter', array('loanInfo'=>$loanInfo, 'loanAccount'=>$loanAccount)); ?>