<?php
/* @var $this pengolahanController */
/* @var $model pengolahan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pengolahan-formPermintaan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_permintaan'); ?>
		<?php echo $form->textField($model,'id_permintaan'); ?>
		<?php echo $form->error($model,'id_permintaan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_anggota'); ?>
		<?php echo $form->textField($model,'id_anggota'); ?>
		<?php echo $form->error($model,'id_anggota'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'judul'); ?>
		<?php echo $form->textField($model,'judul'); ?>
		<?php echo $form->error($model,'judul'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pengarang'); ?>
		<?php echo $form->textField($model,'pengarang'); ?>
		<?php echo $form->error($model,'pengarang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'penerbit'); ?>
		<?php echo $form->textField($model,'penerbit'); ?>
		<?php echo $form->error($model,'penerbit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun_terbit'); ?>
		<?php echo $form->textField($model,'tahun_terbit'); ?>
		<?php echo $form->error($model,'tahun_terbit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kota'); ?>
		<?php echo $form->textField($model,'kota'); ?>
		<?php echo $form->error($model,'kota'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'edisi'); ?>
		<?php echo $form->textField($model,'edisi'); ?>
		<?php echo $form->error($model,'edisi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isbn'); ?>
		<?php echo $form->textField($model,'isbn'); ?>
		<?php echo $form->error($model,'isbn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keterangan'); ?>
		<?php echo $form->textField($model,'keterangan'); ?>
		<?php echo $form->error($model,'keterangan'); ?>
	</div>
    <div class="row">
	<?php
        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
        'name'=>'publishDate',
        // additional javascript options for the date picker plugin
        'options'=>array(
            'showAnim'=>'fold',
        ),
        'htmlOptions'=>array(
            'style'=>'height:20px;'
        ),
    ));
    ?>
    </div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->