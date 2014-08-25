<?php
/* @var $this AnggotaController */
/* @var $model Anggota */

$this->breadcrumbs=array(
	'Anggotas'=>array('index'),
	$model->nim,
);

$this->menu=array(
	array('label'=>'List Anggota', 'url'=>array('index')),
	array('label'=>'Create Anggota', 'url'=>array('create')),
	array('label'=>'Update Anggota', 'url'=>array('update', 'id'=>$model->nim)),
	array('label'=>'Delete Anggota', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->nim),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Anggota', 'url'=>array('admin')),
);
?>

<h1>View Anggota #<?php echo $model->nim; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nama',
		'nim',
		'k_fakultas',
		'k_prodi',
		'k_jenjang',
		'angkatan',
		'tgl_lahir',
		'alamat1',
		'kodepos1',
		'notelp1',
		'alamat2',
		'kodepos2',
		'notelp2',
	),
)); ?>
