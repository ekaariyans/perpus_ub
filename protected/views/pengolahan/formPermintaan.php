<?php
/* @var $this PengolahanController */
/* @var $model Pengolahan */
/* @var $form CActiveForm */
?>

<div class="form-horizontal" role="form">

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

	<div class="form-group">
		<?php echo $form->labelEx($model,'jenis', array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
			<?php echo $form->textField($model,'jenis', array('class'=>'form-control','placeholder'=>'Jenis Bahan Pustaka (\'Buku\', \'Majalah\',...)')); ?>
        </div>
		<?php echo $form->error($model,'jenis'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'pengarang', array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
			<?php echo $form->textField($model,'pengarang', array('class'=>'form-control','placeholder'=>'Judul Pengarang Buku')); ?>
        </div>
		<?php echo $form->error($model,'pengarang'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'penerbit', array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
			<?php echo $form->textField($model,'penerbit', array('class'=>'form-control','placeholder'=>'Nama Penerbit Buku')); ?>
        </div>
		<?php echo $form->error($model,'penerbit'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'tahun_terbit', array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
			<?php echo $form->textField($model,'tahun_terbit', array('class'=>'form-control','placeholder'=>'Tahun Terbit Buku')); ?>
        </div>
		<?php echo $form->error($model,'tahun_terbit'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'kota', array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
			<?php echo $form->textField($model,'kota', array('class'=>'form-control','placeholder'=>'Kota Penerbitan')); ?>
        </div>
		<?php echo $form->error($model,'kota'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'edisi', array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
			<?php echo $form->textField($model,'edisi', array('class'=>'form-control','placeholder'=>'Edisi Buku(\'Pertama\',\'Kedua\',...)')); ?>
        </div>
		<?php echo $form->error($model,'edisi'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'isbn', array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
			<?php echo $form->textField($model,'isbn', array('class'=>'form-control','placeholder'=>'ISBN Buku')); ?>
        </div>
		<?php echo $form->error($model,'isbn'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'keterangan', array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
			<?php echo $form->textArea($model,'keterangan', array('class'=>'form-control', 'rows'=>'3','placeholder'=>'Keterangan, Catatan, dll.')); ?>
        </div>
		<?php echo $form->error($model,'keterangan'); ?>
	</div>

	<div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
			<?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-default')); ?>
        </div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->