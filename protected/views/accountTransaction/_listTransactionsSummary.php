<table>
    <tr>
        <td><?php echo Yii::t('AccountTransaction', 'AccountSaldo')." ".date('d.m.Y', strtotime($Account->start_date)); ?></td>
        <td><?php echo BankSaldo::getAccountSaldo($Account->iban, false, $Account->start_date)." ".$Account->bankCurrency->code; ?></td>
    </tr>
</table>