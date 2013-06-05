<table class='well'>
    <tr>
        <td><?php echo Yii::t('Account', 'Account')?></td>
        <td><?php echo $Account->iban ?></td>
    </tr>
    <tr>
        <td><?php echo Yii::t('Account', 'BankTransactionsBetween')?></td>
        <td><?php echo "$Account->start_date - $Account->end_date"; ?></td>
    </tr>
    <tr>
        <td><?php echo Yii::t('Account', 'StartSaldo')." ".date('d.m.Y', strtotime($Account->start_date)); ?></td>
        <td><?php echo BankSaldo::getAccountSaldo($Account->iban, false, Format::formatEURODateToISOFormat($Account->start_date))." ".$Account->bankCurrency->code; ?></td>
    </tr>
    <tr>
        <td><?php echo Yii::t('Account', 'EndSaldo')." ".date('d.m.Y', strtotime($Account->end_date)); ?></td>
        <td><?php echo BankSaldo::getAccountSaldo($Account->iban, false, Format::formatEURODateToISOFormat($Account->end_date))." ".$Account->bankCurrency->code; ?></td>
    </tr>
</table>