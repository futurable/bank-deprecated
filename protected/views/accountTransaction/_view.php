<?php
/* @var $this AccountTransactionController */
/* @var $data AccountTransaction */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recipient_iban')); ?>:</b>
	<?php echo CHtml::encode($data->recipient_iban); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recipient_bic')); ?>:</b>
	<?php echo CHtml::encode($data->recipient_bic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recipient_name')); ?>:</b>
	<?php echo CHtml::encode($data->recipient_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_date')); ?>:</b>
	<?php echo CHtml::encode($data->event_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modify_date')); ?>:</b>
	<?php echo CHtml::encode($data->modify_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reference_number')); ?>:</b>
	<?php echo CHtml::encode($data->reference_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('message')); ?>:</b>
	<?php echo CHtml::encode($data->message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exchange_rate')); ?>:</b>
	<?php echo CHtml::encode($data->exchange_rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency')); ?>:</b>
	<?php echo CHtml::encode($data->currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_account_id')); ?>:</b>
	<?php echo CHtml::encode($data->bank_account_id); ?>
	<br />

	*/ ?>

</div>