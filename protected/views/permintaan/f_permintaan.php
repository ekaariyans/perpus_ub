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

	
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#Buku" role="tab" data-toggle="tab">FORM</a></li>
  <li><a href="#Fakultas" role="tab" data-toggle="tab">LIST PERMINTAAN</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="Buku"><?php echo $form->errorSummary($model); ?>
    <div class="box box-primary">
        <div class="box-header">
            <h4 class="box-title">PERMINTAAN BUKU BARU</h4>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'id_anggota', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'id_anggota', array('class' => 'form-control', 'placeholder' => 'ID Anggota')); ?>
                <?php echo $form->error($model, 'id_anggota'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'judul', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'judul', array('class' => 'form-control', 'placeholder' => 'Judul Buku')); ?>
                <?php echo $form->error($model, 'judul'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'jenis', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'jenis', array('class' => 'form-control', 'placeholder' => 'Jenis Bahan Pustaka (\'Buku\', \'Majalah\',...)')); ?>
                <?php echo $form->error($model, 'jenis'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'pengarang', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'pengarang', array('class' => 'form-control', 'placeholder' => 'Judul Pengarang Buku')); ?>
                <?php echo $form->error($model, 'pengarang'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'penerbit', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'penerbit', array('class' => 'form-control', 'placeholder' => 'Nama Penerbit Buku')); ?>
                <?php echo $form->error($model, 'penerbit'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'tahun_terbit', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'tahun_terbit', array('class' => 'form-control', 'placeholder' => 'Tahun Terbit Buku')); ?>
                <?php echo $form->error($model, 'tahun_terbit'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'kota', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'kota', array('class' => 'form-control', 'placeholder' => 'Kota Penerbitan')); ?>
                <?php echo $form->error($model, 'kota'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'edisi', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'edisi', array('class' => 'form-control', 'placeholder' => 'Edisi Buku(\'Pertama\',\'Kedua\',...)')); ?>
                <?php echo $form->error($model, 'edisi'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'isbn', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($model, 'isbn', array('class' => 'form-control', 'placeholder' => 'ISBN Buku')); ?>
                <?php echo $form->error($model, 'isbn'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'keterangan', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textArea($model, 'keterangan', array('class' => 'form-control', 'rows' => '3', 'placeholder' => 'Keterangan, Catatan, dll.')); ?>
                 <?php echo $form->error($model, 'keterangan'); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-default')); ?>
            </div>
        </div>
    </div>
    </div>
    
    <div class="tab-pane" id="Fakultas">
  <div class="box box-primary">
        <div class="box-header">
            <h4 class="box-title">lIST PERMINTAAN BUKU</h4>
            <div class="box">
    <h2>Daftar Permintaan Buku</h2>
<?php    
	
	echo CHtml::link('Cetak dokumen',array('cetak/cetak'));
?>
	<table id="example2" class="table table-bordered table-striped">
    <thead>
    <tr>
    <th>ID Anggota</th>
    <th>Judul</th>
    <th>Jenis</th>
    <th>Pengarang</th>
    <th>Penerbit</th>
    <th>Tahun Terbit</th>
    <th>Kota</th>
    <th>Edisi</th>
    <th>ISBN</th>
    <th>Keterangan</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $model): ?>
    <tr>
    <td><?php echo $model->id_anggota; ?></td>
    <td><?php echo $model->judul; ?></td>
    <td><?php echo $model->jenis; ?></td>
    <td><?php echo $model->pengarang; ?></td>
    <td><?php echo $model->penerbit; ?></td>
    <td><?php echo $model->tahun_terbit; ?></td>
    <td><?php echo $model->kota; ?></td>
    <td><?php echo $model->edisi; ?></td>
    <td><?php echo $model->isbn; ?></td>
    <td><?php echo $model->keterangan; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
	</table>
  </div>           
         <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": false,
                    "bAutoWidth": false
                });
            });
        </script>

   
        </div>
  
    
    </div>
  </div>
  </div>
    
  
</div>
	

<?php $this->endWidget(); ?>

</div><!-- form -->