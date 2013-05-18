<?php
/* @var $this AccountTransactionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Account Transactions',
);

$this->menu=array(
	array('label'=>'Create AccountTransaction', 'url'=>array('create')),
	array('label'=>'Manage AccountTransaction', 'url'=>array('admin')),
);
?>

<h1>Account Transactions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
