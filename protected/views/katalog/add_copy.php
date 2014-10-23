<!DOCTYPE html>
<html>
<head>
<script>
function goBack() {
    window.history.back()
}
</script>
</head>
<body>
<?php
/* @var $this BkAddCopyController */
/* @var $model BkAddCopy */
/* @var $form CActiveForm */
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bk-add-copy-add_copy-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>
	
	<div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading">
    ADD COPY
    </div>
    <div class="panel-body">
		<div class="table-responsive">
		<p class="note">Fields with <span class="required">*</span> are required.</p>

		<?php echo $form->errorSummary($model); ?>
	
			<div class="col-lg-12">
				<div class="form-group">
						<?php echo $form->labelEx($model, 'REGISTER', array('class' => 'col-sm-2 control-label')); ?>
						<div class="col-sm-10" style="margin-bottom:11px">
						<?php echo $form->textField($model, 'REGISTER', array('class' => 'form-control', 
									'value' => $newreg,'readOnly'=>true)); ?>
						<?php echo $form->error($model,'REGISTER'); ?>
						</div>
				</div>
				<div class="form-group">
						<?php echo $form->labelEx($model, 'GROUP_NO', array('class' => 'col-sm-2 control-label')); ?>
						<div class="col-sm-10" style="margin-bottom:11px">
						<?php echo $form->textField($model, 'GROUP_NO', array('class' => 'form-control', 
									'value' => $data_grup['GROUP_NO'],'readOnly'=>true)); ?>
						<?php echo $form->error($model,'GROUP_NO'); ?>
						</div>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model, 'COPY_NO', array('class' => 'col-sm-2 control-label')); ?>
					<div class="col-sm-10" style="margin-bottom:11px">
					<?php echo $form->textField($model, 'COPY_NO', array('class' => 'form-control', 
						'value' => $data_grup['COPY_NO']+1,'readOnly'=>true)); ?>
					<?php echo $form->error($model,'COPY_NO'); ?>
					</div>
				</div>
			</div>
			
			<div class="col-lg-12">
				<div class="form-group">
					<h4>Informasi Copy</h4>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<?php echo $form->labelEx($model, 'PRINTING', array('class' => 'col-sm-2 control-label')); ?>
						<div class="col-sm-10" style="margin-bottom:11px">
						<?php echo $form->textField($model, 'PRINTING', array('class' => 'form-control', 'value' => $data_grup['PRINTING'])); ?>
						<?php echo $form->error($model,'PRINTING'); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($model, 'YEAR_PUB', array('class' => 'col-sm-2 control-label')); ?>
						<div class="col-sm-10" style="margin-bottom:11px">
						<?php echo $form->textField($model, 'YEAR_PUB', array('class' => 'form-control', 'value' => $data_grup['YEAR_PUB'])); ?>
						<?php echo $form->error($model,'YEAR_PUB'); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($model, 'STATUS', array('class' => 'col-sm-2 control-label')); ?>
						<div class="col-sm-10" style="margin-bottom:11px">
						<?php echo $form->textField($model, 'STATUS', array('class' => 'form-control', 'value' => $data_grup['STATUS'])); ?>
						<?php echo $form->error($model,'STATUS'); ?>
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
								array($data_grup['LOCATION_CODE']=>'--Lokasi Buku--','class' => 'form-control','value'=>$data_grup['LOCATION_CODE']));
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
								array($data_grup['SPEC_LOCATION']=>'--Detail Lokasi--','class' => 'form-control','value'=>$data_grup['SPEC_LOCATION']));
						 ?>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<?php echo $form->labelEx($model, 'PRICE', array('class' => 'col-sm-2 control-label')); ?>
						<div class="col-sm-10" style="margin-bottom:11px">
						<?php echo $form->textField($model, 'PRICE', array('class' => 'form-control', 'value' => $data_grup['PRICE'])); ?>
						<?php echo $form->error($model,'PRICE'); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Funding</label>
						<div class="col-sm-10" style="margin-bottom:11px">
						 <?php
							echo $form->dropDownList(
								$modFund,
								'FUND_CODE',
								CHtml::listData(TFunding::model()->findAll(),
								'FUND_CODE','FUND_NAME'),
								array($data_grup['FUND_CODE']=>'--Funding--','class' => 'form-control','value'=>$data_grup['FUND_CODE']));
						 ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($model, 'FUND_NOTE', array('class' => 'col-sm-2 control-label')); ?>
						<div class="col-sm-10" style="margin-bottom:11px">
						<?php echo $form->textArea($model, 'FUND_NOTE', array('class' => 'form-control', 'value' => $data_grup['FUND_NOTE'], 'rows'=>'3')); ?>
						<?php echo $form->error($model,'FUND_NOTE'); ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Accept Date</label>
						<div class="col-sm-10" style="margin-bottom:10px">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<div class="input-group-addon">
								<input name="ACCEPT_DATE" id="ACCEPT_DATE" type="date" class="form-control" style="width:280px" /> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
        <p style="margin-left:20px">
		<button type="submit" class="btn btn-primary" name="addcopy" id="addcopy">
              <span class="glyphicon glyphicon-floppy-open"></span>&nbsp;&nbsp;Submit
		</button>&nbsp;&nbsp;&nbsp;&nbsp;
		
		<a class="btn btn-danger" name="back" id="back" 
		href="<?php echo Yii::app()->getBaseUrl(); ?>/index.php?r=Katalog/CopyList&register%5B0%5D=<?php echo $data_grup['REGISTER']; ?>">
              <span class="glyphicon glyphicon-chevron-left"></span>&nbsp;&nbsp;Kembali
		</a>
		</p>
		<?php $this->endWidget(); ?>
		

	</div>
	</div>						
	</div>

</div><!-- form -->

</body>
</html>