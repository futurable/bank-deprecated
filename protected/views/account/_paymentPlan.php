<div class="well" id='paymentPlan'>
    <table id='paymentPlanTable'>
        <tr id='paymentPlanHeaderRow'>
            <th><?php echo Yii::t('Loan', '#') ?></th>
            <th><?php echo Yii::t('Loan', 'Instalment') ?></th>
            <th><?php echo Yii::t('Loan', 'Interest') ?></th>
            <th><?php echo Yii::t('Loan', 'Repayment') ?></th>
            <th><?php echo Yii::t('Loan', 'Principal') ?></th>
        </tr>
        <tr>
            <td id='loanAmountTd'>0</td>
            <td id='interestAmountTd'>0</td>
            <td id='realAmountTd'>0</td>
            <td id='repaymentTd'>0</td>
            <td id='termTd'>0</td>
        </tr>
    </table>	
</div><!-- paymentPlan -->
