<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array('validateOnSubmit'=>true,'validateOnChange'=>true),
        'htmlOptions'=>array('class'=>'well'),
)); ?>

	<div class="row">
		<?php echo $form->label($loanInfo,'amount'); ?>
		<?php echo $form->textField($loanInfo,'amount'); ?>
		<?php echo $form->error($loanInfo,'amount'); ?>
	</div>

        <div class="row">
		<?php echo $form->label($loanInfo,'type'); ?>
		<?php echo $form->textField($loanInfo,'type'); ?>
		<?php echo $form->error($loanInfo,'type'); ?>
	</div>

        <div class="row">
		<?php echo $form->label($loanInfo,'repayment'); ?>
		<?php echo $form->textField($loanInfo,'repayment'); ?>
		<?php echo $form->error($loanInfo,'repayment'); ?>
	</div>

        <div class="row">
		<?php echo $form->label($loanInfo,'instalment'); ?>
		<?php echo $form->textField($loanInfo,'instalment'); ?>
		<?php echo $form->error($loanInfo,'instalment'); ?>
	</div>

        <div class="row">
		<?php echo $form->label($loanInfo,'term'); ?>
		<?php echo $form->textField($loanInfo,'term'); ?>
		<?php echo $form->error($loanInfo,'term'); ?>
	</div>

        <div class="row">
		<?php echo $form->label($loanInfo,'interval'); ?>
		<?php echo $form->textField($loanInfo,'interval'); ?>
		<?php echo $form->error($loanInfo,'interval'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Create'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->