<?php
/* @var $this AccountTransactionController */
/* @var $model AccountTransaction */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-transaction-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'recipient_iban'); ?>
		<?php echo $form->textField($model,'recipient_iban',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'recipient_iban'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'recipient_bic'); ?>
		<?php echo $form->textField($model,'recipient_bic',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'recipient_bic'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'recipient_name'); ?>
		<?php echo $form->textField($model,'recipient_name',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'recipient_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_date'); ?>
		<?php echo $form->textField($model,'event_date'); ?>
		<?php echo $form->error($model,'event_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modify_date'); ?>
		<?php echo $form->textField($model,'modify_date'); ?>
		<?php echo $form->error($model,'modify_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reference_number'); ?>
		<?php echo $form->textField($model,'reference_number',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'reference_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'message'); ?>
		<?php echo $form->textField($model,'message',array('size'=>60,'maxlength'=>420)); ?>
		<?php echo $form->error($model,'message'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'exchange_rate'); ?>
		<?php echo $form->textField($model,'exchange_rate',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'exchange_rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency'); ?>
		<?php echo $form->textField($model,'currency',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank_account_id'); ?>
		<?php echo $form->textField($model,'bank_account_id'); ?>
		<?php echo $form->error($model,'bank_account_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->