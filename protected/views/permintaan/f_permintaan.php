<?php
/* @var $this PermintaanController */
/* @var $modelJur Permintaan */
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
  <li class="active"><a href="#Form" role="tab" data-toggle="tab">FORM PERMINTAAN </a></li>
  <li><a href="#Permintaan" role="tab" data-toggle="tab">DAFTAR PERMINTAAN</a></li>
  <li><a href="#Peminjaman" role="tab" data-toggle="tab">DAFTAR PEMINJAMAN</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="Form"><?php echo $form->errorSummary($modelJur); ?>
    <div class="box box-primary">
        <div class="box-header">
            <h4 class="box-title">PERMINTAAN BUKU BARU</h4>
        </div>
		
		<?php echo $form->errorSummary($model); ?>
            	<div class="form-group">
                <label class="col-sm-2 control-label">Select</label>
                  	<?php echo $form->dropDownList($model, 'K_JENIS', array('prompt'=>'----- Jenis Permintaan -----','1'=>'Buku', '2'=>'Jurnal', '3'=>'Serial'),
                  		array(
                  			'onchange'=> '	
                  							 if(this.value==1)
											{ 	
                  								document.getElementById("buku").style.display="block";
                  								document.getElementById("jurnal").style.display="none";
                  								document.getElementById("serial").style.display="none";
                  								}
                  							else if(this.value==2)
											{ 
                  								document.getElementById("buku").style.display="none";
                  								document.getElementById("jurnal").style.display="block";
                  								document.getElementById("serial").style.display="none";
                  								}
                  							else if(this.value==3)
											{ 
                  								document.getElementById("buku").style.display="none";
                  								document.getElementById("jurnal").style.display="none";
                  								document.getElementById("serial").style.display="block";
                  								}
                  							'
                  	)); ?>
                  	<?php echo $form->error($model, 'K_JENIS'); ?>
        </div>     

	
	
        <div id="buku">
        <div class="form-group">
            <?php echo $form->labelEx($modelBk, 'JUDUL', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelBk, 'JUDUL', array('class' => 'form-control', 'placeholder' => 'Judul Buku')); ?>
                <?php echo $form->error($modelBk, 'JUDUL'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($modelBk, 'PENGARANG', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelBk, 'PENGARANG', array('class' => 'form-control', 'placeholder' => 'Judul Pengarang Buku')); ?>
                <?php echo $form->error($modelBk, 'PENGARANG'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo $form->labelEx($modelBk, 'ISBN', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelBk, 'ISBN', array('class' => 'form-control', 'placeholder' => 'ISBN Buku')); ?>
                <?php echo $form->error($modelBk, 'ISBN'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo $form->labelEx($modelBk, 'JENIS', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelBk, 'JENIS', array('class' => 'form-control', 'placeholder' => 'Jenis Bahan Pustaka (\'Cetak\', \'Elektronik\')')); ?>
                <?php echo $form->error($modelBk, 'JENIS'); ?>
            </div>
        </div>

		<div class="form-group">
            <?php echo $form->labelEx($modelBk, 'BAHASA', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelBk, 'BAHASA', array('class' => 'form-control', 'placeholder' => 'Bahasa yang Digunakan Buku')); ?>
                <?php echo $form->error($modelBk, 'BAHASA'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo $form->labelEx($modelBk, 'PENERBIT', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelBk, 'PENERBIT', array('class' => 'form-control', 'placeholder' => 'Nama Penerbit Buku')); ?>
                <?php echo $form->error($modelBk, 'PENERBIT'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($modelBk, 'TAHUN_TERBIT', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelBk, 'TAHUN_TERBIT', array('class' => 'form-control', 'placeholder' => 'Tahun Terbit Buku')); ?>
                <?php echo $form->error($modelBk, 'TAHUN_TERBIT'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($modelBk, 'HARGA', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelBk, 'HARGA', array('class' => 'form-control', 'placeholder' => 'Judul Pengarang Buku')); ?>
                <?php echo $form->error($modelBk, 'HARGA'); ?>
            </div>
        </div>       

        <div class="form-group">
            <?php echo $form->labelEx($modelBk, 'LINK_WEBSITE', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelBk, 'LINK_WEBSITE', array('class' => 'form-control', 'placeholder' => 'Link Website Buku')); ?>
                <?php echo $form->error($modelBk, 'LINK_WEBSITE'); ?>
            </div>
        </div>
        </div> <!--Buku-->
                     
   
         <div id="jurnal">
        <div class="form-group">
            <?php echo $form->labelEx($modelJur, 'JUDUL', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelJur, 'JUDUL', array('class' => 'form-control', 'placeholder' => 'Judul Buku')); ?>
                <?php echo $form->error($modelJur, 'JUDUL'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($modelJur, 'PENGARANG', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelJur, 'PENGARANG', array('class' => 'form-control', 'placeholder' => 'Judul Pengarang Buku')); ?>
                <?php echo $form->error($modelJur, 'PENGARANG'); ?>
            </div>
        </div>

        
        <div class="form-group">
            <?php echo $form->labelEx($modelJur, 'JENIS', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelJur, 'JENIS', array('class' => 'form-control', 'placeholder' => 'Jenis Bahan Pustaka (\'Cetak\', \'Elektronik\')')); ?>
                <?php echo $form->error($modelJur, 'JENIS'); ?>
            </div>
        </div>

		<div class="form-group">
            <?php echo $form->labelEx($modelJur, 'BAHASA', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelJur, 'BAHASA', array('class' => 'form-control', 'placeholder' => 'Bahasa yang Digunakan Buku')); ?>
                <?php echo $form->error($modelJur, 'BAHASA'); ?>
            </div>
        </div>
        
        

        <div class="form-group">
            <?php echo $form->labelEx($modelJur, 'HARGA', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelJur, 'HARGA', array('class' => 'form-control', 'placeholder' => 'Judul Pengarang Buku')); ?>
                <?php echo $form->error($modelJur, 'HARGA'); ?>
            </div>
        </div>       

        <div class="form-group">
            <?php echo $form->labelEx($modelJur, 'LINK_WEBSITE', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelJur, 'LINK_WEBSITE', array('class' => 'form-control', 'placeholder' => 'Link Website Buku')); ?>
                <?php echo $form->error($modelJur, 'LINK_WEBSITE'); ?>
            </div>
        </div>
        </div> <!--Jurnal-->
        
        <div id="serial">
        <div class="form-group">
            <?php echo $form->labelEx($modelSer, 'JUDUL', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelSer, 'JUDUL', array('class' => 'form-control', 'placeholder' => 'Judul Buku')); ?>
                <?php echo $form->error($modelSer, 'JUDUL'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($modelSer, 'VOLUME', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelSer, 'VOLUME', array('class' => 'form-control', 'placeholder' => 'volom Buku')); ?>
                <?php echo $form->error($modelSer, 'VOLUME'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($modelSer, 'TAHUN', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelSer, 'TAHUN', array('class' => 'form-control', 'placeholder' => 'volom Buku')); ?>
                <?php echo $form->error($modelSer, 'TAHUN'); ?>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($modelSer, 'FREKWENSI', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelSer, 'FREKWENSI', array('class' => 'form-control', 'placeholder' => 'volom Buku')); ?>
                <?php echo $form->error($modelSer, 'FREKWENSI'); ?>
            </div>
        </div>
        
        <div class="form-group">
            <?php echo $form->labelEx($modelSer, 'JENIS', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelSer, 'JENIS', array('class' => 'form-control', 'placeholder' => 'Jenis Bahan Pustaka (\'Cetak\', \'Elektronik\')')); ?>
                <?php echo $form->error($modelSer, 'JENIS'); ?>
            </div>
        </div>

		<div class="form-group">
            <?php echo $form->labelEx($modelSer, 'BAHASA', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelSer, 'BAHASA', array('class' => 'form-control', 'placeholder' => 'Bahasa yang Digunakan Buku')); ?>
                <?php echo $form->error($modelSer, 'BAHASA'); ?>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($modelSer, 'HARGA', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelSer, 'HARGA', array('class' => 'form-control', 'placeholder' => 'Judul Pengarang Buku')); ?>
                <?php echo $form->error($modelSer, 'HARGA'); ?>
            </div>
        </div>       

        <div class="form-group">
            <?php echo $form->labelEx($modelSer, 'LINK_WEBSITE', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php echo $form->textField($modelSer, 'LINK_WEBSITE', array('class' => 'form-control', 'placeholder' => 'Link Website Buku')); ?>
                <?php echo $form->error($modelSer, 'LINK_WEBSITE'); ?>
            </div>
        </div>
        </div> <!--serial-->

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-default')); ?>
            </div>
        </div>
    </div>
    </div>
    
    <div class="tab-pane" id="Permintaan">
  <div class="box box-primary">
        <div class="box-header">
            <h4 class="box-title">DAFTAR PERMINTAAN BUKU</h4>
            <div class="box">
    <h2>Daftar Permintaan Buku</h2>
<?php    
	//echo CHtml::link('Cetak dokumen',array('cetak/cetak'));
?>
	<table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Anggota</th>
                                <th>Tgl.Permintaan</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>ISBN</th>
                                <th>Jenis</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                				<th>Harga</th>
                            	<th>Link Website</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $model): ?>
                                <tr>
                                    <td><?php echo $model['ID_ANGGOTA']; ?></td>
                                    <td><?php echo $model['TGL_PERMINTAAN']; ?></td>
                                    <td><?php echo $model['JUDUL']; ?></td>
                                    <td><?php echo $model['PENGARANG']; ?></td>
                                    <td><?php echo $model['ISBN']; ?></td>
                                    <td><?php echo $model['JENIS']; ?></td>
                            		<td><?php echo $model['PENERBIT']; ?></td>
                                	<td><?php echo $model['TAHUN_TERBIT']; ?></td>
                                	<td><?php echo $model['HARGA']; ?></td>
                                	<td><?php echo $model['LINK_WEBSITE']; ?></td>
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
  <div class="tab-pane" id="Peminjaman">
  <div class="box box-primary">
        <div class="box-header">
            <h4 class="box-title">DAFTAR PEMINJAMAN</h4>
            <div class="box">
    <h2>Daftar Pmeminjaman Katalog</h2>
<?php    
	
	//echo CHtml::link('Cetak dokumen',array('cetak/cetak'));
?>
	<table id="daftar2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Anggota</th>
                                <th>Tgl.Permintaan</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>ISBN</th>
                                <th>Jenis</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                				<th>Harga</th>
                            	<th>Link Website</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $model): ?>
                                <tr>
                                    <td><?php echo $model['ID_ANGGOTA']; ?></td>
                                    <td><?php echo $model['TGL_PERMINTAAN']; ?></td>
                                    <td><?php echo $model['JUDUL']; ?></td>
                                    <td><?php echo $model['PENGARANG']; ?></td>
                                    <td><?php echo $model['ISBN']; ?></td>
                                    <td><?php echo $model['JENIS']; ?></td>
                            		<td><?php echo $model['PENERBIT']; ?></td>
                                	<td><?php echo $model['TAHUN_TERBIT']; ?></td>
                                	<td><?php echo $model['HARGA']; ?></td>
                                	<td><?php echo $model['LINK_WEBSITE']; ?></td>
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
                $('#daftar2').dataTable({
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

	$("div#buku").hide();
  $("div#jurnal").hide();
  $("div#serial").hide();
  
});
</script>