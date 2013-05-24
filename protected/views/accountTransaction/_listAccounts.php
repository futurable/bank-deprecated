<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
                <?php echo $form->label($account,'iban'); ?>
                <?php echo $form->dropDownList($account, 'iban', $ibanDropdown, array('class'=>'ibanDropdown'));?>
                <?php echo $form->error($account,'iban'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('Account', 'GetTransactions')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->