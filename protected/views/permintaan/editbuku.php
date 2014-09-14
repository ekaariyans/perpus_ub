<?php
/* @var $this TPermintaanBukuController */
/* @var $model TPermintaanBuku */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tpermintaan-buku-editbuku-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>


<?php $this->endWidget(); ?>

</div><!-- form -->


                        <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            EDIT INFORMASI BUKU
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <?php foreach ($data as $model): 
								 if($model['K_PERMINTAAN'] == $k_permintaan){?>
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
                                	<th>Nama Peminta</th>
                                	<td><?php echo $form->textField($model1,'NAMA_PEMINTA', 
									array('class'=>'form-control', 'value'=>$model['NAMA_PEMINTA'])); ?></td>
								</tr>
                                <tr>
                                    <th>Judul</th>
                                    <td><?php echo $form->textField($model1,'JUDUL', 
									array('class'=>'form-control', 'value'=>$model['JUDUL'])); ?></td>
								</tr>
                                <tr>
                                	<th>Pengarang</th>
                                    <td><?php echo $form->textField($model1,'PENGARANG', 
									array('class'=>'form-control', 'value'=>$model['PENGARANG'])); ?></td>
								</tr>
                                <tr>
                                	<th>ISBN</th>
                                    <td><?php echo $form->textField($model1,'ISBN', 
									array('class'=>'form-control', 'value'=>$model['ISBN'])); ?></td>
								</tr>
                                <tr>
                                	<th>Jenis</th>
                                    <td><?php echo $form->textField($model1,'JENIS', 
									array('class'=>'form-control', 'value'=>$model['JENIS'])); ?></td>
								</tr>
                                <tr>
                                	<th>Bahasa</th>
                                    <td><?php echo $form->textField($model1,'BAHASA', 
									array('class'=>'form-control', 'value'=>$model['BAHASA'])); ?></td>
								</tr>
                                <tr>
                                	<th>Penerbit</th> 
                                    <td><?php echo $form->textField($model1,'PENERBIT', 
									array('class'=>'form-control', 'value'=>$model['PENERBIT'])); ?></td>
								</tr>
                                <tr>
                                	<th>Tahun Terbit</th>
                                    <td><?php echo $form->textField($model1,'TAHUN_TERBIT', 
									array('class'=>'form-control', 'value'=>$model['TAHUN_TERBIT'])); ?></td>
								</tr>
                                <tr>
                                	<th>Harga</th>
                                    <td><?php echo $form->textField($model1,'HARGA', 
									array('class'=>'form-control', 'value'=>$model['HARGA'])); ?></td>
								</tr>
                                <tr>
                                	<th>Status</th>
                                    <td><?php echo $form->textField($model1,'STATUS', 
									array('class'=>'form-control', 'value'=>$model['STATUS'])); ?></td>
								</tr>
                                <tr>
                                	<th>Link Website</th>
                                    <td><?php echo $form->textField($model1,'LINK_WEBSITE', 
									array('class'=>'form-control', 'value'=>$model['LINK_WEBSITE'])); ?></td>
								</tr>
                                <tr>
                                	<th>Prioritas</th>
                                    <td><?php echo $form->textField($model1,'PRIORITAS', 
									array('class'=>'form-control', 'value'=>$model['PRIORITAS'])); ?></td>
								</tr>
                                        <?php } ?>
										
								</table>
                                <?php endforeach; ?>
                           
                        </div>
                        <?php echo CHtml::link('Kembali',Yii::app()->request->urlReferrer, array('class'=>"btn btn-primary")); 
							  echo CHtml::submitButton('Simpan', array('class' => 'btn btn-primary')); ?>
                        
                        </div>
                        
                        </div>
                        
                        </div>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>