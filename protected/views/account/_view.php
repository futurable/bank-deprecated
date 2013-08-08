<?php
/* @var $this AccountController */
/* @var $data Account */
?>

<div class="view">

    <table>
        <tr>
            <th><?php echo CHtml::encode($data->getAttributeLabel('bank_user_id')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('iban')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('status')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('bank_interest_id')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('bank_currency_id')); ?></th>
            <th><?php echo CHtml::encode($data->getAttributeLabel('bank_account_type_id')); ?></th>
        </tr>
        <tr>
            <td><?php echo CHtml::encode($data->bankUser->username); ?></td>
            <td><?php echo CHtml::encode($data->iban); ?></td>
            <td><?php echo CHtml::encode($data->name); ?></td>
            <td><?php echo CHtml::encode($data->status); ?></td>
            <td><?php echo CHtml::encode($data->bankInterest->rate); ?></td>
            <td><?php echo CHtml::encode($data->bankCurrency->code); ?></td>
            <td><?php echo CHtml::encode($data->bankAccountType->description); ?></td>
        </tr>
    </table>

</div>