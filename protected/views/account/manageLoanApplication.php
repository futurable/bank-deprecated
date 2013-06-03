<h1>Manage loan applications</h1>

<table>
    <tr>
        <th>IBAN</th>
        <th>Company</th>
        <th>Amount</th>
        <th>Repayment</th>
        <th>Status</th>
        <th></th>
    </tr>
    <?php
    foreach($loanApplications as $loanApplication){
        $status = $loanApplication->status;
        $form=$this->beginWidget('CActiveForm');
        
        echo $form->hiddenField($loanApplication,'id');
        
        echo "<tr>";
            echo "<td>".$loanApplication->bankAccount->iban."</td>";
            echo "<td>".$loanApplication->bankAccount->bankUser->profile->company."</td>";
            echo "<td>".$loanApplication->amount."</td>";
            echo "<td>".$loanApplication->repayment."&euro;</td>";
            echo "<td>$status</td>";
            echo "<td>";
            if($status=='open') $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Grant'));
            echo "</td>";
        echo "</tr>";
        
        $this->endWidget();
    }
    ?>
</table>