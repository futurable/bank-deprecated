<?php
/* @var $this AccountTransactionController */
/* @var $accountTransaction AccountTransaction */
/* @var $form CActiveForm */
?>

<div class="form">

<?php 
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'account-transaction-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true,'validateOnChange'=>true),
    'htmlOptions'=>array('class'=>'well'),
));
?>
    <fieldset>
    <legend><?php echo Yii::t('AccountTransaction', 'PayerInfo')?></legend>
    	<div class="row">
            <?php echo $form->label($accountTransaction,'payer_iban'); ?>
            <?php echo $form->dropDownList($accountTransaction, 'payer_iban', $ibanDropdown, array('class'=>'ibanDropdown')  );?>
            <?php echo $form->error($accountTransaction,'payer_iban'); ?>
	</div>
    
        <div class="row">
            <?php echo $form->label($accountTransaction,'payer_name'); ?>
            <?php $payerName = $this->WebUser->profile->firstname." ".$this->WebUser->profile->lastname; ?>
            <?php echo $form->textField($accountTransaction,'payer_name',array('readonly'=>true, 'value'=>$payerName)); ?>
            <?php echo $form->error($accountTransaction,'payer_name'); ?>
        </div>
    
    <legend><?php echo Yii::t('AccountTransaction', 'RecipientInfo')?></legend>
	<div class="row">
            <?php echo $form->label($accountTransaction,'recipient_iban'); ?>
            <?php echo $form->textField($accountTransaction,'recipient_iban',array('readonly'=>true)); ?>
            <?php echo $form->error($accountTransaction,'recipient_iban'); ?>
	</div>

	<div class="row">
            <?php echo $form->label($accountTransaction,'recipient_bic'); ?>
            <?php echo $form->textField($accountTransaction,'recipient_bic',array('readonly'=>true)); ?>
            <?php echo $form->error($accountTransaction,'recipient_bic'); ?>
	</div>

	<div class="row">
            <?php echo $form->label($accountTransaction,'recipient_name'); ?>
            <?php echo $form->textField($accountTransaction,'recipient_name',array('size'=>35,'maxlength'=>35)); ?>
            <?php echo $form->error($accountTransaction,'recipient_name'); ?>
	</div>

    <legend><?php echo Yii::t('AccountTransaction', 'PaymentInfo')?></legend>
	<div class="row">
            <?php echo $form->label($accountTransaction,'event_date'); ?>
            <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model'=>$accountTransaction,
                    'attribute'=>'event_date',
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                        'minDate'=>date('d.m.y'),
                        'defaultDate'=>$accountTransaction->event_date,
                    ),
                ));
            ?>
            <?php echo $form->error($accountTransaction,'event_date'); ?>
	</div>

	<div class="row">
            <?php echo $form->label($accountTransaction,'amount'); ?>
            <?php echo $form->textField($accountTransaction,'amount',array('size'=>19,'maxlength'=>19)); ?>
            <?php echo $form->error($accountTransaction,'amount'); ?>
	</div>

	<div class="row">
            <?php echo $form->label($accountTransaction,'reference_number'); ?>
            <?php echo $form->textField($accountTransaction,'reference_number',array('size'=>20,'maxlength'=>20)); ?>
            <?php echo $form->error($accountTransaction,'reference_number'); ?>
	</div>

	<div class="row">
            <?php echo $form->label($accountTransaction,'message'); ?>
            <?php echo $form->textField($accountTransaction,'message',array('size'=>60,'maxlength'=>420)); ?>
            <?php echo $form->error($accountTransaction,'message'); ?>
	</div>

	<div class="row buttons">
            <?php echo CHtml::submitButton(Yii::t('AccountTransaction','CreateTransaction')); ?>
	</div>
    </fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->