<?php
/* @var $this AnggotaController */
/* @var $data Anggota */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nim')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nim), array('view', 'id'=>$data->nim)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('k_fakultas')); ?>:</b>
	<?php echo CHtml::encode($data->k_fakultas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('k_prodi')); ?>:</b>
	<?php echo CHtml::encode($data->k_prodi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('k_jenjang')); ?>:</b>
	<?php echo CHtml::encode($data->k_jenjang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('angkatan')); ?>:</b>
	<?php echo CHtml::encode($data->angkatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_lahir); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat1')); ?>:</b>
	<?php echo CHtml::encode($data->alamat1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kodepos1')); ?>:</b>
	<?php echo CHtml::encode($data->kodepos1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notelp1')); ?>:</b>
	<?php echo CHtml::encode($data->notelp1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat2')); ?>:</b>
	<?php echo CHtml::encode($data->alamat2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kodepos2')); ?>:</b>
	<?php echo CHtml::encode($data->kodepos2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notelp2')); ?>:</b>
	<?php echo CHtml::encode($data->notelp2); ?>
	<br />

	*/ ?>

</div>