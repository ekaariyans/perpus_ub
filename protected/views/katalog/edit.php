<?php
/* @var $this TPermintaanBukuController */
/* @var $model1 TPermintaanBuku */
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
	
	<div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading">
    EDIT INFORMASI BUKU
    </div>
    <div class="panel-body">
    <div class="table-responsive">
	<?php foreach ($data as $model): 
	if($model['REGISTER'] == $register){?>

	<div class="col-lg-12">
                        	<div class="form-group" style="margin-bottom:40px;">
									<?php echo $form->labelEx($model1, 'REGISTER', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10">
									<?php echo $form->textField($model1, 'REGISTER', array('class' => 'form-control', 
												'value' => $register,'readOnly'=>true)); ?>
									<?php echo $form->error($model1,'REGISTER'); ?>
									</div>
							</div>
							<div class="form-group">
								<?php echo $form->labelEx($model1, 'TITLE', array('class' => 'col-sm-2 control-label')); ?>
								<div class="col-sm-10">
								<?php echo $form->textField($model1, 'TITLE', array('class' => 'form-control', 'value' => $model['TITLE'])); ?>
								<?php echo $form->error($model1,'TITLE'); ?>
								</div>
							</div>
                        </div>
						
                        <div class="col-lg-12">
							<div class="form-group">
									<h4>Identifier Item</h4>
							</div>
							
							<div class="col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model1, 'VOLUME', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10"  style="margin-bottom:10px">
									<?php echo $form->textField($model1, 'VOLUME', array('class' => 'form-control', 'value' => $model['VOLUME'])); ?>
									<?php echo $form->error($model1,'VOLUME'); ?>
									</div>
								</div>

								<div class="form-group">
									<?php echo $form->labelEx($model1, 'PRINTING', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:10px">
									<?php echo $form->textField($model1, 'PRINTING', array('class' => 'form-control', 'value' => $model['PRINTING'])); ?>
									<?php echo $form->error($model1,'PRINTING'); ?>
									</div>
								</div>
								
								<div class="form-group" >
									<?php echo $form->labelEx($model1, 'EDITION', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10">
									<?php echo $form->textField($model1, 'EDITION', array('class' => 'form-control', 'value' => $model['EDITION'])); ?>
									<?php echo $form->error($model1,'EDITION'); ?>
									</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model1, 'ISBN', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:10px">
									<?php echo $form->textField($model1, 'ISBN', array('class' => 'form-control', 'value' => $model['ISBN'])); ?>
									<?php echo $form->error($model1,'ISBN'); ?>
									</div>
								</div>
                             
                                <div class="form-group">
                                <label class="col-sm-2 control-label">Bahasa</label>
                                    <div class="col-sm-10" style="margin-bottom:10px">
                                                                               
		 <?php echo $form->dropDownList($model1, 'LANGUAGE', 
									array($model['LANGUAGE']=>$model['LANGUAGE'],'Indonesia'=>'Indonesia', 'Inggris'=>'Inggris', 'Lainnya'=>'Lainnya'), 
									array('class'=>'form-control', 'value'=>$model['LANGUAGE'])); ?>
		<?php echo $form->error($model1,'ID_STATUS'); ?>
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
											array($model['MEDIA_CODE']=>'--Media Type--','class' => 'form-control', 'value'=>$model['MEDIA_CODE']));
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
											array($model['TYPE_CODE']=>'--Tipe Buku--','class' => 'form-control', 'value'=>$model['TYPE_CODE']));
									 ?>
                                    </div>
                                </div>
								<div class="form-group">
									<?php echo $form->labelEx($model1, 'DEWEY_NO', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model1, 'DEWEY_NO', array('class' => 'form-control', 'value' => $model['DEWEY_NO'])); ?>
									<?php echo $form->error($model1,'DEWEY_NO'); ?>
									</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model1, 'AUTHOR_CODE', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model1, 'AUTHOR_CODE', array('class' => 'form-control', 'value' => $model['AUTHOR_CODE'])); ?>
									<?php echo $form->error($model1,'AUTHOR_CODE'); ?>
									</div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model1, 'TITLE_CODE', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model1, 'TITLE_CODE', array('class' => 'form-control', 'value' => $model['TITLE_CODE'])); ?>
									<?php echo $form->error($model1,'TITLE_CODE'); ?>
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
									<?php echo $form->labelEx($model1, 'CITY_PUB', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model1, 'CITY_PUB', array('class' => 'form-control', 'value' => $model['CITY_PUB'])); ?>
									<?php echo $form->error($model1,'CITY_PUB'); ?>
									</div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model1, 'PUB_NAME', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model1, 'PUB_NAME', array('class' => 'form-control', 'value' => $model['PUB_NAME'])); ?>
									<?php echo $form->error($model1,'PUB_NAME'); ?>
									</div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model1, 'YEAR_PUB', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model1, 'YEAR_PUB', array('class' => 'form-control', 'value' => $model['YEAR_PUB'])); ?>
									<?php echo $form->error($model1,'YEAR_PUB'); ?>
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
									<?php echo $form->labelEx($model1, 'PHYS_DESCRIPTION', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model1, 'PHYS_DESCRIPTION', array('class' => 'form-control', 'value' => $model['PHYS_DESCRIPTION'])); ?>
									<?php echo $form->error($model1,'PHYS_DESCRIPTION'); ?>
									</div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model1, 'INDEX_', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model1, 'INDEX_', array('class' => 'form-control', 'value' => $model['INDEX_'])); ?>
									<?php echo $form->error($model1,'INDEX_'); ?>
									</div>
								</div>
								<div class="form-group">
									<?php echo $form->labelEx($model1, 'COPIES', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model1, 'COPIES', array('class' => 'form-control', 'value' => $model['COPIES'])); ?>
									<?php echo $form->error($model1,'COPIES'); ?>
									</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model1, 'BIBLIOGRAPHY', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model1, 'BIBLIOGRAPHY', array('class' => 'form-control', 'value' => $model['BIBLIOGRAPHY'])); ?>
									<?php echo $form->error($model1,'BIBLIOGRAPHY'); ?>
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
											array($model['LOCATION_CODE']=>'--Lokasi Buku--','class' => 'form-control','value'=>$model['LOCATION_CODE']));
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
											array($model['SPEC_LOCATION']=>'--Detail Lokasi--','class' => 'form-control','value'=>$model['SPEC_LOCATION']));
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
									<?php echo $form->labelEx($model1, 'PRICE', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:11px">
									<?php echo $form->textField($model1, 'PRICE', array('class' => 'form-control', 'value' => $model['PRICE'])); ?>
									<?php echo $form->error($model1,'PRICE'); ?>
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
											array($model['FUND_CODE']=>'--Funding--','class' => 'form-control','value'=>$model['FUND_CODE']));
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
											<?php //echo $form->textField($model1, 'DATA_ENTRY', array('class' => 'form-control','type'=>'date')); ?>
											<input name="DATA_ENTRY" id="DATA_ENTRY" type="date" class="form-control" style="width:280px" /> 
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-lg-6">
								<div class="form-group">
									<?php echo $form->labelEx($model1, 'FUND_NOTE', array('class' => 'col-sm-2 control-label')); ?>
									<div class="col-sm-10" style="margin-bottom:90px">
									<?php echo $form->textArea($model1, 'FUND_NOTE', array('class' => 'form-control', 'value' => $model['FUND_NOTE'], 'rows'=>'3')); ?>
									<?php echo $form->error($model1,'FUND_NOTE'); ?>
									</div>
								</div>
							</div>
							
						</div>
						
						
<?php }
endforeach; ?>
	</div>
		<?php echo CHtml::submitButton('Submit', array('class'=>"btn btn-primary")); ?>
	
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
                        
</div>
</div>
