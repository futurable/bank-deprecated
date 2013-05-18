<?php
/* @var $this AccountController */
/* @var $data Account */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iban')); ?>:</b>
	<?php echo CHtml::encode($data->iban); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency')); ?>:</b>
	<?php echo CHtml::encode($data->currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modify_date')); ?>:</b>
	<?php echo CHtml::encode($data->modify_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->bank_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_bic_id')); ?>:</b>
	<?php echo CHtml::encode($data->bank_bic_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_interest_id')); ?>:</b>
	<?php echo CHtml::encode($data->bank_interest_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_currency_id')); ?>:</b>
	<?php echo CHtml::encode($data->bank_currency_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_account_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->bank_account_type_id); ?>
	<br />

	*/ ?>

</div>