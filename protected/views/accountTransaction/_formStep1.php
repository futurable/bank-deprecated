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

	<div class="row buttons">
		<?php echo CHtml::submitButton('Continue'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->