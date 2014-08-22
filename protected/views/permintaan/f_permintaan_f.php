<div class="tab-pane" id="Fakultas">
  <div class="box box-primary">
        <div class="box-header">
            <h4 class="box-title">PERMINTAAN BUKU BARU</h4>
        </div>
  <?php echo $form->errorSummary($model); ?>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'id_anggota',array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
		<?php echo $form->textField($model,'id_anggota',array('class' => 'form-control','placeholder' => 'id_anggota')); ?>
		<?php echo $form->error($model,'id_anggota'); ?>
		</div>
	</div>
    
    <div class="form-group">
        <div class="col-sm-2 control-label"><b>Masukkan Data Excel</b></div>
        <div class="col-sm-10">
        <?php echo $form->fileField($model,'filee',array('size'=>60, 'maxlength'=>200,'class' => 'btn btn-default')); ?>
       </div>
           
	<div class="form-group">
	<div class="col-sm-2 control-label">
		<?php echo CHtml::submitButton('Submit',array('class' => 'btn btn-default')); ?>
	</div>
    </div>
    
    </div>
  </div>
  </div>