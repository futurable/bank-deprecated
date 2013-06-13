<h1><?php echo Yii::t('Account', 'ApplicationReceived')?></h1>

<p><?php echo Yii::t('Account', 'ThankYouMessage') ?></p>
<p><?php echo Yii::t('Account', 'WeWillContactYou') ?></p>

<p class='padding40top'>
<?php $this->widget('bootstrap.widgets.TbButton', array('label'=>Yii::t('Account', 'LoanApplications'), 'url'=>'../indexLoanApplications' )); ?>
</p>