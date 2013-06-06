<table id='listPaymentsForDue' class='light well'>
    <tr>
        <th><?php echo Yii::t('AccountTransaction', 'EventDate') ?></th>
        <th><?php echo Yii::t('AccountTransaction', 'Payer'); ?></th>
        <th><?php echo Yii::t('AccountTransaction', 'Recipient'); ?></th>
        <th><?php echo Yii::t('AccountTransaction', 'Amount') ?></th>
        <th><?php echo Yii::t('AccountTransaction', 'ReferenceNumber')."/<br/>".Yii::t('AccountTransaction', 'Message') ?></th>
        <th></th>
    </tr>
    <?php
    foreach($AccountTransactions as $AccountTransaction){
        $form=$this->beginWidget('CActiveForm');
        $eventDateISO = Format::formatISODateToEUROFormat($AccountTransaction->event_date);
        
        echo $form->hiddenField($AccountTransaction,'id');
        echo $form->hiddenField($Account,'iban');
        
        if($AccountTransaction->payer_iban == $Account->iban){
            $payerIban = $AccountTransaction->payer_iban;
            $sign = "-";
        }
        else{
            $payerIban = null; // Don't show payer iban due the restrictions of the "law"
            $sign = "+";
        }
        
        echo "<tr>";
            echo "<td>$eventDateISO</td>";
            echo "<td>$AccountTransaction->payer_name<br/>$payerIban</td>";
            echo "<td>$AccountTransaction->recipient_name<br/>$AccountTransaction->recipient_iban</td>";
            echo "<td>{$sign}$AccountTransaction->amount $AccountTransaction->currency</td>";
            echo "<td>$AccountTransaction->reference_number $AccountTransaction->message</td>";
            echo "<td>";
                $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>Yii::t('AccountTransaction','CancelPayment')));
            echo "</td>";
        echo "</tr>";
        $this->endWidget();
    }
    ?>
</table>