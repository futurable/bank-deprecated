<table>
    <tr>
        <th><?php echo Yii::t('AccountTransaction', 'EventDate') ?></th>
        <th><?php echo Yii::t('AccountTransaction', 'RecipientName') ?></th>
        <th><?php echo Yii::t('AccountTransaction', 'RecipientIban') ?></th>
        <th><?php echo Yii::t('AccountTransaction', 'Amount') ?></th>
        <th><?php echo Yii::t('AccountTransaction', 'ReferenceNumber')." / ".Yii::t('AccountTransaction', 'Message') ?></th>
    </tr>
    <?php
    foreach($AccountTransactions as $AccountTransaction){
        $eventDateISO = Format::formatISODateToEUROFormat($AccountTransaction->event_date);
        
        echo "<tr>";
            echo "<td>$eventDateISO</td>";
            echo "<td>$AccountTransaction->recipient_name</td>";
            echo "<td>$AccountTransaction->recipient_iban</td>";
            echo "<td>$AccountTransaction->amount $AccountTransaction->currency</td>";
            echo "<td>$AccountTransaction->reference_number $AccountTransaction->message</td>";
        echo "</tr>";
    }
    ?>
</table>