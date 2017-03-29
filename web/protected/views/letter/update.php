<?php
/* @var $this LetterController */
/* @var $model Letter */

$this->breadcrumbs=array(
	'Letters'=>array('index'),
	$model->idLetter=>array('view','id'=>$model->idLetter),
	'Update',
);

$this->menu=array(
	array('label'=>'List Letter', 'url'=>array('index')),
	array('label'=>'Create Letter', 'url'=>array('create')),
	array('label'=>'View Letter', 'url'=>array('view', 'id'=>$model->idLetter)),
	array('label'=>'Manage Letter', 'url'=>array('admin')),
);
?>

<h1>Update Letter <?php echo $model->idLetter; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>