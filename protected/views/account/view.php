<h1>View Account #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'iban',
		'name',
		'status',
		'create_date',
		'modify_date',
		'bank_user_id',
		'bank_bic_id',
		'bank_interest_id',
		'bank_currency_id',
		'bank_account_type_id',
	),
)); ?>
