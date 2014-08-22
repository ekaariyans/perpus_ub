<?php
/* @var $this AnggotaController */
/* @var $model Anggota */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'anggota-formanggota-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Akademik</p>

	<?php echo $form->errorSummary($model); ?>

    <table>
		<tr>
		<td><?php echo $form->labelEx($model,'nama'); ?></td>
        <td width="10">:</td>
		<td><?php echo $form->textField($model,'nama'); ?></td>
		<?php echo $form->error($model,'nama'); ?>
        </tr>
        
		<tr>
		<td><?php echo $form->labelEx($model,'nim'); ?></td>
        <td width="10">:</td>
		<td><?php echo $form->textField($model,'nim'); ?></td>
		<?php echo $form->error($model,'nim'); ?>
        </tr>
        
        <tr>
		<td><?php echo $form->labelEx($model,'k_fakultas'); ?></td>
        <td width="10">:</td>
		<td><?php echo $form->textField($model,'k_fakultas'); ?></td>
		<?php echo $form->error($model,'k_fakultas'); ?>
		</tr>
        
        <tr>
		<td><?php echo $form->labelEx($model,'k_prodi'); ?></td>
        <td width="10">:</td>
		<td><?php echo $form->textField($model,'k_prodi'); ?></td>
		<?php echo $form->error($model,'k_prodi'); ?>
		</tr>
        
        <tr>
		<td><?php echo $form->labelEx($model,'jenjang'); ?></td>
        <td width="10">:</td>
		<td><?php echo $form->textField($model,'jenjang'); ?></td>
		<?php echo $form->error($model,'jenjang'); ?>
		</tr>
        
        <tr>
		<td><?php echo $form->labelEx($model,'angkatan'); ?></td>
        <td width="10">:</td>
		<td><?php echo $form->textField($model,'angkatan'); ?></td>
		<?php echo $form->error($model,'angkatan'); ?>
		</tr>
        
        <tr>
		<td><?php echo $form->labelEx($model,'tgl_lahir'); ?></td>
        <td width="10">:</td>
		<td><?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
    'name'=>'publishDate',
    // additional javascript options for the date picker plugin
    'options'=>array(
        'showAnim'=>'fold',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;'
    ),
)); 

		 ?></td>
		<?php echo $form->error($model,'tgl_lahir'); ?>
		</tr>

	</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->