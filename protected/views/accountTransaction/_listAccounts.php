<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
)); ?>

    <div class="row">
        <?php echo $form->dropDownList($Account, 'iban', $ibanDropdown, array('class'=>'ibanDropdown', 'submit'=>''));?>
    </div>
    
    <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $Account,
            'attribute' => 'start_date',
            'language'=>Yii::app()->language,
            'options' => array(
                'changeYear' => true,
                'changeMonth' => true,
                'maxDate' => '0',
                'minDate' => '-3y',
            ),
        ));
        
        echo " - ";
        
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $Account,
            'attribute' => 'end_date',
            'language'=>Yii::app()->language,
            'options' => array(
                'changeYear' => true,
                'changeMonth' => true,
                'maxDate' => '0',
                'minDate' => '-3y',
            ),
        ));
    ?>

	<div class="row buttons">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>Yii::t('AccountTransaction', 'GetTransactions'))); ?>
	</div>
    
<?php $this->endWidget();?>
<?php echo $Account->start_date." ".$Account->end_date." ".$Account->iban; ?>
</div><!-- form -->