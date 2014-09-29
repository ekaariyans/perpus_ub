<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
		if($key == 'success'){
        echo '<div class="alert alert-success" role="alert' . $key . '"> <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' . $message . "</div>\n";
		}
		elseif($key == 'error'){
        echo '<div class="alert alert-danger" role="alert' . $key . '"> <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' . $message . "</div>\n";
		}
    }
?>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li class="active"><a href="#form" role="tab" data-toggle="tab">FORM PEMRMINTAAN</a></li>
    <li><a href="#upload" role="tab" data-toggle="tab">UPLOAD PERMINTAAN</a></li>
    <li><a href="#list" role="tab" data-toggle="tab">DAFTAR PERMINTAAN</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="form">
      <h4 class="box-title">Form Permintaan Secara Kolektif</h4>
       <br/>
	Form Permintaan Buku Secara Kolektif :
	<a href="<?php echo Yii::app()->request->baseUrl.'/assets/TemplateForm/FormReqBuku.xls'; ?>" class="btn btn-default btn-flat">Download</a>	
	<br/><br/>
	Form Permintaan Jurnal Secara Kolektif :
	<a href="<?php echo Yii::app()->request->baseUrl.'/assets/TemplateForm/FormReqJurnal.xls'; ?>" class="btn btn-default btn-flat">Download</a>
    <br/><br/>
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
          <h4 class="box-title">Upload Form Permintaan Secara Kolektif</h4>
		<br>		
			<?php echo $form->errorSummary($model); ?>
            	<div class="form-group">
                <label class="col-sm-2 control-label">Kategori      :</label>
                  	<?php echo $form->dropDownList($model, 'K_JENIS', array('1'=>'Buku', '2'=>'Jurnal', '3'=>'Serial')); ?>
                  	<?php echo $form->error($model, 'K_JENIS'); ?>
             </div>
			<div class="form-group">
                <label class="col-sm-2 control-label">Masukkan Data Excel :</label>
                <br /><br />
                	<?php echo $form->fileField($model, 'filee', array('maxlength' => 200)); ?>
            </div>
            <br>
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
            <ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#bk" role="tab" data-toggle="tab">Buku </a></li>
  <li><a href="#jr" role="tab" data-toggle="tab">Jurnal</a></li>
  <li><a href="#sr" role="tab" data-toggle="tab">Serial</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="bk">
   <div class="box-header">
            <h4 class="box-title">DAFTAR PERMINTAAN BUKU</h4>
            <div class="box">
    <h2>Daftar Permintaan Buku</h2>
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
  <div class="tab-pane " id="jr">
  <div class="box-header">
            <h4 class="box-title">DAFTAR PERMINTAAN JURNAL</h4>
            <div class="box">
    <h2>Daftar Permintaan Jurnal</h2>
	<table id="example3" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Anggota</th>
                                <th>Tgl.Permintaan</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Jenis</th>
                                <th>Bahasa</th>
                				<th>Harga</th>
                            	<th>Link Website</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataJur as $modelJur): ?>
                                <tr>
                                    <td><?php echo $modelJur['ID_ANGGOTA']; ?></td>
                                    <td><?php echo $modelJur['TGL_PERMINTAAN']; ?></td>
                                    <td><?php echo $modelJur['JUDUL']; ?></td>
                                    <td><?php echo $modelJur['PENGARANG']; ?></td>
                                    <td><?php echo $modelJur['JENIS']; ?></td>
                                    <td><?php echo $modelJur['BAHASA']; ?></td>
                                	<td><?php echo $modelJur['HARGA']; ?></td>
                                	<td><?php echo $modelJur['LINK_WEBSITE']; ?></td>
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
                $('#example3').dataTable({
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
  <div class="tab-pane " id="sr">
  <div class="box-header">
            <h4 class="box-title">DAFTAR PERMINTAAN BUKU</h4>
            <div class="box">
    <h2>Daftar Permintaan Buku</h2>
	<table id="example4" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Anggota</th>
                                <th>Tgl.Permintaan</th>
                                <th>Judul</th>
                                <th>Volume</th>
                                <th>Tahun</th>
                                <th>Jenis</th>
                                <th>Bahasa</th>
                				<th>Harga</th>
                            	<th>Link Website</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataSer as $modelSer): ?>
                                <tr>
                                    <td><?php echo $modelSer['ID_ANGGOTA']; ?></td>
                                    <td><?php echo $modelSer['TGL_PERMINTAAN']; ?></td>
                                    <td><?php echo $modelSer['JUDUL']; ?></td>
                                    <td><?php echo $modelSer['VOLUME']; ?></td>
                                    <td><?php echo $modelSer['TAHUN']; ?></td>
                            		<td><?php echo $modelSer['JENIS']; ?></td>
                                	<td><?php echo $modelSer['BAHASA']; ?></td>
                                	<td><?php echo $modelSer['HARGA']; ?></td>
                                	<td><?php echo $modelSer['LINK_WEBSITE']; ?></td>
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
                $('#example4').dataTable({
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

    </div>

</div><!--LIST-->