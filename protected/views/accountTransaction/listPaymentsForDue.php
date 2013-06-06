<h1><?php echo Yii::t('AccountTransaction', 'PaymentsForDue'); ?></h1>

<div class='well'>
    <div class="form">

    <?php echo CHtml::errorSummary($Account); ?>

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'paymentsForDue',
    )); ?>

        <div class="row">
            <?php echo $form->dropDownList($Account, 'iban', $ibanDropdown, array('class'=>'ibanDropdown', 'submit'=>''));?>
        </div>

        <div class="row buttons">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>Yii::t('AccountTransaction', 'GetPayments'))); ?>
        </div>

    <?php $this->endWidget();?>
    </div><!-- form -->
    
    <?php 
    if(is_array($AccountTransactions)){
        if(empty($AccountTransactions)) echo "<p class='light well'>".Yii::t('AccountTransactions', 'NoPaymentsForDue')."</p>";
        else $this->renderPartial('_listTransactions', array('AccountTransactions'=>$AccountTransactions, 'Account'=>$Account));
    }
    ?>
    
</div><!-- well -->

