<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/BankLoanCounter.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/FillPaymentPlan.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/FillLoanCounter.js'); ?>

<h1><?php echo Yii::t('Account', 'LoanPaymentPlan'); ?></h1>

<?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data'=>array(
            'id'=>'LoanDetails', 
            'LoanAccount'=>$Loan->bankAccount->iban, 
            'CreateDate'=> Format::formatISODateToEUROFormat($Loan->create_date), 
            'GrantDate'=> Format::formatISODateToEUROFormat($Loan->grant_date), 
            'AcceptDate'=> Format::formatISODateToEUROFormat($Loan->accept_date), 
            'Amount'=>$Loan->amount,
            'Currency'=>$Loan->bankCurrency->code,
            'Interest'=>$Loan->bankAccount->bankInterest->rate." %",
            'Type'=>Yii::t('Loan',$Loan->type),
            'Interval'=>Yii::t('Loan', $Loan->interval),
            'Repayment'=>$Loan->repayment." ".$Loan->bankCurrency->code,
        ),
        'attributes'=>array(
            array('name'=>'LoanAccount', 'label'=> Yii::t('Account', 'LoanAccount')),
            array('name'=>'CreateDate', 'label'=>Yii::t('Loan', 'CreateDate')),
            array('name'=>'GrantDate', 'label'=>Yii::t('Loan', 'GrantDate')),
            array('name'=>'AcceptDate', 'label'=>Yii::t('Loan', 'AcceptDate')),
            array('name'=>'Amount', 'label'=>Yii::t('Loan', 'Amount')),
            array('name'=>'Currency', 'label'=>Yii::t('Loan', 'Currency')),
            array('name'=>'Interest', 'label'=>Yii::t('Loan', 'Interest')),
            array('name'=>'Type', 'label'=>Yii::t('Loan', 'Type')),
            array('name'=>'Interval', 'label'=>Yii::t('Loan', 'Interval')),
            array('name'=>'Repayment', 'label'=>Yii::t('Loan', 'Repayment')),
        ),
    ));
    
    echo $this->renderPartial('_loanCounter');
    echo $this->renderPartial('_paymentPlan');
   
    $this->beginWidget('CActiveForm');
        $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>Yii::t('Account', 'Back'), 'htmlOptions'=>array('name'=>'ViewLoans', 'value'=>'show') ));
    $this->endWidget();
?>