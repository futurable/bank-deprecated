<table>
    <tr>
        <td><?php echo Yii::t('AccountTransaction', 'StartSaldo')." ".date('d.m.Y', strtotime($Account->start_date)); ?></td>
        <td><?php echo BankSaldo::getAccountSaldo($Account->iban, false, $Account->start_date)." ".$Account->bankCurrency->code; ?></td>
    </tr>
    <tr>
        <td><?php echo Yii::t('AccountTransaction', 'EndSaldo')." ".date('d.m.Y', strtotime($Account->end_date)); ?></td>
        <td><?php echo BankSaldo::getAccountSaldo($Account->iban, false, $Account->end_date)." ".$Account->bankCurrency->code; ?></td>
    </tr>
</table>