<?php
/* @var $this LetterController */
/* @var $model Letter */

$this->breadcrumbs=array(
	'Letters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Letter', 'url'=>array('index')),
	array('label'=>'Create Letter', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#letter-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Letters</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'letter-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idLetter',
		'email',
		'senderName',
		'senderEmail',
		'subject',
		'body',
		/*
		'listId',
		'createDate',
		'sendDate',
		'sendReport',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
