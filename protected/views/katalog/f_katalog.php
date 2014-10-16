<!-- Start Nav tabs -->
<ul class="nav nav-tabs" role="tablist no-padding">
    <li class="active"><a href="#tambah" role="tab" data-toggle="tab">TAMBAH KATALOG</a></li>
    <li><a href="#daftar" role="tab" data-toggle="tab">DAFTAR KATALOG</a></li>
</ul>
<!-- End Nav tabs -->

<!-- Mulai Isi Tab -->
<div class="tab-content no-padding">



<div class="tab-pane active" id="tambah">
	<div class="nav-tabs-custom">
		<!-- Tabs within a box -->
		<ul class="nav nav-tabs role="tablist"">
			<li class="active"><a href="#individu" data-toggle="tab">INDIVIDU</a></li>
			<li><a href="#kolektif" data-toggle="tab">KOLEKTIF</a></li>
		</ul>
        
		<div class="tab-content no-padding">
            <!-- Morris chart - Sales -->
            <div class="tab-pane active" id="individu">
                <div class="box box-primary" style="padding:15px 15px 15px 50px;">
					<div class="box-header">
						<h4 class="box-title">Tambah Katalog</h4>
					</div>
					
                    <div class="form">
					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'tbk-main-f_katalog-form',
						// Please note: When you enable ajax validation, make sure the corresponding
						// controller action is handling ajax validation correctly.
						// See class documentation of CActiveForm for details on this,
						// you need to use the performAjaxValidation()-method described there.
						'enableAjaxValidation'=>false,
					)); ?>
                    
					<?php 	foreach(Yii::app()->user->getFlashes() as $key => $message) {
								if($key == 'success'){
								echo '<div class="alert alert-success" role="alert' . $key . '"> 
									<button type="button" class="close" data-dismiss="alert">
									<span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' . $message ."</div>\n";
								}
								elseif($key == 'error'){
								echo '<div class="alert alert-danger" role="alert' . $key . '"> 
									<button type="button" class="close" data-dismiss="alert">
									<span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' . $message . "\n".
									$form->errorSummary($model)."</div>\n";
								}
							}
					?>
						<p class="note">Fields bertanda <span class="required">*</span> harus diisi.</p>

						<?php //echo $form->errorSummary($model); ?>
                        
                        <div class="col-lg-12">
                        	<div class="form-group" style="margin-bottom:40px;">
									<?php echo $form->labelEx($model, 'REGISTER', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10">
									<?php echo $form->textField($model, 'REGISTER', array('class' => 'form-control', 
												'placeholder' => $newreg,'readOnly'=>true)); ?>
									<?php echo $form->error($model,'REGISTER'); ?>
									</div>
							</div>
							<div class="form-group">
								<?php echo $form->labelEx($model, 'TITLE', array('class' => 'col-sm-2 control-label')); ?>
								<div class="col-sm-10">
								<?php echo $form->textField($model, 'TITLE', array('class' => 'form-control', 'placeholder' => 'Judul Buku')); ?>
								<?php echo $form->error($model,'TITLE'); ?>
								</div>
							</div>
                        </div>
						
                        <div class="col-lg-12">
							<div class="form-group">
									<h4>Identifier Item</h4>
							</div>
							
							<div class="col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model, 'VOLUME', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10"  style="margin-bottom:10px">
									<?php echo $form->textField($model, 'VOLUME', array('class' => 'form-control', 'placeholder' => 'Volume Buku')); ?>
									<?php echo $form->error($model,'VOLUME'); ?>
									</div>
								</div>

								<div class="form-group">
									<?php echo $form->labelEx($model, 'PRINTING', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:10px">
									<?php echo $form->textField($model, 'PRINTING', array('class' => 'form-control', 'placeholder' => 'Printing Buku')); ?>
									<?php echo $form->error($model,'PRINTING'); ?>
									</div>
								</div>
								
								<div class="form-group" >
									<?php echo $form->labelEx($model, 'EDITION', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10">
									<?php echo $form->textField($model, 'EDITION', array('class' => 'form-control', 'placeholder' => 'Edisi Buku')); ?>
									<?php echo $form->error($model,'EDITION'); ?>
									</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model, 'ISBN', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:10px">
									<?php echo $form->textField($model, 'ISBN', array('class' => 'form-control', 'placeholder' => 'ISBN Buku')); ?>
									<?php echo $form->error($model,'ISBN'); ?>
									</div>
								</div>
                             
                                <div class="form-group">
                                <label class="col-sm-2 control-label">Bahasa</label>
                                    <div class="col-sm-10" style="margin-bottom:10px">
                                        <select name="selectbhs" class="form-control">
                                         	<option value="" disabled selected>--Bahasa--</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Inggris">Inggris</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
									<label class="col-sm-2 control-label">Media Type</label>
                                    <div class="col-sm-10" style="margin-bottom:10px">
	           						 <?php
										echo $form->dropDownList(
											$modTMedia,
											'MEDIA_CODE',
											CHtml::listData(TMediaType::model()->findAll(),
											'MEDIA_CODE','MEDIA_NAME'),
											array('empty'=>'--Media Buku--','class' => 'form-control'));
									 ?>
                                    </div>
                                </div>
							</div>
							
						</div>
						
						<div class="col-lg-12">
							<div class="form-group">
									<h4>Local Call Number</h4>
							</div>
							
							<div class="col-lg-6">
								<div class="form-group">
                                <label class="col-sm-2 control-label">Tipe Buku</label>
                                    <div class="col-sm-10" style="margin-bottom:11px">
	           						 <?php
										echo $form->dropDownList(
											$modTbk,
											'TYPE_CODE',
											CHtml::listData(TBkType::model()->findAll(),
											'TYPE_CODE','TYPE_NAME'),
											array('empty'=>'--Tipe Buku--','class' => 'form-control'));
									 ?>
                                    </div>
                                </div>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'DEWEY_NO', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model, 'DEWEY_NO', array('class' => 'form-control', 'placeholder' => 'No. Dewey Buku')); ?>
									<?php echo $form->error($model,'DEWEY_NO'); ?>
									</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model, 'AUTHOR_CODE', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model, 'AUTHOR_CODE', array('class' => 'form-control', 'placeholder' => 'Author Abrev')); ?>
									<?php echo $form->error($model,'AUTHOR_CODE'); ?>
									</div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'TITLE_CODE', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model, 'TITLE_CODE', array('class' => 'form-control', 'placeholder' => 'Title Abrev')); ?>
									<?php echo $form->error($model,'TITLE_CODE'); ?>
									</div>
								</div>
							</div>
							
						</div>
						
						<div class="col-lg-12">
							<div class="form-group">
									<h4>Publication Data</h4>
							</div>
							
							<div class="col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model, 'CITY_PUB', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model, 'CITY_PUB', array('class' => 'form-control', 'placeholder' => 'City Publication')); ?>
									<?php echo $form->error($model,'CITY_PUB'); ?>
									</div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'PUB_NAME', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model, 'PUB_NAME', array('class' => 'form-control', 'placeholder' => 'Publisher Buku')); ?>
									<?php echo $form->error($model,'PUB_NAME'); ?>
									</div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'YEAR_PUB', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model, 'YEAR_PUB', array('class' => 'form-control', 'placeholder' => 'Tahun Publish Buku')); ?>
									<?php echo $form->error($model,'YEAR_PUB'); ?>
									</div>
								</div>
							</div>
							
						</div>
						
						<div class="col-lg-12">
							<div class="form-group">
									<h4>Description</h4>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model, 'PHYS_DESCRIPTION', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model, 'PHYS_DESCRIPTION', array('class' => 'form-control', 'placeholder' => 'Deskripsi/ Informasi Buku')); ?>
									<?php echo $form->error($model,'PHYS_DESCRIPTION'); ?>
									</div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'INDEX_', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model, 'INDEX_', array('class' => 'form-control', 'placeholder' => 'Indeks Buku')); ?>
									<?php echo $form->error($model,'INDEX_'); ?>
									</div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model, 'COPIES', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model, 'COPIES', array('class' => 'form-control', 'placeholder' => 'Exemplar Buku')); ?>
									<?php echo $form->error($model,'COPIES'); ?>
									</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model, 'BIBLIOGRAPHY', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model, 'BIBLIOGRAPHY', array('class' => 'form-control', 'placeholder' => 'Bibliografi Buku')); ?>
									<?php echo $form->error($model,'BIBLIOGRAPHY'); ?>
									</div>
								</div>
								<div class="form-group">
                                <label class="col-sm-2 control-label">Lokasi</label>
                                    <div class="col-sm-10" style="margin-bottom:10px">
	           						 <?php
										echo $form->dropDownList(
											$modLoc,
											'LOCATION_CODE',
											CHtml::listData(TLocation::model()->findAll(),
											'LOCATION_CODE','LOCATION_NAME'),
											array('empty'=>'--Lokasi Buku--','class' => 'form-control'));
									 ?>
                                    </div>
                                </div>
								<div class="form-group">
                                <label class="col-sm-2 control-label">Detail Lokasi</label>
                                    <div class="col-sm-10" style="margin-bottom:10px">
	           						 <?php
										echo $form->dropDownList(
											$modSpecLoc,
											'SPEC_LOCATION',
											CHtml::listData(TSpecLocation::model()->findAll(),
											'SPEC_LOCATION','NAME'),
											array('empty'=>'--Detail Lokasi--','class' => 'form-control'));
									 ?>
                                    </div>
                                </div>
							</div>
							
						</div>
						
						<div class="col-lg-12">
							<div class="form-group">
									<h4>Others</h4>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model, 'PRICE', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model, 'PRICE', array('class' => 'form-control', 'placeholder' => 'Harga Buku')); ?>
									<?php echo $form->error($model,'PRICE'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Funding</label>
                                    <div class="col-sm-10" style="margin-bottom:10px">
	           						 <?php
										echo $form->dropDownList(
											$modFund,
											'FUND_CODE',
											CHtml::listData(TFunding::model()->findAll(),
											'FUND_CODE','FUND_NAME'),
											array('empty'=>'--Funding--','class' => 'form-control'));
									 ?>
                                    </div>
                                </div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Processed On</label>
									<div class="col-sm-10" style="margin-bottom:10px">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<div class="input-group-addon">
											<?php //echo $form->textField($model, 'DATA_ENTRY', array('class' => 'form-control','type'=>'date')); ?>
											<input name="DATA_ENTRY" id="DATA_ENTRY" type="date" class="form-control" style="width:280px" /> 
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model, 'FUND_NOTE', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:90px">
									<?php echo $form->textArea($model, 'FUND_NOTE', array('class' => 'form-control', 'placeholder' => 'Catatan', 'rows'=>'3')); ?>
									<?php echo $form->error($model,'FUND_NOTE'); ?>
									</div>
								</div>
							</div>
							
						</div>
						
						<div class="form-group" style="margin-left:120px;">
							<?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-default')); ?>
						</div>
						
					<?php $this->endWidget(); ?>

					</div><!-- form -->
                </div>
            </div><!-- individu -->
                                    
            
			<!-- kolektif -->
			<div class="tab-pane" id="kolektif" style="position: relative; height: 300px;">
			<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'tbk-main-f_katalog-form',
						'enableAjaxValidation'=>false,
						'htmlOptions' => array('enctype' => 'multipart/form-data'),
					)); ?>
				<div class="col-md-6" style="padding: 20px 0px 0px 20px">
					<div class="panel panel-default">
						<div class="panel-heading">
						<b>Register Buku Secara Kolektif</b>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
							<table class="table">
							<tr height="50">
								<td>Form Register Buku</td>
								<td>:</td>
								<td><a href="<?php echo Yii::app()->request->baseUrl.'/assets/TemplateForm/FormRegisterBuku.xls'; ?>" class="btn btn-default btn-flat">Download</a></td>
							</tr>
								
							<tr>
								 <td>Masukkan Data Excel</td>
								 <td>:</td>
								 <td><?php echo $form->fileField($model, 'filee', array('maxlength' => 200, 'class' => 'btn btn-default')); ?></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-default')); ?></td>
							</tr>
							</table>
							</div>
						</div>
					</div>
				</div>
				<?php $this->endWidget(); ?>
			</div><!-- kolektif -->
        
		
		
		</div><!-- tab-content -->
    </div><!-- /.nav-tabs-custom -->
