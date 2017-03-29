<?php
/* @var $this LetterController */
/* @var $model Letter */

$this->breadcrumbs=array(
	'Letters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Letter', 'url'=>array('index')),
	array('label'=>'Manage Letter', 'url'=>array('admin')),
);
?>

<h1>Create Letter</h1>

<?php
$model['createDate'] = date('Y-m-d H:i:s');
$this->renderPartial('_form', array('model'=>$model));
?>