<h1>View AccountTransaction #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'recipient_iban',
		'recipient_bic',
		'recipient_name',
		'event_date',
		'create_date',
		'modify_date',
		'amount',
		'reference_number',
		'message',
		'exchange_rate',
		'currency',
		'bank_account_id',
	),
)); ?>
