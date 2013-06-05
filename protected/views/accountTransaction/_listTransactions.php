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