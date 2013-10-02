<h1><?php echo Yii::t('Account', 'LoanDetails'); ?></h1>

<?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data'=>array(
            'id'=>'LoanDetails', 
            'LoanAccount'=>$Loan->bankAccount->iban, 
            'CreateDate'=> Format::formatISODateToEUROFormat($Loan->create_date), 
            'GrantDate'=> Format::formatISODateToEUROFormat($Loan->grant_date), 
            'AcceptDate'=> Format::formatISODateToEUROFormat($Loan->accept_date), 
            'Amount'=>$Loan->amount." ".$Loan->bankCurrency->code,
            'Interest'=>$Loan->interest." %",
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
            array('name'=>'Interest', 'label'=>Yii::t('Loan', 'Interest')),
            array('name'=>'Type', 'label'=>Yii::t('Loan', 'Type')),
            array('name'=>'Interval', 'label'=>Yii::t('Loan', 'Interval')),
            array('name'=>'Repayment', 'label'=>Yii::t('Loan', 'Repayment')),
        ),
    ));
    
    $this->beginWidget('CActiveForm');
        $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>Yii::t('Account', 'Back'), 'htmlOptions'=>array('name'=>'ViewLoans', 'value'=>'show') ));
    $this->endWidget();
?>