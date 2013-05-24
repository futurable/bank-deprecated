<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
)); ?>

	<div class="row">
                <?php echo $form->label($account,'iban'); ?>
                <?php echo $form->dropDownList($account, 'iban', $ibanDropdown, array('class'=>'ibanDropdown', 'submit'=>''));?>
                <?php echo $form->error($account,'iban'); ?>
	</div>

<?php $this->endWidget();?>

</div><!-- form -->