<?php
/* @var $this AccountController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Accounts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
