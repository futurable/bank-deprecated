<?php
/* @var $this AccountController */
/* @var $model Account */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'iban'); ?>
		<?php echo $form->textField($model,'iban',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'iban'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'status'); ?>
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
		<?php echo $form->labelEx($model,'bank_user_id'); ?>
		<?php echo $form->textField($model,'bank_user_id'); ?>
		<?php echo $form->error($model,'bank_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank_bic_id'); ?>
		<?php echo $form->textField($model,'bank_bic_id'); ?>
		<?php echo $form->error($model,'bank_bic_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank_interest_id'); ?>
		<?php echo $form->textField($model,'bank_interest_id'); ?>
		<?php echo $form->error($model,'bank_interest_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank_currency_id'); ?>
		<?php echo $form->textField($model,'bank_currency_id'); ?>
		<?php echo $form->error($model,'bank_currency_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank_account_type_id'); ?>
		<?php echo $form->textField($model,'bank_account_type_id'); ?>
		<?php echo $form->error($model,'bank_account_type_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->