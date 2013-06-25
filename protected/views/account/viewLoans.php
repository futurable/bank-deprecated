<h1><?php echo Yii::t('Account', 'Loans')?></h1>

<table>
    <tr>
        <th><?php echo Yii::t('Account', 'AcceptDate'); ?></th>
        <th><?php echo Yii::t('Account', 'Amount'); ?></th>
        <th><?php echo Yii::t('Account', 'LoanAccount'); ?></th>
        <th><?php echo Yii::t('Account', 'Details'); ?></th>
        <th><?php echo Yii::t('Account', 'PaymentPlan'); ?></th>
    </tr>
<?php
foreach($Accounts as $Account){
    $loanInfo = Loan::model()->findbyattributes(array('bank_account_id'=>$Account->id));
    if(is_a($loanInfo, 'Loan')){
        $form=$this->beginWidget('CActiveForm');

        echo "<tr>";
            echo "<td>".Format::formatISODateToEUROFormat($loanInfo->accept_date)."</td>";
            echo "<td>$loanInfo->amount ".$loanInfo->bankCurrency->code."</td>";
            echo "<td>$Account->iban</td>";
            echo "<td>";
                $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>Yii::t('Account', 'View')));
            echo "</td>";
            echo "<td>";
                $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>Yii::t('Account', 'View')));
            echo "</td>";
        echo "</tr>";

        $this->endWidget();
    }
}
?>
</table>