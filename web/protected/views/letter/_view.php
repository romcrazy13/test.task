<?php
/* @var $this LetterController */
/* @var $data Letter */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idLetter')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idLetter), array('view', 'id'=>$data->idLetter)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('senderName')); ?>:</b>
	<?php echo CHtml::encode($data->senderName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('senderEmail')); ?>:</b>
	<?php echo CHtml::encode($data->senderEmail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subject')); ?>:</b>
	<?php echo CHtml::encode($data->subject); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('body')); ?>:</b>
	<?php echo CHtml::encode($data->body); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('listId')); ?>:</b>
	<?php echo CHtml::encode($data->listId); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('createDate')); ?>:</b>
	<?php echo CHtml::encode($data->createDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sendDate')); ?>:</b>
	<?php echo CHtml::encode($data->sendDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sendReport')); ?>:</b>
	<?php echo CHtml::encode($data->sendReport); ?>
	<br />

	*/ ?>

</div>