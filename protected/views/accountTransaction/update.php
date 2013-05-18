<?php
/* @var $this AccountTransactionController */
/* @var $model AccountTransaction */

$this->breadcrumbs=array(
	'Account Transactions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AccountTransaction', 'url'=>array('index')),
	array('label'=>'Create AccountTransaction', 'url'=>array('create')),
	array('label'=>'View AccountTransaction', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AccountTransaction', 'url'=>array('admin')),
);
?>

<h1>Update AccountTransaction <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>