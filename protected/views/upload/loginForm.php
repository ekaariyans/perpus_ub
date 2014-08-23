<?php
/* @var $this TUserRequestController */
/* @var $model TUserRequest */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tuser-request-loginForm-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_MEMBER'); ?>
		<?php echo $form->textField($model,'ID_MEMBER'); ?>
		<?php echo $form->error($model,'ID_MEMBER'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_PRIVILEGE'); ?>
		<?php echo $form->textField($model,'ID_PRIVILEGE'); ?>
		<?php echo $form->error($model,'ID_PRIVILEGE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'USERNAME'); ?>
		<?php echo $form->textField($model,'USERNAME'); ?>
		<?php echo $form->error($model,'USERNAME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PASSWORD'); ?>
		<?php echo $form->textField($model,'PASSWORD'); ?>
		<?php echo $form->error($model,'PASSWORD'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->