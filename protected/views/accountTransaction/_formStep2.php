<?php
/* @var $this AccountTransactionController */
/* @var $accountTransaction AccountTransaction */
/* @var $form CActiveForm */
?>

<div class="form">

<?php 
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'account-transaction-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class'=>'well'),
));
?>

	<?php echo $form->errorSummary($accountTransaction); ?>

	<div class="row">
		<?php echo $form->textFieldRow($accountTransaction,'recipient_iban',array('size'=>32,'maxlength'=>32, 'labelOptions' => array('required' => false)) ); ?>
	</div>

	<div class="row">
		<?php echo $form->textFieldRow($accountTransaction,'recipient_bic',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->textFieldRow($accountTransaction,'recipient_name',array('size'=>35,'maxlength'=>35)); ?>
	</div>

	<div class="row">
		<?php echo $form->textFieldRow($accountTransaction,'event_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->textFieldRow($accountTransaction,'amount',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->textFieldRow($accountTransaction,'reference_number',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->textFieldRow($accountTransaction,'message',array('size'=>60,'maxlength'=>420)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Continue'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->