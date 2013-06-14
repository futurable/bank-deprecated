<h1><?php echo Yii::t('Loan', 'IndexLoanApplications'); ?></h1>

<table id='tableLoanApplications'>
    <tr>
        <th><?php echo Yii::t('Loan', 'ApplicationCreated'); ?></th>
        <th><?php echo Yii::t('Loan', 'Amount'); ?></th>
        <th><?php echo Yii::t('Loan', 'Type'); ?></th>
        <th><?php echo Yii::t('Loan', 'Repayment'); ?></th>
        <th><?php echo Yii::t('Loan', 'Interest'); ?></th>
        <th><?php echo Yii::t('Loan', 'Interval'); ?></th>
        <th><?php echo Yii::t('Loan', 'Status'); ?></th>
        <th></th>
    </tr>
    
    <?php
        foreach($loanApplications as $loanApplication){
            echo "<tr>";
                echo "<td>".Format::formatISODateToEUROFormat($loanApplication->create_date)."</td>";
                echo "<td>$loanApplication->amount ".$loanApplication->bankCurrency->code."</td>";
                echo "<td>".Yii::t('Loan',$loanApplication->type)."</td>";
                echo "<td>$loanApplication->repayment ".$loanApplication->bankCurrency->code."</td>";
                echo "<td>".number_format($loanApplication->interest,3)."%</td>";
                echo "<td>".Yii::t('Loan',$loanApplication->interval)."</td>";
                echo "<td>".Yii::t('Loan',$loanApplication->status)."</td>";
                
                echo "<td>";
                if($loanApplication->status=='open'){
                    $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'danger', 'label'=>Yii::t('Account', 'Cancel')));
                }
                elseif($loanApplication->status=='granted'){
                    $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'success', 'label'=>Yii::t('Account', 'Accept')));
                    $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'danger' ,'label'=>Yii::t('Account', 'Decline')));
                }
                echo "</td>";
                
            echo "</tr>";
        }
    ?>
</table>

<div class="row buttons">
    <?php $this->widget('bootstrap.widgets.TbButton', array('url'=>'createLoanApplication', 'type'=>'primary', 'label'=>Yii::t('Account', 'CreateLoanApplication'))); ?>
</div>