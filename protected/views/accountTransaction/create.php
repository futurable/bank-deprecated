<?php
/* @var $this AccountTransactionController */
/* @var $model AccountTransaction */

$this->breadcrumbs=array(
	'Account Transactions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AccountTransaction', 'url'=>array('index')),
	array('label'=>'Manage AccountTransaction', 'url'=>array('admin')),
);
?>

<h1>Create AccountTransaction</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>