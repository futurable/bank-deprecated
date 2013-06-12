<h1><?php echo Yii::t('AccountTransaction', 'TransactionSuccessful')?></h1>

<table>
    <tr>
        <th><?php echo Yii::t('AccountTransaction', 'EventDate')?></th>
        <td><?php echo Format::formatISODateToEUROFormat($model->event_date); ?></td>
    </tr>
    <tr>
        <th><?php echo Yii::t('AccountTransaction', 'RecipientName'); ?></th>
        <td><?php echo $model->recipient_name; ?></td>
    </tr>
    <tr>
        <th><?php echo Yii::t('AccountTransaction', 'RecipientIban'); ?></th>
        <td><?php echo $model->recipient_iban; ?></td>
    </tr>
    <tr>
        <th><?php echo Yii::t('AccountTransaction', 'PayerName'); ?></th>
        <td><?php echo $model->payer_name; ?></td>
    </tr>
    <tr>
        <th><?php echo Yii::t('AccountTransaction', 'PayerIban'); ?></th>
        <td><?php echo $model->payer_iban; ?></td>
    </tr>
    <tr>
        <th><?php echo Yii::t('AccountTransaction', 'Amount'); ?></th>
        <td><?php echo $model->amount." ".$model->currency; ?></td>
    </tr>
    <tr>
        <th>
            <?php 
                if(!empty($model->reference_number)){ echo Yii::t('AccountTransaction', 'ReferenceNumber'); }
                else{ echo Yii::t('AccountTransaction', 'Message'); }
            ?>
        </th>
        <td>
            <?php 
                if(!empty($model->reference_number)){ echo $model->reference_number; }
                else{ echo $model->message; }
            ?>
        </td>
    </tr>
    
</table>