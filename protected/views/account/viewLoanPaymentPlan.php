<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/BankLoanCounter.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/FillPaymentPlan.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/FillLoanCounter.js'); ?>

<h1><?php echo Yii::t('Account', 'LoanPaymentPlan'); ?></h1>

<?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data'=>array(
            'id'=>'LoanDetails', 
            'LoanAccount'=>$Loan->bankAccount->iban, 
            'AcceptDate'=> Format::formatISODateToEUROFormat($Loan->accept_date), 
            'Amount'=>$Loan->amount." ".$Loan->bankCurrency->code,
        ),
        'attributes'=>array(
            array('name'=>'LoanAccount', 'label'=> Yii::t('Account', 'LoanAccount')),
            array('name'=>'AcceptDate', 'label'=>Yii::t('Account', 'AcceptDate')),
            array('name'=>'Amount', 'label'=>Yii::t('Account', 'Amount')),
        ),
    ));
    
    
    echo $this->renderPartial('_loanCounter');
    echo $this->renderPartial('_paymentPlan');
   
    $this->beginWidget('CActiveForm');
        $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>Yii::t('Account', 'Back'), 'htmlOptions'=>array('name'=>'ViewLoans', 'value'=>'show') ));
    $this->endWidget();
?>