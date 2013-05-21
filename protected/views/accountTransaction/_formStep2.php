<?php
/* @var $this AccountTransactionController */
/* @var $accountTransaction AccountTransaction */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-transaction-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($accountTransaction); ?>

	<div class="row">
		<?php echo $form->labelEx($accountTransaction,'recipient_iban'); ?>
		<?php echo $form->textField($accountTransaction,'recipient_iban',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($accountTransaction,'recipient_iban'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($accountTransaction,'recipient_bic'); ?>
		<?php echo $form->textField($accountTransaction,'recipient_bic',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($accountTransaction,'recipient_bic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($accountTransaction,'recipient_name'); ?>
		<?php echo $form->textField($accountTransaction,'recipient_name',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($accountTransaction,'recipient_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($accountTransaction,'event_date'); ?>
		<?php echo $form->textField($accountTransaction,'event_date'); ?>
		<?php echo $form->error($accountTransaction,'event_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($accountTransaction,'create_date'); ?>
		<?php echo $form->textField($accountTransaction,'create_date'); ?>
		<?php echo $form->error($accountTransaction,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($accountTransaction,'modify_date'); ?>
		<?php echo $form->textField($accountTransaction,'modify_date'); ?>
		<?php echo $form->error($accountTransaction,'modify_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($accountTransaction,'amount'); ?>
		<?php echo $form->textField($accountTransaction,'amount',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($accountTransaction,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($accountTransaction,'reference_number'); ?>
		<?php echo $form->textField($accountTransaction,'reference_number',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($accountTransaction,'reference_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($accountTransaction,'message'); ?>
		<?php echo $form->textField($accountTransaction,'message',array('size'=>60,'maxlength'=>420)); ?>
		<?php echo $form->error($accountTransaction,'message'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($accountTransaction,'exchange_rate'); ?>
		<?php echo $form->textField($accountTransaction,'exchange_rate',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($accountTransaction,'exchange_rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($accountTransaction,'currency'); ?>
		<?php echo $form->textField($accountTransaction,'currency',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($accountTransaction,'currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($accountTransaction,'bank_account_id'); ?>
		<?php echo $form->textField($accountTransaction,'bank_account_id'); ?>
		<?php echo $form->error($accountTransaction,'bank_account_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($accountTransaction->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->