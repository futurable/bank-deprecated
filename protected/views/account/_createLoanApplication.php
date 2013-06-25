<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'createLoanApplicationForm',
        'enableClientValidation'=>true,
        'clientOptions'=>array('validateOnSubmit'=>true,'validateOnChange'=>true),
        'htmlOptions'=>array('class'=>'well'),
)); ?>
<?php echo $form->errorSummary($loanInfo); ?>
	<div class="row">
		<?php echo $form->label($loanInfo,'amount'); ?>
		<?php echo $form->textField($loanInfo,'amount'); ?>
		<?php echo $form->error($loanInfo,'amount'); ?>
	</div>

    <div class="row">
		<?php echo $form->label($loanInfo,'type'); ?>
		<?php echo ZHtml::enumDropDownList($loanInfo, 'type');?>
		<?php echo $form->error($loanInfo,'type'); ?>
    </div>

    <div class="row loanRepayment">
		<?php echo $form->label($loanInfo,'repayment'); ?>
		<?php echo $form->textField($loanInfo,'repayment'); ?>
		<?php echo $form->error($loanInfo,'repayment'); ?>
    </div>

    <div class="row loanInstalment">
		<?php echo $form->label($loanInfo,'instalment'); ?>
		<?php echo $form->textField($loanInfo,'instalment'); ?>
		<?php echo $form->error($loanInfo,'instalment'); ?>
    </div>

    <div class="row loanTerm">
		<?php echo $form->label($loanInfo,'term'); ?>
		<?php echo $form->dropDownList($loanInfo,'term', range(5,30)); ?>
		<?php echo ZHtml::enumDropDownList($loanInfo, 'term_interval'); ?>
		<?php echo $form->error($loanInfo,'term'); ?>
    </div>

    <div class="row">
		<?php echo $form->label($loanInfo,'interval'); ?>
		<?php echo ZHtml::enumDropDownList($loanInfo, 'interval');?>
		<?php echo $form->error($loanInfo,'interval'); ?>
    </div>

    <div class="row">
		<?php echo $form->label($loanInfo,'bank_interest_id'); ?>
        <?php echo $form->dropDownList($loanInfo, 'bank_interest_id', $this->getInterestDropdown());?>
		<?php echo $form->error($loanInfo,'bank_interest_id'); ?>

        <?php $margin = number_format(Interest::model()->findByAttributes(array('name'=>'loanMargin'))->rate, 3)."%"; ?>
        <?php echo "( ".Yii::t('Loan', 'IncludesMargin')." $margin )"; ?>
    </div>

	<div class="row buttons">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>Yii::t('Account', 'CreateLoanApplication'))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->