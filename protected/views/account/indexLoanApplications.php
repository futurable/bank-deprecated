<h1><?php echo Yii::t('Loan', 'IndexLoanApplications'); ?></h1>

<?php if(!empty($loanApplications)){ ?>
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
            
            $status = $loanApplication->status;
            switch ($status) {
                case 'active':
                    $type = 'inverse';
                    break;
                case 'open':
                    $type = 'info';
                    break;
                case 'granted':
                    $type = 'success';
                    break;
                case 'denied':
                    $type = 'important';
                    break;
                case 'declined':
                    $type = 'warning';
                    break;
                default:
                    $type = null;
                    break;
            }
            
            $form=$this->beginWidget('CActiveForm');
            echo $form->hiddenField($loanApplication,'id');
            
            echo "<tr>";
                echo "<td>".Format::formatISODateToEUROFormat($loanApplication->create_date)."</td>";
                echo "<td>$loanApplication->amount ".$loanApplication->bankCurrency->code."</td>";
                echo "<td>".Yii::t('Loan',$loanApplication->type)."</td>";
                echo "<td>$loanApplication->repayment ".$loanApplication->bankCurrency->code."</td>";
                echo "<td>".number_format($loanApplication->interest,3)."%</td>";
                echo "<td>".Yii::t('Loan',$loanApplication->interval)."</td>";
                echo "<td>";
                    $this->widget('bootstrap.widgets.TbLabel', array('type'=>$type, 'label'=>Yii::t('Loan',$status)));
                echo "</td>";
                
                echo "<td>";
                if($loanApplication->status=='open'){
                    $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'danger', 'label'=>Yii::t('Account', 'Cancel'), 'htmlOptions'=>array('name'=>'Loan[action]', 'value'=>'cancel')));
                }
                elseif($loanApplication->status=='granted'){
                    $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'success', 'label'=>Yii::t('Account', 'Accept'), 'htmlOptions'=>array('name'=>'Loan[action]', 'value'=>'accept')));
                    $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'danger' ,'label'=>Yii::t('Account', 'Decline'), 'htmlOptions'=>array('name'=>'Loan[action]', 'value'=>'decline')));
                }
                echo "</td>";
                
            echo "</tr>";
            
            $this->endWidget();
        }
    ?>
</table>
<?php }; ?>

<div class="row buttons">
    <?php $this->widget('bootstrap.widgets.TbButton', array('url'=>'createLoanApplication', 'type'=>'primary', 'label'=>Yii::t('Account', 'CreateLoanApplication'))); ?>
</div>