<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
)); ?>

    <div class="row">
        <?php echo $form->dropDownList($Account, 'iban', $ibanDropdown, array('class'=>'ibanDropdown', 'submit'=>''));?>
    </div>
    
    <div class="row">
        <?php 
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model'=>$Account,
            'attribute'=>'start_date',
            // additional javascript options for the date picker plugin
            'options'=>array(
                'showAnim'=>'fold',
                'dateFormat'=>'dd.mm.yy',
                'maxDate'=>date('d.m.Y'),
                'firstDay'=>1,
            ),
        ));

        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model'=>$Account,
            'attribute'=>'end_date',
            // additional javascript options for the date picker plugin
            'options'=>array(
                'showAnim'=>'fold',
                'dateFormat'=>'dd.mm.yy',
                'maxDate'=>date('d.m.y'),
                'firstDay'=>1,
            ),
        ));
        ?>
            
    </div>

<?php $this->endWidget();?>
<?php echo $Account->start_date." ".$Account->end_date." ".$Account->iban; ?>
</div><!-- form -->