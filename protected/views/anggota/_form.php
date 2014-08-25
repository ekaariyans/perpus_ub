<?php
/* @var $this AnggotaController */
/* @var $model Anggota */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'anggota-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

  <div class="box box-primary">
  	<div class="box-header"><h3 class="box-title">Register Anggota Baru</h3></div>
  	<!-- /.box-header -->
  	<!-- form start -->
  		<div class="box-body">
  			<div class="row">
  				<div class="col-md-6">
				<?php echo $form->errorSummary($model); ?>

					<div class="box box-primary">
    					<div class="box-header">
    						<h4 class="box-title">AKADEMIK</h4>
    					</div> 
                        <table class="form-group" width="500" height="350">
                        <div class="form-group">
                        	<tr>
                            <td width="130" class="form-group"><?php echo $form->labelEx($model,'nama'); ?></td>
                            <td><?php echo $form->textField($model,'nama',
							array('maxlength'=>50, 'class'=>'form-control')); ?></td>
                            <?php echo $form->error($model,'nama'); ?>
                            </tr>
                        </div>
                    
                        <div class="form-group">
                            <tr>
                            <td width="130" class="form-group"><?php echo $form->labelEx($model,'nim'); ?></td>
                            <td><?php echo $form->textField($model,'nim',
							array('maxlength'=>50, 'class'=>'form-control')); ?></td>
                            <?php echo $form->error($model,'nim'); ?>
                            </tr>
                        </div>
                    
                        <div class="form-group">
                            <tr>
                            <td width="130" class="form-group"><?php echo $form->labelEx($model,'k_fakultas'); ?></td>
                            <td><?php echo $form->dropDownList($model,'k_fakultas',$model->getFakultas(),
							array('maxlength'=>50, 'class'=>'form-control')
                                    ); ?></td>
                            <?php echo $form->error($model,'k_fakultas'); ?>
                            </tr>
                        </div>
                    
                        <div class="form-group">
                            <tr>
                            <td width="130" class="form-group"><?php echo $form->labelEx($model,'k_prodi'); ?></td>
                            <td><?php echo $form->dropDownList($model,'k_prodi',$model->getProdi(),
							array('maxlength'=>50, 'class'=>'form-control')); ?></td>
                            <?php echo $form->error($model,'k_prodi'); ?>
                            </tr>
                        </div>
                    
                        <div class="form-group">
                            <tr>
                            <td width="130" class="form-group"><?php echo $form->labelEx($model,'k_jenjang'); ?></td>
                            <td><?php echo $form->dropDownList($model,'k_jenjang',$model->getJenjang(),
							array('maxlength'=>50, 'class'=>'form-control')); ?></td>
                            <?php echo $form->error($model,'k_jenjang'); ?>
                            </tr>
                        </div>
                    
                        <div class="form-group">
                            <tr>
                            <td width="130" class="form-group"><?php echo $form->labelEx($model,'angkatan'); ?></td>
                            <td><?php echo $form->textField($model,'angkatan',
							array('maxlength'=>50, 'class'=>'form-control')); ?></td>
                            <?php echo $form->error($model,'angkatan'); ?>
                            </tr>
                        </div>
                    
                        <div class="form-group">
                            <tr>
                            <td width="130" class="form-group"><?php echo $form->labelEx($model,'tgl_lahir'); ?></td>
                            <td><?php echo $form->dateField($model,'tgl_lahir',
							array('maxlength'=>50, 'class'=>'form-control')); ?></td>
                            <?php echo $form->error($model,'tgl_lahir'); ?>
                            </tr>
                        </div>
                    </table>
                    </div><!-- /.input group -->
				</div>
			<!-- /.box -->
		
                                                        
                                
            <div class="col-md-6">
            <!-- Alamat Di Malang -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h4 class="box-title">ALAMAT ASAL</h4>
                    </div>
                    <table class="form-group" width="500" height="150">
                        <div class="form-group">
                        	<tr>
                            <td width="130" class="form-group"><?php echo $form->labelEx($model,'alamat1'); ?></td>
                            <td><?php echo $form->textField($model,'alamat1',array('maxlength'=>50, 'class'=>'form-control')); ?></td>
                            <?php echo $form->error($model,'alamat1'); ?>
                            </tr>
                        </div>
                    
                        <div class="form-group">
                            <tr>
							<td width="130" class="form-group"><?php echo $form->labelEx($model,'kodepos1'); ?></td>
                            <td><?php echo $form->textField($model,'kodepos1',array('maxlength'=>50, 'class'=>'form-control')); ?></td>
                            <?php echo $form->error($model,'kodepos1'); ?>
                            </tr>
                        </div>
                    
                        <div class="form-group">
                            <tr>
							<td width="130" class="form-group"><?php echo $form->labelEx($model,'notelp1'); ?></td>
                            <td><?php echo $form->textField($model,'notelp1',array('maxlength'=>50, 'class'=>'form-control')); ?></td>
                            <?php echo $form->error($model,'notelp1'); ?>
                            </tr>
                        </div>
                    </table>
					</div><!-- /.input group -->
				</div>
			<!-- /.box -->
		
                                                        
                                
            <div class="col-md-6">
            <!-- Alamat Di Malang -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h4 class="box-title">ALAMAT DI MALANG</h4>
                    </div>
                    	<table class="form-group" width="500" height="150">
                        <div class="form-group">
                            <tr>
                            <td width="130" class="form-group"><?php echo $form->labelEx($model,'alamat2'); ?></td>
                            <td><?php echo $form->textField($model,'alamat2',array('maxlength'=>50, 'class'=>'form-control')); ?></td>
                            <?php echo $form->error($model,'alamat2'); ?>
                            </tr>
                        </div>
                    
                        <div class="form-group">
                            <tr>
                            <td width="130" class="form-group"><?php echo $form->labelEx($model,'kodepos2'); ?></td>
                            <td><?php echo $form->textField($model,'kodepos2',array('maxlength'=>50, 'class'=>'form-control')); ?></td>
                            <?php echo $form->error($model,'kodepos2'); ?>
                            </tr>
                        </div>
                    
                        <div class="form-group">
                            <tr>
                            <td width="130" class="form-group"><?php echo $form->labelEx($model,'notelp2'); ?></td>
                            <td><?php echo $form->textField($model,'notelp2',array('maxlength'=>50, 'class'=>'form-control')); ?></td>
                            <?php echo $form->error($model,'notelp2'); ?>
                            </tr>
                        </div>
                 		</table>
                        </div>
                        <table>
                            <tr><td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></td></tr>
                    	</table>
                    <?php $this->endWidget(); ?>
                    
                   <!-- form -->
                    </div>
                    