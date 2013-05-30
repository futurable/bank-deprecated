<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array('validateOnSubmit'=>true,'validateOnChange'=>true),
        'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($loanAccount); ?>

	<div class="row">
		<?php echo $form->labelEx($loanAccount,'iban'); ?>
		<?php echo $form->textField($loanAccount,'iban',array('readonly'=>true)); ?>
		<?php echo $form->error($loanAccount,'iban'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($loanAccount,'name'); ?>
		<?php echo $form->textField($loanAccount,'name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($loanAccount,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($loanAccount,'status'); ?>
		<?php echo $form->textField($loanAccount,'status',array('readonly'=>true)); ?>
		<?php echo $form->error($loanAccount,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($loanAccount,'bank_user_id'); ?>
                <?php echo $form->dropDownList($loanAccount, 'bank_user_id', CHtml::listData(User::model()->findAll(),'id','username'),array('prompt'=>'- Select user -'));?>
		<?php echo $form->error($loanAccount,'bank_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($loanAccount,'bank_bic_id'); ?>
		<?php echo $form->textField($loanAccount,'bank_bic_id', array('readonly'=>true)); ?>
		<?php echo $form->error($loanAccount,'bank_bic_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($loanAccount,'bank_currency_id'); ?>
		<?php echo $form->dropDownList($loanAccount, 'bank_currency_id', CHtml::listData(Currency::model()->findAll(),'id','code'),array('prompt'=>'- Select currency -'));?>
		<?php echo $form->error($loanAccount,'bank_currency_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($loanAccount,'bank_account_type_id'); ?>
		<?php echo $form->dropDownList($loanAccount, 'bank_account_type_id', CHtml::listData(AccountType::model()->findAll(),'id','type'),array('prompt'=>'- Select account type -'));?>
		<?php echo $form->error($loanAccount,'bank_account_type_id'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($loanAccount,'bank_interest_id'); ?>
		<?php echo $form->dropDownList($loanAccount, 'bank_interest_id', CHtml::listData(Interest::model()->findAll(),'id','type'),array('prompt'=>'- Select interest -'));?>
		<?php echo $form->error($loanAccount,'bank_interest_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($loanAccount->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->