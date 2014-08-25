<?php
/* @var $this AnggotaController */
/* @var $model Anggota */

$this->breadcrumbs=array(
	'Anggotas'=>array('index'),
	$model->nim=>array('view','id'=>$model->nim),
	'Update',
);

$this->menu=array(
	array('label'=>'List Anggota', 'url'=>array('index')),
	array('label'=>'Create Anggota', 'url'=>array('create')),
	array('label'=>'View Anggota', 'url'=>array('view', 'id'=>$model->nim)),
	array('label'=>'Manage Anggota', 'url'=>array('admin')),
);
?>

<h1>Update Anggota <?php echo $model->nim; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>