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

	<div class="row">
		<?php echo $form->label($accountTransaction,'recipient_iban'); ?>
		<?php echo $form->textField($accountTransaction,'recipient_iban',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($accountTransaction,'recipient_iban'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Continue'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->