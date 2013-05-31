<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array('validateOnSubmit'=>true,'validateOnChange'=>true),
        'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($Account); ?>

	<div class="row">
		<?php echo $form->labelEx($Account,'iban'); ?>
		<?php echo $form->textField($Account,'iban',array('readonly'=>true)); ?>
		<?php echo $form->error($Account,'iban'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($Account,'name'); ?>
		<?php echo $form->textField($Account,'name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($Account,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($Account,'status'); ?>
		<?php echo $form->textField($Account,'status',array('readonly'=>true)); ?>
		<?php echo $form->error($Account,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($Account,'bank_user_id'); ?>
                <?php echo $form->dropDownList($Account, 'bank_user_id', CHtml::listData(User::model()->findAll(),'id','username'),array('prompt'=>'- Select user -'));?>
		<?php echo $form->error($Account,'bank_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($Account,'bank_bic_id'); ?>
		<?php echo $form->textField($Account,'bank_bic_id', array('readonly'=>true)); ?>
		<?php echo $form->error($Account,'bank_bic_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($Account,'bank_currency_id'); ?>
		<?php echo $form->dropDownList($Account, 'bank_currency_id', CHtml::listData(Currency::model()->findAll(),'id','code'),array('prompt'=>'- Select currency -'));?>
		<?php echo $form->error($Account,'bank_currency_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($Account,'bank_account_type_id'); ?>
		<?php echo $form->dropDownList($Account, 'bank_account_type_id', CHtml::listData(AccountType::model()->findAll(),'id','type'),array('prompt'=>'- Select account type -'));?>
		<?php echo $form->error($Account,'bank_account_type_id'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($Account,'bank_interest_id'); ?>
		<?php echo $form->dropDownList($Account, 'bank_interest_id', CHtml::listData(Interest::model()->findAll(),'id','name'),array('prompt'=>'- Select interest -'));?>
		<?php echo $form->error($Account,'bank_interest_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($Account->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->