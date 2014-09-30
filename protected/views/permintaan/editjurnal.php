<?php
/* @var $this TPermintaanJurnalController */
/* @var $model TPermintaanJurnal */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tpermintaan-jurnal-editjurnal-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<div class="col-md-6">
    <div class="panel panel-default">
    <div class="panel-heading">
    EDIT INFORMASI JURNAL
    </div>
    <div class="panel-body">
    <div class="table-responsive">
	<?php foreach ($data as $model): 
	if($model['ID_PERMINTAAN_JURNAL'] == $id_permintaan_jurnal){?>

	<?php echo $form->errorSummary($model1); ?>
	<table class="table">
    	<tr>
        	<th>ID Anggota</th>
        	<td><?php echo $model['ID_ANGGOTA']; ?></td>
        </tr>
                                 
		<tr>
        	<th>Tgl.Permintaan</th>
        	<td><?php echo $model['TGL_PERMINTAAN']; ?></td>
		</tr>
        <tr>
			<th><?php echo $form->labelEx($model1,'NAMA_PEMINTA'); ?></th>
			<td><?php echo $form->textField($model1,'NAMA_PEMINTA', 
				array('class'=>'form-control', 'value'=>$model['NAMA_PEMINTA'])); ?></td>
				<?php echo $form->error($model1,'NAMA_PEMINTA'); ?>
		</tr>

	<tr>
		<th><?php echo $form->labelEx($model1,'JUDUL'); ?></th>
		<td><?php echo $form->textField($model1,'JUDUL', 
		array('class'=>'form-control', 'value'=>$model['JUDUL'])); ?></td>
		<?php echo $form->error($model1,'JUDUL'); ?>
	</tr>

	<tr>
		<th><?php echo $form->labelEx($model1,'PENGARANG'); ?></th>
		<td><?php echo $form->textField($model1,'PENGARANG', 
		array('class'=>'form-control', 'value'=>$model['PENGARANG'])); ?></td>
		<?php echo $form->error($model1,'PENGARANG'); ?>
	</tr>

	<tr>
		<th><?php echo $form->labelEx($model1,'JENIS'); ?></th>
		<td><?php echo $form->textField($model1,'JENIS', 
		array('class'=>'form-control', 'value'=>$model['JENIS'])); ?></td>
		<?php echo $form->error($model1,'JENIS'); ?>
	</tr>

	<tr>
		<th><?php echo $form->labelEx($model1,'BAHASA'); ?></th>
		<td><?php echo $form->textField($model1,'BAHASA', 
		array('class'=>'form-control', 'value'=>$model['BAHASA'])); ?></td>
		<?php echo $form->error($model1,'BAHASA'); ?>
	</tr>


	<tr>
		<th><?php echo $form->labelEx($model1,'ID_PRIORITAS'); ?></th>
		<td><?php echo $form->dropDownList($model1, 'ID_PRIORITAS', 
									array($model['ID_PRIORITAS']=>$model['PRIORITAS'],'1'=>'Wajib', '2'=>'Penunjang', '3'=>'Gak Penting'), 
									array('class'=>'form-control', 'value'=>$model['ID_PRIORITAS']));; ?></td>
		<?php echo $form->error($model1,'ID_PRIORITAS'); ?>
	</tr>
    
    <tr>
		<th><?php echo $form->labelEx($model1,'ID_STATUS'); ?></th>
		 <td><?php echo $form->dropDownList($model1, 'ID_STATUS', 
									array($model['ID_STATUS']=>$model['STATUS'],'0'=>'Belum Dibeli', '1'=>'Sudah Dibeli'), 
									array('class'=>'form-control', 'value'=>$model['ID_STATUS'])); ?></td>
		<?php echo $form->error($model1,'ID_STATUS'); ?>
	</tr>

	<tr>
		<th><?php echo $form->labelEx($model1,'HARGA'); ?></th>
		<td><?php echo $form->textField($model1,'HARGA', 
		array('class'=>'form-control', 'value'=>$model['HARGA'])); ?></td>
		<?php echo $form->error($model1,'HARGA'); ?>
	</tr>

	<tr>
		<th><?php echo $form->labelEx($model1,'LINK_WEBSITE'); ?></th>
		<td><?php echo $form->textField($model1,'LINK_WEBSITE', 
		array('class'=>'form-control', 'value'=>$model['LINK_WEBSITE'])); ?></td>
		<?php echo $form->error($model1,'LINK_WEBSITE'); ?>
	</tr>
	</table>
<?php }endforeach; ?>
	</div>
		<?php echo CHtml::submitButton('Submit', array('class'=>"btn btn-primary")); ?>
	
<?php $this->endWidget(); ?>


</div><!-- form -->
</div>
                        
</div>
</div>
