<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/BankLoanApplication.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/BankLoanCounter.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/FillPaymentPlan.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/FillLoanCounter.js'); ?>

<h1><?php echo Yii::t('Loan', 'CreateLoanApplication'); ?></h1>

<?php echo $this->renderPartial('_createLoanApplication', array('loanInfo'=>$loanInfo, 'loanAccount'=>$loanAccount)); ?>
<?php echo $this->renderPartial('_loanCounter'); ?>
<?php echo $this->renderPartial('_paymentPlan'); ?>