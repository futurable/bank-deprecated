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
    
    $this->beginWidget('CActiveForm');
        $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>Yii::t('Account', 'Back'), 'htmlOptions'=>array('name'=>'ViewLoans', 'value'=>'show') ));
    $this->endWidget();
?>