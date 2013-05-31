<div class="well" id='loanCounter'>
    <table id='loanCounterTable'>
        <tr>
            <th><?php echo Yii::t('Loan', 'Amount') ?></th>
            <th><?php echo Yii::t('Loan', 'TotalInterest') ?></th>
            <th><?php echo Yii::t('Loan', 'RealAmount') ?></th>
            <th><?php echo Yii::t('Loan', 'Instalment') ?></th>
            <th><?php echo Yii::t('Loan', 'Term') ?></th>
        </tr>
        <tr>
            <td id='loanAmountTd'>0</td>
            <td id='interestAmountTd'>0</td>
            <td id='realAmountTd'>0</td>
            <td id='repaymentTd'>0</td>
            <td id='termTd'>0</td>
        </tr>
    </table>	
</div><!-- loanCounterFrame -->