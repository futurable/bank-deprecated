<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($Account); ?>

	<div class="row">
		<?php echo $form->labelEx($Account,'iban'); ?>
		<?php echo $form->textField($Account,'iban',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($Account,'iban'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($Account,'currency'); ?>
		<?php echo $form->textField($Account,'currency',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($Account,'currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($Account,'name'); ?>
		<?php echo $form->textField($Account,'name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($Account,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($Account,'status'); ?>
		<?php echo $form->textField($Account,'status',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($Account,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($Account,'bank_user_id'); ?>
		<?php echo $form->textField($Account,'bank_user_id'); ?>
		<?php echo $form->error($Account,'bank_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($Account,'bank_bic_id'); ?>
		<?php echo $form->textField($Account,'bank_bic_id'); ?>
		<?php echo $form->error($Account,'bank_bic_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($Account,'bank_interest_id'); ?>
		<?php echo $form->textField($Account,'bank_interest_id'); ?>
		<?php echo $form->error($Account,'bank_interest_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($Account,'bank_currency_id'); ?>
		<?php echo $form->textField($Account,'bank_currency_id'); ?>
		<?php echo $form->error($Account,'bank_currency_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($Account,'bank_account_type_id'); ?>
		<?php echo $form->textField($Account,'bank_account_type_id'); ?>
		<?php echo $form->error($Account,'bank_account_type_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($Account->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->