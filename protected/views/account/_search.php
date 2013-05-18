<?php
/* @var $this AccountController */
/* @var $model Account */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iban'); ?>
		<?php echo $form->textField($model,'iban',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'currency'); ?>
		<?php echo $form->textField($model,'currency',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modify_date'); ?>
		<?php echo $form->textField($model,'modify_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bank_user_id'); ?>
		<?php echo $form->textField($model,'bank_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bank_bic_id'); ?>
		<?php echo $form->textField($model,'bank_bic_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bank_interest_id'); ?>
		<?php echo $form->textField($model,'bank_interest_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bank_currency_id'); ?>
		<?php echo $form->textField($model,'bank_currency_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bank_account_type_id'); ?>
		<?php echo $form->textField($model,'bank_account_type_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->