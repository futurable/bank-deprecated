<?php
/* @var $this AccountTransactionController */
/* @var $model AccountTransaction */

$this->breadcrumbs=array(
	'Account Transactions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AccountTransaction', 'url'=>array('index')),
	array('label'=>'Create AccountTransaction', 'url'=>array('create')),
	array('label'=>'Update AccountTransaction', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AccountTransaction', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AccountTransaction', 'url'=>array('admin')),
);
?>

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
