<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bankLoanApplication.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/bankLoanCounter.js'); ?>

<h1><?php echo Yii::t('Loan', 'CreateLoanApplication'); ?></h1>

<?php echo $this->renderPartial('_createLoanApplication', array('loanInfo'=>$loanInfo, 'loanAccount'=>$loanAccount)); ?>
<?php echo $this->renderPartial('_loanCounter'); ?>
<?php echo $this->renderPartial('_paymentPlan'); ?>