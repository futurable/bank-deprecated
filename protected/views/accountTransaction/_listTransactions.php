<table>
    <tr>
        <td><?php echo Yii::t('AccountTransaction', 'AccountSaldo')." ".date('d.m.Y', strtotime($Account->start_date)); ?></td>
        <td><?php echo BankSaldo::getAccountSaldo($Account->iban, false, $Account->start_date)." ".$Account->bankCurrency->code; ?></td>
    </tr>
</table>
    
<table>
    <tr>
        <th><?php echo Yii::t('AccountTransaction', 'EventDate') ?></th>
        <th><?php echo Yii::t('AccountTransaction', 'Amount') ?></th>
    </tr>
    <?php
    foreach($AccountTransactions as $AccountTransaction){
        $eventDateISO = Format::formatISODateToEUROFormat($AccountTransaction->event_date);
        
        echo "<tr>";
            echo "<td>$eventDateISO</td>";
            echo "<td>$AccountTransaction->amount</td>";
        echo "</tr>";
    }
    ?>
</table>