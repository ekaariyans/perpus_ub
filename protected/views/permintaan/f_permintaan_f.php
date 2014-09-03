<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li class="active"><a href="#form" role="tab" data-toggle="tab">FORM</a></li>
    <li><a href="#upload" role="tab" data-toggle="tab">UPLOAD</a></li>
    <li><a href="#list" role="tab" data-toggle="tab">DAFTAR PERMINTAAN</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="form">
    <br />
	Form Permintaan Buku Secara Kolektif :
	<a href="<?php echo Yii::app()->request->baseUrl.'/assets/TemplateForm/FormReqBuku.xls'; ?>" class="btn btn-default btn-flat">Download</a>	
	<br />
	Form Permintaan Jurnal Secara Kolektif :
	<a href="<?php echo Yii::app()->request->baseUrl.'/assets/TemplateForm/FormReqJurnal.xls'; ?>" class="btn btn-default btn-flat">Download</a>
    <br />
	Form Permintaan Serial Secara Kolektif :
	<a href="<?php echo Yii::app()->request->baseUrl.'/assets/TemplateForm/FormReqSerial.xls'; ?>" class="btn btn-default btn-flat">Download</a>
    </div><!--TAB FORM-->


    <div class="tab-pane" id="upload">
        <div class="form">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'upload-upload-form',
                'enableAjaxValidation' => false,
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // See class documentation of CActiveForm for details on this,
                // you need to use the performAjaxValidation()-method described there.
                'enableAjaxValidation' => false,
            ));
            ?>

            <p class="note">Fields with <span class="required">*</span> are required.</p>
				
			<?php echo $form->errorSummary($model); ?>
            	<div class="form-group">
                <label class="col-sm-2 control-label">Select</label>
                  	<?php echo $form->dropDownList($model, 'K_JENIS', array('1'=>'Buku', '2'=>'Jurnal', '3'=>'Serial')); ?>
                  	<?php echo $form->error($model, 'K_JENIS'); ?>
             </div>
			
			<div class="form-group">
                <label class="col-sm-2 control-label">Masukkan Data Excel :</label>
                <div class="col-sm-10">
                	<?php echo $form->fileField($model, 'filee', array('maxlength' => 200,'class' => 'form-control')); ?>
                </div>
            </div>

            <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-default')); ?>
            </div>
        </div>
            <?php $this->endWidget(); ?>

        </div><!-- form -->
    </div><!--UPLOAD-->


    <div class="tab-pane" id="list">
        <div class="box box-primary">
            <div class="box-header">
                <h4 class="box-title">lIST PERMINTAAN BUKU</h4>
                <div class="box">
                    <h2>Daftar Permintaan Buku</h2>
                    <?php
                    echo CHtml::link('Cetak dokumen', array('cetak/cetak'));
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

</div><!--LIST-->

</div>