</div><!-- tambah -->










<div class="tab-pane" id="daftar">
<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'tbk-main-f_katalog-form',
						'enableAjaxValidation'=>false,
						'htmlOptions' => array('enctype' => 'multipart/form-data'),
					)); ?>
	<div class="tab-content no-padding">
        <div class="tab-pane active">
            <div class="box box-primary" style="padding:15px 15px 15px 15px;">   
                <div class="form-group">
                <div class="col-md-4">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <label class="col-sm-1 control-label"></label>
                    <?php
                    echo $form->dropDownList($model, 'TITLE', array('prompt' => 'Pencarian Berdasarkan', '0'=>'50 Data Terbaru', '1' => 'Register', '2' => 'Tanggal'), array('class'=>'form-control',
                        'onchange' => '	
											if(this.value==0)
											{ 
												window.location="index.php?r=katalog/f_katalog";
												//document.getElementById("daftar").className += "tab-pane active";
											}
                  							else if(this.value==1)
											{ 	
                  								document.getElementById("kotak").style.display="block";
                  								document.getElementById("register").style.display="block";
                  								document.getElementById("button").style.display="block";
                  								document.getElementById("tanggal").style.display="none";
                  								document.getElementById("button").style.visibility="visible";
                  								}
                  							else if(this.value==2)
											{ 
                  								document.getElementById("kotak").style.display="block";
                  								document.getElementById("register").style.display="none";
                  								document.getElementById("button").style.display="block";
                  								document.getElementById("tanggal").style.display="block";
                  								document.getElementById("button").style.visibility="visible";
                  								}
												else if(this.value=="prompt")
											{ 
                  								document.getElementById("kotak").style.display="none";
                  								document.getElementById("register").style.display="none";
                  								document.getElementById("tanggal").style.display="none";
                  								}
                  							
                  							'
                    ));
                    ?>

                </div>     
                </div>
                </div>
                </div>
                
                <br /><br /><br /><br />
                <div id="all"> <?php //echo Yii::app()->runController('katalog/f_katalog'); ?> </div>
                 <div class="well well-sm" id="kotak">
					<div id="tanggal">
                        <div class="form-group">
                            	<table>
                                <tr>
                                <td><label>Dari Tanggal:</label></td>
                                <td colspan="3"><label>Sampai Tanggal:</label></td>
                                </tr>
                                
                                <tr>
                                <div class="input-group">
                                <td>
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i>
                                    </div>
                                    <div class="input-group-addon">
                                    <input name="tanggal1" id="tanggal1" type="date" class="form-control" style="width:350px" />
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                	<div class="input-group-addon">
                                    <input name="tanggal2" id="tanggal2" type="date" class="form-control" style="width:350px" />
                                    </div>
                                </td>                              
                                </div><!-- /.input group -->
                                </tr>
                                </table>
                        </div><!-- /.form group -->
                    </div>
                            
                            
                    <div id="register">
                        <div class="form-group">
                            <label>Register</label>
                            <div class="input-group">
                                    <input type="text" name="register" id="register" />
                            </div>
                        </div>
                    </div>
					
						<div class="form-group" id="button">
							<?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-default')); ?>
						</div>
                </div>	
				<?php $this->endWidget(); ?>
				
                
				<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'tbk-main-f_katalog-form',
						'enableAjaxValidation'=>false,
						'action'=>Yii::app()->createUrl('Cetak/CetakBarcode'),
					)); ?>
                <div class="box-header">
						<h4 class="box-title">Daftar Katalog</h4>
				</div>

					<p><?php echo CHtml::submitButton('Cetak Barcode', array('class' => 'btn btn-default')); ?></p>
					
				<table id="daftartbl" class="table table-bordered table-striped">
				<thead>
					<tr class="heading">
						<th><input id="checkall" type="checkbox" /></th>
						<th>REGISTER</th>
						<th>ISBN</th>
						<th width="25%">JUDUL</th>
						<th>BAHASA</th>
						<th>TAHUN</th>
						<th>PENERBIT</th>
						<th>TANGGAL MASUK</th>
						<th>HARGA</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($data as $model):
					?>
						<td><input class="check" type="checkbox" name="checkbk[]" value="<?php echo $model['REGISTER'] ?>"></td>
						<td><?php echo $model['REGISTER']; ?></td>
						<td><?php echo $model['ISBN']; ?></td>
						<td><?php echo $model['TITLE']; ?></td>
						<td><?php echo $model['LANGUAGE']; ?></td>
						<td><?php echo $model['YEAR_PUB']; ?></td>
						<td><?php echo $model['PUB_NAME']; ?></td>
						<td><?php echo $model['DATA_ENTRY']; ?></td>
						<td><?php echo $model['PRICE']; ?></td>
						<td>
									<a href class="glyphicon glyphicon-list-alt" id="<?php echo $model['REGISTER'] ?>" name="detailbuku"></a>
									&nbsp;&nbsp;&nbsp;
									<a href class="glyphicon glyphicon-pencil" id="<?php echo $model['REGISTER'] ?>" name="editbuku"></a>
								</td>
						</tr>
				<?php endforeach; ?>
				</tbody>
				</table>
            
			</div>
		</div>
	</div><!-- tab-content -->
				<?php $this->endWidget(); ?>
			

</div>

			
			
</div><!-- akhir Isi Tab -->



<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script>
$(document).ready(function() {
	$("div#tanggal").hide();
    $("div#register").hide();
    $("div#kotak").hide();
    $("div#button").hide();
    
	$('#checkall').click(function(event) {  //on click 
	alert("clicked");
	/*
        if(this.checked) { // check select status
            $('input.check').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('input.check').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }*/
    });
});
</script>

<script type="text/javascript">
    $(function() {
        $('#daftartbl').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": false,
            "bSort": true,
            "bInfo": false,
            "bAutoWidth": false
        });
    });
</script>

<script>
$(document).ready(function() {
	
	$("a.glyphicon.glyphicon-list-alt,a.glyphicon.glyphicon-pencil").click(function() {
            var a = $(this).attr("id");
			var b = $(this).attr("name");
            var link = "<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=katalog/aksi&det=" + a+"&nama="+b;
			$(this).attr("href", link);
        })
		
		
	});
</script>

