<?php
/* @var $this LetterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Letters',
);

$this->menu=array(
	array('label'=>'Create Letter', 'url'=>array('create')),
	array('label'=>'Manage Letter', 'url'=>array('admin')),
);
?>

<h1>Letters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
