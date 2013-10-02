<h1>Manage loan applications</h1>

<table>
    <tr>
        <th>IBAN</th>
        <th>Company</th>
        <th>Amount</th>
        <th>Repayment</th>
        <th>Interval</th>
        <th>Status</th>
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
                $type = 'warning';
                break;
            case 'declined':
                $type = '';
                break;
            default:
                $type = null;
                break;
        }
        
        $form=$this->beginWidget('CActiveForm');
        
        echo $form->hiddenField($loanApplication,'id');
        
        echo "<tr>";
            echo "<td>".$loanApplication->bankAccount->iban."</td>";
            echo "<td>".$loanApplication->bankAccount->bankUser->profile->company."</td>";
            echo "<td>".$loanApplication->amount."&euro;</td>";
            echo "<td>".$loanApplication->repayment."&euro;</td>";
            echo "<td>".$loanApplication->interval."</td>";
            echo "<td>";
                $this->widget('bootstrap.widgets.TbLabel', array('type'=>$type, 'label'=>$status));
            echo "</td>";
            echo "<td>";
            if($status=='open'){ 
                $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'success', 'label'=>'Grant', 'htmlOptions'=>array('name'=>'Loan[action]', 'value'=>'grant')));
                $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'danger', 'label'=>'Deny', 'htmlOptions'=>array('name'=>'Loan[action]', 'value'=>'deny')));
            }
            echo "</td>";
        echo "</tr>";
        
        $this->endWidget();
    }
    ?>
</table>