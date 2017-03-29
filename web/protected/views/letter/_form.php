<?php
/* @var $this LetterController */
/* @var $model Letter */
/* @var $form CActiveForm */

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'letter-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textArea($model,'email',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'senderName'); ?>
		<?php echo $form->textArea($model,'senderName',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'senderName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'senderEmail'); ?>
		<?php echo $form->textArea($model,'senderEmail',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'senderEmail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textArea($model,'subject',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'listId'); ?>
        <span id="APIkey" hidden> <?php echo Yii::app()->params['APIkey'] ?> </span>
        <select id="listId" onfocus="onFocus()" onchange="onSelect(this.value)" required>
            <?php
                foreach ($this->list as $item) {
                    if ($model['listId'] == $item->id){$s = " selected";}else{$s = '';}
                    echo "<option value='$item->id'$s>$item->title</option>";
                }
            ?>
        </select>
        <?php echo $form->textArea($model,'listId',array('rows'=>1, 'cols'=>50, 'hidden'=>true)); ?>
		<?php echo $form->error($model,'listId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createDate'); ?>
		<?php echo $form->dateTimeField($model,'createDate'); ?>
		<?php echo $form->error($model,'createDate'); ?>
	</div>

<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'sendDate'); ?>
<!--		--><?php //echo $form->dateTimeField($model,'sendDate'); ?>
<!--		--><?php //echo $form->error($model,'sendDate'); ?>
<!--	</div>-->

<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'sendReport'); ?>
<!--		--><?php //echo $form->textArea($model,'sendReport',array('rows'=>3, 'cols'=>50)); ?>
<!--		--><?php //echo $form->error($model,'sendReport'); ?>
<!--	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>

    function onSelect(listId) {
        document.getElementById('Letter_listId').textContent = listId;
    }

</script>