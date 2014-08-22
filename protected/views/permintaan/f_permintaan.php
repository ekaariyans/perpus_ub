<?php
/* @var $this PermintaanController */
/* @var $model Permintaan */
/* @var $form CActiveForm */
?>

<div class="form-horizontal" role="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'permintaan-f_permintaan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
        
    <div class="form-group">
		<?php echo $form->labelEx($model,'id_anggota', array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
			<?php echo $form->textField($model,'id_anggota', array('class'=>'form-control','placeholder'=>'ID Anggota')); ?>
        </div>
		<?php echo $form->error($model,'id_anggota'); ?>
	</div>
        
	<div class="form-group">
		<?php echo $form->labelEx($model,'judul', array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
			<?php echo $form->textField($model,'judul', array('class'=>'form-control','placeholder'=>'Judul Buku')); ?>
        </div>
		<?php echo $form->error($model,'judul'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->