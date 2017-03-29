<?php
/* @var $this LetterController */
/* @var $model Letter */

$this->breadcrumbs=array(
	'Letters'=>array('index'),
	$model->idLetter,
);

$this->menu=array(
	array('label'=>'List Letter', 'url'=>array('index')),
	array('label'=>'Create Letter', 'url'=>array('create')),
	array('label'=>'Update Letter', 'url'=>array('update', 'id'=>$model->idLetter)),
	array('label'=>'Delete Letter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idLetter),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Letter', 'url'=>array('admin')),
);
?>

<h1>View Letter #<?php echo $model->idLetter; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
//		'idLetter',
		'email',
		'senderName',
		'senderEmail',
		'subject',
		'body',
//		'listId',
//		'createDate',
		'sendDate',
		'sendReport',
	),
)); ?>


<!--<a href="http://--><?php //echo $_SERVER['HTTP_HOST'] ?><!--/index.php?r=ajax/sendunisender">-->
<!--    <button>Send</button>-->
<!--</a>-->

<a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/index.php?r=letter/send&id=<?php echo $model->idLetter ?>">
    <button>Send</button>
</a>



